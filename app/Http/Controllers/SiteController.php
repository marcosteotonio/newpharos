<?php

namespace App\Http\Controllers;

use App\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Validator;

use Exception;
use App\Media;
use App\Video;
use App\Profile;
use App\User;
use App\Skills;
use App\Notices;

use App\Post;

use Carbon\Carbon;

use DB;

class SiteController extends Controller
{
    function __construct()
    {
        $data = [];
        view()->share($data);
    }

    /**
     * Home page
     */
    function getIndex(Request $request){
        
        $data['elencoShowCase'] =       Profile::getAdultsOnly()
                                        ->whereRaw('( select count(*) from media where media.entity_id = user_id ) > 0')
                                        ->orderBy( \DB::raw('RAND()') )
                                        ->limit(20)
                                        ->get();

        $data['elencoKidShowCase'] =    Profile::getKidsOnly()
                                        ->whereRaw('( select count(*) from media where media.entity_id = user_id ) > 0')
                                        ->orderBy( \DB::raw('RAND()') )
                                        ->limit(20)
                                        ->get();
        
        /**
         *  divide in two parts to exibition
         */
        $data['WorksShowCase'] = Notices::limit(5)->get()->toArray();

        $data['secWorksShowCase'] = $data['WorksShowCase']; unset( $data['secWorksShowCase'][0] );
        return view('site.home', $data);
    }

    function getLogout(){
        Auth::logout();
        
        return redirect('/')->with('info', 'Você foi deslogado!');
    }

    /**
     *  Get Elenco index
     */
    function getElencos(Request $request){
        $data['input'] = $request->all();

        $profiles = Profile::hasMedia();
       
        // PESQUISA POR IDADE, CASO TODAS AS IDADES SEJAM SELECIONADAS NADA ACONTECE
        if( $request->get('age') ){
            $age = $request->get('age');
            if( sizeof($age) != 5 ){
                $profiles = $profiles->where( function($query) use ($age){
                    foreach($age as $key => $value){
                        $start = explode( '_', $value )[0];
                        $end = explode( '_', $value )[1];
                        $start = Carbon::now()->subYears($start)->format('Y-m-d');
                        $end = Carbon::now()->subYears($end)->format('Y-m-d');
                        $query->orWhereBetween("date_birth" ,[ $end , $start ] );
                    }
                });
            }
        }

        // PESQUISA POR GENERO CASO TODOS SELECIONADOS NADA ACONTECE
        if( $request->get('sex') ){
            $gender = $request->get('sex');
            if( sizeof($age) != 2 ){
                $profiles = $profiles->where(function ($query) use ($gender){
                    foreach($gender as $key => $value){
                        $query->orWhere('gender', 'like', $value);
                    }
                });
            }
        }

        // PESQUISA POR CABELOS OBS: NEM NOTO MUNDO ESTA CADASTRADO E CASO TUDO SELECIONADO NADA ACONTECE
        if($request->get('hair')){
            $hair = $request->get('hair');
            if( sizeof($hair) != 5 ){
                $profiles = $profiles->where(function ($query) use ($hair){
                    foreach($hair as $key => $value){
                        if( strpos('_', $value)){
                            $dualValue = explode('_', $value);
                            foreach($dualValue as $ke => $single){
                                $query->orWhere('hair_color', 'like', $single);
                            }
                        } else {
                            $query->orWhere('hair_color', 'like', $value);
                        }
                    }
                });
            }
        }

        //CASO TENTEM PROCURAR ESTOU USANDO O NOME DE EXIBIÇÃO DA PESSOA (FANCY_NAME)
        if( $request->get('search') ){
            $profiles = $profiles->where('fancy_name','like', '%'.$request->get('search').'%' );
        }

        // LISTA POR ORDEM ASC DE NOME DE EXIBIÇÃO (FANCY_NAME)
        $data['profiles'] = $profiles->orderBy('fancy_name', 'asc')->paginate(16);

        return view('site.elenco', $data);
    }

