<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class ProductVisitorHistory extends Model
{
    use HasFactory;
    protected $table = 'product_visitor_history';
    protected $fillable = [
        'user_id', 'product_id', 'product_owner_id', 'user_ip_address'
    ];
}
