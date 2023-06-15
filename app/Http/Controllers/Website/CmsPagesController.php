<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\Setting;
class CmsPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        try {

        $cms = Cms::where('page','About us')->first();

        return view('website.pages.about',compact('cms'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }




       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        $cms = Cms::where('page','Terms And Conditions')->first();

        return view("website.pages.terms",compact('cms'));
    }


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        $cms = Cms::where('page','Privacy Policy')->first();

        return view("website.pages.privacy",compact('cms'));
    }


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advertising()
    {
        try {

        $cms = Cms::where('page','Advertising')->first();

        return view("website.pages.advertising",compact('cms'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }


    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function help()
    {
        return view("website.pages.help");
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        try {

         $setting = Setting::Select('developer_email','contact_no','address')->where('id', 1)->where('status', 1)->where('is_deleted', 0)->first();

        $cms = Cms::where('page','Contact')->first();

        return view("website.pages.contact",compact('cms','setting'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function feedback()
    {
        return view("website.pages.feedback");
    }


    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nodata()
    {
        return view("website.pages.nodata");
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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

    public function data(Request $request)
    {
        try {

        $args = http_build_query(array(
            'auth_token'=> 'df887210072e6e717525828c874de35cd3870473fb3c6ca18d2cd007f53f5616',
            'from'  => '9864229434',
            'to'    => '9864229434',
            'text'  => '12522'));
            $url = "https://sms.aakashsms.com/sms/v3/send";

            # Make the call using API.
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1); ///
            curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            // Response
            $response = curl_exec($ch);
            curl_close($ch);       

            print_r($response);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

}
