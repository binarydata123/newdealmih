<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CmsRequest;
use App\Models\Cms;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $cms = Cms::get();
            return response()->json([
                'status'=>true,
                'message'=>"cms list",
                'data'=>$cms
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
    public function create(Request $request)
    {
        try {

        $file = $request->file;
    //    dd($request->all());
       $cms = json_decode($request->data,true);
       if($cms['name'] =='')
        {
            return response()->json([
                'status'=>true,
                'message'=>'fill the required field'
            ],422);
        }

    

        Cms::create([
           'title'=>$cms['name'],
           'page'=>$cms['page'],
           'content'=>isset($cms['content'])? $cms['content']  : null,
           'image'  => isset($file)? ImageUploadWithPath($file, 'cms-image')  : null
       ]);
        

       
       return response()->json([
           'status'=>true,
           'message'=>'You have successfully created'
       ],200);
    //    dd($cms);
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
    public function edit(Request $request, $id)
    {
        try {

        $cms = Cms::where('id',$id)
        ->select('title as name','ne_title as ne_name','image','id','page')->first();
        return response()->json([
            'status'=>true,
            'messsage'=>"edit list",
            'data'=>$cms
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
    public function update(Request $request, $id)
    {
        try {

        $file = $request->file;
        $cms = json_decode($request->data,true);
        
        Cms::where('id',$id)->update([
            'title'=>$cms['name'],
           'ne_title'=>$cms['ne_name'],
           'page'=>$cms['page'],
         
        ]);
        if($request->hasFile('file'))
        {
            Cms::where('id',$id)->update([
                'image'  => ImageUploadWithPath($file, 'cms-image') 
            ]);
        }
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
        //
    }
}