    /**
     * Perfil do agenciado
     */
    function getElencoPerfil(Request $request, $slug){
        $data['title'] = 'Elenco Perfil';

        try {
            $data['profile'] = Profile::getBySlug($slug);
            if(!$data['profile']){
                throw new exception('Perfil não encotrado!');
            }

            // Gera um arra de detalhes a serem exibidos na area inicial
            // assim da pra moldar a exibição
            // uma checagem eh feita pra não deixar campos em branco caso não preenchidos
            $data['details'] = [];
            
            if( $data['profile']['years_old'] ){
                $data['details'][] = [
                    "value" => $data['profile']['years_old'],
                    "title"=> "idade",
                    "size" => 1
                ];
            }
            if( $data['profile']['height'] ){
                $data['details'][] = [
                    "value" => $data['profile']['height'],
                    "title"=> "altura",
                    "size" => 1
                ];
            }
            if( $data['profile']['feet'] ){
                $data['details'][] = [
                    "value" => $data['profile']['feet'],
                    "title"=> "calçado",
                    "size" => 1
                ];
            }
            if( $data['profile']['dummy'] ){
                $data['details'][] = [
                    "value" => $data['profile']['dummy'],
                    "title"=> "manequin",
                    "size" => 1
                ];
            }
            // TEMPLATE Profile exibição TOPO
            // if( $data['profile']['genderr'] ){
            //     $data['details'][] = [
            //         "value" => $data['profile']['genderr'],
            //         "title"=> "Educação",
            //         "size" => 4
            //     ];
            // }

            $data['video'] = Video::where(['entity_id' =>  $data['profile']->user_id])->get();
            $notices_related = Notices::select('video')->where('agenciado','like','%"'. $data['profile']->user_id.'"%')->get();
            

        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect('/')->with('error', $th->getMessage() );
        }
        
        return view('site.elenco_perfil', $data);
        
    }
    
    /**
     * Index Trabalhos
     */
    function getTrabalhos(){
        $data['title'] = 'Trabalhos';
        $data['works'] = Notices::orderBy( 'id', 'DESC' )->get()->toArray();
      
        return view('site.trabalhos', $data);
    }
    
    /**
     * Detalhes de um trabalho
     */
    function getTrabalho($slug){
        $data['title'] = 'Trabalhos';
                
        $data['work'] = Notices::where(['slug' => $slug])->first();
        if(!$data['work']->media){
            $data['work']->media = 'default_notice.png';
        }
        $data['secWorkShowCase'] = Notices::limit(3)->orderBy( \DB::raw('RAND()') )->get();
        if($data['secWorkShowCase']){
            $data['secWorkShowCase'] = $data['secWorkShowCase']->toArray();
        }
        return view('site.trabalho', $data);
    }

    /**
     * Apresentação da Agencia
     */
    function getAgencia(){
        $data['title'] = 'Agencia';
        
      
        return view('site.agencia', $data);
    }

    /**
     * Formulário de Contato
     */
    function getContato(){
        $data['title'] = 'Contato';
        
      
        return view('site.contato', $data);
    }

    /**
     * Selecão de opções do Usuário
     */
    function getProfle(){
        $data['title'] = 'Perfil';
        $data['user'] = auth::user();
        $data['profile'] = Profile::where('user_id', $data['user']->id)->first();
        
        return view('site.profile', $data);
    }

    /**
     * Editar Perfil
     */
    function getProfleEditar(Request $request){
        $data['profile'] =  DB::select('describe profiles');
        
        $data['title'] = 'Perfil :: Editar';
        $data['user'] = auth::user();
        $data['profile'] = Profile::where('user_id', $data['user']->id)->first();
        
        $data['media'] = Media::where(['entity_id' =>  $data['user']->id, 'type' => 'image'])->orderBy('order', 'ASC')->get();
        $data['video'] = Video::where(['entity_id' =>  $data['user']->id])->get();
        // dd($data);
        return view('site.profile_edit', $data);
    }

