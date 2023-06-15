<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJobProfile extends Model
{
    use HasFactory;
    protected $fillable=['user_id','first_name','last_name','email','phone_number','upload','cover_letter'];

}
