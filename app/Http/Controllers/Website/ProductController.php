<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ProductBidRequest;
use App\Http\Requests\Website\ProductRequest;
use App\Http\Requests\Website\ProductReviewRequest;
use App\Mail\UserRegistrationMail;
use App\Models\Category;
use App\Models\District;
use App\Models\Feature;
use App\Models\HeaderCategory;
use App\Models\Municipality;
use App\Models\Product ;
use App\Models\ProductBid;
use App\Models\ProductData;
use App\Models\ProductDeliveryLocation;
use App\Models\ProductMedia;
use App\Models\Village;
use App\Models\ProductPropertyFeature;
use App\Models\ProductReview;
use App\Models\UserDetail;
use App\Models\ProductVisitorHistory;
use App\User;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Address;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\ProductView;

class ProductController extends Controller
{
    /**
     * Display a detail of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request,$slug)
    {
        try {

        // return('hi');
        // exit();
        
        $product = Product::where('slug',$slug)->first();
        if(empty($product))
        {
            abort(404);
        }

        $products_cat = Product::select('category_id')->where('slug',$slug)->first();
        $cat_id = $products_cat->category_id;
        $similerproducts = Product::where('category_id',$cat_id)->where('is_approved','1')->get();
        $produstReviews = ProductReview::where('product_id',$product->id);
         $reviews = $produstReviews->get();
        $userCount = $reviews->count();
        $avgRating = $produstReviews->avg('rating');

             $user = $product->user_id;
             $notification =' Your products are getting noticed. Someone has just visited ' .$product->title  .' to your Dealmih.';
            
            $model_id =$product->id;
            $model = "visit-product";
           
            singleuserNotification($user, $notification, $model_id, $model);

         
        return view('website.product.detail',compact('product','avgRating','slug','similerproducts','reviews'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
            }
        }

    /**
     * Show the form for headerCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function headerCategory()
    {
        try {

        $headerCategories = HeaderCategory::orderBy('order', 'ASC')->get();
        return view('website.product.header', compact('headerCategories'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
     }
    }
  
    /**
     * Show the form for create new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $slug)
    {
        try {
        // if($slug == 'services')
        //     {
        //        return view('website.services.create');
        //     }
        $muncipalities =[];
  
        $headerCategories = HeaderCategory::where('slug', $slug)->first();


        if (empty($headerCategories)) {
            abort(404);
        }
        $districts = District::orderBy('district_name', 'DESC')->get();
        $categories = Category::where([['header_category_id', $headerCategories->id],['categories_id',0]])->select('id', 'category_name')->get();
        
        
        $user = Auth::user();
        
        $userDetail = UserDetail::where('user_id',$user->id)->first();
         if(isset($userDetail))
        {
        $muncipalities = Municipality::where('district_id',$userDetail->district_id)->get();
        }

       
        return view('website.product.create', compact('headerCategories', 'categories', 'districts','slug','user','userDetail','muncipalities'));
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
    public function store(ProductRequest $request)
    {
        try{
     
      //dd($request->all());
        $page = $request->page;

        $pageStatus = [];
        if ($page != null) {
         
            return response()->json([
                'status' => true,
                'pageStatus' => $page,
                'message' => "success"
            ]);
        }
        //dd($request->all());
        DB::beginTransaction();
       
        try
        {
            $slug = str_slug($request->title, '-');

            $checkslug = Product::where('slug',$slug)->get();

            if(count($checkslug) > 0){
              $slug = $slug.'-'.rand(100,1000);
              //print_r($slug);
            }
            


        if($request->category_id == 326){

            $data = $request->all();
            $data['sub_category'] = $data['category_id'];
            $product = Product::create($data);

        }else {

            $product = Product::create($request->all());

        }

        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit;
     

        $kmDelivery = $request->km_delivery;  
        $media = $request->media;
        $inputTypes = $request->input_type ;
        $selectTypes = $request->select_type;
        $radioTypes = $request->radio_type;
        $checkboxTypes = $request->checkbox_type;
        $productUpdate = Product::where('id',$product->id)->first();
       
        $mainImage = $request->file('image');
        $sellerImage = $request->file('seller_image');
        $productUpdate->user_id = Auth::user()->id;
        $productUpdate->slug = $slug;
        if ($request->hasFile('image')) {
            $productUpdate->image  = ImageUploadWithPath($mainImage, 'product-image');
          }
          if ($request->hasFile('seller_image')) {
            $productUpdate->seller_image  = ImageUploadWithPath($sellerImage, 'seller-image');
          }
          if(isset($request->auction_price))
          {
            $productUpdate->auction_end_date = $request->auction_end_date;
          }
          if(isset($request->auction_price))
          {
              $productUpdate->is_auction = 1;
          }
        
          $productUpdate->category_id = $request->get('category_id');
          $productUpdate->save();
       
          
          ProductPropertyFeature::create([
              'product_id'=>$product->id,
              'property_type'=>$request->property_type,
              'bathrooms'=>$request->bathrooms,
              'listed_by'=>$request->listed_by,
              'facilities'=>$request->facilities,
              'floor_no'=>$request->floor_no,
              'facing'=>$request->facing,
              'land_area'=>$request->land_area,
               'land_area_unit_number'=>$request->land_area_unit_number,
              'bedrooms'=>$request->bedrooms,
              'furnished'=>$request->furnished,
              'car_parking'=>$request->car_parking,
              'project_name'=>$request->project_name,
              'youtube_url'=>$request->youtube_url,
              'longitude'=>$request->address_longitude,
              'location'=>$request->location,
              'latitude'=>$request->address_latitude,
              'available_date'=>$request->available_date,
              'existing_flatemate'=>$request->existing_flatemate,
              'property_use'=>$request->property_use,
              'carpet_area'=>$request->carpet_area
        ]);   
        if($kmDelivery)
            {
                foreach($kmDelivery as $kmDeliveryData)
                    {
                        ProductDeliveryLocation::create([
                            'product_id'=>$product->id,
                            'district_id'=>$kmDeliveryData
                        ]);
                    }
            }

          if($request->hasFile('media'))
            {
                if($media)
                    {
                        foreach($media as $mediaImage)
                            {
                                // dd($mediaImage);
                                ProductMedia::create([
                                    'product_id'=>$product->id,
                                    'file'=>ImageUploadWithPath($mediaImage, 'product-multi-image')
                                ]);
                            }
                    }
            }
    
            // input type 
            if($inputTypes)
                {
                    foreach($inputTypes as $key => $inputType)
                        {
                            if(isset($inputType))
                            {
                            ProductData::create([
                                'product_id'=>$product->id,
                                'input_type'=>1,
                                'feature_data_id'=>$key,
                                'feature_data_text'=>$inputType
                            ]);
                        }
                        }
                }

             // checkbox type 
            if($checkboxTypes)
                {
                    foreach($checkboxTypes as $key => $checkboxType)
                        {
                            if(isset($checkboxType))
                            {
                            ProductData::create([
                                'product_id'=>$product->id,
                                'input_type'=>3,
                                'feature_data_id'=>$key,
                                'feature_data_text'=>$checkboxType
                            ]);
                        }
                        }
                }

                // select type 
            if($selectTypes)
            {   
              
                foreach($selectTypes as $keys => $selectType)
                    {
                        if(isset($selectType))
                            {
                            ProductData::create([
                                'product_id'=>$product->id,
                                'input_type'=>2,
                                'feature_data_id'=>$selectType,
                                'features_id'=>$keys
                            ]);
                        }
                    }
            }

            $firebaseToken = User::where('id',1)->pluck('device_token');
          
            $SERVER_API_KEY = 'AAAAAPmMO9E:APA91bG62Y1v2UfWvbYFZw9iKsml2m20e966tStD7TehlptrfYoEIHyYa1VIFkbDY3o3uhU_Wg_8vWNsE3trn4GlEpz0wzszRqfuX4borJHrWOkzRazntMY92Ss-0UAwdT8Nbo1qiZLk';
      
            $data = [
                "registration_ids" => $firebaseToken,
                "notification" => [
                    "title" => "New Listing",
                    "body" => "New listing of ".$request->title." has been create successfully",  
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

            $data = ['username'=>Auth::user()->username,'product'=>$product->title];
         //   userNotification($user, $notification, $model_id, $model);
        $user = Auth::user()->id;
        $user_name = Auth::user()->username;
        $notification ='Thankyou! You have successfully added ' .$product->title . ' on our Dealmih. You will soon get notified regarding your product when admin will approve your product.';
        $admin_notification = $user_name . ' has successfully added '  .$product->title .'to your Dealmih. Kindly review and approve it by visiting products tab.';
        $model_id =$product->id;
        $model = "product-create";

           userNotification($user,$notification,$admin_notification,$model_id, $model);
           
            Mail::to(Auth::user()->email)->queue(new UserRegistrationMail('listing-product', $data));
            DB::commit();
            $check = Category::Select('header_category_id')->where('id',$request->get('category_id'))->first();
            $header_cat_data = HeaderCategory::where('slug', $request->get('slug'))->first();
           
            if($check->header_category_id != '4'){

                   //return redirect('manage-ads/'.$request->get('category_id'))->with('success', 'Your listing has been submitted successfully and is under review by our admin team. We will notify you once it will be live or need any changes!');
                return redirect('manage-ads/'.$header_cat_data->id)->with('success', 'Your listing has been submitted successfully and is under review by our admin team. We will notify you once it will be live or need any changes!');
                
            }else {
                return redirect('job-profile/?job_post=active')->with('success', 'Your listing has been submitted successfully and is under review by our admin team. We will notify you once it will be live or need any changes!');
            }

            
            
        }

        catch(Exception $e)
        {
            // dd('ja');
            dd($e);
            DB::rollback();
            return redirect()
            ->back()
            ->with('error', 'Whoops, looks like something went wrong try again later');
        }
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
    public function edit($productslug)
    {
        try {

        $product = Product::where('slug',$productslug)->first();

        if(empty($product))
        {
            abort(404);
        }
        $categoryId = $product->category_id;
        $category = Category::find($categoryId);
        $headerCategories = HeaderCategory::where('id', $category->header_category_id)->first();
        // dd($category);
        $slug = $headerCategories->slug;
        if (empty($headerCategories)) {
            abort(404);
        }
        $districts = District::orderBy('district_name', 'DESC')->get();
        $categories = Category::where([['header_category_id', $headerCategories->id],['categories_id',0]])->select('id', 'category_name')->get();
        $subCategories = Category::where('categories_id',$product->category_id)->get();
        $muncipalities = Municipality::where('district_id',$product->district)->get();
        $villages = Village::where('district_id',$product->district)->get();
        $user = Auth::user();
        return view('website.product.edit', compact('headerCategories', 'categories', 
        'districts','slug','product','subCategories','muncipalities','villages','user'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
       /*try{*/
      
