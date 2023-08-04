<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class PageTemplatesController extends Controller
{
    public function index(){
        $templates = Template::all();
        return view('admin.dashboard' , compact('templates'));
    }
    
    /*public function indexe(){
        $templates = Template::all();
        return view('dashboard.dashboard' , compact('templates'));
    }*/
    
    public function dashboard(){
        return view('admin.dashboard');
    }
}
