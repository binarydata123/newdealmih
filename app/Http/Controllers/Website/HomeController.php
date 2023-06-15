<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\AddressRequest;
use App\Http\Requests\Website\RestPasswordRequest;
use App\Mail\UserRegistrationMail;
use App\Models\Address;
use App\Models\Category;
use App\Models\District;
use App\Models\InterestedCategory;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Chat;
use App\Models\Cms;
use App\Models\HeaderCategory;
use App\Models\Municipality;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderReturn;
use App\Models\Village;
use App\Models\UserJobProfile;
use App\Models\UserNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;
use Redirect;
use App\Models\WebAds;
use Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try {

        $products = Product::where([['is_auction',null],['is_approved',1],['is_sold',0]])->get();
        $auctionProducts = Product::where([['is_auction',1],['is_approved',1],['is_sold',0]])->get();

        $recommendedProducts = [];
        if(Auth::check())
        {
        $recommendedProducts = Product::join('interested_categories','interested_categories.category_id','products.category_id')
        ->where([['interested_categories.user_id',Auth::user()->id],['products.is_approved',1],['products.is_sold',0]])
        ->select('products.*')->get();
        }
        $headerCategories = HeaderCategory::get();
        $premiumProducts = Product::where([['status',3],['is_approved',1],['is_sold',0]])->get();
        $cms = Cms::where('page','Home')->first();
        $webads = WebAds::where('page','Home')->first();
        return view('website.home', compact('products','recommendedProducts',
        'auctionProducts','headerCategories','cms',
        'premiumProducts','webads'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    /**
     * Show profile form.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {   


        // $countnotifications =  UserNotification::where([['notifiable_user_id',Auth::user()->id],['model',"product-create"]])->get();

     

        // $notifications = $countnotifications->count();

         return view('website.dashboard.profile');
    }

    /**
     * Show manageAds 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manageAds(Request $request,$header_cat_id = null)
    {   
        // return "hi";
        
        $managecount = Product::where('user_id', Auth::user()->id)->count();

        if($managecount > 0){

             if(empty($header_cat_id)){

            $category_data =  Product::Select('category_id')->where('user_id', Auth::user()->id)->get();
            foreach ($category_data as $categorydata) {
                $cat_ids[] = $categorydata->category_id;
               
            }
        }else {

            $category_data =  Category::where('header_category_id', $header_cat_id)->get();
            foreach ($category_data as $categorydata) {
                $cat_ids[] = $categorydata->id;
            }

        }
        
        $products = Product::where([['user_id', Auth::user()->id],['is_sold','!=',1]])
        ->whereIn('category_id', $cat_ids)
        ->whereRaw('created_at + interval 30 day > ?', [now()])->latest()->get();
        
        $soldProducts = Product::where([['user_id', Auth::user()->id],['is_sold',1]])
        ->whereIn('category_id', $cat_ids)
        ->whereRaw('created_at + interval 30 day > ?', [now()])->latest()->get();
        
        $expiredProducts = Product::where('user_id', Auth::user()->id)
        ->whereIn('category_id', $cat_ids)
        ->whereRaw('created_at + interval 30 day < ?', [now()])->latest()->get();
        
        $today = Carbon::now()->format('Y-m-d');
      
        return view('website.dashboard.manage-ads', compact('managecount','products','soldProducts','expiredProducts','today','header_cat_id'));


        }else {

            return view('website.dashboard.manage-ads', compact('managecount'));
        }


       
    try {

    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
    }
}


    /**
     * Show store products 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeproduct(Request $request)
    {
        try {
        $products = Product::where([['user_id', Auth::user()->id],['is_approved','!=',0]])
        ->orderBy('id','DESC')->get();
        return view('website.dashboard.store-product', compact('products'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    /**
     * Display the edit profile.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function profileEdit(Request $request)
    {
        try {

        $id = Auth::user()->id;
        $user = User::find($id);
        $districts = District::orderBy('district_name', 'ASC')->get();
        $marketSubCategories = Category::where([['categories_id','!=',0],['header_category_id',1]])
        ->orderBy('category_name','ASC')->get();
        return view('website.dashboard.edit-profile', compact('user', 'districts','marketSubCategories'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    /**
     * Show the form for address the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function address(Request $request)
    {
        try {

        $addres = Address::where('user_id', Auth::user()->id)->first();
        $address = [];
        if (!empty($addres)) {
            $address = Address::where([['user_id', Auth::user()->id], ['id', '!=', $addres->id]])->get();
        }
        $districts = District::get();
        return view('website.dashboard.address', compact('addres', 'address','districts'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    /**
     * order view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        try {

        $orders =Order::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
         $districts = District::orderBy('district_name', 'ASC')->get();
        return view('website.dashboard.order',compact('orders','districts'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    public function product(Request $request)
    {
        try {

        $products =Product::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('website.dashboard.products',compact('products'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    public function storeOrder(Request $request)
    {
        try {

        $owner_products = Product::where('user_id', Auth::user()->id)->get();
        $orders = array();
        $orders_products = array();
        foreach($owner_products as $products){
            $all_orders_products = OrderProduct::select('product_id')->where('product_id', $products->id)->distinct()->get();
            array_push($orders_products, $all_orders_products);
            foreach($all_orders_products as $ordersproducts){
                $product_id = $ordersproducts->product_id;
                $new_orders_products = OrderProduct::where('product_id', $product_id)->first();
                $orders =Order::where('id', $new_orders_products->order_id)->orderBy('id','DESC')->get();
            }
        }
        return view('website.dashboard.store-order',compact('orders', 'orders_products'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    public function returnOrder(Request $request)
    {
        try {

 
        $Municipality = Municipality::select('municipality_name')->where('municipality_id',$request->municipaliti_id)->first();
        $District = District::select('district_name')->where('district_id',$request->district_id)->first();
        $Village = Village::select('name')->where('id',$request->village_id)->first();

        $name = Auth::user()->username;
        $email = Auth::user()->email;
        $phone_number = Auth::user()->phone_number;

        $orderReturn = new OrderReturn();
        $orderReturn->order_id = $request->hd_order_id;
        $orderReturn->user_id = $request->hd_user_id;
        $orderReturn->product_id = $request->hd_product_id;
        $orderReturn->return_name = $name;
        $orderReturn->return_email = $email;
        $orderReturn->return_phone = $phone_number;
        $orderReturn->return_street_address_1 = $request->return_street_address_1;
        $orderReturn->return_street_address_2 = $request->return_street_address_two;
        $orderReturn->return_city = $Municipality->municipality_name;
        $orderReturn->return_state = $District->district_name;
        $orderReturn->return_village = $Village->name;
        $orderReturn->return_zipcode = $request->return_zip;
        $orderReturn->return_order_number = $request->return_order_number;
        $orderReturn->return_request_type = $request->return_request_type;
        $orderReturn->return_reason = $request->return_reason;
        $orderReturn->return_description = $request->return_description;
        $save_return = $orderReturn->save();
        if($save_return){
            $order_returns = OrderReturn::where('product_id', $request->hd_product_id)->first();
            $product_details = Product::where('id', $order_returns->product_id)->first();
            $store_owner_details = User::where('id', $product_details->user_id)->first();
            if($order_returns){
                $admin_message = 'New Return request given for <strong>'.$product_details->title.'</strong>';
                $customer_message = 'Your Return request given for <strong>'.$product_details->title.'</strong> has benn Successfully Submitted!';
                $store_owner_message = 'New Return request given for <strong>'.$product_details->title.'</strong>';
                $admin_data = ['name'=>'admin','product'=>$product_details, 'order_return_data' => $order_returns, 'order_message' => $admin_message];
                Mail::to('demouser034@mailinator.com')->queue(new UserRegistrationMail('order-return', $admin_data));
                $customer_data = ['name'=>Auth::user()->username,'product'=> $product_details, 'order_return_data' => $order_returns, 'order_message' => $customer_message];
                Mail::to(Auth::user()->email)->queue(new UserRegistrationMail('order-return', $customer_data));
                $store_owner_data = ['name'=>$store_owner_details->username,'product'=> $product_details, 'order_return_data' => $order_returns, 'order_message' => $store_owner_message];
                Mail::to($store_owner_details->email)->queue(new UserRegistrationMail('order-return', $store_owner_data));
            }
            return Redirect::back()->with("success","Your return request is Successfully Submitted!");
        } else {
            return Redirect::back()->with("error","Your return request is not Successfully Submitted! Please try again.");;
        }
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    /**
     * order cancel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelOrder(Request $request, $id)
    {
        try {

        $order_status = $request->hd_order_status;
        $cancel_orders = Order::where('id', $id)->update(['order_status'=>$order_status]);
        if($cancel_orders){
            return redirect('/order')->with("success","Order has been updated successfully!");
        }
        //$orders =Order::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        //return view('website.dashboard.order',compact('orders'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    /**
     * cart view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function cart(Request $request)
    // {
    //     return view('website.dashboard.cart');
    // }
    /**
     * wishlist view
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function wishlist(Request $request)
    {
        try {

        $wishlists = Wishlist::where('user_id',Auth::user()->id)->get();

        return view('website.dashboard.wishlist', compact('wishlists'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    /**
     * create and update wishlist
     *
     * 
     * @return \Illuminate\Http\Response
     */

    public function wishlistCreate(Request $request)
    {
        try {
            $productId = $request->id;
            $product = Product::select('user_id','title')->where('id',$productId)->first();
            $userId = Auth::user()->id;
            $message="";
            $wishlist = Wishlist::where([['user_id', $userId], ['product_id', $productId]])->first();
            
            if ($wishlist) {
                $wishlist->delete();
                $message = "Item removed from your wishlist";
                $message_btn_text = "Wishlist";
                //return redirect(Request::url());
            } else {
                Wishlist::create([
                    'product_id' => $productId,
                    'user_id' => $userId
                ]);
                $message = "You have successfully added to wishlist";
                $message_btn_text = "Remove Wishlist";
                //return redirect(Request::url());
                $user = $product->user_id;
                $notification ='Wohoo!Someone has just wishlisted '.$product->title . ' which you had added on our Dealmih.';
                $model_id =$productId;
                $model = "wishlist-create";
                singleuserNotification($user, $notification, $model_id, $model);
            }
            return response()->json([
                'status'=>true,
                $message,
                $message_btn_text
            ],200);
        } catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
    }
    public function wishlistDelete(Request $request)
    {
        try {

        $id = $request->id;
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}
    public function notification()
    {
    try {

        $notifications =  UserNotification::where([['notifiable_user_id',Auth::user()->id]])->orderBy('id','desc')->get();
         return view('website.dashboard.notification',compact('notifications'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function notificationDelete(Request $request)
    {
        try {

        $id = $request->id;
        $notification = UserNotification::find($id);
        $notification->delete();
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function clearallnotifications(Request $request)
    {
        try {

        $id = $request->id;
        // $allnotification = UserNotification::find($id);
        $res=UserNotification::where('notifiable_user_id',$id)->delete();

        // $allnotification->delete();
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function paymentMethod()
    {
        try {

        $paymentMethod = PaymentMethod::where([['user_id', Auth::user()->id], ['method', 3]])->first();
        $orders = Order::join('order_products','order_products.order_id','orders.id')
        ->join('products','products.id','order_products.product_id')
        ->where('products.user_id',Auth::user()->id)
        ->latest('orders.created_at')
        ->get();
        // dd();
        return view('website.dashboard.payment-method', compact('paymentMethod','orders'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function createAddress()
    {
        try {

        $districts = District::orderBy('district_name','ASC')->get();
        return view('website.dashboard.create-address',compact('districts'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function storeAddress(AddressRequest $request)
    {
        try {

        Address::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "you have successfully added",
            'address'=>true
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function addressDelete(Request $request)
    {
        try {

        $id = $request->id;
        Address::find($id)->delete();
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function editAddress($id)
    {
        try {

        $addres = Address::findOrFail($id);
        $districts = District::orderBy('district_name','ASC')->get();
        $muncipalities = Municipality::where('district_id',$addres->district_id)->get();
        $villeges = Village::where('district_id',$addres->district_id)->get();

        return view('website.dashboard.edit-address', compact('addres','districts','muncipalities','villeges'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function updateAddress(AddressRequest $request, $id)
    {
        try {

        Address::where('id', $id)->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "you have successfully updated",
            'url'=>true
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function interestedCategory()
    {
        try {

        $categories = Category::where('categories_id', 0)->get();
        return view('website.dashboard.interested-category', compact('categories'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }


    protected $users;
    public function messages(Request $request)
    { 
        // return "hi";

        // exit;

        // echo Auth::user()->id;

        try {

        $chatProducts = Product::join('chats','chats.product_id','products.id')
        ->where('chats.sender_id',Auth::user()->id)->orWhere('chats.receiver_id',Auth::user()->id)
        ->select('products.*')
        ->groupBy('chats.product_id')->latest()->get();

        $type = $request->type;

        $product = '';
        $productId = '';
        $chats = '';
        $chatFirst ='';
        $chats_count ='';
         $productallchatdata ='';
        if ($type != null ) {
            $product = Product::where('slug', $type)->first();
            if(empty($product))
            {
                abort(404);
            }
            $chatFirst = Chat::where([['product_id',$product->id],['receiver_id',Auth::user()->id]])->orderBy('id', 'DESC')->first();
            $productId = $product->id;
            $productallchatdata = Chat::where('product_id', $productId)->select('unqiue_id')->distinct('unqiue_id')->get();
            // echo "<pre>";
            // print_r($users);
            // echo "</pre>";
            // exit;
            $unqiue_chat_id = $product->user_id.Auth::user()->id;
            if(!empty($request->id)){
                $chats = Chat::where('product_id', $productId)->where('unqiue_id',$request->id)->get();
            } else {
                if(Auth::user()->id == $product->user_id ){
                    $chats = Chat::where('product_id', $productId)->where('unqiue_id',$productallchatdata[0]->unqiue_id)->get();
                } else {
                    $chats = Chat::where('product_id', $productId)->where('unqiue_id',$unqiue_chat_id)->get();
                }
            }
            $updatechats_count = Chat::where('product_id', $productId)->where('sender_id','!=',Auth::user()->id)->where('receiver_id',Auth::user()->id)->update(['is_read' => 1]);
            $chats_count = Chat::where('product_id', $productId)->where('sender_id','!=',Auth::user()->id)->where('receiver_id',Auth::user()->id)->where('is_read','0')->count();
        }
        return view("website.dashboard.messages",compact('chatProducts','product','chats','chatFirst','chats_count','productallchatdata') );
        // compact('product', 'chats'));
        } catch (\Exception $e) {
        throw new \App\Exceptions\LogData($e);    
       }
    }

    public function storeMessages(Request $request)
    {
        $date = date('Y-m-d');  
        $time = date('H:i:s');
         
       try {

         

        if($request->user_product_id == Auth::user()->id){

            $senderid = $request->receiver_id;

        }else {

            $senderid = $request->current_user_id;
        }

        $unqiue = $request->user_product_id.$senderid;
 
        $product = Product::find($request->product_id);

        Chat::create([
            'sender_id' => Auth::user()->id,
            'message' => $request->message,
            'receiver_id' => $request->receiver_id,
            'product_id' => $request->product_id,
            'unqiue_id' => $unqiue,
            'date' => $date,
            'time' => $time,
        ]);
        

        $firebaseToken = User::where('id',$request->receiver_id)->pluck('device_token');
          
        $SERVER_API_KEY = 'AAAAAPmMO9E:APA91bG62Y1v2UfWvbYFZw9iKsml2m20e966tStD7TehlptrfYoEIHyYa1VIFkbDY3o3uhU_Wg_8vWNsE3trn4GlEpz0wzszRqfuX4borJHrWOkzRazntMY92Ss-0UAwdT8Nbo1qiZLk';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => "New Msg",
                "body" => $request->message,  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        // dd($response);

        return response()->json([
            'status'=>true,
            'message'=>"successfully sent",
            'productSlug'=>$product->slug,
            'userproductid' => $request->user_product_id,
            'currentuserid' => $request->current_user_id,
        ]);

     }
     catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }


     public function previousMessages(Request $request)
     {
        try {

        $receiver_id = $request['id'];
        $product_id= $request['productid'];
   
        $receiverdata = User::where('id','=', $receiver_id)->first();
        $userdata = User::where('id','=',  Auth::user()->id)->first();

        $productdata= product::select('title')->where('id',$product_id)->first();
         
        $productName = "";
         $productName = $productdata->title;
         $welcome_msges = Chat::select('message')->where('sender_id',1)->where('receiver_id',Auth::user()->id)->get();

         
             $previous_msg= Chat::where('product_id',$product_id)->where('sender_id',Auth::user()->id)->where('receiver_id', $receiver_id)
             ->orWhere(function($q)use ($receiver_id){
                 $q->where('sender_id',$receiver_id)->where('receiver_id', Auth::user()->id);

            })->get();
  
                $html = view('website.dashboard.start-message', [
                    'previous_msg' => $previous_msg,
                     'id'=>$receiver_id,
                     'receiverdata' => $receiverdata,
                      'userdata' => $userdata,
                      'productName' => $productName,
                      'productId' => $product_id,
                      'welcome_msges' => $welcome_msges
                ])->render();

                return response()->json([
                    'status'=>true,
                    'message'=> 'success',
                    'html'=>$html
                ]);
 
      }
      catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function deleteMessages(Request $request){
        try {
            //$keyword= $request['keyword'];
            $message_id = $request->message_id;
            Chat::where('id', $message_id)->update([
           'msg_status' => 'deleted'
        ]);
            return response()->json([
                'status'=>true,
                'message'=> 'Message deleted successfully!',
            ]);
        } catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
    }

    public function ClearAllChats(Request $request){
        try {
      

            $clear_chat = Chat::where('product_id', $request->product_id)->where('unqiue_id', $request->unquieid)->orderBy('created_at', 'desc')->first();

            if($clear_chat->clear_chat != Auth::user()->id){

            if(!empty($clear_chat->clear_chat)){

                $sender_id = $clear_chat->sender_id;
                $receiver_id = $clear_chat->receiver_id;

                $chatunq = $sender_id.','.$receiver_id;

                $update = Chat::where('product_id', $request->product_id)->where('unqiue_id', $request->unquieid)->update([
                        'clear_chat' => $chatunq
                ]);


            }else {

                // return $clear_chat->$clear_chat;
                

                $update = Chat::where('product_id', $request->product_id)->where('unqiue_id', $request->unquieid)->where('clear_chat',NULL)->update([
                        'clear_chat' => Auth::user()->id
                ]);

            }
        }


            // $product_id = $request->product_id;
            // Chat::where('product_id', $product_id)->where('sender_id', Auth::user()->id)->delete();
            // return response()->json([
            //     'status'=>true,
            //     'message'=> 'Clear All Chat Successfully!',
            // ]);

            return response()->json([
                'status'=>true,
                'message'=> 'Clear All Chat Successfully!',
            ]);

        } catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
    }


    public function searchUser(Request $request){

        try {


        $keyword= $request['keyword'];
        $id = Auth::user()->id;


        $productlists =User::select('users.id as id','products.title as title','products.id as product_id')
        ->join('products','products.user_id','users.id')
        ->join('chats','chats.sender_id','products.user_id')
        ->Where('title', 'LIKE', "%{$keyword}%")
        ->where('chats.sender_id',$id)
        ->orderBy('title', 'asc')
        ->get();
        return $productlists;
 
    //  return response()->json([
    //       'status'=>true,
    //       'message'=>"userlist",
    //       'html'=>$html
    //   ],200);


    $html = view('website.dashboard.searched-messages', [
        'userslists' => $userslists,    
        ])->render();

    return response()->json([
        'status'=>true,
        'message'=> 'success',
        'html'=>$html
    ]);
 
      }
      catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

      


    public function paymentMethodCreate(Request $request)
    {
        try {

        $bankAccount = $request->bank_account;
        $status = false;
        $message = "please select payment method";
        if ($bankAccount == 3) {
            $checkBank = PaymentMethod::where([['user_id', Auth::user()->id], ['method', 3]])->first();
            if ($checkBank != null) {
                PaymentMethod::where('id', $checkBank->id)->update([
                    'bank_name' => $request->bank_name,
                    'branch_name' => $request->branch_name,
                    'account_holder_name' => $request->accnt_hlod_name,
                    'account_number' => $request->account_number,
                    'ifsc_code' => $request->ifsc_code
                ]);
            } else {
                PaymentMethod::create([
                    'user_id' => Auth::user()->id,
                    'method' => 3,
                    'bank_name' => $request->bank_name,
                    'branch_name' => $request->branch_name,
                    'account_holder_name' => $request->accnt_hlod_name,
                    'account_number' => $request->account_number,
                    'ifsc_code' => $request->ifsc_code
                ]);
            }
            $status = true;
            $message = "successfully updated";
        }
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function interestedCategoryCreate(Request $request)
    {
        try {

        $categories = $request->interestedCategory;
        $unchecked = $request->unchecked;
        if ($unchecked) {
            InterestedCategory::where('category_id', $unchecked)->delete();
        }
        if ($categories) {
            foreach ($categories as $category) {
                InterestedCategory::updateOrCreate([
                    'user_id' => Auth::user()->id,
                    'category_id' => $category
                ]);
            }
        }
        return response()->json([
            'status' => true,
            'message' => "interested category selected successfully"
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function resetPassword(Request $request ,$id)
    {
        $user = User::find($id);
            if(empty($user))
                {
                    abort(404);
                }
            return view('website.reset-password',compact('user'));
    }
    public function resetPasswordUpdate(RestPasswordRequest $request,$id)
    {
        try {

        $userData = User::where('id',$id);
        $userUpdate = $userData->update([
            'password'=> Hash::make($request->password)
        ]);
        $user = $userData->first();
        $credentials = [
            'email' => $user->email,
            'password' => $request->password,
        ];
        Auth::attempt($credentials, true, true);
        return redirect('/');
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function paymentRedirction(Request $request)
    {
        dd();
    }

     public function destroy(Request $request,$id){

     
    $id = $request->id;

    
    // $user = DB::table('users')->Join('products', 'users.id', '=', 'products.user_id')->where('users.id', $id)->update(['is_deleted' => '1']);

            $user = User::where('id', $id)->update(['is_deleted' => '1']);
            
             DB::table('products')->where('user_id', $id)->delete(); 



        \Auth::logout();
        \Session::flush();

        return Redirect::to('/login');
}
}

