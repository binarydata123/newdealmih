<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CmsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $settings_data = Setting::where('id', 1)->where('status', 1)->where('is_deleted', 0)->first();
            return response()->json([
                'status' => true,
                'message' => "Setting Data",
                'data' => $settings_data
            ]);
        } catch (\Exception $e) {
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
        try{

        } catch (\Exception $e) {
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

        /*$settings = Setting::where('id',$id)->first();
        return response()->json([
            'status'=>true,
            'messsage'=>"edit list",
            'data'=>$settings
        ]);*/
        } catch (\Exception $e) {
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
            $favivon_file = $request->favivon_file;
            $logo_file = $request->logo_file;
            $settings = json_decode($request->data,true);
            
            Setting::where('id',$id)->update([
                'admin_email'=>$settings['admin_email'],
                'developer_email'=>$settings['developer_email'],
                'contact_no'=>$settings['contact_no'],
                'address'=>$settings['address'],
                'facebook_link'=>$settings['facebook_link'],
                'twitter_link'=>$settings['twitter_link'],
                'instagram_link'=>$settings['instagram_link'],
                'youtube_link'=>$settings['youtube_link'],
                'tiktok_link'=>$settings['tiktok_link'],
            ]);
            if($request->hasFile('favivon_file'))
            {
                Setting::where('id',$id)->update([
                    'favicon'  => ImageUploadWithPath($favivon_file, 'faviconImg')
                ]);
            }
            if($request->hasFile('logo_file'))
            {
                Setting::where('id',$id)->update([
                    'site_logo'  => ImageUploadWithPath($logo_file, 'websitelogo') 
                ]);
            }
            return response()->json([
                'status'=>true,
                'message'=>"You have successfully updated"
            ],200);
        } catch (\Exception $e) {
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
