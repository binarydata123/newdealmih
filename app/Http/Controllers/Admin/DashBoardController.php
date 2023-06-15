<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\EmailTemplate;
use App\Models\Feature;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cms;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\WebAds;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()

        // return('hi');
    {
        try {

        $category = Category::get()->count();
        $feature = Feature::get()->count();
        $users = User::where('role_id', 2)->count();
        $ads = WebAds::get()->count();
        $totalamount = OrderProduct::sum('purchase_price');
        $totalamount = OrderProduct::sum('purchase_price');
        $totalsales = OrderProduct::count();
        $totalauction = Product::where([['is_auction', 1],['products.is_approved',1]])->count();
      
        $count =
            array(
                ['icon' => "bx bx-user-circle", 'title' => "Users", 'value' => $users],
                ['icon' => "bx bx-task", 'title' => "Ads", 'value' => $ads],
                ['icon' => "bx bx-phone", 'title'=>"Contacts",'value' => 0]
            );
            
        return response()->json([
            'status' => true,
            'message' => "dashboard",
            'count' => $count,
            'categoryCount'=>$category,
            'featureCount'=>$feature,
            'totalamount'=>$totalamount,
            'totalsales'=>$totalsales,
            'totalauction'=>$totalauction,
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Transaction list
     *
     * @return \Illuminate\Http\Response
     */
    public function transaction()
    {
        try {

        $order = Order::select('orders.id as id',
        'orders.user_id as user_id','orders.nabil_bank_orderId as nabil_bank_orderId',
        DB::raw('(CASE 
            WHEN orders.order_status = "1" THEN "Pending" 
            WHEN orders.order_status = "2" THEN "Approve" 
            WHEN orders.order_status = "3" THEN "Decline" 
            WHEN orders.order_status = "4" THEN "Cancel" 
            ELSE "Pending" 
            END) AS orderStatus'),
        DB::raw("DATE_FORMAT(orders.created_at, '%d-%b-%Y') as created_date"))
        ->with('orderProduct',function($q)
        {
            $q->select('id','order_id','product_id','quantity','price','purchase_price')
           ->with('products', function($q)
        {
            $q->select('id','user_id','title');
        });
        })->with('user',function($q)
        {
            $q->select('id','username');
        })
        ->latest()->get();
        return response()->json([
            'status'=>true,
            'message'=>'order list',
            'data'=>$order
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

    public function emailTemplateEdit(Request $request,$id)
    {
        
        try {
        $template = EmailTemplate::findOrFail($id);
        return view('email.edit',compact('template'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function cmsTemplateEdit(Request $request,$id)
    {
        try {

       $template = Cms::where('id',$id)->first();

       $showeditor = array("9", "10", "11", "12","13");
    
        return view('cms.edit',compact('template','showeditor'));
       
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

     public function cmsTemplateUpdate(Request $request,$id)
    {
        try {

        $template = Cms::where('id',$id)->first();

        $mainImage = $request->file('img');
        $title = $request->title;
        $content = $request->content;

        if(empty($content)){

            $content = 'NULL';

        }else {
            $content = $request->content;

        }

        if ($request->hasFile('img')) {
            $image  = ImageUploadWithPath($mainImage, 'cms-image');
        }else {
            $image = $template->image;
        }



        Cms::where('id',$id)->update([
            'title'=>$title,
            'content'=>$content,
            'image'=>$image,
        ]);

        return redirect('dashboard/cms');
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function emailTemplateUpdate(Request $request,$id)
    {
     try {

        EmailTemplate::where('id',$id)->update([
            'subject'=>$request->subject,
            'email_body'=>$request->email_body
        ]);
        return redirect('dashboard/email-template');
    }

    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

}
