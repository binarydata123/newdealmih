<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistrationMail;
use App\Models\Address;
use App\Models\Cart;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use DB;

class PaymentController extends Controller
{

    /**
     * cart view page
     *
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        try {



            $products = Product::join('product_bids', 'product_bids.product_id', 'products.id')
                ->where([['products.user_id', '!=', Auth::user()->id], ['product_bids.user_id', Auth::user()->id]])
                ->select(
                    'products.id as id',
                    'products.auction_end_date as auction_end_date',
                    'product_bids.product_id as products_id'
                )->get();



            $today = Carbon::now()->format('Y-m-d');
            if ($products) {
                foreach ($products as $product) {
                    if ($product->auction_end_date == $today) {
                        Cart::updateOrCreate([
                            'user_id' => Auth::user()->id,
                            'product_id' => $product->id
                        ], [
                            'quantity' => 1,
                        ]);
                    }
                }
            }
            //$carts = Cart::where('user_id', Auth::user()->id)->get();
            $carts = Cart::select('carts.id as cart_id', 'carts.user_id as cart_user_id', 'carts.product_id as cart_product_id', 'carts.quantity as cart_quantity', 'carts.price as cart_price', 'carts.total as cart_total', 'products.*')->join('products', 'products.id', 'carts.product_id')->where('carts.user_id', Auth::user()->id)->get();
            //$carts_count = Cart::join('products', 'products.id', 'carts.product_id')->where('carts.user_id', Auth::user()->id)->count();
            
            /*$carts_data = Cart::select('product_id')->where('user_id', Auth::user()->id)->get()->toArray();
            foreach($carts_data as $cart){
                $cart_product_ids[] = $cart['product_id'];
            }

            echo '<pre>';
            print_r($cart_product_ids);
            echo '</pre>';*/
            //exit();


