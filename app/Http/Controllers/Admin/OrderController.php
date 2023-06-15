<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistrationMail;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
        $orders = Order::select('orders.*', 'users.username', 'order_products.purchase_price',
        DB::raw('DATE_FORMAT(orders.created_at,"%Y-%m-%d %h:%m:%s") as create_dt'),
        DB::raw('(CASE 
        WHEN orders.order_status = "1" THEN "Pending" 
        WHEN orders.order_status = "2" THEN "Approved"
        WHEN orders.order_status = "3" THEN "Decline"
        WHEN orders.order_status = "4" THEN "Cancel"
        END) AS status'),
        )
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->join('order_products', 'order_products.order_id', '=', 'orders.id')
        ->orderBy('id','DESC')
        ->distinct('order_products.purchase_price')
        ->get();
        return response()->json([
            'status' => true,
            'message' => "Orders List",
            'data' => $orders
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function SingleUserOrders(Request $request, $id)
    {
        try {

        $orders = Order::select('orders.*', 'users.username', 'order_products.purchase_price',
        DB::raw('DATE_FORMAT(orders.created_at,"%Y-%m-%d %h:%m:%s") as create_dt'),
        DB::raw('(CASE 
        WHEN orders.order_status = "1" THEN "Pending" 
        WHEN orders.order_status = "2" THEN "Approved"
        WHEN orders.order_status = "3" THEN "Decline"
        WHEN orders.order_status = "4" THEN "Cancel"
        END) AS status'),
        )
        ->where('user_id', $id)
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->join('order_products', 'order_products.order_id', '=', 'orders.id')
        ->orderBy('id','DESC')
        ->distinct('order_products.purchase_price')
        ->get();
        return response()->json([
            'status' => true,
            'message' => "Orders List",
            'data' => $orders
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * change product status .pass parm product id
     *
     * @return \Illuminate\Http\Response
     */
    public function statusChange( Request $request, $id)
    {
        try {

        // dd($request->all());
        $status = $request->status;
        Product::where('id',$id)->update([
            'status'=>$status
        ]);
        return response()->json([
            'status'=>true,
            'message'=>"You have successfully status changed"
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
     * approved or rejected product
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actionStatus($id)
    {
        try {

        $status = "";
        $product = Product::where('id',$id)->first();
        $user = User::where('id',$product->user_id)->first();
        if($product->is_approved == 1)
        {
            $product->is_approved = 0;
            $status = "Rejected";
        }else
        {
            $product->is_approved = 1;
            $status = "Approved";
        }
        $product->save();
        $data = ['username'=>$user->username,'product'=>$product->title,'status'=>$status];
        Mail::to($user->email)->queue(new UserRegistrationMail('listing-product-status', $data));

        return response()->json([
            'status'=>true,
            'message'=>"You have successfully " . $status ,
            'statusMessage'=>$status
        ],200);
    
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
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
    public function CustomerDetail(Request $request, $id)
    {
        try {

        $order_data = Order::where('id', $id)
        ->select('orders.*', 
            DB::raw('DATE_FORMAT(orders.created_at,"%Y-%m-%d %h:%m:%s") as create_dt')
        )->first();
        $customerDetails = User::where('id', $order_data->user_id)
        ->with('businessDetails', function ($q) 
        {
            $q->with('muncipality')->with('district')->with('village');
        })
        ->with('documents')
        ->select('id','username','email','phone_number','address','is_business','active')->first();
        return response()->json([
            'status'=>true,
            'message'=>"customer details",
            'data'=>$customerDetails,
            'order_data'=>$order_data
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function OrderProductDetail(Request $request, $id)
    {
        try {

        $order_product_data = OrderProduct::select('products.*', 'order_products.price as cart_product_price', 'order_products.purchase_price', 'order_products.quantity as cart_quantity', 'users.username', 'users.email', 'users.phone_number')
        ->join('products', 'products.id', '=', 'order_products.product_id')
        ->join('users', 'users.id', '=', 'products.user_id')
        ->where('order_id', $id)
        ->get();
        return response()->json([
            'status'=>true,
            'message'=>"Order Products details",
            'data'=> $order_product_data
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
}
