<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Feature;
use App\Models\HeaderCategory;
use App\Models\Product;
use App\Models\FeatureDataModel;
use Illuminate\Http\Request;
use App\Models\WebAds;

class SearchController extends Controller
{
    /**
     * Display Common search
     *
     * @return \Illuminate\Http\Response
     */
    private $_products;
    public function commonSearch(Request $request, $slug)
    {
        
        $url = $request->all();

     // dd($url);
        $subCategoryName = $request->subCategoryName;
        $urlSubCategory = isset($url['subCategory'][0]) ? $url['subCategory'][0]  : '';
        $urlminSubCategory = isset($url['minsubCategory'][0]) ? $url['minsubCategory'][0]  : '';

        $flatemate = $request->typeCategory;
        $propertyType = $request->property_type;
        $keyword = $request->search;
        $category = $request->category;
        $type = "";
        $isAuction = "";
        $subCategoryUrlValue = "";
        $keywordSubCategory = "";
        $keywordminsubCategory = "";
        if (isset($keyword[0]) ) {
            $keywordSubCategory = Category::where('categories.category_name', 'LIKE', '%' . $keyword[0] . '%')
            ->first();
        }
        if($urlSubCategory != null)
        {
            $subCategoryUrlValue = Category::where('categories.id', $urlSubCategory)
            ->first();

            // return $subCategoryUrlValue;
        }

        if($urlminSubCategory != null)
        {
            $minsubCategoryUrlValue = Category::where('categories.id', $urlminSubCategory)
            ->first();

            // return $subCategoryUrlValue;
        }else {
            $minsubCategoryUrlValue = null;
        }

        if ($keywordSubCategory != null) {
            
            $subCategory[] = $keywordSubCategory->id;
        } else 
        {
            
            $subCategory = $request->subCategory;
        }
        
        if ($keywordminsubCategory != null) {
            
            $minsubCategory[] = $keywordminsubCategory->id;
        } else 
        {
            
            $minsubCategory = $request->minsubCategory;
        }

         if(isset($request->type))
        {   

            $type = $request->type;

        }
        if(isset($request->is_auction))
        {
            $isAuction = $request->is_auction;
        }
       
        $selectOptionValue = $request->selectOption;
        $checkboxFeature = $request->checkboxFeature;
        $district = $request->district;
        $muncipality = $request->municipality;
        $village = $request->village;
        $price = $request->price;
        
        // dd($propertyType);
        // $propertyType = $request->property_type;
        $bathroom = $request->bathroom;
        $bedroom = $request->bedroom;
        $payType = $request->pay_type;
        // extra feature in job search listing page 
        $salary = $request->salary;
        // dd($salary);
        $jobType = $request->jobType;
        $duration = $request->duration;
        $maxPrice = $request->maxprice;
        $filter_status_type = $request->filter_status_type;

        // dd($price,$maxPrice);
        $districts = District::select('district_id', 'district_name')->orderBy('district_name', 'ASC')->get();
        $headerCategory = HeaderCategory::where('slug', $slug)->first();
        $webads = WebAds::where('page','property-left')->orWhere('page','property-right')->first();

    
        if(empty($headerCategory))
        {
            abort(404);
        }
        $headerCategoryName = $headerCategory->name;
        // dd($category[0]);
        $this->_products = Product::
        join('categories', 'categories.id', 'products.category_id')
            ->where('categories.header_category_id', $headerCategory->id)
            ->where(function ($q) use (
                $category,
                $subCategory,
                $minsubCategory,
                $district,
                $muncipality,
                $village,
                $price,$maxPrice,
                $salary,$jobType,
                $duration,$type,
                $isAuction,$propertyType,
                $keyword,$payType,$flatemate,$filter_status_type
            ) {

                if (isset($category[0])) {
                    // dd($category);
                    $q->whereIn('products.category_id', $category);
                }
                

                if (isset($subCategory[0])) {
                    $q->whereIn('sub_category', $subCategory);
                }

                if (isset($minsubCategory[0])) {
                    $q->whereIn('min_sub_category', $minsubCategory);
                }

                if ($district != null) {
                    $q->where('district', $district);
                }
                if ($muncipality != null) {
                    $q->where('municipality', $muncipality);
                }
                if ($village != null) {
                    $q->where('village', $village);
                }
                if (isset($price) && isset($maxPrice)) {

                         $q->whereBetween('price', [$price, $maxPrice]);
                    
                }else {
                    if(isset($maxPrice)){
                        $q->whereBetween('price', [100, $maxPrice]);
                    }
                    if(isset($price)){
                         $q->whereBetween('price', [$price, 10000]);
                    }
                }
                if($salary != null)
                {
                    $q->where('salary_scal',$salary);
                }
                if($jobType != null)
                {
                    $q->where('job_type',$jobType);
                }
                if($duration != null)
                {
                    $q->where('duration',$duration);
                }
                if($type != null)
                {
                    $q->whereIn('type',$type);
                }
                // if($type == 2)
                // {
                //     $q->where('type',$type);
                // }
                // if($type == 'lowest')
                // {
                //     $q->where('price','<',10000);
                // }
                // if($type == 'heighst')
                // {
                //     $q->where('price','>',10000);
                // }
                if($filter_status_type == 1){
                    $q->where('type', '1');
                }
                if($filter_status_type == 2){
                    $q->where('type', '2');
                }
                if($isAuction != null)
                {
                    $q->where('is_auction',$isAuction);
                }
                if(isset($keyword[0]) && $keyword[0] != null)
                {
                    
                    $q->orWhere('title', 'LIKE', '%' . $keyword[0] . '%');
                }
                if(isset($payType))
                {
                    $q->whereIn('pay_type',$payType);
                }
                if(isset($flatemate))
                {
                    $q->where('categories.slug',$flatemate);
                }
            });

        if ($selectOptionValue != null || $checkboxFeature != null) {
            $this->_products =  $this->_products->join('product_datas', 'product_datas.product_id', 'products.id')
                ->where(function ($q) use ($selectOptionValue, $checkboxFeature) {
                    if ($selectOptionValue != null) {
                        $q->whereIn('product_datas.feature_data_id', $selectOptionValue);
                    }
                    if ($checkboxFeature != null) {
                        $q->whereIn('product_datas.feature_data_id', $checkboxFeature);
                    }
                });
        }
        if(isset($propertyType) || isset($bedroom) || isset($bathroom) )
        {
           
            $this_products = $this->_products->join('product_property_features','product_property_features.product_id',
            'products.id')
            ->where( function ($q) use($propertyType,$bedroom,$bathroom)
            {
                if($propertyType != null)
                {
                    $q->whereIn('product_property_features.property_type',$propertyType);
                }
                if($bedroom != null)
                {
                    $q->where('product_property_features.bedrooms',$bedroom);
                }
                if($bathroom != null)
                {
                    $q->where('product_property_features.bathrooms',$bathroom);
                }
            });
        }
        if($filter_status_type == 'lowest'){
            $this->_products = $this->_products->orderBy('products.price','ASC');
        }
        if($filter_status_type == 'heighst'){
            $this->_products = $this->_products->orderBy('products.price','DESC');
        }
        if($type == 'lowest')
        {
            $this->_products = $this->_products->orderBy('products.price','ASC');
        }
        if($type == 'heighst')
        {
            $this->_products = $this->_products->orderBy('products.price','DESC');
        }
        $this->_products = $this->_products->select('products.*')->where([['products.is_approved',1],['products.is_sold',0]])->orderBy('products.id','DESC')
        // ->whereRaw('products.created_at + interval 30 day > ?', [now()])
        ->get(); //->toArray();
        $categories = Category::where([['header_category_id', $headerCategory->id], ['categories_id', 0]])->get(); //->toArray();
        $products = $this->_products;


        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";
        // exit;

        if ($request->ajax()) {
            if($slug == "jobs")
            {
                $html = view('website.search.jobs', [
                    'products' => $products,
                    'headerCategoryName'=>$headerCategoryName,
                    'subCategoryName'=>$subCategoryName
                ])->render();
            }elseif($slug == "property")
            {
                if($flatemate == 'flat-or-room-mates')
            {
              
                $html = view('website.search.property-flatemate-result', [
                    'products' => $products,
                    'headerCategoryName'=>$headerCategoryName,
                    'subCategoryName'=>$subCategoryName

                ])->render();
            }else
            {

                $html = view('website.search.property-result', [
                    'products' => $products,
                    'headerCategoryName'=>$headerCategoryName,
                    'subCategoryName'=>$subCategoryName

                ])->render();
            }
            }
            
            else
            {
            $html = view('website.search.result', [
                'products' => $products,
                'headerCategoryName'=>$headerCategoryName,
                'subCategoryName'=>$subCategoryName

            ])->render();
            }
            return response()->json([
                'status' => true,
                'message' => "search result",
                'html' => $html,
                'type' => $type
            ]);
        }
        // if($propertyType =="property-map-view")
        // {
        //     return view('website.property.mapview', compact('headerCategory', 
        //     'products', 'categories', 'districts', 'slug','headerCategoryName','type','isAuction'));
        // }

        if($slug =='property')
        {
            if($flatemate == 'flat-or-room-mates')
            {
                return view('website.property.flatemate',compact('headerCategory', 
                'products', 'categories', 'districts', 'slug','headerCategoryName','type','isAuction','flatemate','url','subCategoryUrlValue','subCategoryName', 'filter_status_type'));
            }
            return view('website.property.listing', compact('headerCategory', 
        'products', 'categories', 'districts', 'slug','headerCategoryName','type',
        'isAuction','url','subCategoryUrlValue','subCategoryName', 'filter_status_type','webads'));
        }
        
        return view('website.search.index', compact('headerCategory', 
        'products', 'categories', 'districts', 'slug','headerCategoryName','type','isAuction','url','subCategoryUrlValue','subCategoryName','minsubCategoryUrlValue','filter_status_type'));
    
    }

