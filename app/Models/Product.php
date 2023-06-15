<?php

namespace App\Models;

use App\User;
use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description', 'is_biding',
        'price', 'category_id', 'sub_category','min_sub_category','pick_up', 'district', 'municipality', 'village', 'address_one',
        'address_two', 'seller_first_name', 'seller_last_name', 'seller_phone', 'image', 'auction_end_date','header_category_id',
        'seller_image', 'is_auction', 'auction_price', 'quantity', 'type', 'salary_scal', 'job_type', 'duration', 'service_about',
        'service_offered', 'area_service', 'availability_timing', 'company_name', 'company_email','pay_type','is_sold','delivery_service','status','is_approved','is_buynow','feature_data_model_id','location','address_latitude','address_longitude','delivery_charges'
    ];
    public function districtList()
    {
        return $this->belongsTo('App\Models\District', 'district', 'district_id');
    }
    public function municipalityList()
    {
        return $this->belongsTo('App\Models\Municipality', 'municipality', 'municipality_id');
    }
    public function villageList()
    {
        return $this->belongsTo('App\Models\Village', 'village', 'id');
    }
    public function wishList()
    {
        return $this->hasOne(Wishlist::class, 'product_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category');
    }
    public function media()
    {
        return $this->hasMany(ProductMedia::class, 'product_id');
    }
    public function productBidPrice()
    {
        return $this->hasOne(ProductBid::class, 'product_id')
            ->latest('price')->orderBy('price');
    }
    public function userList()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function productBid()
    {
        return $this->hasMany(ProductBid::class, 'product_id');
    }
    public function productBidLatest()
    {
        return $this->hasMany(ProductBid::class, 'product_id')->latest('price')->limit(10);
    }
    public function userDetails()
    {
        return $this->belongsTo('App\Models\UserDetail', 'user_id', 'user_id');
    }

    public function propertyFeature()
    {
        return $this->hasOne(ProductPropertyFeature::class,'product_id');
    }
    public function orderProduct()
    {
        return $this->belongsTo('App\Models\OrderProduct','id','product_id');
    }
    public function productDelivery($productId,$districtId)
    {
        return $this->hasOne(ProductDeliveryLocation::class,'product_id')->where([['product_id',$productId],['district_id',$districtId]])->first();
    }
    public function productDeliveryLocation()
    {
        return $this->hasMany(ProductDeliveryLocation::class,'product_id');
    }
    public function productDataList()
    {
        return $this->hasMany(ProductData::class,'product_id');
    }
    
    public function getcat($id){


    $category = Product::Select('categories.id as id','category_name')->where('categories.header_category_id','!=',4)->where('user_id', $id)->join('categories','products.category_id','=','categories.id')->distinct()->get();
        return $category;



    }

    public function getjobs($id){


    $products = Product::Select('products.id as id','products.slug as productslug','image','title','type','price','products.created_at as productcreated','job_type','salary_scal','is_approved', 'is_sold','products.seller_image')->where('categories.header_category_id','=',4)->where('user_id', $id)->join('categories','products.category_id','=','categories.id')->distinct()->orderBy('id','DESC')->get();


        return $products;
    }

    public function Msgcount($id){

         $chatProducts = Product::join('chats','chats.product_id','products.id')
        ->where('chats.sender_id',$id)->orWhere('chats.receiver_id',$id)
        ->select('products.*')
        ->groupBy('chats.product_id')->latest()->get();

        $msg = $chatProducts->count();
        
        return $msg;
    }

    public function MessagesCount($id){
        $chatProducts = Chat::where('sender_id', '!=', $id)->Where('receiver_id',$id)->where('is_read', '0')->latest()->get();
        $msg = $chatProducts->count();
        return $msg;
    }

   
    
}
