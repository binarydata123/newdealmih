<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class UserNotification extends Model
{
    use HasFactory;

    public function notication($id){

         $countnotifications =  UserNotification::where([['notifiable_user_id',Auth::user()->id]])->get();
         
        $notifications = $countnotifications->count();

        return $notifications;

    }
}
