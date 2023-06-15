<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cms;
use App\Models\WebAds;
use App\Models\HeaderCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $headerCategory = HeaderCategory::where('slug', 'market-place')->first();

        $auctions = Product::join('users','products.user_id','users.id')->where([['is_auction', 1],['products.is_approved',1]])->where('users.is_deleted','!=',1)->get();

        $products = [];
        $marketPlaces = [];
        if (Auth::check()) {
            $products = Product::join('categories', 'categories.id', 'products.category_id')->join('users','products.user_id','users.id')
                ->where([
                    ['products.is_auction', 1], ['products.user_id', Auth::user()->id],
                    ['categories.header_category_id', $headerCategory->id],
                    ['products.is_approved',1]
                ])->where('users.is_deleted','!=',1)
                ->select('products.*')->get();
        }
        if (Auth::check()) {
            $marketPlaces = Product::join('categories', 'categories.id', 'products.category_id')->join('users','products.user_id','users.id')
                ->where([
                    ['products.is_auction', 1], ['products.user_id', Auth::user()->id],
                    ['categories.header_category_id', $headerCategory->id],
                    ['products.is_approved',1]
                ])->where('users.is_deleted','!=',1)
                ->select('products.*')->get();
        }
        $categories = Category::where([['header_category_id', $headerCategory->id], ['categories_id', 0]])->get();
        $cms = Cms::where('page','Auction')->first();
        $webads = WebAds::where('page','Auction')->first();

        return view("website.auction.index", compact('auctions', 'products', 'marketPlaces','categories','cms','webads'));
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
