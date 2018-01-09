<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class AllAdminController extends Controller
{
    public function userProfile() {
        $user = Sentinel::getUser();
        $menu = view('backEnd.layouts.super-admin-menu');
        $user_info = array();
        return view('backEnd.user-profile',['user'=>$user,'user_info'=>$user_info])->with('panel-menu', $menu);
        
    }
}
