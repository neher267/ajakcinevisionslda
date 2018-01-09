<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsReporterController extends Controller {

    public function reporterHome() {
        return view('backEnd.layouts.news-reporter-menu');
    }


}
