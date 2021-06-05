<?php

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

Route::get('/', function () {
    return view('frontend.pages.index');
});

//auth & user=====
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/rating/point', 'HomeController@ratingPoint')->name('rating.point');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'Backend\AdminController@index')->name('admin.dashboard');
Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login')->name('admin.login.submit');
// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');

Route::get('/admin/Change/Password','Backend\AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','Backend\AdminController@Update_pass')->name('admin.password.update');

Route::get('admin/logout', 'Backend\AdminController@logout')->name('admin.logout');

     //admin section----------------

//categories--------
Route::get('admin/catgories', 'Backend\Category\CategoryController@catgory')->name('categories');    
Route::post('admin/store/category', 'Backend\Category\CategoryController@storecatgory')->name('store.category');
Route::get('delete/category/{id}','Backend\Category\CategoryController@DeleteCategory');
Route::get('edit/category/{id}','Backend\Category\CategoryController@EditCategory');
Route::post('update/category/{id}','Backend\Category\CategoryController@UpdateCategory');

//brands=====
Route::get('admin/brands', 'Backend\Brand\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Backend\Brand\BrandController@storebrand')->name('store.brand'); 
Route::get('delete/brand/{id}','Backend\Brand\BrandController@DeleteBrand');
Route::get('edit/brand/{id}','Backend\Brand\BrandController@EditBrand'); 
Route::post('update/brand/{id}','Backend\Brand\BrandController@UpdateBrand'); 

//sub categories=====
Route::get('admin/sub/category', 'Backend\Subcategory\SubCategoryController@subcategories')->name('subcategories');
Route::post('admin/store/subcat', 'Backend\Subcategory\SubCategoryController@storesubcat')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Backend\Subcategory\SubCategoryController@DeleteSubCat');
Route::get('edit/subcategory/{id}','Backend\Subcategory\SubCategoryController@EditSubCat');
Route::post('update/subcategory/{id}','Backend\Subcategory\SubCategoryController@UpdateSubCat');

//coupon------
Route::get('admin/sub/coupon', 'Backend\Coupon\CouponController@Coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Backend\Coupon\CouponController@StoreCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}','Backend\Coupon\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}','Backend\Coupon\CouponController@EditCoupon');
Route::post('update/coupon/{id}','Backend\Coupon\CouponController@UpdateCoupon');
//rating
Route::get('rating/user','Backend\Coupon\CouponController@ratingUser')->name('admin.rating');
Route::get('rating/gift', 'Backend\Coupon\CouponController@ratingGift')->name('rating.gift');
Route::get('rating/gift/view/{id}', 'Backend\Coupon\CouponController@ratingGiftView');
Route::post('rating/gift/send/{id}', 'Backend\Coupon\CouponController@ratingGiftSend');


//newslater
Route::get('admin/newslater', 'Backend\Newslater\NewslaterController@Newslater')->name('admin.newslater');
Route::get('delete/sub/{id}','Backend\Newslater\NewslaterController@DeleteSub');

//products routes=====
Route::get('admin/product/all', 'Backend\Product\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Backend\Product\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Backend\Product\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}','Backend\Product\ProductController@Inactive'); 
Route::get('active/product/{id}','Backend\Product\ProductController@Active');
Route::get('delete/product/{id}','Backend\Product\ProductController@DeleteProduct');
Route::get('view/product/{id}','Backend\Product\ProductController@ViewProduct');
Route::get('edit/product/{id}','Backend\Product\ProductController@EditProduct');
Route::post('update/product/withoutphoto/{id}','Backend\Product\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/photo/{id}','Backend\Product\ProductController@UpdateProductPhoto');

//get sub cate by ajax
Route::get('get/subcategory/{category_id}','Backend\Product\ProductController@GetSubcat');

//post routes category
Route::get('post/catgories', 'Backend\Post\CategoryController@catgory')->name('post.categories');    
Route::post('post/store/category', 'Backend\Post\CategoryController@storecatgory')->name('post.store.category');
Route::get('delete/postcategory/{id}','Backend\Post\CategoryController@DeleteCategory');
Route::get('edit/postcategory/{id}','Backend\Post\CategoryController@EditCategory');
Route::post('update/postcategory/{id}','Backend\Post\CategoryController@UpdateCategory');

//post routes
Route::get('admin/add/post', 'Backend\Post\PostController@create')->name('add.blogpost');
Route::post('admin/store/post', 'Backend\Post\PostController@store')->name('store.post');
Route::get('admin/all/post', 'Backend\Post\PostController@index')->name('all.blogpost');
Route::get('delete/post/{id}','Backend\Post\PostController@destroy');
Route::get('edit/post/{id}','Backend\Post\PostController@edit');
Route::post('update/post/{id}','Backend\Post\PostController@update');

//order routes
Route::get('admin/pending/order', 'Backend\Order\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Backend\Order\OrderController@ViewOrder');

Route::get('admin/payment/accept/{id}', 'Backend\Order\OrderController@PaymentAccept');
Route::get('admin/accept/payment', 'Backend\Order\OrderController@AcceptPaymentOrder')->name('admin.accept.payment');

Route::get('admin/payment/cancel/{id}', 'Backend\Order\OrderController@PaymentCancel');
Route::get('admin/cancel/payment', 'Backend\Order\OrderController@CancelPaymentOrder')->name('admin.cancel.order');

