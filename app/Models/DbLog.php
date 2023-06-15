<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DbLog extends Model
{
    use HasFactory;
    protected $table='errors';
    protected $fillable = ['id','user_id','error','line_no','browser','function_name'];
}
