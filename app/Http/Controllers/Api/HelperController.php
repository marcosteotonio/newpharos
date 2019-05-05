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
            'name.required' => 'O Nome é necessário',
            'email.required' => 'O Email é necessário',
            'date_birth.required' => 'A Data de Nascimento é necessário',
            'height.required' => 'A Altura é necessário',
            'dummy.required' => 'O Manequin é necessário',
            'feet.required' => 'O Calçado é necessário',
            'gender.required' => 'O Sexo é necessário',
            // 'resume.required' => 'O Curriculo é necessário',
            // 'courses.required' => 'Informe os cursos.',
            // 'publicity.required' => 'Informe as publicidades anteriores',
        ];
        
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'date_birth' => 'required',
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
        $data['date_birth'] = Carbon::parse($data['date_birth'])->format('Y-m-d');
        $data['height'] = str_replace(',','.',$data['height']);

        $profile = Profile::insert($data);
        
        dd($profile);

        if($profile){
            return response()->json(['success' => 'Dados do perfil Atualizados.']);
        } else {
            return response()->json(['Error' => 'Falha na atualizar dados do perfil.']);
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
}
