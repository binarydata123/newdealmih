<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuCategories;

class MenusController extends Controller
{
    //
    public function index()
    {
        try {

        $data = MenuCategories::with('menu.submenu.submenu')->get();
        return response()->json($data);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
}
