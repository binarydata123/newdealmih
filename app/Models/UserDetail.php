<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','business_reg_number','business_name','business_tax_number','mucipality_id',
    'district_id','pincode','address_one','address_two','term',
    'about_company','category_id','company_cover_pic','company_log','village_id'];
    public function userMuncipality()
    {
        return $this->belongsTo('App\Models\Municipality','mucipality_id','municipality_id'); 
    }
    public function muncipality()
    {
        return $this->hasOne('App\Models\Municipality','municipality_id','mucipality_id'); 
    }

    public function village()
    {
        return $this->hasOne('App\Models\Village','id','village_id'); 
    }

    public function district()
    {
        return $this->hasOne('App\Models\District','district_id','district_id'); 
    }

   
}
