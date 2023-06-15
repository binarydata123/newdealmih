<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cms;
use App\Models\WebAds;
use App\Models\District;
use App\Models\Feature;
use App\Models\FeatureDataModel;
use App\Models\HeaderCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $store = HeaderCategory::where('slug','car-motor-bike-or-boat')->first();
        $products = Product::join('categories','categories.id','products.category_id')
        ->where([['categories.header_category_id',$store->id],['products.is_approved',1]])
        ->select('products.*')->get();//->toArray();
         $categories = Category::where([['header_category_id', $store->id], ['categories_id', 0]])->get();
        $districts = District::select('district_id', 'district_name')->orderBy('district_name', 'DESC')->get();
        $headerCategories = HeaderCategory::where('slug','car-motor-bike-or-boat')->get();
        $cms = Cms::where('page','Motor')->first();
        $webads = WebAds::where('page','Motor')->first();
       

         return view('website.motor.index',compact('products','categories','districts','headerCategories','cms','webads'));
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
    public function motorlisting()
    {
        return view("website.motor.motorlisting");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function motorarticle()
    {
        return view("website.motor.motorarticle");
    }

    public function featureData(Request $request)
    {

        try {

        $subCategoryId = $request->subCategoryId;
        $category = Category::where('id',$subCategoryId)->first();
        $features = Feature::where([['categories_id',$subCategoryId],['input_type',2],['slug',null],['order_no','!=',2],['order_no','!=',3]])
        ->orderBy('order_no','desc')->get();

        // echo "<pre>";
        // print_r($features);
        // echo "</pre>";
        // exit;

        $featureBrand = Feature::where([['slug','brand'],['categories_id',$subCategoryId]])->first();

        $featureData = view('website.motor.feature-data',[
            'features'=>$features,'subCategoryId'=>$subCategoryId,'featureBrand'=>$featureBrand
       ])->render();

       return response()->json([
        'status'=>true,
        'message'=>"feature Data",
        'featuerData'=>$featureData,
        'categorySlug'=>$category->slug
    ]);

    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

     public function brandModel(Request $request)
    {
        try {

        $subCategoryId = $request->subCategoryId;
    
        $featureBrand = Feature::where([['slug','brand'],['categories_id',$subCategoryId]])->first();
        $features = Feature::where([['categories_id',$subCategoryId],['input_type',2],['slug',null]])
        ->whereIn('order_no',[2,3])->get();


       $subCategory = Category::where('id',$subCategoryId)->first();
        $brandModel = view('website.motor.brand-model',[
            'subCategoryId'=>$subCategoryId,'featureBrand'=>$featureBrand,'features'=>$features,'subCategory'=>$subCategory
       ])->render();

       return response()->json([
        'status'=>true,
        'message'=>"brand model",
        'brandModel'=>$brandModel,
    ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }


 /**
     * pass parameter feature data id and get feature data model list
     *
     * @return \Illuminate\Http\Response
     */
    public function featureDataModel(Request $request)
    {
        try {

        $id = $request->dataId;
        $type = $request->type;
        $models = FeatureDataModel::where('feature_data_id',$id)->get();
        $html = '';
        if($type == 'list-product')
        {
            
            $html = view('website.product.feature-data-model',[
                'models'=>$models
            ])->render();
        }else
        {

        $html = view('website.motor.feature-data-model',[
            'models'=>$models
        ])->render();
     }

        return response()->json([
            'status'=>true,
            'message'=>"feature data",
            'html'=>$html
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
// brand model base of category 
   
  
}

