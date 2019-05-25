<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function login(Request $request)
    {
        if($request->isMethod('post')){
    		$data = $request->input();
             if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) 
            {
                Session::put('adminSession', $data['email']);
                return redirect('/home');
            }else{
                echo "PENGGUNA TIDAK BERDAFTAR ATAU KATALALUAN SALAH !";
                die;
            }
        }
        return view('user.user_login');
    }

  
}
