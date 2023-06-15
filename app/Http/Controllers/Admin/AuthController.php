<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Website\LoginRequest;
use App\Mail\UserRegistrationMail;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectTo;

    public function __construct()
    {
        if (Auth::check()) {
            return Redirect::to('/')->send();
        }

    }

    /**
     * Function Usage : Show login form
     *
     * @return \Illuminate\Http\Response
     */



    public function showLoginForm()
    {
        try {

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return Redirect::to('/dashboard/home');
            }
            return Redirect::to('/')->send();
        }
        if (Auth::check()) {
            \Auth::logout();
            \Session::flush();
            return view('admin.login');
        }

        return view('website.login');
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     *  Function Usage : Login
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {


        $sessionId = \Illuminate\Support\Facades\Session::getId();
        $sessionId = $sessionId ? $sessionId : "";

        $checkacount = User::select('is_deleted')->where('email','=',$request->get('email'))->orwhere('phone_number','=',$request->get('email'))->first();

        if($checkacount->is_deleted != '1') {

            if(empty($request->otp)){

                if(is_numeric($request->get('email')))
                {
                  $credentials = ['phone_number'=>$request->get('email'),'password'=>$request->get('password')];
                }
                else{
                    $credentials = $request->only('email', 'password');

                }

                
                $credentials['active'] = 1;

                if (Auth::attempt($credentials, true, true)) {
                    
                    $auth = true;
                    Auth::user()->last_login = new \DateTime;
                    Auth::user()->device_token = $request->device_token;
                    Auth::user()->save();
                    
                    if ($request->ajax()) {
                        
                        return response()->json([
                            'auth' => $auth,
                            'intended' => URL::previous()
                        ]);
                    } 
                    

                   $data = ['username'=>Auth::user()->username,'last_login'=>Auth::user()->last_login]; 
                   Mail::to('support@dealmih.com')->queue(new UserRegistrationMail('login',$data));
                    // else {
                     
                    //     return Redirect::to('/')->with('message', 'Invalid Credentials!');
                    // }
                    

                    if (Auth::user()->role_id == 2) {
                        return Redirect::to('/');
                    }
                    return Redirect::to('/dashboard/home');
                } else {
                    return redirect()->back()->with('message', 'The email or password you have entered is incorrect');
                }

                // }
                // else
                // {
                //     return redirect()->back()->withErrors($v->errors());
                // }
            }else {

                if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {

                    $user  = User::where('email',$request->email)->where('otp',$request->otp)->first();

                }else {

                    $user  = User::where('phone_number',$request->email)->where('otp',$request->otp)->first();

                }

                if($user){

                    \Auth::login($user);
                    Auth::user()->otp  = null;
                    Auth::user()->last_login = new \DateTime;
                    Auth::user()->device_token = $request->device_token;
                    Auth::user()->save();

                      return Redirect::to('/');

                }else {

                     return redirect()->back()->with('message', 'The Phone number and OTP is incorrect');

                }
               

            }

        } else {

             return redirect()->back()->with('message', 'You account has been deleted please contact to admin');
        }

         try {}
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     *  Function Usage : Logout
     *
     * @return mixed
     *
     */
    public function logout()
    {
        try {

        \Auth::logout();
        \Session::flush();


        return Redirect::to('admin/login')->with('message', 'Your are now logged out!');
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     *  Function Usage :Login as user
     *
     * @param Request $request
     * @return string
     */
    public function userLogin(Request $request)
    {
        try {

        $userKey = str_random(60);
        \App\User::where('id', $request->get('id'))->update(['token' => $userKey]);
        $url = env('APP_URL') . "/loginas/$userKey";

        if ($request->get('url')) {
            $url .= "?url=" . urlencode($request->get('url'));
        }

        return $url;
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function storeUser(Request $request)
    {
        try {

        $v = Validator::make($request->all(), [
            // 'userId' => 'required',
            'userId' => 'required|unique:users,username',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',

        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        } else {

            $authen = new \App\User;
            $authen->email = trim($request->input('email'));
            $authen->username = $request->input('userId');
            $authen->activation_token = csrf_token();
            $authen->firstname = $request->get('firstname');
            $authen->lastname = $request->get('lastname');
            $authen->role_id = 2;
            $authen->password = \Hash::make($request->input('password'));
            $authen->active = 1;
            $authen->created_by = 1;
            $authen->save();
            $userDetails = [
                'name' => $authen->firstname,
                'email' => $authen->email,
                'password' => $request->get('password')
            ];
            Mail::to($authen->email)->queue(new UserRegistrationMail('sub-admin-credential', $userDetails));
            return redirect()->back()->with('message', 'User Added');
        }
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function userList(Request $request)
    {
        try {
        $type = $request->type;
        $isStore = $request->isStore;
        $user = User::select('id','is_approve_store','username','email','phone_number','role_id',
        DB::raw('(CASE 
            WHEN users.is_approve_store = "1" THEN "Approved" 
            WHEN users.is_approve_store = "2" THEN "Rejected"
            ELSE "Pending" 
            END) AS status'),
            DB::raw('(CASE 
            WHEN users.active = "1" THEN "Approved" 
            WHEN users.active = "2" THEN "Rejected"
            ELSE "Pending" 
            END) AS active'),
            DB::raw('(CASE 
            WHEN users.role_id = "1" THEN "Admin" 
            WHEN users.role_id = "2" THEN "User"
            
            END) AS admin_user'))
     
        ->where(function($q) use($type)
        {
            if(isset($type))
            {
                $q->where([['is_business',1],['is_store','!=',1]])->orderBy('is_approve_store','ASC');

            }
        })
        ->where(function($q) use($isStore)
        {
            if(isset($isStore))
            {

            $q->where('is_store',1);
            
            }

        })->orderBy('id','DESC')->get();
        
        return response()->json([
            'status' => true,
            'message' => "user data",
            'data' => $user
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function userDetail(Request $request,$id)
    {
        try {


        $userDetails = User::where('id',$id)
        ->with('businessDetails', function ($q) 
        {
            $q->with('muncipality')->with('district')->with('village');
        })
        ->with('documents')
        ->select('id','username','email','gender','phone_number','facebook_id','google_id','apple_id','dob','address','is_business','active','avatar','is_approve_store')->first();
        return response()->json([
            'status'=>true,
            'message'=>"user details",
            'data'=>$userDetails
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function businessStatusChange(Request $request,$id)
    {
        try {

        $status = $request->status;
        $changeStatus = '';
        $user = User::where('id',$id);
        $userList = $user->first();
        $user->update([
            'is_approve_store'=> $status
        ],200);
        if($status == 1)
        {
            $changeStatus = 'approved';
        }else
        {
            $changeStatus = 'rejected';
        }
       

        $data = ['username'=>$userList->username,'status'=>$changeStatus];
        Mail::to($userList->email)->queue(new UserRegistrationMail('profile-approve', $data));

        return response()->json([
            'status'=>true,
            'message'=>"You have successfully ".$changeStatus
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function statusChange(Request $request, $id)
    {
        try {
 
        $status = $request->status;
        $changeStatus = '';
        $user = User::where('id',$id);

        if($status =='make-admin')
        {
            $user->update([
                'role_id'=>1
            ]);
        }elseif($status=='reject-admin')
        {
            $user->update([
                'role_id'=>2
            ]);
        }else{

        $userList = $user->first();
        $user->update([
            'is_approve_store'=>$status
        ],200);
        if($status == 1)
        {
            $changeStatus = 'approved';
        }else
        {
            $changeStatus = 'rejected';
        }
    }

        return response()->json([
            'status'=>true,
            'message'=>"You have successfully ".$changeStatus
        ]);

    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function checkphone(Request $request)
    {
        try {

        if (filter_var($request->mobile, FILTER_VALIDATE_EMAIL)) {
                 $User = User::where('email',$request->mobile)->first();
        }else {

            $User = User::where('phone_number',$request->mobile)->first();

        }

       
        if($User){

            $otp = random_int(100000, 999999);

            if (!filter_var($request->mobile, FILTER_VALIDATE_EMAIL)) {

                    $otpudpate  = User::where('phone_number', $request->mobile)->update(['otp' => $otp]);
                
                    if($otpudpate){

                        $args = http_build_query(array(
                        'auth_token'=> 'df887210072e6e717525828c874de35cd3870473fb3c6ca18d2cd007f53f5616',
                        'from'  => $request->mobile,
                        'to'    => $request->mobile,
                        'text'  => "Use" .$otp." as one time password (OTP) to login to your dealmih.com account. Please do not share this OTP to anyone for security reasons."));
                        $url = "https://sms.aakashsms.com/sms/v3/send";

                        # Make the call using API.
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, 1); ///
                        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                        // Response
                        $response = curl_exec($ch);
                        curl_close($ch);    
                    }
            
                    return response()->json([
                        'status'=>true,
                        'message'=>"You have successfully "
                    ]);
            }else {

                     $otpudpate  = User::where('email', $request->mobile)->update(['otp' => $otp]);

                    Mail::to($request->mobile)->queue(new UserRegistrationMail('login-email', ['otp' => $otp,'username' => $User->username]));
            }

        }else {

        
            return response()->json([
                'status'=>false,
                'message'=>"Invalid phone number"
            ]);
        }

    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
}
