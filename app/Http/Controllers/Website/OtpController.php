<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ChangePassword;
use App\Http\Requests\Website\ForgotPasswordRequest;
use App\Http\Requests\Website\UserRequest;
use App\Http\Requests\Website\UserRequestUpdate;
use App\Mail\UserRegistrationMail;
use App\Models\BusinessContact;
use App\Models\District;
use App\Models\UserDetail;
use App\Models\UserDocument;
use App\Models\Chat;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;

class OtpController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
   /// }


    public function Otpregsiter(Request $request,$id)
    {
         $userid = $id;

         return view('website.otpregsiter',compact('userid'));
    }

    public function checkotp(Request $request)
    {
        try {

        $id =  $request->userid;
        $UserDetail  = User::Select('otp')->where('id',$id)->first();

        if($UserDetail->otp == $request->otp){

            $user  = User::where('id',$id)->where('otp',$request->otp)->first();

            \Auth::login($user);
            Auth::user()->otp  = null;
            Auth::user()->last_login = new \DateTime;
            Auth::user()->active = 1;
            Auth::user()->save();

            return Redirect::to('/');

        }else {

             return redirect()->back()->with('message', 'The OTP is incorrect please enter correct otp');

        }
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    
}
