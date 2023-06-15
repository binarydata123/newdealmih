<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailTemplateRequest;
use App\Models\EmailTemplate as ModelsEmailTemplate;
use Illuminate\Http\Request;
use App\Mail\UserRegistrationMail;
use Mail;

class UserNotificationEmailController extends Controller
{
    public function singleEmailTemplate($id){
        $template_data = ModelsEmailTemplate::where('id', $id)->first();
        return response()->json([
            'status'=>true,
            'message'=>"you have successfully updated",
            'data'=>$template_data
        ]);
    }
    public function sendEmailNotification(Request $request){
        $user_data = $request->UserData;
        $email = $request->emailData;
        //dd($user_data);
        foreach($user_data as $userdata) {
            $notfication_data = ['name'=>$userdata['username'], 'title' => $email['title'], 'subject' => $email['subject'], 'email_body' => $email['email_body']];
            Mail::to($userdata['email'])->queue(new UserRegistrationMail('user-notification', $notfication_data));
        }
        return response()->json([
            'status'=>true,
            'message'=>"Email send successfully.",
            'data'=> ''
        ]);
    }
}
