<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CmsRequest;
use App\Models\WebAds;
use Illuminate\Http\Request;

class WebAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $webads = WebAds::get();
            return response()->json([
                'status'=>true,
                'message'=>"web-ads list",
                'data'=>$webads
            ],200);
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

       $webads = json_decode($request->data,true);
        
        $check = WebAds::where('page', '=', $webads['page'])->count();

      if($webads['name'] =='')
        {
            return response()->json([
                'status'=>true,
                'message'=>'fill the required field'
            ],422);
        }

        if($check > 0){

              return response()->json([
           'status'=>false,
           'message'=>'This page is already created'
       ],200);


        }else {

            WebAds::create([
           'title'=>$webads['name'],
           'page'=>$webads['page'],
           'ne_title'=>$webads['ne_name'],
           'image'  => isset($file)? ImageUploadWithPath($file, 'webads-image')  : null
       ]);
        

        return response()->json([
           'status'=>true,
           'message'=>'You have successfully created'
       ],200);

        }
 
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

        $webads = WebAds::where('id',$id)
        ->select('title as name','ne_title as ne_name','image','id','page')->first();
        return response()->json([
            'status'=>true,
            'messsage'=>"edit list",
            'data'=>$webads
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
        $webads = json_decode($request->data,true);
        
        WebAds::where('id',$id)->update([
            'title'=>$webads['name'],
           'ne_title'=>$webads['ne_name'],
           'page'=>$webads['page'],
         
        ]);
        if($request->hasFile('file'))
        {
            WebAds::where('id',$id)->update([
                'image'  => ImageUploadWithPath($file, 'webads-image') 
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
