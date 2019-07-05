<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class PageController extends Controller
{
    public function index()
    {
       
        return view('pages.index');
    }

    public function about()
    {
        $title = 'ABOUT';
        return view('pages.about')->with('title',$title);
    }
    
    public function organizations()
    {
        return view('pages.services');
    }
}
