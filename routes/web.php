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
    Route::get('/checkout','Checkout')->name('checkout');
    Route::get('/user-profile','UserProfile')->name('userprofile');
    Route::get('/new-release','NewRelease')->name('newrelease');
    Route::get('/todays-deal','TodaysDeal')->name('todaysdeal');
    Route::get('/customer-service','CustomerService')->name('customerservice');
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
    Route::get('/admin/dashboard','Index')->name('admindashboard')->middleware('auth');

        
});
Route::controller(CategoryController::class)->group(function()
{
    Route::get('/admin/all-category','Index')->name('allcategory');
    Route::get('/admin/add-category','AddCategory')->name('addcategory');
    Route::post('/admin/store-category','StoreCategory')->name('storecategory');    
    Route::get('/admin/edit-category/{id}','EditCategory')->name('editcategory'); 
    Route::post('/admin/update-category','UpdateCategory')->name('updatecategory');       
    Route::get('/admin/delete-category/{id}','DeleteCategory')->name('deletecategory'); 
});
Route::controller(SubCategoryController::class)->group(function()
{
    Route::get('/admin/all-subcategory','Index')->name('allsubcategory');
    Route::get('/admin/add-subcategory','AddSubCategory')->name('addsubcategory');   
    Route::post('/admin/store-subcategory','StoreSubCategory')->name('storesubcategory');    
    Route::get('/admin/edit-subcategory/{id}','EditSubCategory')->name('editsubcat');   
    Route::get('/admin/delete-subcategory/{id}','DeleteSubCategory')->name('deletesubcat');
    Route::post('/admin/update-subcategory','UpdateSubCat')->name('updatesubcat'); 
});
Route::controller(ProductController::class)->group(function()
{
    Route::get('/admin/all-products','Index')->name('allproducts');
    Route::get('/admin/add-product','AddProduct')->name('addproduct');   
    Route::post('/admin/store-product','StoreProduct')->name('storeproduct');
    Route::get('/admin/edit-product-img/{id}','EditProductImg')->name('editproductimg');
    Route::post('/admin/update-product-img','UpdateProductImg')->name('updateproductimg');
    Route::get('/admin/edit-product/{id}','EditProduct')->name('editproduct');
    Route::post('/admin/update-product','UpdateProduct')->name('updateproduct');
    Route::get('/admin/delete-product/{id}','DeleteProduct')->name('deleteproduct');
});
Route::controller(OrderController::class)->group(function()
{
    Route::get('/admin/pending-order','Index')->name('pendingorder');
    
});