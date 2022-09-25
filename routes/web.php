<?php

use App\Models\product;



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;


// web controllers---------------------------------------
use App\Http\Livewire\Web\Home;
use App\Http\Livewire\Web\Product\ProductDetails;

use App\Http\Livewire\Web\Cart\CartComponent;
use App\Http\Livewire\Web\Wishlist\WishlistComponent;

use App\Http\Livewire\Web\Category\WebCategoryComponent;
use App\Http\Livewire\Web\Category\WebSingleCategoryComponent;
use App\Http\Livewire\Web\Searched\SearchedProductComponent;
use App\Http\Livewire\Web\Searched\TopProductComponent;

use App\Http\Livewire\Web\Featured\FeaturedProductsComponent;

use App\Http\Livewire\Web\Onsale\OnsaleProductsComponent;
use App\Http\Livewire\Web\Onsale\HotsaleProductComponent;
use App\Http\Livewire\Web\Onsale\FlashsaleProductComponent;

use App\Http\Livewire\Web\Vendor\VendorProductsComponent;
use App\Http\Livewire\Web\Vendor\AllVendorComponent;

use App\Http\Livewire\Web\Brand\AllBrandComponent;
use App\Http\Livewire\Web\Brand\BrandProductsComponent;

use App\Http\Livewire\Web\Vendor\AllVerifiedVendorComponent;

use App\Http\Livewire\Web\Others\AboutUsComponent;
use App\Http\Livewire\Web\Others\ContactUsComponent;


use App\Http\Livewire\Web\Checkout\CheckoutDetailsComponent;
use App\Http\Livewire\Web\Checkout\CheckoutPaymentComponent;
use App\Http\Livewire\Web\Checkout\CheckoutReviewComponent;
use App\Http\Livewire\Web\Checkout\CheckoutCompleteComponent;

use App\Http\Livewire\Web\Userprofile\UserProfileShow;
use App\Http\Livewire\Web\Userprofile\UserOrdersComponent;
use App\Http\Livewire\Web\Userprofile\UserProductRatingComponent;
use App\Http\Livewire\Web\Userprofile\UserApplyForRefundComponent;

use App\Http\Livewire\Web\Usercomplain\UserComplainComponent;

use App\Http\Livewire\Web\Service\WebServiceComponent;
use App\Http\Livewire\Web\Service\WebServiceDetailsComponent;

use App\Http\Livewire\Web\Vendorregistration\VendorRefistrationFromComponent;


// Admin controllers-------------------------------------
use App\Http\Livewire\Admin\Admindashboard;
use App\Http\Livewire\Admin\TestPage;

use App\Http\Livewire\Admin\Category\CategoryComponent;
use App\Http\Livewire\Admin\Vendor\VendorComponent;
use App\Http\Livewire\Admin\Brand\BrandComponent;

use App\Http\Livewire\Admin\Variation\ColorComponent;
use App\Http\Livewire\Admin\Variation\SizeComponent;

use App\Http\Livewire\Admin\Product\ProductComponent;
use App\Http\Livewire\Admin\Product\AddProductComponent;
use App\Http\Livewire\Admin\Product\AddProductWithoutVariationComponent;
use App\Http\Livewire\Admin\Product\EditProductComponent;
use App\Http\Livewire\Admin\Product\VendorWiseProductComponent;

use App\Http\Livewire\Admin\Home\AdvertiseBannersComponent;
use App\Http\Livewire\Admin\Home\SectionsSettingsComponent;
use App\Http\Livewire\Admin\Home\SliderSettingsComponent;
use App\Http\Livewire\Admin\Home\PromotionSettingsComponent;
use App\Http\Livewire\Admin\Home\HeaderSettings;
use App\Http\Livewire\Admin\Home\FooterSettings;
use App\Http\Livewire\Admin\Home\HomeCategoryComponent;

use App\Http\Livewire\Admin\Coupon\CouponComponent;

use App\Http\Livewire\Admin\Orders\ViewOrdersComponent;
use App\Http\Livewire\Admin\Orders\ManageOrderComponent;
// use App\Http\Livewire\Admin\Orders\OrderSlipComponent;
use App\Http\Controllers\OrderSlipController;

use App\Http\Livewire\Admin\User\VendorManageComponent;
use App\Http\Livewire\Admin\User\AdminManageComponent;

use App\Http\Livewire\Admin\Refund\RefundRequestComponent;

use App\Http\Livewire\Admin\Complain\ComplainComponent;

use App\Http\Livewire\Admin\Service\ServiceCategoryComponent;

