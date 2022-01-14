<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCoupons;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminCoupons;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCoupons;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeCategory;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminOrder;
use App\Http\Livewire\Admin\AdminOrderDetails;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSale;
use App\Http\Livewire\Admin\AdminSettings;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankYou;
use App\Http\Livewire\User\UserChangePassword;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrderDetails;
use App\Http\Livewire\User\UserOrders;
use App\Http\Livewire\User\UserReview;
use App\Http\Livewire\Wishlist;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home');

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/wishlist', Wishlist::class)->name('product.wishlist');

Route::get('/thank-you', ThankYou::class)->name('thankyou');

Route::get('/contact-us', ContactComponent::class)->name('contact');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.add-category');
    Route::get('/admin/category/edit/{category_slug}/{subcategory_slug?}', AdminEditCategoryComponent::class)->name('admin.edit-category');

    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.add-product');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.edit-product');

    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', AdminHomeCategory::class)->name('admin.homecategories');

    Route::get('/admin/sale', AdminSale::class)->name('admin.sale');

    Route::get('/admin/coupons', AdminCoupons::class)->name('admin.coupons');
    Route::get('/admin/coupons/add', AdminAddCoupons::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCoupons::class)->name('admin.editcoupon');

    Route::get('/admin/orders', AdminOrder::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}', AdminOrderDetails::class)->name('admin.orderdetails');

    Route::get('/admin/admin-contact', AdminContactComponent::class)->name('admin.contact');

    Route::get('/admin/settings', AdminSettings::class)->name('admin.settings');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

    Route::get('/user/orders', UserOrders::class)->name('user.orders');
    Route::get('/user/orders/{order_id}', UserOrderDetails::class)->name('user.orderdetails');

    Route::get('/user/review/{order_item_id}', UserReview::class)->name('user.review');

    Route::get('/user/change-password', UserChangePassword::class)->name('user.changepassword');
});