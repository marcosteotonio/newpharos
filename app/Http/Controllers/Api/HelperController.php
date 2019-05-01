<?php

namespace App\Http\Controllers\Api;

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
    
}
