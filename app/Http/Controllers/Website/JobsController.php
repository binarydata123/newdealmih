<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cms;
use App\Models\WebAds;
use App\Models\District;
use App\Models\HeaderCategory;
use App\Models\JobApplication;
use App\Models\Product;
use App\Models\UserJobProfile;
use App\Models\ProductReview;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        try {
        $job = HeaderCategory::where('slug','jobs')->first();
        $products = Product::join('categories','categories.id','products.category_id')->join('users','products.user_id','users.id')
        ->where([['categories.header_category_id',$job->id],['products.is_approved',1]])->where('users.is_deleted','!=',1)
        ->select('products.*')->get(); //->toArray();
        // dd($products);

        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";

        // exit;

        $categories = Category::where([['header_category_id', $job->id], ['categories_id', 0]])->get();
        $districts = District::select('district_id', 'district_name')->orderBy('district_name', 'ASC')->get();
        $cms = Cms::where('page','Jobs')->first();
        $webads = WebAds::where('page','jobs')->orWhere('page','job-right')->first();
        
        return view('website.jobs.index',compact('products','categories','districts','cms','webads'));
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request,$slug)
    {
        try {
        $job = Product::where('slug',$slug)->first();
        $produstReviews = ProductReview::where('user_id',$job->user_id);
        $reviews = $produstReviews->get();
       $userCount = $reviews->count();
       $avgRating = $produstReviews->avg('rating');
        if(empty($job))
        {
            abort(404);
        }
       
      
        return view('website.jobs.detail',compact('job','slug','reviews','avgRating'));

         
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply(Request $request)
    {
        
        $slug = $request->slug;
        $user_id = Auth::user()->id;
        $job = Product::where('slug',$slug)->first();
        $jobprofile_data = JobApplication::where('user_id',$user_id)->first();
        $webads = WebAds::where('page','job-left')->first();
        

        if($jobprofile_data){
            $userprofile = JobApplication::join('user_job_profiles','user_job_profiles.user_id','job_applications.user_id')->where('user_job_profiles.user_id',$user_id)->first();
            
            
            return view("website.jobs.apply",compact('slug','userprofile','job','webads'));

       }
       
         return view("website.jobs.apply",compact('slug','job','webads'));
      try { 
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }




      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobProfile(Request $request)
    {
       try {

        $user_id = Auth::user()->id;

          $userprofile_data = UserJobProfile::where('user_id',$user_id)->first();
            if($userprofile_data){
        
            $userprofile = UserJobProfile::where('user_id',$user_id)->first();


       
            $jobapplication_data = JobApplication::where('user_id',$user_id)->get();
                if($jobapplication_data){
            
            $jobid= JobApplication::select('job_id')->where('user_id',$user_id)->get();
                 

                 $appliedjobs = Product::whereIn('id',$jobid)->orderBy('id','DESC')->get();

                 // echo "<pre>";
                 // print_r($appliedjobs);
                 // echo "</pre>";

                 // exit;

                
                //  $appliedjobs_profile =array();
                // foreach($jobid as $key){
                //  $appliedjobs = Product::where('id',$key['job_id'])->get();
                //  $appliedjobs_profile .=$appliedjobs;
                //     }
                  
                return view("website.dashboard.job-profile",compact('userprofile','appliedjobs'));
                
            }
             
             
       
            
            return view("website.dashboard.job-profile",compact('userprofile'));
        }

       
       

         return view("website.dashboard.job-profile");
       
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
   

    


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review()
    {
        return view("website.jobs.review");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
            $validator = Validator::make($request->all(), [
                'phonenumber' => 'required|numeric|min:10',
            ]);

            if ($validator->fails()) { 

              return redirect()->back()->with('message', 'Phone number is invalid');
            }

            $user_id = Auth::user()->id;
            $slug = $request->slug;
            $job = Product::where('slug',$slug)->first();

            $user = $job->user_id;
            $notification =' Hello! Someone has just applied to ' .$job->title  .' job that you had posted to your Dealmih.';
            
            $model_id =$job->id;
            $model = "visit-product";

        singleuserNotification($user, $notification, $model_id, $model);
          
            $jobapplication = UserJobProfile::updateOrCreate(
                ['user_id' => $user_id],
                [
                    'first_name' => $request->firstname,
                    'last_name' => $request->lastname,
                    'email' => $request->email,
                    'phone_number' => $request->phonenumber,
                    'cover_letter' => $request->coverletter
                ]
            );

            if ($request->hasFile('profile_file')) {
                $cvfile = $request->file('profile_file');
                $jobapplication->upload =  ImageUploadWithPath($cvfile, 'product-multi-image');
            }
            $jobapplication->save(); 
            if($request->slug){
                $slug = $request->slug; 
                $job = Product::select('id')->where('slug',$slug)->first();     
                $job_id = $job['id'];
                $jobapplication = JobApplication::updateOrCreate(
                    [
                        'user_id' => $user_id,
                        'job_id'=>$job_id
                    ]
                );
                
            }
            DB::commit();
            if($slug){
                return redirect('job-profile/?job-applied=active');
            }else{
            return redirect('job-profile/?job_profile=active')
            // ->back()
            ->with('success', 'Your details has been submitted successfully!');
        }
        try { 
        } catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    public function ApplyJobUsers(Request $request, $id){
        try{
            $jobapplication_data = JobApplication::where('job_id', $id)->get();
            $jobcount = $jobapplication_data->count();
            return view("website.dashboard.apply-job-users", compact('jobapplication_data','jobcount'));
        } catch (\Exception $e) {
            throw new \App\Exceptions\LogData($e);    
        }
    }
    
}
