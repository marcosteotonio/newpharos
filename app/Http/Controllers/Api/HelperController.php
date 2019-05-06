<?php

namespace App\Http\Controllers\Api;

use App\Favorito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use Exception;
use App\Media;
use App\Profile;
use App\User;
use App\Skills;

use App\Post;

use Carbon\Carbon;

use DB;

class HelperController extends Controller
{
    function __construct()
    {
       
    }

    function getLoginAgenciado(Request $request){
        
        $messages = [
            'required' => 'O :attribute é necessário.',
            'email' => 'O :attribute é inválido.',
        ];
        
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];        

        $validator = Validator::make( $request->all() , $rules, $messages);
        
        
        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->messages() ]);
        }

        $user = User::where(['email' => $request->get('email'), 'level' => 3 ])->first();

        if (!$user){
            return response()->json(['error' => ['Usuário e/ou Senha incorreto!'] ] );
        } else if( !password_verify ( $request->get('password') , $user->password ) ) {
            return response()->json(['error' => ['Usuário e/ou Senha incorreto!'] ] );
        }

        return response()->json(['success' => 'successo']);

    }

    function getRegisterAgenciado(Request $request){
        
        $messages = [
            'required' => 'O :attribute é necessário.',
            'unique' => 'O :attribute já existe.',
            'password.confirmed' => 'A senha não confere!',
            'email' => 'O :attribute é inválido.',
            'password.min' => 'A senha deve conter no mínimo :min caracteres.'
        ];
        
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'level' => 'between:1,3|required'
        ];        

        $validator = Validator::make( $request->all() , $rules, $messages);
        
        
        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->messages() ]);
        }
        
        return response()->json(['success' => 'successo']);

    }

    function getResendAgenciado(Request $request){
        $messages = [
            'required' => 'O :attribute é requerido.',
            'email' => 'O :attribute é inválido.',
        ];
        
        $rules = [
            'email' => [
                'required',
                'email',
                function($attribute, $value, $fail){
                    $user = User::where('email', $value )->first();
                    if (!$user) {
                        $fail( $attribute.' não cadastrado.');
                    }
                }
            ],
        ];        
        
        $validator = Validator::make( $request->all() , $rules, $messages);

        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->messages() ]);
        }

        return response()->json(['success' => $request->get('email')]);
        
    }

    function getEditAgenciadoData(Request $request){


        $messages = [
            'fancy_name.required' => 'O Nome é necessário',
            // 'email.required' => 'O Email é necessário',
            'date_birth.required' => 'A Data de Nascimento é necessário',
            'date_birth.date_format' => 'A Data de Nascimento é inválida.',
            'height.required' => 'A Altura é necessário',
            'dummy.required' => 'O Manequin é necessário',
            'feet.required' => 'O Calçado é necessário',
            'gender.required' => 'O Sexo é necessário',
            // 'resume.required' => 'O Curriculo é necessário',
            // 'courses.required' => 'Informe os cursos.',
            // 'publicity.required' => 'Informe as publicidades anteriores',
        ];
        
        $rules = [
            'fancy_name' => 'required',
            // 'email' => 'required',
            'date_birth' => 'required|date_format:d/m/Y',
            'height' => 'required',
            'dummy' => 'required',
            'feet' => 'required',
            'gender' => 'required',
            // 'resume' => 'required',
            // 'courses' => 'required',
            // 'publicity' => 'required',
        ];

        $validator = Validator::make( $request->all() , $rules, $messages);
        
        
        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->messages() ]);
        }

        // dd($request->all());
        $data = $request->all();
        $data['date_birth'] = Carbon::createFromFormat('d/m/Y',$data['date_birth'])->format('Y-m-d');
        $data['height'] = str_replace(',','.',$data['height']);
        $data['slug'] = str_slug($data['fancy_name']);

        $data = array_replace_recursive( $this->profile_fields(), $data );
        $unsetThis = ['name', 'email', '_token'];
        foreach($unsetThis as $k => $v)
            unset($data[$v]);
        
        
        $profile = Profile::where('user_id', $request->get('user_id') )->first();
        if(!$profile){
            $profile = Profile::insert($data);
        } else {
            $profile = Profile::where('user_id', $request->get('user_id') )->update($data);
        }


        if($profile){
            return response()->json(['success' => 'Dados do perfil Atualizados.']);
        } else {
            return response()->json(['Error' => 'Falha na atualizar dados do perfil.']);
        }
        
    }


    function getEditAgenciadoMediaMain(Request $request){
        $messages = [
            'required' => 'O :attribute é requerido.',
        ];
        
        $rules = [
            'user_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];        
        
        $validator = Validator::make( $request->all() , $rules, $messages);

        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->messages() ]);
        }

        
        $imageName = time().'.'.request()->file->getClientOriginalExtension();
        request()->file->move( public_path('uploads/profiles/' . $request->get('user_id') ), $imageName);
        
        // dd($this->media_fields());  
        $data = [
            'entity_id' => $request->get('user_id'),
            'entity_type' => 'App\Profile',
            'type' => 'image',
            'path' => $imageName,
            'order' =>  0,
            'title' =>  null,
        ];
        
        $media = Media::where(['entity_id' => $request->get('user_id'), 'order' => 0] )->first();
        if($media){
            Media::where(['entity_id' => $request->get('user_id'), 'order' => 0])->update($data);
        } else {
            Media::insert($data);
        }

        return response()->json(['success' => $data]);
    }

    /**
     * Adiciona Imagens Após a primeira,
     * isso é feito ignorando o form antes de 
     * adicionar a primeira foto.
     */
    function getAddAgenciadoMediaImages(Request $request){
        $messages = [
            'file.required' => 'Nenhum arquivo selecionado!',
            'file.image' => 'O arquivo deve ser uma imagem!',
            'file.mimes' => 'Os formátos válidos são jpeg,png,jpg ou gif!',
        ];
        
        $rules = [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];        
        
        $validator = Validator::make( $request->all() , $rules, $messages);

        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->messages() ]);
        }

        $order = Media::where('entity_id', $request->get('user_id'))->count();
        $imageName = time().'.'.request()->file->getClientOriginalExtension();
        request()->file->move( public_path('uploads/profiles/' . $request->get('user_id') ), $imageName);
        
        // dd($this->media_fields());  
        $data = [
            'entity_id' => $request->get('user_id'),
            'entity_type' => 'App\Profile',
            'type' => 'image',
            'path' => $imageName,
            'order' =>  $order,
            'title' =>  null,
        ];
        
        $media = Media::insert($data);

        return response()->json(['success' => $data]);
    }

    function getRemoveAgenciadoMediaImages(Request $request, $id){
        
        $idExplode = explode('|', base64_decode($id));
        $data['user_id'] = $idExplode[0];
        $data['order'] = $idExplode[1];
        
        $mediaToDelete = Media::where(['entity_id' =>  $data['user_id'], 'order'=> $data['order'] ])->delete();

        if($mediaToDelete){
            return response()->json(['success' => 'Foto do perfil removida com sucesso!']);
        } else {
            return response()->json(['error' => 'Not Found!']);
        }


    }

    //Apenas para cliente
    public function postFavorito(Request $request){

        $cliente = $request->logado_id; // cliente logado
        $usuario = $request->usuario_id;

        $noRepeat = Favorito::where('user_id', $cliente)
                ->where('agenciado_id', $usuario);

        if($noRepeat->count()){
            return response()->json([
                'error' => 'Você já adicionou esse perfil em seus favoritos'
            ]);
        } else {
            Favorito::create([
                'user_id' => $cliente,
                'agenciado_id' => $usuario
            ]);

            return response()->json([
                'success' => 'Favorito adicionado com sucesso!'
            ]);
        }

    }

    function getLoginCliente(Request $request){

        $messages = [
            'required' => 'O :attribute é necessário.',
            'email' => 'O :attribute é inválido.',
        ];

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make( $request->all() , $rules, $messages);


        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->messages() ]);
        }

        $user = User::where(['email' => $request->get('email'), 'level' => 2 ])->first();

        if (!$user){
            return response()->json(['error' => ['Usuário e/ou Senha incorreto!'] ] );
        } else if( !password_verify ( $request->get('password') , $user->password ) ) {
            return response()->json(['error' => ['Usuário e/ou Senha incorreto!'] ] );
        }

        return response()->json(['success' => 'successo']);

    }

    function getRegisterCliente(Request $request){

        $messages = [
            'required' => 'O :attribute é necessário.',
            'unique' => 'O :attribute já existe.',
            'password.confirmed' => 'A senha não confere!',
            'email' => 'O :attribute é inválido.',
            'password.min' => 'A senha deve conter no mínimo :min caracteres.'
        ];

        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'level' => 'between:1,3|required'
        ];

        $validator = Validator::make( $request->all() , $rules, $messages);


        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->messages() ]);
        }

        return response()->json(['success' => 'successo']);

    }

    function profile_fields(){
        $profile =  DB::select('describe profiles');
        $Fields = [];
        foreach($profile as $key => $value){

            $exclude = ['id','created_at','updated_at'];
            if(!in_array($value->Field, $exclude) ){
                $Fields[ $value->Field ] = null;
            }
            
            $custom_fields = [
                'tattoo' => 0,
                'film_outside' => false,
                'make_figuration' => false,
                'make_event' => false,
            ];
            if( key_exists($value->Field, $custom_fields )){
                $Fields[$value->Field] = $custom_fields[$value->Field] ;
            }
        }


        return $Fields;
    }

    function media_fields(){
        $profile =  DB::select('describe media');
        $Fields = [];
        foreach($profile as $key => $value){

            $exclude = ['id','created_at','updated_at'];
            if(!in_array($value->Field, $exclude) ){
                $Fields[ $value->Field ] = null;
            }
            
            $custom_fields = [
               
            ];
            if( key_exists($value->Field, $custom_fields )){
                $Fields[$value->Field] = $custom_fields[$value->Field] ;
            }
        }

        return $Fields;

    }
}
