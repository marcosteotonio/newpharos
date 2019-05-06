<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
class SocialAuthController extends Controller
{
//    acessando facebook
    public function login(Request $r){



        if($r->tipo){
            return Socialite::driver('facebook')
                ->scopes(["tipo" => "cliente"])
                ->redirect();
        } else {
            return Socialite::driver('facebook')->redirect();
        }

    }

    public function retorno(Request $r){
        $userSocial = Socialite::driver('facebook')->user();
        $email = $userSocial->getEmail();

        if(Auth::check()){
            $user = Auth::user();
            $user->facebook = $mail;
            $user->save();
            if($r->tipo){
                return redirect()->intended('/cliente');
            } else {
                return redirect()->intended('/perfil');
            }

        }

       $user = User::where('facebook',$email)->first();

        if(isset($user->name)){
            Auth::login($user);
            if($r->tipo){
                return redirect()->intended('/cliente');
            }
            return redirect()->intended('/perfil');
        }
        if(User::where('email',$email)->count()){
            $user = User::where('email', $mail)->first();
            $user->facebook = $email;
            $user->save();
            Auth::login($user);
            if($r->tipo){
                return redirect()->intended('/cliente');
            }
            return redirect()->intended('/perfil');
        }

        $user = new User();
        $user->name = $userSocial->getName();
        $user->email = $userSocial->getEmail();
        $user->level = "3";
        $user->facebook = $userSocial->getEmail();
        $user->password = bcrypt($userSocial->token);
        $user->save();
        Auth::login($user);

        if($r->tipo){
            return redirect()->intended('/cliente');
        }
        return redirect()->intended('/perfil');
    }










}
