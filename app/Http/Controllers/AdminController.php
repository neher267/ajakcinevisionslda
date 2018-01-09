<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHOme() {
        return view('backEnd.layouts.admin-menu');
    }
   
     public function earnings(){
        return view('admins.earnings');
    }
}
