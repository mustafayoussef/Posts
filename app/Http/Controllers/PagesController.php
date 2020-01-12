<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    function home(){
        $name= 'Teka';
        return view('pages.home',compact('name'));
    }
    function about(){
        $languages=array('j'=>'JAVA','P'=>'PHP','H'=>'HTML');
        return view('pages.about',compact('languages'));
    }
}
