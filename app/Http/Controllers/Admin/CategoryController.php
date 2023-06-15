<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreate;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $data = Category::with(['parentCategory' => function ($q) {
            $q->select('id', 'category_name as name');
        }])->select('id', 'category_name as category', 'categories_id')
            ->orderBy('categories.id', 'DESC')
            ->get();
        return response()->json([
            'status' => true,
            'message' => "Category List",
            'data' => $data
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
    public function create(CategoryCreate $request)
    {
        try {

dd($request->all());
        $categoryRequest = $request->data;
        $file = $request->file;
      

        $category =json_decode($categoryRequest,true);
        // dd($category);
        $slug = str_slug($category['name'], '-');
        Category::create([
            'category_name' => $category['name'],
            'category_nepal_name' => $category['category_nepal_name'],
            'is_featured' => 0,
            'header_category_id' => isset($category['header_category_id']['id']) ? $category['header_category_id']['id'] : 0,
            'categories_id' => isset($category['parent']['id']) ? $category['parent']['id'] : 0,
            'slug' => $slug,
            'status' => $category['status'],
            'thumbnail'  => isset($file)? ImageUploadWithPath($file, 'category-image')  : null
        ]);

        return response()->json([
            'status' => true,
            'message' => "You have successfully created"
        ], 200);
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

        $data = Category::where('id', $id)
            ->select('id as id', 'category_name as name', 'categories_id as parent', 'status as status',
            'category_nepal_name','header_category_id','thumbnail')->first();
        return response()->json([
            'status' => true,
            'message' => "category edit list",
            'data' => $data
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
    public function update(CategoryCreate $request, $id)
    {
        try {

$categoryRequest = $request->data;
$file = $request->file; 
        $category =json_decode($categoryRequest,true);
        // dd($category);

        $update = Category::where('id', $id)->first();
        $update->category_name = $category['name'];
        $update->status = $category['status'];
        if(isset($category['parent']['id']))
        {
            $update->categories_id = $category['parent']['id'];
        }
        if($request->hasFile('file'))
        {
            $update->thumbnail= ImageUploadWithPath($file, 'category-image') ;
        }
        $update->save();

        return response()->json([
            'status' => true,
            'message' => "You have successfully updated"
        ]);
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

        Category::find($id)->delete();
        return response()->json([
            'status' => true,
            'message' => "you have successfully deleted"
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function categoryList()
    {
        try {

        $category = Category::select('category_name as name', 'id')->where('status', 1)->get();
        return response()->json([
            'status' => true,
            'message' => "category list",
            'data' => $category
        ], 200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function media(Request $request)
    {
        try {

        dd($request->all());
        $media = $request->media;
       
            Media::create([
                'file' => ImageUploadWithPath($media,'image')
            ]);
        
        return response()->json([
            'status'=>true,
            'message'=>"successfull created"
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
}
