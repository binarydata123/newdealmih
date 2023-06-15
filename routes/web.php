<?php
// A12345$

use App\Http\Controllers\Website\PaymentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\Common\Formats\Signature\Raw;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (App::environment('local')) {
    URL::forceScheme('https');
}

Artisan::call('view:clear');
Artisan::call('route:clear');
Artisan::call('config:clear');
Artisan::call('cache:clear');
Artisan::call('optimize:clear');

$DOMAIN = env('DOMAIN');
// Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('cancel', 'Website\PaymentController@cancel');
Route::post('approve', 'Website\PaymentController@approve');
Route::post('decline', 'Website\PaymentController@decline');
Route::group(['domain' => $DOMAIN], function () {
    Route::get('/', 'Website\HomeController@index')->name('home');
    // Route::post('register', 'Website\HomeController@create');

   
   // Route::post('/submitForm','RegisterController@submitForm');


    Route::post('checkphone', 'Admin\AuthController@checkphone');
    Route::get('otpregsiter/{id}', 'Website\OtpController@Otpregsiter');
    Route::post('checkotp', 'Website\OtpController@checkotp');
    Route::get('login', 'Admin\AuthController@showLoginForm')->name('login');
    Route::post('login', 'Admin\AuthController@login');
     //Route::get('login1', 'Admin\AuthController@showLoginForm')->name('login');
    Route::get('register', 'Website\RegisterController@index');
    Route::post('register', 'Website\RegisterController@create');
    Route::get('forgot-password', 'Website\RegisterController@forgotPassword');
    Route::post('forgot-password', 'Website\RegisterController@forgotPasswordUpdate');

    Route::get('otp-password-reset/{id}','Website\RegisterController@otpresetPassword');
    Route::get('change-password/{id}','Website\RegisterController@changePasswordReset');
    Route::post('change-reset-password','Website\RegisterController@change_reset_password');

    Route::get('product/detail/{slug}', 'Website\ProductController@detail');
    Route::post('save-product-visitor-history', 'Website\ProductController@saveProductVisitorHistory');

    Route::get('seller-products-listing/{userId}/{productId}', 'Website\ProductController@SellerProductsListing');

    Route::get('auth/google', 'Website\RegisterController@redirectToGoogle');
    Route::get('google/callback', 'Website\RegisterController@handleGoogleCallback');

     Route::get('a/apple/login', 'Website\RegisterController@redirectToAppleID');

      Route::post('a/apple/callback', 'Website\RegisterController@handleAppleIDCallback');

    Route::get('auth/facebook', 'Website\RegisterController@redirectToFacebook');
    Route::get('facebook/callback', 'Website\RegisterController@handleFacebookCallback');

    Route::get('motor-article', 'Website\MotorController@motorarticle');
    Route::get('motor-listing', 'Website\MotorController@motorlisting');
    Route::get('auction', 'Website\AuctionController@index');
    Route::group(['prefix' => 'motor'], function () {
        Route::get('/', 'Website\MotorController@index');
        Route::get('feature-data', 'Website\MotorController@featureData');
        Route::post('feature-data-model', 'Website\MotorController@featureDataModel');
        Route::post('brand-model', 'Website\MotorController@brandModel');

    });
    Route::group(['prefix' => 'property'], function () {
        Route::get('/', 'Website\PropertyController@index');
        Route::get('subcategory', 'Website\PropertyController@subCategory');
    });

    // Route::get('property-listing', 'Website\PropertyController@listing');

    // Route::get('property-map-view', 'Website\PropertyController@mapview');
    Route::get('map-view-listing', 'Website\PropertyController@mapviewlisting');
    Route::get('property-detail/{slug}', 'Website\PropertyController@propertydetail');
    Route::get('jobs', 'Website\JobsController@index');
    Route::get('jobs-detail/{slug}', 'Website\JobsController@detail');
    Route::get('apply-job', 'Website\JobsController@apply');
    Route::post('apply-job-submit', 'Website\JobsController@store');
    Route::get('job-review', 'Website\JobsController@review');

    Route::get('services', 'Website\ServicesController@index');
    Route::get('services-detail/{slug}', 'Website\ServicesController@detail');
    Route::post('services-detail/{slug}', 'Website\ServicesController@serviceFeedback');

    Route::get('stores', 'Website\StoresController@index');
    Route::get('store-profile/{slug}', 'Website\StoresController@storeprofile');
    //marketplace



    Route::group(['prefix' => 'marketplace'], function () {
        Route::get('/', 'Website\MarketplaceController@index');
    });
        Route::group(['prefix' => 'search'], function () {
        Route::get('{slug}', 'Website\SearchController@commonSearch');
        Route::post('sub-category', 'Website\SearchController@subCategory');
        Route::post('feature-data', 'Website\SearchController@featureData');
        Route::post('feature-data-model', 'Website\SearchController@featureDataModel');
    });
    Route::get('product-title', 'Website\SearchController@productSearch');

    Route::post('municipality', 'Website\ProductController@municipality');

    Route::group(['middleware' => ['auth']], function () {
        Route::post('register/edit/{id}', 'Website\RegisterController@update');
        Route::post('profile-image-update', 'Website\RegisterController@profileImageupdate');
        Route::get('header-category', 'Website\ProductController@headerCategory');
        Route::get('create/listing/{slug}', 'Website\ProductController@create');
        Route::get('/delete-product-user', 'Website\ProductController@deleteProductuser');
        Route::post('sub-category', 'Website\ProductController@subCategory');
        Route::post('feature-data', 'Website\ProductController@featureData');
        Route::post('create/product', 'Website\ProductController@store');
        Route::group(['prefix' => 'product'], function () {
            Route::post('delete', 'Website\ProductController@productDelete');
            Route::post('sold', 'Website\ProductController@productSold');
            Route::post('change-job-status', 'Website\ProductController@productJobStatus');
            Route::post('relist', 'Website\ProductController@relist');
            Route::get('edit/{slug}', 'Website\ProductController@edit');
            Route::post('edit/{slug}', 'Website\ProductController@update');
            Route::post('media/delete', 'Website\ProductController@mediaDelete');
            Route::get('productview', 'Website\ProductController@ProductView');
            Route::post('/datewiseproductview/', 'Website\ProductController@DateWiseProductView');
            Route::post('/singleproductview/', 'Website\ProductController@SingleProductView');

        });
      

        Route::get('place-feedback/{slug}/{product}', 'Website\ProductController@productReview');
        Route::get('profile', 'Website\HomeController@profile');
        Route::get('profile/edit', 'Website\HomeController@profileEdit');
        Route::post('profile/delete/{id}', 'Website\HomeController@destroy');

        Route::get('manage-ads/{catid?}', 'Website\HomeController@manageAds');
        Route::get('wishlist', 'Website\HomeController@wishlist');
        Route::post('wishlist', 'Website\HomeController@wishlistCreate');
        Route::post('wishlist/delete', 'Website\HomeController@wishlistDelete');

        Route::get('order', 'Website\HomeController@order');
        Route::get('products', 'Website\HomeController@product');
        Route::get('store-order', 'Website\HomeController@storeOrder');
        Route::post('return-order', 'Website\HomeController@returnOrder');
        Route::post('cancel-order/{id}', 'Website\HomeController@cancelOrder');
        Route::get('mystore', 'Website\HomeController@storeproduct');
        Route::get('seller-product', 'Website\HomeController@sallerproduct');
        Route::get('notification', 'Website\HomeController@notification');
        Route::post('notification/delete', 'Website\HomeController@notificationDelete');
        Route::post('allnotification/delete', 'Website\HomeController@clearallnotifications');

        Route::get('payment-method', 'Website\HomeController@paymentMethod');
        Route::post('payment-method', 'Website\HomeController@paymentMethodCreate');


        Route::get('address', 'Website\HomeController@address');
        Route::get('create/address', 'Website\HomeController@createAddress');
        Route::post('create/address', 'Website\HomeController@storeAddress');
        Route::post('address/delete', 'Website\HomeController@addressDelete');
        Route::get('edit/address/{id}', 'Website\HomeController@editAddress');
        Route::post('edit/address/{id}', 'Website\HomeController@updateAddress');
        Route::get('interested-category', 'Website\HomeController@interestedCategory');
        Route::post('interested-category', 'Website\HomeController@interestedCategoryCreate');
        // Route::get('messages{type?}', 'Website\HomeController@messages');
        Route::get('messages', 'Website\HomeController@messages');
        Route::post('send-message', 'Website\HomeController@storeMessages');
        Route::post('previous-messages', 'Website\HomeController@previousMessages');
        Route::post('delete-messages', 'Website\HomeController@deleteMessages');
        Route::post('clear-all-chats', 'Website\HomeController@ClearAllChats');
        Route::post('search-user', 'Website\HomeController@searchUser');
        Route::get('job-profile', 'Website\JobsController@jobProfile');
        Route::post('job-profile-submit', 'Website\HomeController@jobProfileStore');
        Route::get('apply-job-users/{id}', 'Website\JobsController@ApplyJobUsers');

        
        //cart
        Route::group(['prefix' => 'cart'], function () {
            Route::get('/', 'Website\PaymentController@cart');
            Route::post('/cartadd', 'Website\PaymentController@addToCart');
            Route::post('delete', 'Website\PaymentController@cartDelete');
            Route::post('quantity', 'Website\PaymentController@cartQuantity');
        });

        Route::get('change-password', 'Website\RegisterController@changePassword');
        Route::post('change-password', 'Website\RegisterController@updatePassword');
        Route::post('product/bid', 'Website\ProductController@productBid');

    Route::get('order-address/{carttype?}/{productslug?}', 'Website\PaymentController@address');
    Route::get('order-summary/{carttype?}/{productslug?}', 'Website\PaymentController@summary');
    Route::get('checkout', 'Website\PaymentController@index');
    Route::post('order', 'Website\PaymentController@order');
    Route::post('order-create', 'Website\PaymentController@orderCreate');
   
    Route::get('payment/success', 'Website\PaymentController@paymentSuccess');

    Route::get('payment/order-success', 'Website\PaymentController@paymentOrderSuccess');
  

    // Route::get('/cancel', [PaymentController::class, 'cancel']);

    



    });
    // admin  
    Route::group(['middleware' => ['admin']], function () {
        Route::get('email-template/edit/{id}', 'Admin\DashBoardController@emailTemplateEdit');
        Route::post('email-template/edit/{id}', 'Admin\DashBoardController@emailTemplateUpdate');
        Route::get('/cms/edit/{id}', 'Admin\DashBoardController@cmsTemplateEdit');
        Route::post('/cms/edit/{id}', 'Admin\DashBoardController@cmsTemplateUpdate');


    Route::group(['prefix' => 'dashboard/{any}'], function () {

        Route::get("/", function () {
            return view('home');
        })->where('any', '.*');
    });
    
       });
    // website 
    // Route::get("/{any}", function()
    // {
    // return view('website');
    // })->where('any', '.*');
});

Route::get('hi', 'Website\CmsPagesController@data');
Route::get('about', 'Website\CmsPagesController@about');
Route::get('terms', 'Website\CmsPagesController@terms');
Route::get('privacy', 'Website\CmsPagesController@privacy');
Route::get('advertising', 'Website\CmsPagesController@advertising');
Route::get('help', 'Website\CmsPagesController@help');
Route::get('contact', 'Website\CmsPagesController@contact');
Route::get('feedback', 'Website\CmsPagesController@feedback');
Route::get('nodata', 'Website\CmsPagesController@nodata');
Route::get('password-reset/{token}','Website\HomeController@resetPassword');
Route::post('password-reset/{token}','Website\HomeController@resetPasswordUpdate');

Route::get('/schedule-run', function() {
  $exitCode = Artisan::call('schedule:run');
  return '<h1>schedule run command success</h1>';
});