            return view('website.dashboard.cart', compact('carts'));
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }

    /**
     * product add to cart
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        try {

            $product = $request->product;
            $quantity = $request->quantity;

            if($request->type == 'wishlist'){
                $wishlist = Wishlist::where('product_id', $product)->delete();
            }
            

            Cart::updateOrCreate([
                'user_id' => Auth::user()->id,
                'product_id' => $product
            ], [
                'quantity' => isset($quantity) ? $quantity : 1,
            ]);
            return response()->json([
                'status' => true,
                'message' => "You have successfully add to cart"
            ]);
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }

    /**
     * delete Cart
     * pass cart id 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cartDelete(Request $request)
    {
        try {

            $id = $request->id;
            DB::enableQueryLog();
            Cart::where('id', $id)->delete();
            dd(DB::getQueryLog());
            return response()->json(([
                'status' => true,
                'message' => "you have successfully deleted"
            ]), 200);
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }
    public function index(Request $request)
    {
        try {

            $productId = $request->product;
            $product = Product::where('slug', $productId)->first();
            $carts = Cart::where(function ($q) use ($product) {
                if ($product != null) {
                    $q->where('product_id', $product->id);
                }
            })
                ->where('user_id', Auth::user()->id)->get();

            return view("website.payment.index", compact('carts'));
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function address(Request $request,$carttype = null,$productslug = null)
    {
        try {

            if($carttype == 'delivery'){

                $type = $productslug; 

            }else {

                $type = $request->product; 
            }

            

            $product = "";
            if (isset($type)) {
                $product = Product::where('slug', $type)->first();
                if (empty($product)) {
                    abort(404);
                }
                Cart::updateOrCreate([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id
                ], [
                    'quantity' => 1,
                ]);
            }

            $id = Auth::user()->id;
            $user = User::find($id);
            $addres = Address::where('user_id', Auth::user()->id)->first();
            $address = [];
            if (!empty($addres)) {
                $address = Address::where([['user_id', Auth::user()->id], ['id', '!=', $addres->id]])->get();
            }

            $districts = District::orderBy('district_name', 'ASC')->get();

            /*$carts = Cart::where(function ($q) use ($product) {
                if ($product != null) {
                    $q->where('product_id', $product->id);
                }
            })
            ->where('user_id', Auth::user()->id)->get();*/


            if($carttype == 'delivery'){


            $carts = Cart::select('carts.id as cart_id', 'carts.user_id as cart_user_id', 'carts.product_id as cart_product_id', 'carts.quantity as cart_quantity', 'carts.price as cart_price', 'carts.total as cart_total', 'products.*')->join('products', 'products.id', 'carts.product_id')->where('carts.product_id', $product->id)->where('carts.user_id', Auth::user()->id)->get();

             // echo "<pre>";
             // print_r($carts->count());
             // echo "</pre>";

             // exit;

            return view("website.payment.address", compact('carttype','address', 'addres', 'districts', 'product', 'carts', 'user'));



            }else {

                $carts = Cart::select('carts.id as cart_id', 'carts.user_id as cart_user_id', 'carts.product_id as cart_product_id', 'carts.quantity as cart_quantity', 'carts.price as cart_price', 'carts.total as cart_total', 'products.*')->join('products', 'products.id', 'carts.product_id')->where('carts.user_id', Auth::user()->id)->get();

                return view("website.payment.address", compact('address', 'addres', 'districts', 'product', 'carts', 'user'));

            }

        

            
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }


    /**

    
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function summary(Request $request,$carttype = null,$productslug = null)
    {
        

            if($carttype == 'delivery'){

                $productId = $productslug; 
                $product = Product::where('slug', $productId)->first();

                Cart::updateOrCreate([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id
                ], [
                    'quantity' => 1,
                ]);

            }else {

                $productId = $request->product;
                $product = Product::where('slug', $productId)->first();
            }


            /*$carts = Cart::where(function ($q) use ($product) {
                if ($product != null) {
                    $q->where('product_id', $product->id);
                }
            })
            ->where('user_id', Auth::user()->id)->get();*/

            // return $product;

             if($carttype == 'delivery'){

                 $carts = Cart::select('carts.id as cart_id', 'carts.user_id as cart_user_id', 'carts.product_id as cart_product_id', 'carts.quantity as cart_quantity', 'carts.price as cart_price', 'carts.total as cart_total', 'products.*')->join('products', 'products.id', 'carts.product_id')->where('carts.product_id', $product->id)->where('carts.user_id', Auth::user()->id)->get();

                return view("website.payment.summary", compact('carts', 'product','carttype'));


            }else {

                $carts = Cart::select('carts.id as cart_id', 'carts.user_id as cart_user_id', 'carts.product_id as cart_product_id', 'carts.quantity as cart_quantity', 'carts.price as cart_price', 'carts.total as cart_total', 'products.*')->join('products', 'products.id', 'carts.product_id')->where('carts.user_id', Auth::user()->id)->get();

                return view("website.payment.summary", compact('carts', 'product'));
            }

            
            
            try {
        } catch (\Exception $e) {

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
    public function cartQuantity(Request $request)
    {
        

            $productId = $request->productId;
            $quantity = $request->quantityValue;
            $productStatus = 0;
            $cart = Cart::where([['product_id', $productId], ['user_id', Auth::user()->id]])->first();
            
            $product = Product::where('id', $productId)->first();
            if ($quantity > $product->quantity) {
                $productStatus = 1;
                return response()->json([
                    'status' => true,
                    'productStatus' => $productStatus,
                    // 'productQuantity'=>$pr
                ]);
            }

            if ($cart) {
                $cart->quantity = $quantity;
                $cart->save();
            }

            $cartProduct = Cart::select('carts.product_id as cart_product_id', 'carts.quantity as cart_quantity', 'carts.price as cart_price', 'carts.total as cart_total', 'products.*')->join('products', 'products.id', 'carts.product_id')->where('carts.user_id', Auth::user()->id)->get();


            $price = 0;

            foreach($cartProduct as $cart){

                $price+=$cart->price * $cart->cart_quantity;
            }
            $grandTotal = $price ;
             return response()->json([
                'status' => true,
                'grandTotal' => $grandTotal,
                'productStatus' => $productStatus
            ]);
        try {
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }

    public function order(Request $request)
    {
        try{
        $data = ['name' => Auth::user()->username, 'product' => 'apple'];
        Mail::to(Auth::user()->email)->queue(new UserRegistrationMail('order-product', $data));
        // dd($request->all());
        $token = csrf_token();
        $url = "https://nabiltest.compassplus.com:8444/Exec";
        //$url = "https://nabilacs.compassplus.com:8444/Exec";

        $cert_file = public_path() . '/paymentKey/dealmih.com.crt';



        $cartId = $request->cart;
        $cartsList = Cart::whereIn('id', $cartId);
        $carts = $cartsList->get();
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'payment_option' => 1,
            'order_status' => 1,
            'if_cancelled' => 0,
            'if_delivered' => 0,
        ]);
        if ($carts) {
            foreach ($carts as $cart) {
                $product = Product::where('id', $cart->product_id)->first();
                $product->is_sold = 1;
                $product->save();
                $purchasePrice = $product->price * $cart->quantity * 100;
                // payment gateway 
                $key_file =  public_path() . '/paymentKey/dealmih.key';
                $xml = '<?xml version="1.0"?>
                <TKKPG>
                <Request>
                <Operation>CreateOrder</Operation>
                <Language>EN</Language>
                <Order>
                <Merchant>NABIL106665</Merchant>
                <Amount>' . $purchasePrice . '</Amount>
                <Currency>524</Currency>
                <Description>ORDERID_112</Description>
                <ApproveURL>https://dealmih.com/approve</ApproveURL>
                <CancelURL>https://dealmih.com/cancel</CancelURL>
                <DeclineURL>https://dealmih.com/decline</DeclineURL>
                </Order>
                </Request>
                </TKKPG>';

                $headers = array(
                    "Content-type: text/xml,application/json",
                    "Content-length: " . strlen($xml),
                    "Connection: keep-alive",

                    'Accept: application/json'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_POST, true);

                // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                curl_setopt($ch, CURLOPT_SSLCERT, $cert_file);
                curl_setopt($ch, CURLOPT_SSLKEY, $key_file);
                $data = curl_exec($ch);
                $xmlObject = simplexml_load_string($data);

                $json = json_encode($xmlObject);
                $arrayResponse = json_decode($json, true);
                //   dd($phpArray);
                $url = $arrayResponse['Response']['Order']['URL'];
                $sessionId = $arrayResponse['Response']['Order']['SessionID'];
                $orderId = $arrayResponse['Response']['Order']['OrderID'];
                // dd($data);
                $splitOrderId = explode('@', $orderId);
                $splitSessionId = explode('@', $sessionId);
                //$keyValue ='0123456789abcdef'; //hex value key 
                $keyValue = '0123456789abcdef'; //hex value key 

                $encryptedOrderId = $splitOrderId[3]; //hex value in order id
                $encryptedSessionId = $splitSessionId[3];
                $binaryEncryptedOrderId = hex2bin($encryptedOrderId); //Decoded data from order Id
                $binaryEncryptedSessionId = hex2bin($encryptedSessionId); //Decode data from session Id
                $opensslDecryptOrderId = openssl_decrypt($binaryEncryptedOrderId, 'des-ecb', hex2bin($keyValue), OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, ''); //OrderId Convert to ASCII value
                $opensslDecryptSessionId = openssl_decrypt($binaryEncryptedSessionId, 'des-ecb', hex2bin($keyValue), OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, ''); //SessionId Convert to ASCII value
                // dd($opensslDecryptOrderId,$opensslDecryptSessionId);
                if (!$data) {

                    echo "Curl Error : " . curl_error($ch);
                } else {

                    // echo htmlentities($data);
                    // dd('success');
                }
                $opensslDecryptOrderId = str_replace(' ', '', $opensslDecryptOrderId); //remove spacing in order Id
                $opensslDecryptSessionId = str_replace(' ', '', $opensslDecryptSessionId); //remove spacing in session id

                Order::where('id', $order->id)->update([
                    'nabil_bank_orderId' => $opensslDecryptOrderId,
                    'nabil_bank_sessionId' => $opensslDecryptSessionId,
                    'create_order_request' => $xml,
                    'create_order_response' => $arrayResponse,
                ]);
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $product->price,
                    'purchase_price' => $purchasePrice,
                ]);
            }
            // $cartsList->delete(); 


            return redirect($url . '?OrderID=' . $orderId . '&SessionID=' . $sessionId);
        }

     }catch (\Exception $e) {
           throw new \App\Exceptions\LogData($e);    
       }
        // return redirect('payment/success');
    }
    public function paymentSuccess()
    {
        return view('website.payment.success');
    }
    public function statusFromPaymentGatway(Request $request)
    {
        dd($request->all());
    }
    public function cancel(Request $request)
    {
        try {

            //  csrf_token();
            // dd($request->xmlmsg);
            $url = "https://nabiltest.compassplus.com:8444/Exec";
            //$url = "https://nabilacs.compassplus.com:8444/Exec";
            $cert_file = public_path() . '/paymentKey/dealmih.com.crt';
            $key_file =  public_path() . '/paymentKey/dealmih.key';

            $xmlObject = simplexml_load_string($request->xmlmsg);

            $xml = $xmlObject;
            $json = json_encode($xml);
            $cancelStatusArray = json_decode($json, true);
            $lang = $cancelStatusArray['Language'];
            $orderId = $cancelStatusArray['OrderID'];
            $sessionId = $cancelStatusArray['SessionID'];

            // dd($phpArray);
            $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <TKKPG>
        <Request>
        <Operation>GetOrderStatus</Operation>
        <Language>' . $lang . '</Language>
        <Order>
        <Merchant>NABIL106665</Merchant>
        <OrderID>' . $orderId . '</OrderID>
        </Order>
        <SessionID>' . $sessionId . '</SessionID>
        </Request>
        </TKKPG>';

            $headers = array(
                "Content-type: text/xml,application/json",
                "Content-length: " . strlen($xml),
                "Connection: keep-alive",
                'Accept: application/json'
            );
            // dd($xml,$request->xmlmsg);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);

            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_SSLCERT, $cert_file);
            curl_setopt($ch, CURLOPT_SSLKEY, $key_file);
            $data = curl_exec($ch);
            if (!$data) {

                echo "Curl Error : " . curl_error($ch);
            } else {

                // echo htmlentities($data);
                // dd('success');
            }

            $xmlObject = simplexml_load_string($data);

            $json = json_encode($xmlObject);
            $orderResponse = json_decode($json, true);
            $responseOrderId = $orderResponse['Response']['Order']['OrderID'];

            Order::where('nabil_bank_orderId', $responseOrderId)->update([
                'payment_reponse_xmlout' => $cancelStatusArray,
                'get_order_request' => $xml,
                'get_order_response' => $orderResponse,
                'order_status' => 4
            ]);
            return view('website.payment.cancel');
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }
    public function decline(Request $request)
    {
        try {

            $url = "https://nabiltest.compassplus.com:8444/Exec";
            //$url = "https://nabilacs.compassplus.com:8444/Exec";
            $cert_file = public_path() . '/paymentKey/dealmih.com.crt';
            $key_file =  public_path() . '/paymentKey/dealmih.key';

            $xmlObject = simplexml_load_string($request->xmlmsg);

            $xml = $xmlObject;
            $json = json_encode($xml);
            $declineStatusArray = json_decode($json, true);
            $lang = $declineStatusArray['Language'];
            $orderId = $declineStatusArray['OrderID'];
            $sessionId = $declineStatusArray['SessionID'];

            // dd($phpArray);
            $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <TKKPG>
        <Request>
        <Operation>GetOrderStatus</Operation>
        <Language>' . $lang . '</Language>
        <Order>
        <Merchant>NABIL106665</Merchant>
        <OrderID>' . $orderId . '</OrderID>
        </Order>
        <SessionID>' . $sessionId . '</SessionID>
        </Request>
        </TKKPG>';

            $headers = array(
                "Content-type: text/xml,application/json",
                "Content-length: " . strlen($xml),
                "Connection: keep-alive",
                'Accept: application/json'
            );
            // dd($xml,$request->xmlmsg);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);

            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_SSLCERT, $cert_file);
            curl_setopt($ch, CURLOPT_SSLKEY, $key_file);
            $data = curl_exec($ch);
            if (!$data) {

                echo "Curl Error : " . curl_error($ch);
            } else {

                // echo htmlentities($data);
                // dd('success');
            }

            $xmlObject = simplexml_load_string($data);

            $json = json_encode($xmlObject);
            $orderResponse = json_decode($json, true);
            $responseOrderId = $orderResponse['Response']['Order']['OrderID'];

            Order::where('nabil_bank_orderId', $responseOrderId)->update([
                'payment_reponse_xmlout' => $declineStatusArray,
                'get_order_request' => $xml,
                'get_order_response' => $orderResponse,
                'order_status' => 3
            ]);
            return view('website.payment.decline');
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }
    public function approve(Request $request)
    {
        try {

            // dd($request->all());
            //$data = $request->xmlmsg;
            //$xmlObject = simplexml_load_string($data);

            // $json = json_encode($xmlObject);
            //$phpArray = json_decode($json, true);

            $url = "https://nabiltest.compassplus.com:8444/Exec";
            //$url = "https://nabilacs.compassplus.com:8444/Exec"; 
            $cert_file = public_path() . '/paymentKey/dealmih.com.crt';
            $key_file =  public_path() . '/paymentKey/dealmih.key';

            $xmlObject = simplexml_load_string($request->xmlmsg);

            $xml = $xmlObject;
            $json = json_encode($xml);
            $approveStatusArray = json_decode($json, true);
            $lang = $approveStatusArray['Language'];
            $orderId = $approveStatusArray['OrderID'];
            $sessionId = $approveStatusArray['SessionID'];

            // dd($phpArray);
            $xml = '<?xml version="1.0" encoding="UTF-8"?>
    <TKKPG>
    <Request>
    <Operation>GetOrderStatus</Operation>
    <Language>' . $lang . '</Language>
    <Order>
    <Merchant>NABIL106665</Merchant>
    <OrderID>' . $orderId . '</OrderID>
    </Order>
    <SessionID>' . $sessionId . '</SessionID>
    </Request>
    </TKKPG>';

            $headers = array(
                "Content-type: text/xml,application/json",
                "Content-length: " . strlen($xml),
                "Connection: keep-alive",
                'Accept: application/json'
            );
            // dd($xml,$request->xmlmsg);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);

            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_SSLCERT, $cert_file);
            curl_setopt($ch, CURLOPT_SSLKEY, $key_file);
            $data = curl_exec($ch);
            if (!$data) {

                echo "Curl Error : " . curl_error($ch);
            } else {

                // echo htmlentities($data);
                // dd('success');
            }

            $xmlObject = simplexml_load_string($data);

            $json = json_encode($xmlObject);
            $orderResponse = json_decode($json, true);
            $responseOrderId = $orderResponse['Response']['Order']['OrderID'];

            Order::where('nabil_bank_orderId', $responseOrderId)->update([
                'payment_reponse_xmlout' => $approveStatusArray,
                'get_order_request' => $xml,
                'get_order_response' => $orderResponse,
                'order_status' => 2
            ]);

            return view('website.payment.approve');
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }
    public function paymentOrderSuccess()
    {

        return view('website.payment.order-success');
    }
    public function orderCreate(Request $request)
    {
        try {

            $orders = new Order;
            $orders->user_id = Auth::user()->id;
            $orders->payment_option = 1;
            $orders->order_status = 1;
            $orders->if_cancelled = 0;
            $orders->if_delivered = 0;
            $orders->save();
            $order_id = $orders->id;
            if ($order_id) {
                $cartId = $request->cart;
                $cartsList = Cart::whereIn('id', $cartId);
                $carts = $cartsList->get();
                if ($carts) {
                    $owner_id = '';
                    $product_id = '';
                    foreach ($carts as $cart) {
                        $product = Product::where('id', $cart->product_id)->first();

                        $quantity = $product->quantity - $cart->quantity;

                        $product->quantity = $quantity;

                        if($quantity == '0'){

                            $product->is_sold = 1;
                        }

                        
                        $product->save();
                        $purchasePrice = $product->price * $cart->quantity * 100;
                        $user_id = $product->user_id;
                        //$owner_id .= $user_id.':'.$cart->product_id.',';
                        $owner_id .= $user_id . ',';
                        OrderProduct::create([
                            'order_id' => $order_id,
                            'product_id' => $cart->product_id,
                            'quantity' => $cart->quantity,
                            'price' => $product->price,
                            'purchase_price' => $purchasePrice,
                        ]);
                    }
                }
                $owner_ids = rtrim($owner_id, ',');
                $new_owner_id_arr = explode(',', $owner_ids);
                foreach ($new_owner_id_arr as $ownerid) {
                    $business_owner_details = User::where('id', $ownerid)->first();
                    if ($carts) {
                        $loop_template = '';
                        foreach ($carts as $cart) {
                            $product = Product::where('id', $cart->product_id)->where('user_id', $ownerid)->first();
                            if ($product) {
                                $purchasePrice = $product->price * $cart->quantity * 100;
                                $loop_template .= '
                        <tr>
                          <td style="font-size:14px;padding: 15px;border: 1px solid black;font-family:Helvetica,Arial,sans-serif;"> ' . $product->title . '</td>
                          <td style="font-size:14px;padding: 15px;border: 1px solid black;font-family:Helvetica,Arial,sans-serif;">' . $cart->quantity . '</td>
                          <td style="font-size:14px;padding: 15px;border: 1px solid black;font-family:Helvetica,Arial,sans-serif;">' . $purchasePrice . '</td>
                        </tr>';
                            }
                        }
                    }
                    $business_owner_data = ['name' => $business_owner_details->username, 'product' => $carts, 'order_message' => 'New Order received from Customer', 'store_owner_product' => $loop_template];
                    Mail::to($business_owner_details->email)->queue(new UserRegistrationMail('create-order', $business_owner_data));
                }
                $admin_data = ['name' => 'admin', 'product' => $carts, 'order_message' => 'New Order received from Customer', 'store_owner_product' => ''];
                $customer_data = ['name' => Auth::user()->username, 'product' => $carts, 'order_message' => 'Your Order is Placed Successfully', 'store_owner_product' => ''];
                Mail::to('eethasgroup@gmail.com')->queue(new UserRegistrationMail('create-order', $admin_data));
                Mail::to(Auth::user()->email)->queue(new UserRegistrationMail('create-order', $customer_data));


                $data = ['username'=>Auth::user()->username,'product'=>$product->title];
               //  userNotification($user, $notification, $model_id, $model);
      
                $user = $product->user_id;
                $user_name = Auth::user()->username;
                $notification = 'Congratulations! Someone has recently ordered ' . $product->title;
                $admin_notification = 'Congratulations! ' . $user_name . '  has bought '  .$product->title . ' from your dealmih.';
                $model_id = $product->id;
                $model = "product-ordered";

                userNotification($user,$notification,$admin_notification,$model_id, $model);
                return view('website.payment.order-success', compact('carts'));
            } else {
                return Redirect::back()->withErrors(['msg' => 'Something went wrong! Please try again']);
            }
        } catch (\Exception $e) {

            throw new \App\Exceptions\LogData($e);
        }
    }
}
