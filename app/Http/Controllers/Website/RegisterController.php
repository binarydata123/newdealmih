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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $districts = District::orderBy('district_name', 'ASC')->get();
        return view('website.register', compact('districts'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */  

    public function create(UserRequest $request)
    {
        
     try{
        // return "hi";
        // exit;
        
        $page = $request->page;

        $pageStatus = '';
        
        $media = $request->media;

        $find1 = strpos($request->email, '@');
        $find2 = strpos($request->email, '.');

        if($find1 !== false && $find2 !== false && $find2 > $find1){

            $user = User::where('email',$request->email)->first();

             if($user){

                 return redirect()->back()->with('message', 'The Email is already in use');

             }else {
                $otp = random_int(100000, 999999);

                $myNewData = $request->request->add(['otp' => $otp]);

                $data= $request->all();

                 $user = User::create([
                    'role_id' => 2,
                    'is_approve_store'  => 0,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'password' => Hash::make($request->password),
                    'otp' => $otp
                   
                    ]);


                $args = http_build_query(array(
                'auth_token'=> 'df887210072e6e717525828c874de35cd3870473fb3c6ca18d2cd007f53f5616',
                'from'  => $request->email,
                'to'    => $request->email,
                'text'  => $otp." is your otp to proceed on dealmih"));
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
                
                Mail::to($user->email)->queue(new UserRegistrationMail('register', $data));
                Mail::to('support@dealmih.com')->queue(new UserRegistrationMail('admin', $data));
 
            
                return redirect('/otpregsiter/'.$user->id);
                  }

           
            
        }else {

       
            // return "hi";
            // exit;

            $user = User::where('phone_number',$request->email)->first();

            if($user){

                return redirect()->back()->with('message', 'The Phone number is already in use');

            }else {



                $otp = random_int(100000, 999999);

                $myNewData = $request->request->add(['otp' => $otp]);

                $data= $request->all();

                $user = User::create([
                'role_id' => 2,
                'username' => $request->username,
                'phone_number' => $request->email,
                'password' => Hash::make($request->password),
                'otp' => $otp
        
                ]);


                $args = http_build_query(array(
                'auth_token'=> 'df887210072e6e717525828c874de35cd3870473fb3c6ca18d2cd007f53f5616',
                'from'  => $request->email,
                'to'    => $request->email,
                'text'  => $otp." is your otp to proceed on dealmih"));
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
               
                Mail::to($user->email)->queue(new UserRegistrationMail('register', $data));

                return redirect('/otpregsiter/'.$user->id );

            }

            
        }

        }catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
       
    }
    /**
     * forgotPassword view 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        try {

        return view('website.forgot-password');
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Update forgoted password
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forgotPasswordUpdate(Request $request)
    {
        $email = $request->email;
        $message = "";
        $status = "";
        $checkUser = User::where('email', $email);
        $user = $checkUser->first();
        $checkUserExist= $checkUser->exists();

       
        if($checkUserExist == 1){

            $otp = random_int(100000, 999999);

            $otpudpate  = User::where('email', $request->email)->update(['otp' => $otp]);

             $data = ['otp' => $otp,'username' => $user->username];

            Mail::to($email)->queue(new UserRegistrationMail('otp-password-reset', $data));
          
            return redirect('/change-password/'.$user->id )->with('success', 'Otp for password reset email has been succesfully sent to to your email');

        }else {

            return redirect()->back()->with('error', 'Email not exists');

        }

       



     try {
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * show change password page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        try {

        return view('website.change-password');
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequestUpdate $request, $id)
    {
        try {

        // return $request;
        //   dd($request->all());
        $page = $request->page;

        $pageStatus = '';
        if ($page != null) {
            $pageStatus = $page;
            return response()->json([
                'status' => true,
                'pageStatus' => $pageStatus,
                'message' => "success"
            ]);
        }
      
        $companyCoverPic = $request->company_cover_pic;
        $companyLogo = $request->company_log;
        $media = $request->media;
        $user = User::where('id', $id)->update([

            'username' => $request->username,
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'address' => $request->address,
            'is_contacted_person' => $request->is_contact_person,
            'is_business' => $request->is_business,
            'is_store' => $request->is_store
        ]);

        $userDetails = UserDetail::updateOrCreate(
                [
                    'user_id' => $id,
                ],
                [
                    'mucipality_id' => $request->municipality,
                    'district_id' => $request->district,
                    'village_id' => $request->village,
                    'pincode' => $request->pincode,
                    'address_one' => $request->address_one,
                    'address_two' => $request->address_two,
                   
                ]
            );
        $address_update = Address::updateOrCreate(
                [
                    'user_id' => $id,
                ],
                [
                    'mucipality_id' => $request->municipality,
                    'district_id' => $request->district,
                    'village_id' => $request->village,
                    'pincode' => $request->pincode,
                    'address_one' => $request->address_one,
                    'address_two' => $request->address_two,
                    'type' => 'home',
                ]
            );
        if ($request->is_business == 1) {
            $updateBusinessDetails = UserDetail::updateOrCreate(
                    [
                        'user_id' => $id,
                    ],
                    [
                        'business_reg_number' => $request->business_reg_number,
                        'business_name' => $request->business_name,
                        'business_tax_number' => $request->business_tax_no,
                        'about_company'=>$request->about_company,
                        'category_id'=>$request->category_id,
                        'term'=>$request->term
                    ]
                );
                if ($request->hasFile('company_cover_pic')) {
                    UserDetail::where('user_id',$id)->update([
                        'company_cover_pic' => ImageUploadWithPath($companyCoverPic, 'company-cover-pic')
                    ]);
                }
                if ($request->hasFile('company_log')) {
                    UserDetail::where('user_id',$id)->update([
                        'company_log' => ImageUploadWithPath($companyLogo, 'company-logo')
                    ]);
                }
                
            if ($request->is_contact_person == 1) {
                BusinessContact::updateOrCreate([
                    'user_id' => $id,
                ], [

                    'first_name' => $request->person_first_name,
                    'last_name' => $request->person_last_name,
                    'email' => $request->person_email,
                    'gender' => $request->person_gender,
                    'd_o_b' => $request->person_dob,
                    'phone_number' => $request->person_phone_no
                ]);
               
            }

            if ($request->hasFile('media')) {
                if ($media) {
                    foreach ($media as $mediaImage) {
                        UserDocument::create([
                            'user_id' => $id,
                            'document' => ImageUploadWithPath($mediaImage, 'user-document')
                        ]);
                    }
                }
            }
        }

        if ($request->is_business == 1) {
        return redirect()
            ->back()
            ->with('success', 'Your profile has been updated successfully and is under review by the admin.');
         }

         else {
             
            return redirect('/profile')
            ->with('success-msg', 'Your profile has been updated successfully.');

             }

}
catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generateOTP(){
        $otp = mt_rand(1000,9999);
        return $otp;
    }

    public function submitForm($request){
        try {

        $args = http_build_query(array(
            'auth_token'=> 'df887210072e6e717525828c874de35cd3870473fb3c6ca18d2cd007f53f5616',
            'to' => $request->person_phone_no,
            'text'  => 'fsfsfs'));
    $url = "https://sms.aakashsms.com/sms/v3/send/";

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
  catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    // update password 

    public function updatePassword(ChangePassword $request)
    {
        try {

        $id = Auth::user()->id;
        $user = User::find($id);
        $status = "";
        $message = "";
     
            $user->password = Hash::make($request->new_password);
            $user->save();
            $status = true;
            $message = "You have successfully changed your Password";
            
              $notify = new UserNotification;
              $notify->notifiable_user_id = $id;
              $notify->model ="changed-password";
              $notify->notification = 'Congrats! You have successfully changed your password on Dealmih.' .'Now you will have to use this password for Login again in Dealmih.';
             $notify->save();
                       
            
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);

    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function profileImageupdate(Request $request)
    {
        try {

        $image = $request->image;
        $id = Auth::user()->id;
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $user->avatar = ImageUploadWithPath($image, 'avatar');
            $user->save();
        }

        return redirect()->back();
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
    public function redirectToGoogle()
    {
         return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

           $user = Socialite::driver('google')->stateless()->user();
  
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/');
            } else {
                $newUser = User::create([
                    'role_id' => 2,
                    'username' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456')
                ]);

                Auth::login($newUser);

                return redirect('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

   

    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->stateless()->user();
           
            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/');
            } else {
                $newUser = User::create([
                    'role_id' => 2,
                    'username' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => encrypt('123456')
                ]);

                Auth::login($newUser);

                return redirect('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function redirectToAppleID()
    {
         
        return Socialite::driver("sign-in-with-apple")
            ->scopes(["name", "email"])
            ->redirect();
    }

    
public function handleAppleIDCallback(Request $request)
    {



        $user = Socialite::driver("sign-in-with-apple")
            ->user();
        
        if(!empty($user->email)){

            $finduser = User::where('apple_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/');
            } else {

                $fullname = $user->email;
                $name = substr($fullname, 0, strpos($fullname, '@'));

                $newUser = User::create([
                    'role_id' => 2,
                    'username' => $name,
                    'email' => $user->email,
                    'apple_id' => $user->id,
                    'password' => encrypt('123456')
                ]);

                Auth::login($newUser);

                return redirect('/');
            }

        }else {

            return redirect('/');
        }

    }

    public function otpresetPassword(Request $request,$id)
    {
         $userid = $id;

         return view('auth.custom_password_reset.otp_password_reset',compact('userid'));
    }

    public function otpresetPasswordUpdate(Request $request,$id)
    {
        try {

        $UserDetail  = User::Select('otp')->where('id',$id)->first();

        if($UserDetail->otp == $request->otp){

             return redirect('/change-password/'.$id );

        }else {

             return redirect()->back()->with('error', 'The OTP is incorrect please enter the correct otp');

        }
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function changePasswordReset(Request $request ,$id)
    {

        return view('auth.custom_password_reset.change_password',compact('id'));
        
    }


    public function change_reset_password(Request $request)
    {
       
        $UserDetail  = User::Select('otp')->where('id',$request->userid)->first();

        if($UserDetail->otp == $request->otp){

                $request->validate([
               'password'=>'required|min:8|regex:/^.*(?=.{3,})(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/',
               'confirm_password'=>'required|same:password'
                    ]);

                $userData = User::where('id',$request->userid);
                $userUpdate = $userData->update([
                    'password'=> Hash::make($request->password),
                     'otp'  => null,
                     'last_login' => new \DateTime
                ]);
                $user = $userData->first();
                $credentials = [
                    'email' => $user->email,
                    'password' => $request->password,
                ];
                Auth::attempt($credentials, true, true);
                return redirect('/')->with('success', 'Password has been reset successfully welcome to dashboard page');;

        }else {


             return redirect()->back()->with('message', 'The OTP is incorrect please enter the correct otp');

        }
 try {
        
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
}
