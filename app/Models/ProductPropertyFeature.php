<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPropertyFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'property_type', 'bathrooms', 'listed_by', 'carpet_area', 'facilities', 'floor_no', 'facing', 'land_area', 'land_area_unit_number','bedrooms', 'furnished', 'total_floors', 'car_parking', 'project_name','youtube_url','latitude','longitude','available_date','existing_flatemate',
        'property_use','location'
    ];
}