    public function subCategory(Request $request)
    {
        try {

        $categoryId = $request->id;
        $subCategories = Category::where('categories_id', $categoryId)->select('id', 'category_name','slug','categories_id')->get();
        $category = Category::find($categoryId);
        $html = view('website.search.sub-category', [
            'subCategories' => $subCategories,
            'category' => $category,
            'categoryId' => $categoryId
        ])->render();
        return response()->json([
            'status' => true,
            'message' => 'sub category',
            'html' => $html,
            'categorySlug'=>$category->slug,
            'categoryId' => $categoryId


        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function featureData(Request $request)
    {
        try {

        $categoryId = $request->id;
        
        $category = Category::where('id',$categoryId)->first();
        // return $category;
        $features = Feature::where('categories_id', $categoryId)->get();
        $html = view('website.search.feature-data', [
            // 'categories' => $categories,
            // 'category'=>$category,
            'features' => $features,
            'categoryId' => $categoryId,
           
        ])->render();

        return response()->json([
            'status' => true,
            'message' => 'features',
            'html' => $html,
            'categorySlug'=>$category->slug
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function featureDataModel(Request $request)
    {
        try {

        $id = $request->dataId;
        $type = $request->type;
        $models = FeatureDataModel::where('feature_data_id',$id)->get();
        $html = '';
        if($type == 'list-product')
        {
            $html = view('website.search.feature-data-model',[
                'models'=>$models,
                'feature_data_id' => $id
            ])->render();
        } else {
            $html = view('website.search.feature-data-model',[
                'models'=>$models,
                'feature_data_id' => $id
            ])->render();
        }
        return response()->json([
            'status'=>true,
            'message'=>"feature data",
            'html'=>$html
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function productList(Request $request)
    {
        dd($request->all());
    }

    public function productSearch(Request $request)
    {
        try {

        $slug = $request['slug'];
        $query = $request['query'];
        $category = $request['category'];
        $header = HeaderCategory::where('slug', $slug)->first();

        $result = Category::where('categories.header_category_id', $header->id)
            ->where(
                function ($q) use ($category) {
                    if ($category != null) {
                        $q->where('categories.categories_id', $category);
                    }
                }
            )
            // ->where('products.title', 'LIKE', '%'. $query. '%')
            ->select('categories.id as id', 'categories.category_name as name')->get();
        return $result;
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
}
