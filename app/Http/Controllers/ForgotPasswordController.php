<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Sentinel;

class ForgotPasswordController extends Controller
{
    public function forgotPassword() {
        return view('authentication.forgot-password');
    }
    
    public function pastForgotPassword(Request $request) {
        
        $user = User::whereEmail($request->email)->first();
        $sentinelUser = Sentinel::findById($user->id);
        
        if (count($user) == 0) {
            return redirect()->back()->with([
                'success' => 'Reset Code was sent your email.'
            ]);
        }
        
        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);
        return redirect()->back()->with([
                'success' => 'Reset Code was sent your email.'
            ]);
    }
    
    public function resetPassword($email, $code) {
        $user = User::byEmail($email);
        $sentinelUser = Sentinel::findById($user->id);
        if(count($user)==0)
            abort (404);
        if($reminder = Reminder::exists($sentinelUser)){
            return 1;
        }else{
            return 0;
        }
        //return $user;
    }
}
