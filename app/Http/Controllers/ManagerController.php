<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function managerHome() {
        return view('layouts.manager-home');
    }
    
    public function tasks(){
        return view('managers.tasks');
    }
}
