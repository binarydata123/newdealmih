<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cms;
use Illuminate\Http\Request;
use App\Models\HeaderCategory;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\UserDetail;
use App\User;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

        $subCategoryFirst = "";
        $subCategoryId = "";
        $category = $request->category;
        $subCategory = $request->subCategory;
        
        if(isset($subCategory))
        {
        $subCategoryFirst =  Category::where('category_name', 'LIKE', "%$subCategory%")->first();
        $subCategoryId = $subCategoryFirst->id;
        }
       
        // dd($subCategoryId);
        $store = HeaderCategory::where('slug','market-place')->first();
        $storeproducts = Product::join('categories','categories.id','products.category_id')
        ->where('categories.header_category_id',$store->id)
        ->where('products.type',0)
        ->select('products.*')->get();
        $categories = Category::where([['header_category_id', $store->id], ['categories_id', 0]])->get();
        // $browseSubCategory = Category::where([['header_category_id',$store->id],
        // ['categories_id','!=',0],['slug','!=','others']])->inRandomOrder()->limit(20)->get();
        $stores = User::join('user_details','user_details.user_id','users.id')->
        where('users.is_business',1)
        ->where( function ($q) use ($subCategoryId)
        {
            if($subCategoryId != null)
            {
                $q->where('user_details.category_id',$subCategoryId);
            }
        })->get();

        if($request->ajax())
        {
            $html = view('website.stores.result',[
                'stores'=>$stores
            ])->render();
            return response()->json([
                'status'=>true,
                'message'=>"store filter",
                'html'=>$html
            ]);
        }
        $cms = Cms::where('page','Store')->first();
        return view("website.stores.index",compact('storeproducts','categories','stores','cms'));


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
    public function storeprofile(Request $request,$slug)
    {
       
        
        $store = UserDetail::where('user_id',$slug)->first();
        $user = User::where('id',$slug)->first();
        $marketPlace = HeaderCategory::where('slug','market-place')->first();
        if(empty($user))
            {   
                abort(404);
            }
        $products = Product::join('categories','categories.id','products.category_id')
        ->where([['products.user_id',$slug],['products.type',2],['categories.header_category_id',$marketPlace->id]])
        ->select('products.*')->get();
        $produstReviews = ProductReview::where('user_id',$slug);
        $reviews = $produstReviews->get();
        $userCount = $reviews->count();
        $avgRating = $produstReviews->avg('rating');
        // dd(number_format($avgRating,1));
        return view("website.stores.store-profile",compact('store','products','user','slug','reviews','avgRating','userCount'));
     try {
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
