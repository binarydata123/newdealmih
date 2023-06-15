<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/media', 'Admin\CategoryController@media');
Route::get('/dashboard', 'Admin\DashBoardController@index');
Route::get('/transaction', 'Admin\DashBoardController@transaction');


// Route::get('/pages', 'Admin\CategoryController@media');


Route::prefix("category")->group(function () {
    Route::get('/', 'Admin\CategoryController@index');
    Route::post('/create', 'Admin\CategoryController@create');
    Route::get('/list', 'Admin\CategoryController@categoryList');
    Route::get('/edit/{id}', 'Admin\CategoryController@edit');
    Route::post('/update/{id}', 'Admin\CategoryController@update');
    Route::post('/delete/{id}', 'Admin\CategoryController@destroy');
});


Route::prefix("register")->group(function () {
    Route::post('/user-register', 'Api\RegisterController@user_register');
});



Route::prefix("feature")->group(function () {
    Route::get('/', 'Admin\FeatureController@index');
    Route::post('parent/{id}', 'Admin\FeatureController@parentFeature');
    Route::post('featuredata/{id}', 'Admin\FeatureController@parentFeatureData');
    Route::post('/create', 'Admin\FeatureController@create');
    Route::get('/edit/{id}', 'Admin\FeatureController@edit');
    Route::post('/update/{id}', 'Admin\FeatureController@update');

    Route::get('/data/{id}', 'Admin\FeatureController@featureData');

    Route::post('featureData/session', 'Admin\FeatureController@featureSessionData');
    Route::post('/delete/{id}', 'Admin\FeatureController@destroy');
    Route::post('/featureDataModel/{id}', 'Admin\FeatureController@featureDataModel');
    Route::get('/featureDataModel/{id}', 'Admin\FeatureController@featureDataModelList');

});

