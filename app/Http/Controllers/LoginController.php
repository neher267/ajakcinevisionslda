<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller {

    public function login() {
        return view('authentication.login');
    }

    public function loginPost(Request $request) {
        try {
            if (Sentinel::authenticate($request->all())) {
                $slug = Sentinel::getUser()->roles()->first()->slug;

                if ($slug == 'admin') 
                {
                    return redirect('/admin-home');
                }
                elseif ($slug == 'manager') 
                {
                    return redirect('/manager-home');
                }
                elseif ($slug == 'super admin') 
                {
                    return redirect('/super-admin-home');
                }
                elseif ($slug == 'news reporter') 
                {
                    return redirect('/reporter-home');
                }
                elseif ($slug == 'end user')
                {
                   return redirect()->back(); 
                }
                else 
                {
                    return redirect()->back()->with(['error' => 'Wrong credential']);
                }
                
            }
        } catch (ThrottlingException $exc) {
            $delay = $exc->getDelay();
            return redirect()->back()->with(['error' => "You are banned for $delay seconds."]);
        } catch (NotActivatedException $exc){
           return redirect()->back()->with(['error' => 'Your account is not activated!']);
        }
    }

    public function logout() {
        Sentinel::logout();
        return redirect('/');
    }

}
