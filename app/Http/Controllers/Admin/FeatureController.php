<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureDataRequest;
use App\Http\Requests\Website\FeatureDataModelRequest;
use App\Models\Feature;
use App\Models\FeatureData;
use App\Models\FeatureDataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpseclib3\Crypt\Common\Formats\Signature\Raw;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $list = Feature::with(['parantFeature'=>function($q)
        {
            $q->select('name','id');
        }])
        ->with(['category'=> function($q)
        {
            $q->select('category_name as name','id');
        }])
        ->select('id','name','features_id','categories_id')->get();
        return response()->json([
            'status'=>true,
            'message'=>"feature List",
            'data'=>$list
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

            $sessionData = Session::get('feature_data');
            // dd($sessionData);
            $feature = $request->feature;
            // dd($feature['input_type']);
            $featureCreate = Feature::create([
                'name'=>$feature['name'],
                'order_no'=>isset($feature['order_no']) ? $feature['order_no'] : 0,
                'categories_id'=>isset($feature['category']) ? $feature['category']['id']:0,
                'features_id'=>isset($feature['parent_feature']) ? $feature['parent_feature']['id']:0,
                'feature_data_id'=>isset($feature['parent_feature_data']) ? $feature['parent_feature_data']['id'] : 0 ,
                'status'=>$feature['status'],
                'input_type'=>$feature['input_type']
            ]);
            if(Session::has('feature_data'))
                {
                    if($sessionData)
                        {
                            foreach($sessionData as $featureData)
                                {
                                    
                                    FeatureData::create([
                                        'feature_id'=>$featureCreate->id,
                                        'data_name'=>$featureData['feature_data']
                                    ]);
                                }
                        }
                }
                Session::forget('feature_data');
            return response()->json([
                'status'=>true,
                'message'=>'you have successfull created'
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
     * @param  \App\Models\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature,$id)
    {
    try {

       $data = Feature::find($id);
       return response()->json([
           'status'=>true,
           'message'=>"edit list",
           'data'=>$data
       ],200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

         $sessionData = Session::get('feature_data');

        $feature = $request->feature;
       Feature::where('id',$id)->update([
        'name'=>$feature['name'],
        // 'order_no'=>isset($feature['order_no']) ? $feature['order_no'] : 0,
        'categories_id'=>isset($feature['category']) ? $feature['category']['id']:0,
        'features_id'=>isset($feature['parent_feature']['id']) ? $feature['parent_feature']['id']:0,
        'feature_data_id'=>isset($feature['parent_feature_data']) ? $feature['parent_feature_data']['id'] : 0 ,
        'status'=>$feature['status'],
       ]);

       if(Session::has('feature_data'))
       {
           if($sessionData)
               {
                   foreach($sessionData as $featureData)
                       {
                           
                           FeatureData::create([
                               'feature_id'=>$id,
                               'data_name'=>$featureData['feature_data']
                           ]);
                       }
               }
       }

       return response()->json([
           'status'=>true,
           'message'=>"You have successfully updated"
       ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature,$id)
    {
      try {

       Feature::find($id)->delete();
       return response()->json([
           'status'=>true,
           'message'=>"You have successully deleted"
       ],200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function featureSessionData(FeatureDataRequest $request)
    {
        try {

        $featureData = array();
        
        if (Session::has('feature_data')) {
            $featureData = Session::get('feature_data');
            $data = collect($featureData);
            $featureData_size = (int)$data->max('s_id');
            /*If the product is already present in session then do nothing*/
            $collection = collect($featureData);
         
                $featureData_size = (int)$data->max('s_id')+1;
                $featureDataNew = array(
                    's_id' => $featureData_size,
                    'feature_data' => $request->input('feature_data_name'),
                   
                );
                array_push($featureData,$featureDataNew);

                Session::put('feature_data', $featureData);

            

        } else {
            $featureData = array();
            Session::push('feature_data', $featureData);
            $featureData_size = 1;

            $featureDataNew = array(
                's_id' => 1,
                'feature_data' => $request->input('feature_data_name'),
            
            );
            array_push($featureData,$featureDataNew);
            Session::put('feature_data', $featureData);
        }
        return response()->json([
            'status'=>true,
            'message'=>"session feature data",
            'data'=>$featureData
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function parentFeature($id)
        {
            try {

            $parent = Feature::where([['status',1],['categories_id',$id]])->select('id','name')->get();
            return response()->json([
                'status'=>true,
                'message'=>"parent feature",
                'data'=>$parent
            ],200);
        }
        catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

        public function parentFeatureData($id)
        {
            try {

            $parent = FeatureData::where('feature_id',$id)
            ->select('id','data_name as name')->get();
            return response()->json([
                'status'=>true,
                'message'=>"parent feature data",
                'data'=>$parent
            ],200);
        }
        catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
        public function featureData(Request $request,$id)
        {
            try {

            $data = FeatureData::where('feature_id',$id)
            ->select('id as s_id','data_name as feature_data')->get();
            return response()->json([
                'status'=>true,
                'message'=>"feature data",
                'data'=>$data
            ],200);
        }
        catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
        // pass param featuredata id 
        
        public function featureDataModel(FeatureDataModelRequest $request,$id)
        {
            try {

            FeatureDataModel::create([
                'feature_data_id'=>$id,
                'model_name'=>$request->feature_data_model_name
            ]);
            return response()->json([
                'status'=>true,
                'message'=>"you have successfully created"
            ]);
        }
        catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
        // get feature data model list 
        public function featureDataModelList(Request $request,$id)
        {
            try {

            $data = FeatureDataModel::where('feature_data_id',$id)->get();
            return response()->json([
                'status'=>true,
                'message'=>"feature list data",
                'data'=>$data
            ]);
        }
        catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    
}