        $request->request->remove('_token');
        $mainImage = $request->file('image');
        $media = $request->media;
        
        $sellerImage = $request->file('seller_image');
        $kmDelivery = $request->km_delivery;  
        $selectTypes = $request->select_type;
        $checkboxTypes = $request->checkbox_type;

        // dd($sellerImage);
        $all = $request->all();

        /*echo '<pre>';
        print_r($all);
        echo '</pre>';
        exit();*/
        $product = Product::where('id',$id)->update($request->except(['property_type', 'bathrooms', 'listed_by','facilities','floor_no','facing','land_area','bedrooms','furnished','car_parking','project_name','youtube_url','longitude','location','latitude','available_date','existing_flatemate','property_use','carpet_area','land_area_unit_number','select_type','input_type','checkbox_type','media','km_delivery','delivery', 'hidd_name', 'hidd_phone','is_contact_person','hidden_imgupload','mainnewimage']));
   

        Product::where('id',$id)->update(['is_approved'=>'0', 'auction_end_date'=>$request->auction_end_date, 'feature_data_model_id'=>$request->feature_data_model_id, 'delivery_service'=>$request->delivery_service, 'is_contact_person'=>$request->is_contact_person]);
        //$product = Product::where('id',$id)->update($request->all());
        $productUpdate= Product::where('id',$id)->first();
      
