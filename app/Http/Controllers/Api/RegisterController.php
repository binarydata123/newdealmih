<?php

namespace App\Http\Controllers\Api;

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
use App\Models\Address;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use GeneaLabs\LaravelSocialiter\Facades\Socialiter;
use Laravel\Socialite\Facades\Socialite;
use App\Models\UserNotification;
use App\Http\Requests\Website\RestPasswordRequest;



class RegisterController extends Controller
{

    public function user_register(UserRequest $request)
    {
        
     try{
        //return "hi";
        // exit;
        
        //$page = $request->page;

        //$pageStatus = '';
        
        //$media = $request->media;

        $find1 = strpos($request->email, '@');
        $find2 = strpos($request->email, '.');

        if($find1 !== false && $find2 !== false && $find2 > $find1){

            $user = User::where('email',$request->email)->first();

             if($user){

                return response()->json(['status'=>'success','message'=>'The Email is already in use']);

                //  return redirect()->back()->with('message', 'The Email is already in use');

             }else {
                $otp = random_int(100000, 999999);

                //$myNewData = $request->request->add(['otp' => $otp]);

                //$data= $request->all();

                 $user = User::create([
                    'role_id' => 2,
                    'is_approve_store'  => 0,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'password' => Hash::make($request->password),
                    'otp' => $otp
                   
                    ]);
                    
                // $args = http_build_query(array(
                // 'auth_token'=> 'df887210072e6e717525828c874de35cd3870473fb3c6ca18d2cd007f53f5616',
                // 'from'  => $request->email,
                // 'to'    => $request->email,
                // 'text'  => $otp." is your otp to proceed on dealmih"));
                // $url = "https://sms.aakashsms.com/sms/v3/send";

                // # Make the call using API.
                // $ch = curl_init();
                // curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_POST, 1); ///
                // curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                // // Response
                // $response = curl_exec($ch);
                // curl_close($ch);  

                return response()->json(['status'=>'success','data'=>$user]);
                
                // Mail::to($user->email)->queue(new UserRegistrationMail('register', $data));
                // Mail::to('support@dealmih.com')->queue(new UserRegistrationMail('admin', $data));
                // return redirect('/otpregsiter/'.$user->id);
                  }
        }else {

            // return "hi";
            // exit;

            $user = User::where('phone_number',$request->email)->first();

            if($user){

                return response()->json(['status'=>'success','message'=>'The Phone number is already in use']);

                // return redirect()->back()->with('message', 'The Phone number is already in use');

            }else {

                $otp = random_int(100000, 999999);

                //$myNewData = $request->request->add(['otp' => $otp]);

                //$data= $request->all();

                $user = User::create([
                'role_id' => 2,
                'username' => $request->username,
                'phone_number' => $request->email,
                'password' => Hash::make($request->password),
                'otp' => $otp
        
                ]);
                // $args = http_build_query(array(
                // 'auth_token'=> 'df887210072e6e717525828c874de35cd3870473fb3c6ca18d2cd007f53f5616',
                // 'from'  => $request->email,
                // 'to'    => $request->email,
                // 'text'  => $otp." is your otp to proceed on dealmih"));
                // $url = "https://sms.aakashsms.com/sms/v3/send";

                // # Make the call using API.
                // $ch = curl_init();
                // curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_POST, 1); ///
                // curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                // // Response
                // $response = curl_exec($ch);
                // curl_close($ch);  

                return response()->json(['status'=>'success','data'=>$user]);
               
                // Mail::to($user->email)->queue(new UserRegistrationMail('register', $data));

                // return redirect('/otpregsiter/'.$user->id );

            }
        }

        }catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
       
    }


}