use App\Http\Livewire\Admin\Service\AdminServiceComponent;
use App\Http\Livewire\Admin\Service\AdminAddServiceComponent;
use App\Http\Livewire\Admin\Service\AdminEditServiceComponent;

use App\Http\Livewire\Admin\Salemanagement\FlashSaleComponent;
use App\Http\Livewire\Admin\Salemanagement\HotSaleComponent;


// use App\Http\Livewire\Admin\Sellerregistration\SellerRegistrationComponent;
use App\Http\Livewire\Admin\Sellerregistration\NewSellerProfilesComponent;

use App\Http\Livewire\Admin\Report\ReportDownloadComponent;

use App\Http\Livewire\Admin\Notice\NoticeComponent;
use App\Http\Livewire\Admin\Notice\AddNoticeComponent;
use App\Http\Livewire\Admin\Notice\EditNoticeComponent;
use App\Http\Livewire\Admin\Notice\NoticeBoardComponent;
use App\Http\Livewire\Admin\Notice\NoticeDetailsComponent;


use App\Http\Livewire\Admin\Contacts\ContactComponent;
use App\Http\Livewire\Admin\Contacts\AddContactComponent;
use App\Http\Livewire\Admin\Contacts\EditContactComponent;

use App\Http\Livewire\Admin\Guideline\GuidelineComponent;
use App\Http\Livewire\Admin\Guideline\AddGuidelineComponent;
use App\Http\Livewire\Admin\Guideline\EditGuidelineComponent;

use App\Http\Livewire\Admin\Review\ManageReviewComponent;

use App\Http\Livewire\Admin\Statement\AdminStatementComponent;

// Vendor controllers-------------------------------------
use App\Http\Livewire\Vendor\Dashboard\VendorDashboard;

use App\Http\Livewire\Vendor\Variation\ProductColor;

use App\Http\Livewire\Vendor\Product\VendorsProductsComponent;
use App\Http\Livewire\Vendor\Product\VendorsAddProductsComponent;
use App\Http\Livewire\Vendor\Product\VendorsEditProductsComponent;
use App\Http\Livewire\Vendor\Product\VendorsAddProductsWithoutVariationComponent;

use App\Http\Livewire\Vendor\Orders\VendorViewOrdersComponent;
use App\Http\Livewire\Vendor\Orders\VendorManageOrderComponent;

use App\Http\Livewire\Vendor\Review\VendorManageReviewComponent;

use App\Http\Livewire\Vendor\Contacts\VendorContactComponent;

use App\Http\Livewire\Vendor\Guideline\VendorGuidelineComponent;

use App\Http\Livewire\Vendor\Accountsettongs\VendorAccountSettingsComponent;

use App\Http\Livewire\Vendor\Statement\VendorStatementComponent;

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


Route::get('/',Home::class)->name('web.home');

Route::get('/product_details/{id}',ProductDetails::class)->name('product_details');

Route::get('/cart',CartComponent::class)->name('web.product_cart');
Route::get('/wishlist',WishlistComponent::class)->name('web.product_wishlist');

Route::get('/categories',WebCategoryComponent::class)->name('web.product_categories');
Route::get('/product_category/{id}',WebSingleCategoryComponent::class)->name('web.single_category');
Route::get('/searched_products/{key}',SearchedProductComponent::class)->name('web.searched_products');

Route::get('/top_products',TopProductComponent::class)->name('web.top_products');


Route::get('/vendors',AllVendorComponent::class)->name('web.all_vendor');

Route::get('/brands',AllBrandComponent::class)->name('web.all_brands');
Route::get('/brand_products/{key}',BrandProductsComponent::class)->name('web.brand_products');

Route::get('/verified_vendors',AllVerifiedVendorComponent::class)->name('web.all_verified_vendor');
Route::get('/vendor_products/{key}',VendorProductsComponent::class)->name('web.vendor_products');

Route::get('/about_us',AboutUsComponent::class)->name('web.about_us');
Route::get('/contact_us',ContactUsComponent::class)->name('web.contact_us');

Route::get('/featured_products',FeaturedProductsComponent::class)->name('web.featured_products');

Route::get('/onsale_products',OnsaleProductsComponent::class)->name('web.onsale_products');
Route::get('/hotsale_products',HotsaleProductComponent::class)->name('web.hotsale_products');
Route::get('/flashsale_products',FlashsaleProductComponent::class)->name('web.flashsale_products');

Route::get('/complain',UserComplainComponent::class)->name('web.complain');


Route::get('/service',WebServiceComponent::class)->name('web.service');
Route::get('/service_details/{id}',WebServiceDetailsComponent::class)->name('web.service_details');

