<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeaderCategory as AdminHeaderCategory;
use App\Models\Category;
use App\Models\HeaderCategory;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $data = HeaderCategory::select('id','name','ne_name')->get();
        return response()->json([
            'status'=>true,
            'message'=>"header category list",
            'data'=>$data
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AdminHeaderCategory $request)
    {
        try {

        $headerCategory = $request->category;
       
        $slug = str_slug($headerCategory['name'], '-');
       HeaderCategory::create([
           'name'=>$headerCategory['name'],
           'slug'=>$slug,
           'ne_name'=>$headerCategory['ne_name']
       ]);
       return response()->json([
           'status'=>true,
           'message'=>"You have successfully created"
       ],200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

        $data = HeaderCategory::where('id',$id)->select('id','name','ne_name')->first();
        return response()->json([
            'status'=>true,
            'message'=>"category edit list",
            'data'=>$data
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminHeaderCategory $request, $id)
    {
        try {

        $headerCategory = $request->category;
        HeaderCategory::where('id',$id)->update([
            'name'=>$headerCategory['name'],
            'ne_name'=>$headerCategory['ne_name']
        ]);
        return response()->json([
            'status'=>true,
            'message'=>"You have successfully updated"
        ],200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

        HeaderCategory::find($id)->delete();
        return response()->json([
            'status'=>true,
            'message'=>"You have successfully deleted"
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    /**
     * pass header category id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mainCategory($id)
    {
        try {

       $category =  Category::where('header_category_id',$id)
       ->select('category_name as name','id as id','category_nepal_name')->get();
       return response()->json([
           'status'=>true,
           'message'=>"main category",
           'data'=>$category
       ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function headerCategoryList()
    {
        try {

        $category = HeaderCategory::select('name', 'id')->get()->toArray();
        $response = array();
        foreach ($category as $categories)
        {
            $id = $categories['id'];
            $name = $categories['name'];

            $category_data[] = array("id"=>$id,"name"=>$name);
        }
        return response()->json([
            'status' => true,
            'message' => "header category list",
            'data' => $category_data
        ], 200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
}