Route::prefix("header-category")->group(function () {
    Route::get('/', 'Admin\HeaderController@index');
    Route::post('/create', 'Admin\HeaderController@create');
    Route::get('/edit/{id}', 'Admin\HeaderController@edit');
    Route::post('/update/{id}', 'Admin\HeaderController@update');
    Route::post('/delete/{id}', 'Admin\HeaderController@destroy');
    Route::post('/main-category/{id}', 'Admin\HeaderController@mainCategory');
    Route::get('/header-category-list', 'Admin\HeaderController@headerCategoryList');
});
Route::prefix("products")->group(function () {
    Route::get('/', 'Admin\ProductController@index');
    Route::post('/status-change/{id}', 'Admin\ProductController@statusChange');
    Route::post('/action-status/{id}', 'Admin\ProductController@actionStatus');
    Route::get('/getcategoryproducts/{id}/{sort}', 'Admin\ProductController@getCategoryProducts');
    Route::get('/sortCategoryProducts/{status}', 'Admin\ProductController@sortCategoryProducts');
    Route::post('/delete/{id}', 'Admin\ProductController@destroy');
    Route::get('/productview', 'Admin\ProductController@ProductView');
    Route::post('/singleproductview/{date}', 'Admin\ProductController@SingleProductView');
    Route::post('/Datewiseproductview/', 'Admin\ProductController@DateWiseProductView');
});
Route::prefix("orders")->group(function () {
    Route::get('/', 'Admin\OrderController@index');
    Route::get('/single-user-orders/{id}', 'Admin\OrderController@SingleUserOrders');
    Route::post('/status-change/{id}', 'Admin\OrderController@statusChange');
    Route::post('/action-status/{id}', 'Admin\OrderController@actionStatus');
    Route::get('/details/{id}', 'Admin\OrderController@CustomerDetail');
    Route::get('/order-product-details/{id}', 'Admin\OrderController@OrderProductDetail');

});
Route::prefix("users")->group(function () {
    Route::get('/', 'Admin\AuthController@userList');
    Route::get('/details/{id}', 'Admin\AuthController@userDetail');
    Route::post('/business-status-change/{id}','Admin\AuthController@businessStatusChange');
    Route::post('/status-change/{id}','Admin\AuthController@statusChange');


});
Route::prefix("cms")->group(function () {
    Route::get('/', 'Admin\CMSController@index');
    Route::post('/create', 'Admin\CMSController@create');
    Route::get('/edit/{id}', 'Admin\CMSController@edit');
    Route::post('/update/{id}', 'Admin\CMSController@update');
});
Route::prefix("email-template")->group(function () {
    Route::get('/', 'Admin\EmailTemplate@index');
    Route::post('/create', 'Admin\EmailTemplate@store');
    Route::get('/edit/{id}', 'Admin\EmailTemplate@edit');
    Route::post('/update/{id}', 'Admin\EmailTemplate@update');
});
Route::prefix("notification-email-template")->group(function () {
    Route::get('/single-email-template/{id}', 'Admin\UserNotificationEmailController@singleEmailTemplate');
    Route::post('/send-email', 'Admin\UserNotificationEmailController@sendEmailNotification');
});
Route::prefix("commission")->group(function () {
    Route::get('/', 'Admin\CommissionController@index');
    Route::get('/edit/{id}', 'Admin\CommissionController@edit');
    Route::post('/update/{id}', 'Admin\CommissionController@update');
});
Route::prefix("ads")->group(function () {
    Route::get('/', 'Admin\CMSController@index');
    Route::post('/create', 'Admin\CMSController@create');
    Route::get('/edit/{id}', 'Admin\CMSController@edit');
    Route::post('/update/{id}', 'Admin\CMSController@update');
});
Route::prefix("web-ads")->group(function () {
    Route::get('/', 'Admin\WebAdsController@index');
    Route::post('/create', 'Admin\WebAdsController@create');
    Route::get('/edit/{id}', 'Admin\WebAdsController@edit');
    Route::post('/update/{id}', 'Admin\WebAdsController@update');
});
Route::prefix("errors")->group(function () {
    Route::get('/', 'Admin\ErrorController@errList');
    Route::get('/edit/{id}', 'Admin\ErrorController@edit');
  
});
Route::prefix("settings")->group(function () {
    Route::get('/', 'Admin\SettingController@index');
    Route::post('/update/{id}', 'Admin\SettingController@update');
});
Route::prefix("notification")->group(function () {
    Route::get('/', 'Admin\NotificationController@index');
     Route::get('/delete', 'Admin\NotificationController@destroy');
});

// Route::post('/products', 'ProductController@store');
// Route::get('/products', 'ProductController@index');
// Route::get('/prices', 'ProductController@prices');

// Route::get('/customer', 'ProductController@index');
// Route::post('/customer', 'CustomerController@store');
// Route::get('/customer/{id}', 'CustomerController@show');
// Route::put('/customer/{id}', 'CustomerController@update');
// Route::delete('/customer/{id}', 'CustomerController@destroy');

// Route::get('/menus', 'MenusController@index');

// Route::post('/register', [App\Http\Controllers\AuthenticationController::class, 'store']);
// Route::get('/user', [App\Http\Controllers\AuthenticationController::class, 'user']);

// Route::post('/login', [App\Http\Controllers\AuthenticationController::class, 'login']);

// Route::group(['middleware' => 'auth:api'], function() {
//     Route::post('logout', [App\Http\Controllers\AuthenticationController::class, 'logout']);
// });

// Route::group([
//     'namespace' => 'Auth',
//     'middleware' => 'api',
//     'prefix' => 'password'
// ], function () {
//     Route::post('create', [App\Http\Controllers\ForgotPasswordController::class, 'create']);
//     Route::get('find/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'find']);
//     Route::post('reset', [App\Http\Controllers\ForgotPasswordController::class, 'reset']);
// });

// Route::get('/redirect', function () {
//     $query = http_build_query([
//         'client_id' => 'client-id',
//         'redirect_uri' => 'http://example.com/callback',
//         'response_type' => 'code',
//         'scope' => 'place-orders check-status',
//     ]);
//     return redirect('http://your-app.com/oauth/authorize?' . $query);
// });
