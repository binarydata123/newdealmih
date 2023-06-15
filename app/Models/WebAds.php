<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebAds extends Model
{
    use HasFactory;
    protected $fillable = ['title','ne_title','image','image_url','page','content'];
}
