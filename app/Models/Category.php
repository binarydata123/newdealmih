<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name','category_nepal_name', 'slug', 'categories_id', 'thumbnail', 'icon_class', 'step', 'status', 'is_featured', 'header_category_id'];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
    public function interestedCategories()
    {
        return $this->hasOne(InterestedCategory::class,'category_id')->where('user_id',Auth::user()->id);
    }
    public function subCategory()
    {
        return $this->hasMany(Category::class,'categories_id');
    }
    
    // public function slug($id){
    //     $slug = Category::Select('header_categories.id as id','header_categories.slug')->join('header_categories','categories.header_category_id','=','header_categories.id')->where('header_categories.slug','jobs')->get();
    //     return $slug;
    // }
}
