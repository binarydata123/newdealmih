<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistrationMail;
use App\Models\Product;
use App\Models\HeaderCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\ProductView;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $product = Product::with([
            'category' => function ($q) {
                $q->select('id', 'category_name', 'header_category_id');
            }
        ])->with([
            'userList' => function ($q) {
                $q->select('id', 'username');
            }
        ])
        ->select('products.*',
        DB::raw('DATE_FORMAT(products.created_at,"%Y-%m-%d %h:%m:%s") as create_dt'),
        DB::raw('(CASE 
        WHEN products.status = "1" THEN "Tranding" 
        WHEN products.status = "2" THEN "Featured"
        WHEN products.status = "3" THEN "Premium"
        END) AS status'))->latest()->get();
        return response()->json([
            'status' => true,
            'message' => "Product List",
            'data' => $product
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function getCategoryProducts(Request $request, $id,$sort)
    {
        try {

        if($id=='null'){

            $productdata = Product::with([
                    'category' => function ($q) {
                        $q->select('id', 'category_name', 'header_category_id');
                    }
                ])->with([
                    'userList' => function ($q) {
                        $q->select('id', 'username');
                    }
                ])
                ->select('products.*',
                DB::raw('DATE_FORMAT(products.created_at,"%Y-%m-%d %h:%m:%s") as create_dt'),
                DB::raw('(CASE 
                WHEN products.status = "1" THEN "Tranding" 
                WHEN products.status = "2" THEN "Featured"
                WHEN products.status = "3" THEN "Premium"
                END) AS status'))->latest()->get();
        } else {


            $category_data = DB::table('categories')->where('header_category_id', $id)->get();
            foreach ($category_data as $categorydata) {
                $cat_ids[] = $categorydata->id;
            }
            $productdata = Product::with([
                    'category' => function ($q) {
                        $q->select('id', 'category_name', 'header_category_id');
                    }
                ])->with([
                    'userList' => function ($q) {
                        $q->select('id', 'username');
                    }
                ])
                ->select('products.*',
                    DB::raw('DATE_FORMAT(products.created_at,"%Y-%m-%d %h:%m:%s") as create_dt'),
                    DB::raw('(CASE 
                        WHEN products.status = "1" THEN "Tranding" 
                        WHEN products.status = "2" THEN "Featured"
                        WHEN products.status = "3" THEN "Premium"
                        END) AS status'))
                ->whereIn('category_id', $cat_ids);
                
                if($sort == 'created_at' || $sort == 'updated_at'){

                    $product = $productdata->orderBy($sort, 'DESC')->get();

                }else {

                    if($sort == 'approved'){

                        $product = $productdata->where('is_approved','1')->latest()->get();

                    }else if($sort == 'pending') {

                        $product = $productdata->where('is_approved','0')->latest()->get();

                    }else {

                         $product = $productdata->latest()->get();
                    }            
                }

        }
        return response()->json([
            'status' => true,
            'message' => "Product List",
            'data' => $product
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

        

        $firebaseToken = User::where('id',$product->user_id)->pluck('device_token');

        
        $SERVER_API_KEY = 'AAAA0dYUN88:APA91bH6vWSkkvigQLB1GbuLPuoK2XAJL5a4I4ffHXEVY0cTBWgGZu-6ILT3_iTi0t6lwK4Wy-KRwHiYmZeRoXFN7YvUaJrlWsL829_eKNHMhcR-s5PLzHReWF3t5Xqw6RhQDmSXTdqp';
  
        $data1 = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => "Listing Status",
                "body" => "Your listing ".ucfirst($product->title)." has Been ".$status." From Admin",  
            ]
        ];
        $dataString = json_encode($data1);
    
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
            'message'=>"You have successfully "  . $status ,
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
    public function destroy(Product $product,$id)
    {
       try { 

       Product::find($id)->delete();
       return response()->json([
           'status'=>true,
           'message'=>"You have successully deleted"
       ],200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function ProductView(Request $request)
    {
       try { 

    
        // $user_info =  ProductView::select(DB::raw('products.title,productview.created_at,COUNT(*) AS count'))
        //             ->join('products', 'productview.product_id', '=', 'products.id')
        //             ->groupBy('productview.created_at')->toSql();

         $productview = ProductView::select(
                            DB::raw('COUNT(*) AS count'),
                            DB::raw("(DATE_FORMAT(productview.created_at, '%d-%m-%Y')) as my_date"))
                            ->groupBy(DB::raw("DATE_FORMAT(productview.created_at, '%d-%m-%Y')"))
                            ->where('productview.created_at', '>', now()->subDays(30)->endOfDay())
                            ->orderBy(DB::raw("DATE_FORMAT(productview.created_at,'%d-%m-%Y')"), 'asc')
                            ->get();

        $startdate = Carbon::now()->format('Y-m-d');
        $enddate = Carbon::now()->subDays(30)->endOfDay()->format('Y-m-d');



        foreach($productview as $pview){


            $opn[] = array(
                'x' => $pview->my_date,
                'y' => $pview->count
            );


        }

        return response()->json([
           'status'=>true,
           'message'=>"You have successully last 30days product viww",
           'data' => $opn,
           'startdate'=>$startdate,
           'enddate'=>$enddate,

       ],200);
        
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function SingleProductView(Request $request,$date)
    {
       try { 

        $singleproductview =  ProductView::select(DB::raw('products.title,COUNT(*) AS count'))
                    ->join('products', 'productview.product_id', '=', 'products.id')
                    ->where(DB::raw("(DATE_FORMAT(productview.created_at,'%d-%m-%Y'))"), "=", $date)
                    ->groupBy('productview.product_id')->get();

        // echo "<pre>";
        // print_r($user_info);
        // echo "</pre>";
        // exit;


        foreach($singleproductview as $pview){

            $title = explode(" ", $pview->title);
            
            $opn[] = array(
                'x' => $title[0],
                'y' => $pview->count
            );


       }

       return response()->json([
           'status'=>true,
           'message'=>"You have successully fetch single pridut view",
           'data' => $opn 

       ],200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function DateWiseProductView(Request $request)
    {
        
    

        $stardate = $request->dwpv['startdate'];
        $enddate = $request->dwpv['enddate'];

       
        $productview = ProductView::select(
            DB::raw('COUNT(*) AS count'),
            DB::raw("(DATE_FORMAT(productview.created_at, '%d-%m-%Y')) as my_date"))
            ->groupBy(DB::raw("DATE_FORMAT(productview.created_at, '%d-%m-%Y')"))
            ->whereBetween('productview.created_at', [$stardate,$enddate])
            ->orderBy(DB::raw("DATE_FORMAT(productview.created_at,'%d-%m-%Y')"), 'asc')
            ->get();



        foreach($productview as $pview){


            $opn[] = array(
                'x' => $pview->my_date,
                'y' => $pview->count
            );


        }


        

        return response()->json([
           'status'=>true,
           'message'=>"You have successully last pws",
           'data' => $opn 

       ],200);


    }

}
