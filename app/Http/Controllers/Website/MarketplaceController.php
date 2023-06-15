<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cms;
use App\Models\WebAds;
use App\Models\HeaderCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        try {
        $marketPlace = HeaderCategory::where('slug','market-place')->first();
        $products = Product::join('categories','categories.id','products.category_id')->join('users','products.user_id','users.id')
        ->where([['categories.header_category_id',$marketPlace->id],['products.is_sold',0],['products.is_approved',1]])->where('users.is_deleted','!=',1)
        ->select('products.*')->get();
        $mainCategories = Category::where([['header_category_id', $marketPlace->id], ['categories_id', 0]]);
        $categories = $mainCategories->inRandomOrder()->get();
        $popularCategories = $mainCategories->inRandomOrder()->limit(4)->get();
        $cms = Cms::where('page','Marketplace')->first();
        $webads = WebAds::where('page','Marketplace')->first();

        return view("website.marketplace.index",compact('products','categories','popularCategories','cms','webads'));
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
    public function create()
    {
        //
    }

   
}
