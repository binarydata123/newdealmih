<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable =['sender_id','receiver_id','message','date','time','is_read','product_id','unqiue_id'];

    public function user()
    {
        return $this->hasOne('App\User','id','sender_id'); 
    }

}
