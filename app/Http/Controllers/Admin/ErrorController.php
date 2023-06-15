<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DbLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
        
    }
    public function errList( )
    {   
        $errors = DbLog::Select('errors.id','error','browser','user_id','username')->join('users','errors.user_id','=','users.id')->orderBy('errors.id','DESC')->get();

          foreach($errors as $entries)
        {

            $entries->error = substr($entries->error, 1, 20);
        }


        return response()->json([
            'status' => true,
            'message' => "error list",
            'data' => $errors
        ]);



        // ＄users = DB::table('errors')
        //     ->join('users', 'users.user_id','errors.id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();


        // $headerCategories = HeaderCategory::where('id', $category->header_category_id)->first();

    
    }

    public function edit($id)
    {
        $list = DbLog::where('id',$id)->select('error')->first();

        return response()->json([
            'status'=>true,
            'messsage'=>"view list",
            'data'=>$list
        ]);
    }
        
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

  
    

    public function destroy($id)
    {
        //
    }
}