    /**
     * Login Agenciado
     */
    public function LoginAgenciado(Request $request){
        
        $user = Auth::attempt([
            'email' => $request->get('email'),
            'password'=> $request->get('password')
            ]);

        if(!$user){
            return redirect()->intended('/')->with('error', 'E-mail e/ou Senha inválida!');
        }

        return redirect()->intended('/perfil')->with('info', 'Logado com successo!');

    }

    public function RegisterAgenciado(Request $request){
        
        

        $data = $request->all();
        $data['level'] = 3;

        $user = User::create($data);

        // if ($request->hasFile('image')) {
        //     $media = new Media;

        //     $slug = str_slug($request->name, "-");

        //     $image = $request->file('image');
        //     $name = "{$slug}.{$request->image->extension()}";
        //     $path = "/uploads/users";
        //     $destinationPath = public_path($path);
        //     $imagePath = $destinationPath . "/" . $name;
        //     $image->move($destinationPath, $name);

        //     $media->path = $path . "/" . $name;
        //     $media->type = "image";

        //     $user->medias()->save($media);
        // }

        $login = Auth::attempt([
            'email' => $request->get('email'),
            'password'=> $request->get('password')
            ]);

        if($login){
            return redirect()->intended('/perfil')->with('success', 'Usuário cadastrado com successo!');
        }

        return redirect()->intended('/')->with('error', 'Problemas em cadastrar usuário!');
        
        

    }


    public function cliente(){
        $lista = Favorito::where('user_id', Auth::user()->id)->get();

        $ids = $lista->map(function($lista){
            return $lista->agenciado_id;
        });
        $favoritos = Profile::whereIn('user_id', $ids)->get();

        return view('site.cliente', compact('favoritos'));
    }

    /*
     * LOGIN DO CLIENTE
     * */
    public function LoginCliente(Request $request){
        $user = Auth::attempt([
            'email' => $request->get('email'),
            'password'=> $request->get('password'),
            'level' => 2
        ]);
        if(!$user){
            return redirect()->intended('/')->with('error', 'E-mail e/ou Senha inválida!');
        }
        return redirect()->intended('/cliente')->with('info', 'Logado com successo!');
    }


    public function RegisterCliente(Request $request){



        $data = $request->all();
        $data['level'] = 2;
        $data['name'] = 'cliente';
        $user = User::create($data);


        // if ($request->hasFile('image')) {
        //     $media = new Media;

        //     $slug = str_slug($request->name, "-");

        //     $image = $request->file('image');
        //     $name = "{$slug}.{$request->image->extension()}";
        //     $path = "/uploads/users";
        //     $destinationPath = public_path($path);
        //     $imagePath = $destinationPath . "/" . $name;
        //     $image->move($destinationPath, $name);

        //     $media->path = $path . "/" . $name;
        //     $media->type = "image";

        //     $user->medias()->save($media);
        // }

        $login = Auth::attempt([
            'email' => $request->get('email'),
            'password'=> $request->get('password')
        ]);

        if($login){
            return redirect()->intended('/cliente')->with('success', 'Usuário cadastrado com successo!');
        }

        return redirect()->intended('/')->with('error', 'Problemas em cadastrar usuário!');



    }


    public function sendContact(Request $request){

        $email = $request->all();
        $vai = Mail::send('emails.site.contato_email', ['dados' => $request->all()], function($message) use ($email){
            $message->from($email['email'], $email['name']);
            $message->subject("Contato via site");
            $message->priority(1);
            $message->to('contato@pharoselenco.com.br');
        });
        return redirect()->back()->with("success", "Mensagem enviado com sucesso!");
    }

    public function sendPasswordForgot(Request $request){
        $email = $request->all();
        
        $send = Mail::send('email.site.forgot_email', [], function($message) use ($email){
            $message->from($email['email'], $email['name']);
            $message->subject('Redefinição de senha - Pharos Elencos');
            $message->priority(1);
            $message->to($emaol['email']);
            $message->cco(['edrobeda@gmail.com', 'edrobeda@icloud.com'] );
            // $message->cco(['contato@pharoselenco.com.br'] )
        });
        dd($send);
        // if(!$send{
            return redirect()->back()->with('error', 'falha no envio de email');
        // })

    }

}