Route::get('/vendor_registration',VendorRefistrationFromComponent::class)->name('web.vendor_registration');

//For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){

    Route::get('/admin/dashboard',Admindashboard::class)->name('admin.dashboard');

    Route::get('/admin/categories',CategoryComponent::class)->name('admin.categories');

    Route::get('/admin/vendor',VendorComponent::class)->name('admin.vendor');

    Route::get('/admin/brands',BrandComponent::class)->name('admin.brands');

    Route::get('/admin/color',ColorComponent::class)->name('admin.color');
    Route::get('/admin/size',SizeComponent::class)->name('admin.size');

    Route::get('/admin/product',ProductComponent::class)->name('admin.product');
    Route::get('/admin/add_product',AddProductComponent::class)->name('admin.add_product');
    Route::get('/admin/add_product_without_variations',AddProductWithoutVariationComponent::class)->name('admin.add_product_without_variations');

    Route::get('/admin/vendor_wise_product',VendorWiseProductComponent::class)->name('admin.vendor_wise_product');

    Route::get('/admin/editproduct/{id}',EditProductComponent::class)->name('admin.editproduct');
    

    Route::get('/admin/addBanners',AdvertiseBannersComponent::class)->name('admin.addBanners');

    Route::get('/admin/sectionSettings',SectionsSettingsComponent::class)->name('admin.sectionSettings');

    Route::get('/admin/sliderSettings',SliderSettingsComponent::class)->name('admin.sliderSettings');

    Route::get('/admin/promotionSettings',PromotionSettingsComponent::class)->name('admin.promotionSettings');
    Route::get('/admin/headerSettings',HeaderSettings::class)->name('admin.headerSettings');
    Route::get('/admin/footerSettings',FooterSettings::class)->name('admin.footerSettings');
    Route::get('/admin/home_category',HomeCategoryComponent::class)->name('admin.home_category');

    Route::get('/admin/coupons',CouponComponent::class)->name('admin.coupons');

    Route::get('/admin/orders',ViewOrdersComponent::class)->name('admin.orders');
    Route::get('/admin/manageOrder/{order_id}',ManageOrderComponent::class)->name('admin.manageOrder');
    // Route::get('/admin/make_order_slip/{order_id}',OrderSlipComponent::class)->name('admin.make_order_slip');
    Route::get('/admin/make_order_slip/{id}',[OrderSlipController::class, 'index'])->name('admin.make_order_slip');

    Route::get('/admin/manage_user',VendorManageComponent::class)->name('admin.manage_user');
    Route::get('/admin/manage_admin',AdminManageComponent::class)->name('admin.manage_admin');



    Route::get('/admin/notice',NoticeComponent::class)->name('admin.notice');
    Route::get('/admin/add_notice',AddNoticeComponent::class)->name('admin.add_notice');
    Route::get('/admin/edit_notice/{id}',EditNoticeComponent::class)->name('admin.edit_notice');
    Route::get('/admin/notice_board',NoticeBoardComponent::class)->name('admin.notice_board');
    Route::get('/admin/notice_details/{id}',NoticeDetailsComponent::class)->name('admin.notice_details');


    Route::get('/admin/contacts',ContactComponent::class)->name('admin.contacts');
    Route::get('/admin/add_contact',AddContactComponent::class)->name('admin.add_contact');
    Route::get('/admin/edit_contact/{id}',EditContactComponent::class)->name('admin.edit_contact');


    Route::get('/admin/guidelines',GuidelineComponent::class)->name('admin.guidelines');
    Route::get('/admin/add_guideline',AddGuidelineComponent::class)->name('admin.add_guideline');
    Route::get('/admin/edit_guideline/{id}',EditGuidelineComponent::class)->name('admin.edit_guideline');


    // Reports route

    Route::get('/admin/report_download',ReportDownloadComponent::class)->name('admin.report_download');


    Route::post('SoldProducts/export/', [ReportController::class, 'SoldProducts'])->name('admin.SoldProducts_report');
    // Route::get('OrderExport/export/', [ReportController::class, 'OrderExport'])->name('admin.order_report');
    Route::get('CustomersExport/export/', [ReportController::class, 'CustomersExport'])->name('admin.customers_report');
    Route::post('ValuedCustomersExport/export/', [ReportController::class, 'ValuedCustomersExport'])->name('admin.valued_customers_report');
    Route::get('VendorsExport/export/', [ReportController::class, 'VendorsExport'])->name('admin.vendors_report');
    Route::post('vendor_order/export/', [ReportController::class, 'VendorsOrderExport'])->name('admin.vendor_order_report');
    Route::post('vendor_product/export/', [ReportController::class, 'VendorWiseProductExport'])->name('admin.vendor_product_list');


    Route::get('/admin/statements',AdminStatementComponent::class)->name('admin.statements');
    Route::post('/admin/statement_download', [ReportController::class, 'VendorStatementExport'])->name('admin.statement_download');

    //Refund Request
    Route::get('/admin/refund_request',RefundRequestComponent::class)->name('admin.refund_request');

    //complain page
    Route::get('/admin/user_complain',ComplainComponent::class)->name('admin.user_complain');


    // service 
    Route::get('/admin/service_category',ServiceCategoryComponent::class)->name('admin.service_category');

    Route::get('/admin/service',AdminServiceComponent::class)->name('admin.service');
    Route::get('/admin/add_service',AdminAddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin/edit_service/{id}',AdminEditServiceComponent::class)->name('admin.edit_service');

    // sale Management
    Route::get('/admin/hot_sale',HotSaleComponent::class)->name('admin.hot_sale');
    Route::get('/admin/flash_sale',FlashSaleComponent::class)->name('admin.flash_sale');

    //Seller Registration Request
    // Route::get('/admin/seller_registration',SellerRegistrationComponent::class)->name('admin.seller_registration');
    Route::get('/admin/seller_registration',NewSellerProfilesComponent::class)->name('admin.seller_registration');


    Route::get('/admin/manage_review',ManageReviewComponent::class)->name('admin.manage_review');


    //test page
    Route::get('/admin/test_page',TestPage::class)->name('admin.test_page');

});














