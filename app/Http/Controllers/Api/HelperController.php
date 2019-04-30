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

    function getCheckAgenciado(Request $request){
        dd($request->all());
        $validatedData = $request->validate([
            'email' => 'required|unique:user',
        ]);

        $user = Profile::where('email', $email)->first();
        if($user){
            return response()->json(['success' => 'usuário já existe']);
        }
        return response()->json(['error' => 'Usuário ainda não existe.']);
        

    }
    
}
