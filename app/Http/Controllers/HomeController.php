<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($component = "home")
    {
        try {

        return view('home', compact('component'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function show($group, $component, $id = "")
    {
        try {

        return view('home', compact('group', 'component', "id"));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
}