//For Vendor
Route::middleware(['auth:sanctum', 'verified','authvendor'])->group(function(){

    Route::get('/vendor/dashboard',VendorDashboard::class)->name('vendor.dashboard');

    Route::get('/vendor/product_color',ProductColor::class)->name('vendor.product_color');

    Route::get('/vendor/products',VendorsProductsComponent::class)->name('vendor.products');
    Route::get('/vendor/add_products/{id}',VendorsAddProductsComponent::class)->name('vendor.add_products');
    Route::get('/vendor/add_products_without_variation/{id}',VendorsAddProductsWithoutVariationComponent::class)->name('vendor.add_products_without_variation');
    Route::get('/vendor/edit_products/{id}/{v_id}',VendorsEditProductsComponent::class)->name('vendor.edit_products');

    Route::get('/vendor/orders',VendorViewOrdersComponent::class)->name('vendor.orders');
    Route::get('/vendor/manageOrder/{order_id}',VendorManageOrderComponent::class)->name('vendor.manageOrder');
    Route::get('/vendor/make_order_slip/{id}',[OrderSlipController::class, 'index'])->name('vendor.make_order_slip');

    Route::get('/vendor/notice_board',NoticeBoardComponent::class)->name('vendor.notice_board');
    Route::get('/vendor/notice_details/{id}',NoticeDetailsComponent::class)->name('vendor.notice_details');

    Route::get('/vendor/manage_review',VendorManageReviewComponent::class)->name('vendor.manage_review');

    Route::get('/vendor/contacts',VendorContactComponent::class)->name('vendor.contacts');

    Route::get('/vendor/guidelines',VendorGuidelineComponent::class)->name('vendor.guidelines');

    Route::get('/vendor/account_settings',VendorAccountSettingsComponent::class)->name('vendor.account_settings');

    Route::get('/vendor/statements',VendorStatementComponent::class)->name('vendor.statements');

    Route::post('/vendor/statement_download', [ReportController::class, 'VendorStatementExport'])->name('vendor.statement_download');

});

















//For User
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    // Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    // Route::get('/', function () {
    //     return view('web.home.home');
    // });

    Route::get('user/checkOutDetails',CheckoutDetailsComponent::class)->name('user.checkOutDetails');
    Route::get('user/checkOutPayment/{order_key}',CheckoutPaymentComponent::class)->name('user.checkOutPayment');
    Route::get('user/checkOutReview',CheckoutReviewComponent::class)->name('user.checkOutReview');
    Route::get('user/checkOutComplete',CheckoutCompleteComponent::class)->name('user.checkOutComplete');

    Route::get('user/user_profile/{id}',UserProfileShow::class)->name('user.user_profile');

    Route::get('user/user_orders/{id}',UserOrdersComponent::class)->name('user.user_orders');

    Route::get('user/user_product_ratings/{user_id}/{product_id}/{variation_id}',UserProductRatingComponent::class)->name('user.user_product_ratings');

    Route::get('user/user_refund/{id}',UserApplyForRefundComponent::class)->name('user.user_refund');

});