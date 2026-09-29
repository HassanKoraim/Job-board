<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', ['pageTitle' => 'Home Page']);
    }

     public function about()
    {
        return view('about', ['pageTitle' => 'About Page']);
    }

     public function contact()
    {
        return view('contact', ['pageTitle' => 'Contact Page']);
    }
}