        if ($request->hasFile('image')) {
            $productUpdate->image  = ImageUploadWithPath($mainImage, 'product-image');
          }else{
            $mainImage = $request->file('image');
          }
          if ($request->hasFile('seller_image')) {
            $productUpdate->seller_image  = ImageUploadWithPath($sellerImage, 'seller-image');
          }
            if($request->hasFile('media'))
            {
                if($media)
                    {
                        foreach($media as $mediaImage)
                            {
                                // dd($mediaImage);
                                ProductMedia::create([
                                    'product_id'=>$id,
                                    'file'=>ImageUploadWithPath($mediaImage, 'product-multi-image')
                                ]);
                            }
                    }
            }
          $productUpdate->save();
          if($kmDelivery)
          {
            ProductDeliveryLocation::where('product_id',$id)->delete();
              foreach($kmDelivery as $kmDeliveryData)
                  {
                      ProductDeliveryLocation::create([
                          'product_id'=>$id,
                          'district_id'=>$kmDeliveryData
                      ]);
                  }
          }
          
          // checkbox type 
          if($checkboxTypes)
          {
            foreach($checkboxTypes as $key => $checkboxType)
            {
                if(isset($checkboxType))
                {
                    ProductData::where('product_id', $id)->where('input_type', '3')->update([
                            'feature_data_id'=>$key,'feature_data_text'=>$checkboxType
                    ]);
                }
            }
          }
          if($selectTypes)
          {   
            foreach($selectTypes as $keys => $selectType)
            {
                if(isset($selectType))
                {
                    ProductData::where('product_id', $id)->where('input_type', '2')->where('features_id', $keys)->update([
                            'feature_data_id'=>$selectType
                    ]);
                }
            }
          }
               $data = ['username'=>Auth::user()->username,'product'=>$request->title];
                //   userNotification($user, $notification, $model_id, $model);
                $user = Auth::user()->id;
                $user_name = Auth::user()->username;
                $notification ='Your changes to ' .$request->title . ' have been successfully made to your Dealmih.  You will soon get notified regarding your product when admin will approve your product.';
                $admin_notification = $user_name . ' has just edited '  .$request->title .'to your Dealmih. Kindly review and approve it by visiting products tab.';
                $model_id =$productUpdate->id;
                $model = "product-update";
                       
