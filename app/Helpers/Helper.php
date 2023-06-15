<?php

use Illuminate\Support\Facades\Auth;


if (!function_exists('userNotification')) {
  function userNotification($user,$notification,$admin_notification,$model_id, $model)
  {

      $not = \App\Models\UserNotification::insert([
        [
            'notifiable_user_id' => $user,
            'notification' => $notification,
            'model_id' => $model_id,
            'model' => $model,
        ],
        [
          'notifiable_user_id' => 0,
          'notification' => $admin_notification,
          'model_id' => $model_id,
            'model' => $model,
        ],
    ]);
  
  }
}

if (!function_exists('singleuserNotification')) {
  function singleuserNotification($user, $notification, $model_id, $model)
  {

      $not = new \App\Models\UserNotification;
      $not->notifiable_user_id = $user;
      $not->notification = $notification;
      $not->model_id = $model_id;
      $not->model = $model; 
      $not->save();
  }
}


?>