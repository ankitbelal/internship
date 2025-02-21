<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //this is the function to show the welcome page 
    public function showWelcome()
    {
        return view('welcome');
    }
public function showPage($name){
    return view('Page',['name'=>$name]);

}

}
