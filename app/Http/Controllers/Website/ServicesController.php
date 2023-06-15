<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ProductReviewRequest;
use App\Models\Category;
use App\Models\Cms;
use App\Models\WebAds;
use Illuminate\Http\Request;
use App\Models\HeaderCategory;
use App\Models\Product;
use App\Models\ServiceFeedback;
use Illuminate\Support\Facades\Auth;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $service = HeaderCategory::where('slug','services')->first();
 
        $serviceitems = Product::join('categories','categories.id','products.category_id')
        ->where([['categories.header_category_id',$service->id],['products.is_approved',1]])
        ->select('products.*')->get();
        $categories = Category::where([['header_category_id', $service->id], ['categories_id', 0]])->get();
        $cms = Cms::where('page','Services')->first();
        $webads = WebAds::where('page','Services')->first();
        return view("website.services.index",compact('serviceitems','categories','cms','webads'));
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
    public function detail(Request $request,$slug)
    {
        try {

            // dd('ff');
            
        $service = Product::where('slug',$slug)->first();
        $produstReviews = ServiceFeedback::where('product_id',$service->id);
        $reviews = $produstReviews->get();
        $userCount = $reviews->count();
        $avgRating = $produstReviews->avg('rating');
        if(empty($service))
        {
            abort(404);
        }
        
        return view("website.services.detail",compact('service', 'slug','avgRating','userCount','reviews'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function serviceFeedback(ProductReviewRequest $request)
    {
        try {

        ServiceFeedback::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>"you have successfully submitted"
        ]);
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
