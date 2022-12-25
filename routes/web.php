<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrederController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\SippingAreaController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\frontend\HomeBlogController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CachController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripController;
use App\Http\Controllers\User\WishlistController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


/// Route Admin Ail
Route::group(['prefix' => 'admin', 'Middleware' => ['admin.admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){



        Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
            Route::get('/admin/dashboard', function () {
                return view('admin.index');
            })->name('dashboard')->middleware('auth:admin');
        });

        Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
        Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
        Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
        Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
        Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.Change.Password');
        Route::post('/admin/updata/password', [AdminProfileController::class, 'AdminUpdataChangePassword'])->name('updata.change.password');

});//end Middleware

///Route User Ail

Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard', compact('user'));
    })->name('dashboard');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/user.logout', [IndexController::class, 'UserLogoute'])->name('user.logout');
Route::get('/user.profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::get('/change.password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user.profile.store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::post('/user.password.update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');


//Admin Route Brand Ail
Route::prefix('brand')->group(function () {
    Route::get('/view', [BrandController::class, 'BrandAil'])->name('brand.ail');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::post('/Update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});


//Admin Route Category Ail
Route::prefix('Category')->group(function () {
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('category.ail');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::post('/Update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');


    //Admin Route SubCategory Ail
    Route::get('/subview', [SubCategoryController::class, 'SubCategoryView'])->name('ail.subcategory');
    Route::get('/subedit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('edit.subcategory');
    Route::post('/substore', [SubCategoryController::class, 'SubCategoryStore'])->name('store.subcategory');
    Route::post('/subupdate', [SubCategoryController::class, 'SubCategoryUpdate'])->name('update.subcategory');
    Route::get('/subdelete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('delete.subcategory');

    //Admin Route Sub_SubCategory Ail
    Route::get('/subcategory_ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::get('/sub_subview', [SubCategoryController::class, 'Sub_SubCategoryView'])->name('ail.sub_subcategory');
    Route::post('/sub_substore', [SubCategoryController::class, 'Sub_SubCategoryStore'])->name('store.sub_subcategory');
    Route::get('/sub_subedit/{id}', [SubCategoryController::class, 'Sub_SubCategoryEdit'])->name('edit.sub_subcateogrys');
    Route::post('/sub_subupdate', [SubCategoryController::class, 'Sub_SubCategoryUpdate'])->name('update.sub_subcategory');
    Route::get('/sub_ubdelete/{id}', [SubCategoryController::class, 'Sub_SubCategoryDelete'])->name('delete.sub_subcateogrys');
});

//Admin Route Product Ail
Route::prefix('Product')->group(function () {
    Route::get('/Add', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::get('/subcategory_ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::get('/ajax/{subcategory_id}', [SubCategoryController::class, 'SubSubCategory']);
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product.store');
    Route::get('/Manage', [ProductController::class, 'ManageProduct'])->name('Manage-product');

     Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');

     Route::post('/Update', [ProductController::class, 'ProductUpdate'])->name('product.update');
     Route::post('/UpdateMutiIImg', [ProductController::class, 'MutiImgUpdate'])->name('product.image');
     Route::post('/UpdatethambnailImg', [ProductController::class, 'ThambnailImgUpdate'])->name('product.thambnail');
     Route::get('/multiDelete/{id}', [ProductController::class, 'multiDelete'])->name('product.multiDelete');
     Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
     Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
     Route::get('/Product/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
});



//Admin Route Brand Ail
Route::prefix('slider')->group(function () {
    Route::get('/view', [SliderController::class, 'ViewSlider'])->name('Manage-slider');
     Route::get('/edit/{id}', [SliderController::class, 'sliderdEdit'])->name('slider.edit');
     Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
     Route::post('/Update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
     Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
     Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
     Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
});


///  Start frontend Mulit Language   Route All
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/arabic', [LanguageController::class, 'Arabic'])->name('arabic.language');


///  End frontend Mulit Language   Route All


// Forntend Product Details
Route::get('/Product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);



// Forntend Product Details
Route::get('/Product/tage/{tag}', [IndexController::class, 'TagWiseProduct']);


// Forntend subcategory Data
Route::get('/subcatrgor/product/{subcat_id}/{slug}', [IndexController::class, 'SubcatWiseProduct']);

// Forntend sub_subcategory Data
Route::get('/subsubcatrgor/product/{sub_subcat_id}/{slug}', [IndexController::class, 'SubSubcatWiseProduct']);


// product view Model Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);


// Add TO Cart Data Store Ajax
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);


// Add TO Cart Data Store Ajax
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add TO Wishlist Data Store Ajax
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'addToWishlist']);




/////User Must Login
Route::group(['prefix' => 'user','middleware' =>['user'=> 'auth'],'namespace'=>'User' ],function(){


// wishlist Data  Ajax
Route::get('/wishlist', [WishlistController::class, 'Viewwishlist'])->name('wishlist');

// wishlist Data  Ajax
Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);


// wishlist Data  Ajax Remove
Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);


// strip order
Route::post('/strip/order', [StripController::class, 'StripOrder'])->name('strip.order');

// cach order
Route::post('/cach/order', [CachController::class, 'CachOrder'])->name('cach.order');

//my orders
Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');

///order_details

Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

///user/invoice_download
Route::get('/invoice_download/{invoice_id}', [AllUserController::class, 'InvoiceDownload']);

///order_return

Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');

///return.order.list

Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');

Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');
/// Order Traking Route
Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');


}); // end Route group User


// mycart
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

// my cart Data  Ajax
Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);



// cart Data  Ajax Remove
Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);


///cart-increment
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);

///cart-decrement
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

//Admin Route Coupons
Route::prefix('Coupons')->group(function () {
    Route::get('/view', [CouponController::class, 'CouponView'])->name('Manage-Coupons');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/updata/{id}', [CouponController::class, 'CouponUpdata'])->name('coupon.updata');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');

});

//Admin Route Shipping
Route::prefix('shipping')->group(function () {
    ////Shipping
    Route::get('/division/view', [SippingAreaController::class, 'DivisionView'])->name('Manage-division');
    Route::post('/division/store', [SippingAreaController::class, 'DivisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [SippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/division/updata/{id}', [SippingAreaController::class, 'DivisionUpdata'])->name('division.updata');
    Route::get('/division/delete/{id}', [SippingAreaController::class, 'DivisionDelete'])->name('division.delete');

    /// district
    Route::get('/district/view', [SippingAreaController::class, 'DistrictView'])->name('Manage-district');
    Route::post('/district/store', [SippingAreaController::class, 'DistrictStore'])->name('district.store');
    Route::get('/district/edit/{id}', [SippingAreaController::class, 'DistrictEdit'])->name('district.edit');
    Route::post('/district/updata/{id}', [SippingAreaController::class, 'DistrictUpdata'])->name('district.updata');
    Route::get('/district/delete/{id}', [SippingAreaController::class, 'DistrictDelete'])->name('district.delete');


     /// State
     Route::get('/state/view', [SippingAreaController::class, 'StateView'])->name('Manage-state');
     Route::post('/state/store', [SippingAreaController::class, 'StateStore'])->name('state.store');
     Route::get('/state/edit/{id}', [SippingAreaController::class, 'StateEdit'])->name('state.edit');
     Route::post('/state/updata/{id}', [SippingAreaController::class, 'StateUpdata'])->name('state.updata');
     Route::get('/state/delete/{id}', [SippingAreaController::class, 'StateDelete'])->name('state.delete');

});



//// Front Coupon option

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
//couponCalculation
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
/// Remove
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);


/// Remove
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

//district-get/ajax
Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

//district-get/ajax
Route::get('/state-get/ajax/{division_id}', [CheckoutController::class, 'StateGetAjax']);


//checkout/store
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');



//Admin Route Oredrs All
Route::prefix('orders')->group(function () {
    Route::get('/pending/orders', [OrederController::class, 'PendingOrders'])->name('pending-orders');

    Route::get('/pending/orders/details/{order_id}', [OrederController::class, 'PendingOrderDetails'])->name('pending.order.details');
    Route::get('/confirmed/orders', [OrederController::class, 'ConfirmedOrder'])->name('confirmed-orders');
    Route::get('/processing/orders', [OrederController::class, 'ProcessindOrder'])->name('processing-orders');
    Route::get('/picked/orders', [OrederController::class, 'PickedOrder'])->name('picked-orders');
    Route::get('/shipped/orders', [OrederController::class, 'shippedOrder'])->name('shipped-orders');
     Route::get('/delivered/orders', [OrederController::class, 'DeliveredOrder'])->name('delivered-orders');
     Route::get('/cancel/orders', [OrederController::class, 'CancelOrder'])->name('cancel-orders');
     Route::get('/pending/confirm/{order_id}', [OrederController::class, 'PendingToConFirm'])->name('pending-confirm');
     Route::get('/processing/confirm/{order_id}', [OrederController::class, 'ProcessingCnfirm'])->name('processing.confirm');
     Route::get('/picked/processing/{order_id}', [OrederController::class, 'PickedProcessing'])->name('picked.processing');
     Route::get('/shipped/picked/{order_id}', [OrederController::class, 'ShippedPicked'])->name('shipped.picked');
     Route::get('/shipped/delivered/{order_id}', [OrederController::class, 'ShippedDelivered'])->name('shipped.delivered');
     Route::get('/delivered/cancel/{order_id}', [OrederController::class, 'DeliveredCancel'])->name('delivered.cancel');
     Route::get('/invoice/download/{order_id}', [OrederController::class, 'AdminInvoiceDownload'])->name('invoice.download');


});



//Admin Route all-reports
Route::prefix('reports')->group(function () {
    Route::get('/view', [ReportController::class, 'ReportsView'])->name('all-reports');
    Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
    Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
    Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');

    });


    //Admin Route all-reports
Route::prefix('alluser')->group(function () {
    Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
});


   //Admin Route Blog
   Route::prefix('blog')->group(function () {
    Route::get('/category', [BlogController::class, 'BlogCategory'])->name('category.blog');
    Route::post('/store', [BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');
    Route::get('/category/edit/{blog_id}', [BlogController::class, 'BlogCategoryEdit'])->name('blogcategory.edit');
    Route::post('/update', [BlogController::class, 'BlogCategoryUpdate'])->name('blogcategory.update');
    Route::get('/category/delete/{blog_id}', [BlogController::class, 'BlogCategoryDelete'])->name('blogcategory.delete');


    ///Admin View Post Route

    Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add.post');
    Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list.post');
    Route::post('/post/store', [BlogController::class, 'PostStore'])->name('post.store');

});


///frontend home.blog shop route

Route::get('/blog', [HomeBlogController::class, 'HomeBlog'])->name('home.blog');
Route::get('/post/details/{id}', [HomeBlogController::class, 'DetailsBlog'])->name('post.details');
Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'HomeBlogCatPost']);

//// Admin Site Setting
   //Admin Route Blog
   Route::prefix('setting')->group(function () {
    Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
     Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
     Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');




});

  //Admin Route Return Request
  Route::prefix('return')->group(function () {
    Route::get('/admin/request', [ReturnController::class, 'RetrunRequest'])->name('return.request');
    Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'RetrunRequestApprove'])->name('return.approve');
    Route::get('/admin/all/request', [ReturnController::class, 'RetrunAllRequest'])->name('all.request');



});


/// Frontend Route Review Product

Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');


 //Admin Manage Review Route
 Route::prefix('review')->group(function () {
    Route::get('/Pending', [ReviewController::class, 'PendingReview'])->name('pending.review');
    Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');

    Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');
    Route::get('/delete/{id}', [ReviewController::class, 'ReviewDelete'])->name('delete.review');



});


//Admin Manage Review Route
Route::prefix('stock')->group(function () {
    Route::get('/Product', [ProductController::class, 'ProductStock'])->name('product.stock');

});


//Admin User Role Route
Route::prefix('adminuserrole')->group(function () {
    Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.users');
    Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');
    Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');
    Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
    Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');
    Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');



});

//// Product Search Route 
Route::post('/search', [IndexController::class, 'productSearch'])->name('product.search');

/// Advance Search Routes
Route::post('search-product', [IndexController::class, 'Searchproduct']);
