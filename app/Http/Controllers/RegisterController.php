<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sentinel;

use Mail;
use Activation;
use App\User;

class RegisterController extends Controller
{
    public function register() {
        return view('authentication.register');
    }
    

    public function registerPost(Request $request) {
        $user = Sentinel::register($request->all());
        $activation = Activation::create($user);
        
        $role = Sentinel::findRoleBySlug('end user');
        $role->users()->attach($user);
        
        $this->sendMail($user, $activation->code);
        
        return redirect('/');
    }
    
    private function sendMail($user, $code) {
        Mail::send('emails.activation', [
            'user' => $user,
            'code' => $code
                ], function($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->first_name, activate your account..");
        });
    }

    public function createUserBySuperAdmin() {
        $menu = view('backEnd.layouts.super-admin-menu');
        return view('backEnd.superAdmin.create-user')->with('panel-menu', $menu);
    }
    
    public function postCreateUserBySuperAdmin(Request $request) {
        $user = Sentinel::registerAndActivate($request->all());
        $role = Sentinel::findRoleBySlug($request->user_type);
        $role->users()->attach($user);
        return redirect('/super-admin-home');
    }
    
}
