<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cms;
use App\Models\WebAds;
use App\Models\District;
use App\Models\Feature;
use App\Models\HeaderCategory;
use App\Models\Product;
use App\Models\ProductData;
use App\Models\ProductPropertyFeature;
use App\Models\ProductReview;
use App\Models\FeatureData;
use Illuminate\Http\Request;
use App\Helpers\UserSystemInfoHelper;
use App\Models\ProductView;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        // return "hi";

        $property = HeaderCategory::where('slug','property')->first();
        $products = Product::join('categories','categories.id','products.category_id')->join('users','products.user_id','users.id')
        ->where([['categories.header_category_id',$property->id],['products.is_approved',1]])->where('users.is_deleted','!=',1)
        ->select('products.*')->get();
        $categories = Category::where([['header_category_id', $property->id], ['categories_id', 0]])->get();
        $districts = District::select('district_id', 'district_name')->orderBy('district_name', 'ASC')->get();
        $headerCategories = HeaderCategory::where('slug','property')->get();
        $cms = Cms::where('page','Property')->first();
        $webads = WebAds::where('page','Property')->first();
 
        return view("website.property.index",compact('products','property','categories','districts','headerCategories','cms','webads'));
         }

    catch (\Exception $e)
     {

            throw new \App\Exceptions\LogData($e);    
     }
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mapview()
    {
        return view("website.property.mapview");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mapviewlisting()
    {
        return view("website.property.mapviewlisting");
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function propertydetail(Request $request,$slug)
    {
        try {

        $property = Product::where('slug',$slug)->first();
        
        $features= ProductPropertyFeature::where('product_id',$property->id)->first();

        // echo "<pre>";
        // print_r($features);
        // echo "</pre>";
        // exit;

        $property = Product::where('slug',$slug)->first();



        $getip = UserSystemInfoHelper::get_ip();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getdevice = UserSystemInfoHelper::get_device();
        $getos = UserSystemInfoHelper::get_os();


        $productviewcheck = ProductView::where('product_id',$property->id)->where('ip',$getip)->first();

        if($productviewcheck){

            $days = now()->diffInDays($productviewcheck->created_at);

            if($days > 1){

                $productview = new ProductView;
                $productview->product_id = $property->id;
                $productview->user_id = $property->user_id;

                if (!Auth::guest()){
                    $productview->vister_id = Auth::user()->id;;
                }

                $productview->ip = $getip;
                $productview->browsers =  $getbrowser;
                $productview->device =   $getdevice;
                $productview->operating_system	 = $getos;
                $productview->save();

            }
        }else {

            $productview = new ProductView;
                $productview->product_id = $property->id;
                $productview->user_id = $property->user_id;

                if (!Auth::guest()){
                    $productview->vister_id = Auth::user()->id;;
                }

            $productview->ip = $getip;
            $productview->browsers =  $getbrowser;
            $productview->device =   $getdevice;
            $productview->operating_system	 = $getos;
            $productview->save();

        }

        $ProductData = ProductData::where('product_id', $property->id)->where('input_type', '2')->whereNull('feature_data_text')->first();

      

        $produstReviews = ProductReview::where('user_id',$features->user_id);
        $reviews = $produstReviews->get();
        $userCount = $reviews->count();
        $avgRating = $produstReviews->avg('rating');


        
        if(empty($property))
        {
            abort(404);
        }

            $user = $property->user_id;
            $notification =' Your products are getting noticed .Someone has just visited ' .$property->title . 'to your Dealmih.';
            
            $model_id =$property->id;
            $model = "visit-product";
           
            singleuserNotification($user, $notification, $model_id, $model);
        
       

        return view("website.property.propertydetail",compact('property','features','slug','avgRating','reviews','ProductData'));
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
    public function listing()
    {
        return view("website.property.listing");
    }

    /**
     * subCategory html view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subCategory(Request $request)
    {
       

        $id = $request->mainCategory;
        $category = Category::find($id);
        

        $subCategories = Category::where('categories_id',$id)->get();


        // echo "<pre>";
        // print_r($subCategories[0]->id);
        // echo "</pre>";

        // exit;

        if($id == 326){

            $html = view('website.property.subCategory',[
               'subCategories'=>$subCategories,
               'subCategoriesid' => $id,
           ])->render();

        }else if($id == 60) {

            $minsubCategories = Category::where('categories_id','61')->get();

            $html = view('website.property.minSubCategory',[
               'subCategories'=>$subCategories,
               'minsubCategories'=>$minsubCategories,
           ])->render();

             return response()->json([
               'status'=>true,
               'message'=>"min sub category",
               'html'=>$html,
               'subCategoryFirstId'=>isset($minsubCategories[0]['id']) ? $minsubCategories[0]['id'] : "",
               'subCategorySlug'=>$category->slug,

              
           ]);

        } else {

            $html = view('website.property.subCategory',[
               'subCategories'=>$subCategories,
           ])->render();

        }
           
          
       return response()->json([
           'status'=>true,
           'message'=>"sub category",
           'html'=>$html,
           'subCategoryFirstId'=>isset($subCategories[0]['id']) ? $subCategories[0]['id'] : "",
           'subCategorySlug'=>$category->slug,

          
       ]);
     try {
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
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
}
