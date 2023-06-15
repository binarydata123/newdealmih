<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','number','pincode','locality','address','type','district_id',
    'municipaliti_id','village_id','address_one','address_two'];


    public function district()
    {
        return $this->hasOne('App\Models\District','district_id','district_id'); 
    }
    

    public function userMuncipality()
    {
        return $this->belongsTo('App\Models\Municipality','mucipality_id','municipality_id'); 
    }
    public function muncipality()
    {
        return $this->hasOne('App\Models\Municipality','municipality_id','municipaliti_id'); 
    }

     public function village()
    {
        
        return $this->hasOne('App\Models\Village','id','village_id'); 
    }


    
}
