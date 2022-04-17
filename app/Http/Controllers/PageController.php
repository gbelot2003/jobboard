<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    /**
     * Dashboard
     */
    public function dashboard()
    {
        return view('dashboard');
    }


    public function about()
    {
        return view('pages.about');
    }


    public function contact()
    {
        return view('pages.contact');
    }
}