Route::get('admin/delevery/progress/{id}', 'Backend\Order\OrderController@DeleveryProgress');
Route::get('admin/progress/payment', 'Backend\Order\OrderController@ProgressPaymentOrder')->name('admin.progress.payment');

Route::get('admin/delevery/done/{id}', 'Backend\Order\OrderController@DeleveryDone');
Route::get('admin/success/payment', 'Backend\Order\OrderController@SuccessPaymentOrder')->name('admin.success.payment');


//orders Report routes
Route::get('admin/today/order', 'Backend\Report\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/deleverd', 'Backend\Report\ReportController@TodayDelevered')->name('today.delevered');
Route::get('admin/this/month', 'Backend\Report\ReportController@ThisMonth')->name('this.month');
Route::get('admin/search/report', 'Backend\Report\ReportController@search')->name('search.report');
Route::post('admin/search/byyear', 'Backend\Report\ReportController@searchByYear')->name('search.by.year');
Route::post('admin/search/bymonth', 'Backend\Report\ReportController@searchByMonth')->name('search.by.month');
Route::post('admin/search/bydate', 'Backend\Report\ReportController@searchByDate')->name('search.by.date');

//seo route
Route::get('admin/seo', 'Backend\Seo\SeoController@Seo')->name('admin.seo');
Route::post('admin/update/seo', 'Backend\Seo\SeoController@UpdateSeo')->name('update.seo');

//user role
Route::get('admin/create/role', 'Backend\Role\RoleController@UserRole')->name('create.user.role');
Route::get('admin/create/admin', 'Backend\Role\RoleController@UserCreate')->name('create.admin');
Route::post('admin/store/admin', 'Backend\Role\RoleController@UserStore')->name('store.admin');
Route::get('delete/admin/{id}', 'Backend\Role\RoleController@UserDelete');
Route::get('edit/admin/{id}', 'Backend\Role\RoleController@UserEdit');
Route::post('admin/update/admin', 'Backend\Role\RoleController@UserUpdate')->name('update.admin');

//stock
Route::get('admin/product/stock', 'Backend\ReturnOrder\ReturnController@Stock')->name('admin.product.stock');

//return products admin panel
 Route::get('admin/return/request', 'Backend\ReturnOrder\ReturnController@request')->name('admin.return.request');
 Route::get('/admin/approve/return/{id}', 'Backend\ReturnOrder\ReturnController@ApproveReturn');
 Route::get('admin/all/return', 'Backend\ReturnOrder\ReturnController@AllReturn')->name('admin.all.return');

//site setting
Route::get('admin/site/setting', 'Backend\Sitesetting\SettingController@SiteSetting')->name('admin.site.setting');
Route::post('admin/update/sitesetting', 'Backend\Sitesetting\SettingController@UpdateSetting')->name('update.sitesetting');

     //Frontend section----------------

//language controller
Route::get('/lang/english', 'Frontend\LanguageController@English')->name('lang.english');
Route::get('/lang/bangla', 'Frontend\LanguageController@Bangla')->name('lang.bangla');
Route::get('blog/post','Frontend\LanguageController@blog')->name('blog.post');

//newslater & Order Tracking-------- 
Route::post('store/newslatter', 'Frontend\FrontendController@Storenewslatter')->name('store.newslatter');
Route::post('order/tracking', 'Frontend\FrontendController@OrderTracking')->name('order.tracking');

//wishlists
Route::get('add/wishlist/{id}','Frontend\WishlistController@AddWishlist');
Route::get('user/wishlist/','Frontend\WishlistController@Wishlist')->name('user.wishlist');
Route::get('remove/wishlist/{id}','Frontend\WishlistController@RemoveWishlist');

//cart
Route::get('add/to/cart/{id}','Frontend\CartController@AddCart');
Route::get('check','Frontend\CartController@check');
Route::get('products/cart','Frontend\CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}','Frontend\CartController@removeCart');
Route::post('update/cart/item','Frontend\CartController@UpdateCart')->name('update.cartitem');
Route::get('cart/product/view/{id}','Frontend\CartController@ViewProduct');
Route::post('insert/into/cart/','Frontend\CartController@InsertCart')->name('insert.into.cart');

//checkout
Route::get('user/checkout/','Frontend\CheckoutController@Checkout')->name('user.checkout');

//Coupon
Route::post('user/apply/coupon/','Frontend\CouponController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/','Frontend\CouponController@CouponRemove')->name('coupon.remove');

//payment page
Route::get('payment/page/','Frontend\PaymentController@PymentPage')->name('payment.step');
//payment method
Route::post('user/payment/process/','Frontend\PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge/','Frontend\PaymentController@STripeCharge')->name('stripe.charge');

//Product(single product view & add to cart & search)
 Route::get('/product/details/{id}/{product_name}', 'Frontend\ProductController@ProductView');
 Route::post('/cart/product/add/{id}', 'Frontend\ProductController@AddCart');
 Route::post('product/search', 'Frontend\FrontendController@ProductSearch')->name('product.search');
 //product show according to subcat
 Route::get('/products/{id}', 'Frontend\ProductController@productsView');

//Return Route
Route::get('success/list/','Frontend\ReturnorderController@SuccessList')->name('success.orderlist');
Route::get('request/return/{id}','Frontend\ReturnorderController@RequestReturn');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
