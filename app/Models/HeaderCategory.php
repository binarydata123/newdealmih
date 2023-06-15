<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','ne_name'];
    public function category()
    {
        return $this->hasMany(Category::class,'header_category_id');
    }
    public function getheadercategory(){
        $headercategory = HeaderCategory::get();
        return $headercategory;
    }
}
