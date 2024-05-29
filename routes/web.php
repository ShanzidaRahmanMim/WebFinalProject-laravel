<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function(){
    Route::get('/','Index')->name('Home');
});
Route::controller(ClientController::class)->group(function(){
    Route::get('/category{id}/{slug}','CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}','SingleProduct')->name('singleproduct');
    Route::get('/add-to-cart','AddToCart')->name('addtocart');
    Route::post('/add-product-to-cart','AddProductToCart')->name('addproducttocart')->middleware('auth');
    Route::get('/shipping-address','GetShippingAddress')->name('shippingaddress');
    Route::post('/add-shipping-address','AddShippingAddress')->name('addshippingaddress');
    Route::post('/place-order','PlaceOrder')->name('placeorder');
    Route::get('/pay-online/{total}','PayOnline')->name('payonline');
    Route::post('/stripe/{total}', 'stripePost')->name('stripe.post');
    Route::get('/checkout','Checkout')->name('checkout');
    Route::get('/user-profile','UserProfile')->name('userprofile')->middleware('auth');
    Route::get('/user-profile/pending-orders','PendingOrders')->name('pendingorders')->middleware('auth');
    Route::get('/user-profile/logout','Logout')->name('logout');
    Route::get('/search','Search')->name('search');
    Route::get('/products/{slug}','Show')->name('products_show');


    Route::get('/new-release','NewRelease')->name('newrelease');
    Route::get('/todays-deal','TodaysDeal')->name('todaysdeal');
    Route::get('/customer-service','CustomerService')->name('customerservice');
    Route::get('/remove-cart-item/{id}','RemoveCartItem')->name('removeitem'); 
});
//Route::get('/userprofile',[DashboardController::class,'Index']);
Route::controller(DashboardController::class)->group(function()
{
    Route::get('/admin/login','Login')->name('login');
    Route::post('/admin/login-submit','LoginSubmit')->name('login_submit');
    route::get('/admin/logout','Logout')->name('logout');
    Route::get('/admin/registration','Registration')->name('registration');
    Route::get('/admin/forget-password','ForgetPassword')->name('forget_password');
    Route::post('/admin/forget-password-submit','ForgetPasswordSubmit')->name('forget_password_submit');
    Route::get('/reset-password/{token}/{email}','ResetPassword')->name('reset_password');
    Route::post('/admin/reset-password-submit','ResetPasswordSubmit')->name('reset_password_submit');
    Route::post('/admin/registration-submit','RegistrationSubmit')->name('registrationsubmit');
    Route::get('/registration/verify/{token}/{email}','VerifyRegistration')->name('verifyregistration');
    Route::get('/admin/dashboard','Index')->name('admindashboard')->middleware('admin');
    


        
});
Route::controller(CategoryController::class)->group(function()
{
    Route::get('/admin/all-category','Index')->name('allcategory')->middleware('admin');
    Route::get('/admin/add-category','AddCategory')->name('addcategory')->middleware('admin');
    Route::post('/admin/store-category','StoreCategory')->name('storecategory')->middleware('admin');    
    Route::get('/admin/edit-category/{id}','EditCategory')->name('editcategory')->middleware('admin'); 
    Route::post('/admin/update-category','UpdateCategory')->name('updatecategory')->middleware('admin');       
    Route::get('/admin/delete-category/{id}','DeleteCategory')->name('deletecategory')->middleware('admin'); 
});
Route::controller(SubCategoryController::class)->group(function()
{
    Route::get('/admin/all-subcategory','Index')->name('allsubcategory')->middleware('admin');
    Route::get('/admin/add-subcategory','AddSubCategory')->name('addsubcategory')->middleware('admin');   
    Route::post('/admin/store-subcategory','StoreSubCategory')->name('storesubcategory')->middleware('admin');    
    Route::get('/admin/edit-subcategory/{id}','EditSubCategory')->name('editsubcat')->middleware('admin');   
    Route::get('/admin/delete-subcategory/{id}','DeleteSubCategory')->name('deletesubcat')->middleware('admin');
    Route::post('/admin/update-subcategory','UpdateSubCat')->name('updatesubcat')->middleware('admin'); 
});
Route::controller(ProductController::class)->group(function()
{
    Route::get('/admin/all-products','Index')->name('allproducts')->middleware('admin');
    Route::get('/admin/add-product','AddProduct')->name('addproduct')->middleware('admin');   
    Route::post('/admin/store-product','StoreProduct')->name('storeproduct')->middleware('admin');
    Route::get('/admin/edit-product-img/{id}','EditProductImg')->name('editproductimg')->middleware('admin');
    Route::post('/admin/update-product-img','UpdateProductImg')->name('updateproductimg')->middleware('admin');
    Route::get('/admin/edit-product/{id}','EditProduct')->name('editproduct')->middleware('admin');
    Route::post('/admin/update-product','UpdateProduct')->name('updateproduct')->middleware('admin');
    Route::get('/admin/delete-product/{id}','DeleteProduct')->name('deleteproduct')->middleware('admin');
});
Route::controller(OrderController::class)->group(function()
{
    Route::get('/admin/pending-order','Index')->name('pendingorder');
    Route::post('/admin/orders/confirm/{id}','confirmOrder')->name('admin.orders.confirm');
    
    Route::post('/admin/orders/remove/{id}', 'removeOrder')->name('admin.orders.remove');


});