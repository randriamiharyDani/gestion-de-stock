<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index(){
        //return view('page.accueil');
        return view('page.accueil');
    }

    public function article()
    {
        //return view('page.accueil');
        return view('page.article');
    }

}