             userNotification($user,$notification,$admin_notification,$model_id, $model);

        $check = Category::Select('header_category_id')->where('id',$request->get('category_id'))->first();
         
       
        if($check->header_category_id != '4'){

            if(Auth::user()->role_id == '1'){

                    return redirect('manage-ads')->with('success', 'Congrats Your product is updated successfully.');
            }else {

                 return redirect('manage-ads')->with('success', 'Congrats Your product is updated successfully. It will be visible after admin approval.');

            }   

            
        }else {
            return redirect('job-profile')->with('success', 'Congrats Your product is updated successfully. It will be visible after admin approval.!');
        }
    
          //return redirect('/dashboard/products', )
          //return redirect('/dashboard/products')
          // ->back()
          //->with('success', 'Your ads has been updated successfully!');
        /*}catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
        }*/
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

    public function subCategory(Request $request)
    {
        try {
        $id = $request->id;
        $category = Category::find($id);
        $categories = Category::where('categories_id', $id)->select('id', 'category_name')->get();
       
        // $html = view('website.product.sub-category', [
        //     'categories' => $categories
        // ])->render();
        return response()->json([
            'status' => true,
            'message' => "sub category list",
            'data' => $categories,
            'subCategory'=>$categories,
            'count'=>$categories->count(),
            'categorySlug'=>$category->slug
        ], 200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}
    public function featureData(Request $request)
    {
        try {

        $id = $request->id;
        if($request->product_id){
            $product_id = $request->product_id;
            $product = Product::where('id', $product_id)->first();
            $product_data = ProductData::where('product_id', $product->id)->first();
        } else {
            $product_data = array();
        }
        
        $category = Category::find($id);
        $features = Feature::where('categories_id', $id)->orderBy('order_no','DESC')->get();
        $html = view('website.product.feature-data', [
            'features' => $features, 'product_data'=>$product_data
            
        ])->render();
        return response()->json([
            'status' => true,
            'message' => "feature data",
            'data' => $html,
            'categorySlug'=>$category->slug
            
        ], 200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}
    public function municipality(Request $request)
    {
        try {
        $id = $request->id;
        if($id == 0){
            $data = Municipality::orderBy('municipality_name', 'ASC')->get();
        $village = Village::orderBy('name','ASC')->get();
        }else{
        $data = Municipality::where('district_id', $id)->orderBy('municipality_name', 'ASC')->get();
        $village = Village::where('district_id',$id)->orderBy('name','ASC')->get();
        }
        return response()->json([
            'status' => true,
            'message' => "municipality name",
            'data' => $data,
            'village'=>$village
        ], 200);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}
    public function productBid(ProductBidRequest $request)
    {
        try {

        if($request->productId){
            $productid = $request->productId;
            $bidprice = $request->bidPrice;
            $normalProduct = Product::select('price','auction_price')->where('id',$productid)->first();
            $select_price = ProductBid::select('price')->where('product_id',$productid)->latest('price')->first();
            // dd($normalProduct);
            if($select_price != null)
            {
            $actual_price = $select_price->price;
           
             if($actual_price>$bidprice)
             {
                
                return response()->json([
                    'status'=>false,
                    'message'=>"lowbid",
                    'price'=>$actual_price
                ]);
                
              }
            }
            else
            {
                $price = isset($normalProduct->auction_price)? $normalProduct->auction_price : $normalProduct->price ; 


             if($price>$bidprice)
             {
                
                return response()->json([
                    'status'=>false,
                    'message'=>"lowbid",
                    'price'=>$price
                ]);
                
              }
            
            }
            
         }

        ProductBid::create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->productId,
            'price'=>$request->bidPrice
        ]);

        $product = Product::where('id',$request->productId)->first();

        $firebaseToken = User::where('id',$product->user_id)->pluck('device_token');
          
        $SERVER_API_KEY = 'AAAAAPmMO9E:APA91bG62Y1v2UfWvbYFZw9iKsml2m20e966tStD7TehlptrfYoEIHyYa1VIFkbDY3o3uhU_Wg_8vWNsE3trn4GlEpz0wzszRqfuX4borJHrWOkzRazntMY92Ss-0UAwdT8Nbo1qiZLk';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => "Product Bid",
                "body" =>  "Bid of price ". $request->bidPrice." has been apply to product ".$product->title,  
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
    


        return response()->json([
            'status'=>true,
            'message'=>"successfully bid"
        ]);


    }
    catch (\Exception $e) {
           throw new \App\Exceptions\LogData($e);    
       }
    }
    public function productDelete(Request $request)
    {
        try {

        $id = $request->id ;
        Product::find($id)->delete();
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}
    public function productReview(ProductReviewRequest $request,$slug,$product)
    {
        try {

        ProductReview::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>"you have successfully created"
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}

     public function deleteProductuser(Request $request)
    {
        try {

        $id = $request->id;
        $product = user::where('id',$id)->update([
            'avatar'=>Null
        ]);
        return response()->json([
            'status'=>'ok',
            'message'=>'product sold'
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}


    public function productSold(Request $request)
    {
        try {

        $id = $request->id;
        $value = $request->value;
        $product = Product::where('id',$id)->update([
            'is_sold'=>$value
        ]);
        return response()->json([
            'status'=>true,
            'message'=>'product sold'
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}
    public function productJobStatus(Request $request)
    {
        try {

        $id = $request->id;
        $value = $request->value;
        $product = Product::where('id',$id)->update([
            'is_sold'=>$value
        ]);
        return response()->json([
            'status'=>true,
            'message'=>'product sold'
        ]);
    }
    catch (\Exception $e) {

      
      }          throw new \App\Exceptions\LogData($e);    
}

    public function relist(Request $request)
    {
        try {

        $id = $request->id;
        $product = Product::find($id);
        $addDay = Carbon::now()->addDays(30);
        $product->created_at = $addDay;
        $product->save();
        return response()->json([
            'status'=>true,
            
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
}
}
    public function mediaDelete(Request $request)
    {
        try {
            $id = $request->id;
            ProductMedia::where('id',$id)->delete();
        } catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
    }
    public function saveProductVisitorHistory(Request $request)
    {
        try {
            $user_id = $request->user_id;
            $product_id = $request->product_id;
            $product_owner_id = $request->product_owner_id;
            $user_ip_address = $request->user_ip_address;
            $product_visitor_history_data = ProductVisitorHistory::where('product_id', $product_id)->where('user_ip_address', $user_ip_address)->first();
            if(empty($product_visitor_history_data)){
                $save_data = ProductVisitorHistory::insert(['user_id'=>$user_id, 'product_id'=>$product_id, 'product_owner_id'=>$product_owner_id, 'user_ip_address'=>$user_ip_address]);
                return response()->json([
                    'status'=>true,
                ]);
            } 
        } catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
    }
    public function SellerProductsListing(Request $request, $userId, $productId)
    {
        try {
    $products = DB::table('products')->where('user_id', $userId)->where('id', '!=', $productId)->where('is_approved','1')->get();
            return view('website.product.seller-product-listing', compact('products'));
        } catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
    }

     public function productview(Request $request)
    {
        try {

        $user = Auth::user();

        $startdate = Carbon::now()->format('Y-m-d');
        $enddate = Carbon::now()->subDays(30)->endOfDay()->format('Y-m-d');

        $productview = ProductView::select(
                            DB::raw('COUNT(*) AS count'),
                            DB::raw("(DATE_FORMAT(productview.created_at, '%d-%m-%Y')) as my_date"))
                            ->groupBy(DB::raw("DATE_FORMAT(productview.created_at, '%d-%m-%Y')"))
                            ->where('productview.created_at', '>', now()->subDays(30)->endOfDay())
                            ->where('productview.user_id', $user->id)
                            ->orderBy(DB::raw("DATE_FORMAT(productview.created_at,'%d-%m-%Y')"), 'asc')
                            ->get();

        foreach($productview as $pview){


            $opn[] = array(
                'x' => $pview->my_date,
                'y' => $pview->count
            );


        }


        return view('website.dashboard.product-analytics',compact('opn','startdate','enddate'));
           
            
        } catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
    }

     public function DateWiseProductView(Request $request)
    {
        
         $user = Auth::user();

        $stardate = $request->startdate;
        $enddate = $request->enddate;

       
        $productview = ProductView::select(
            DB::raw('COUNT(*) AS count'),
            DB::raw("(DATE_FORMAT(productview.created_at, '%d-%m-%Y')) as my_date"))
            ->groupBy(DB::raw("DATE_FORMAT(productview.created_at, '%d-%m-%Y')"))
            
            
            ->where('productview.user_id', $user->id)
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

     public function SingleProductView(Request $request)
    {
       try { 

        $user = Auth::user();

        $date = $request->date;


        $singleproductview =  ProductView::select(DB::raw('products.title,COUNT(*) AS count'))
                    ->join('products', 'productview.product_id', '=', 'products.id')
                    ->where(DB::raw("(DATE_FORMAT(productview.created_at,'%d-%m-%Y'))"), "=", $date)
                     ->where('productview.user_id', $user->id)
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

}
