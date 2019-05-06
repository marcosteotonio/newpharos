<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
class SocialAuthController extends Controller
{
//    acessando facebook
    public function login(){
        return Socialite::driver('facebook')->redirect();
    }

    public function retorno(){
        $userSocial = Socialite::driver('facebook')->user();
        $email = $userSocial->getEmail();

        if(Auth::check()){
            $user = Auth::user();
            $user->facebook = $mail;
            $user->save();
            return redirect()->intended('/perfil');
        }

       $user = User::where('facebook',$email)->first();

        if(isset($user->name)){
            Auth::login($user);
            return redirect()->intended('/perfil');
        }
        if(User::where('email',$email)->count()){
            $user = User::where('email', $mail)->first();
            $user->facebook = $email;
            $user->save();
            Auth::login($user);
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
        return redirect()->intended('/perfil');
    }



    public function login2(){
        return Socialite::driver('facebook')->redirect("https://pharos.prmuller.com/retorno/facebook2");
    }


    public function retorno2(){
        $userSocial = Socialite::driver('facebook2')->user();
        $email = $userSocial->getEmail();

        if(Auth::check()){
            $user = Auth::user();
            $user->facebook = $mail;
            $user->save();
            return redirect()->intended('/cliente');
        }

        $user = User::where('facebook',$email)->first();

        if(isset($user->name)){
            Auth::login($user);
            return redirect()->intended('/cliente');
        }
        if(User::where('email',$email)->count()){
            $user = User::where('email', $mail)->first();
            $user->facebook = $email;
            $user->save();
            Auth::login($user);
            return redirect()->intended('/cliente');
        }

        $user = new User();
        $user->name = $userSocial->getName();
        $user->email = $userSocial->getEmail();
        $user->level = "2";
        $user->facebook = $userSocial->getEmail();
        $user->password = bcrypt($userSocial->token);
        $user->save();
        Auth::login($user);
        return redirect()->intended('/cliente');
    }



}
