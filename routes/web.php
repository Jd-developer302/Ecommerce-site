<?php

use App\Http\Controllers\AttributesController;
use App\Http\Controllers\AttributeValuesController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsumablesController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProductSpendController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\JandTController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MissingController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RmaController;
use App\Http\Controllers\AdsReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SitemapController;
use App\Mail\EmailOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return "Migrations executed successfully!";
});















Route::get('/', 'App\Http\Controllers\Frontend\IndexController@index')->name('home');
// Route::get('/', function () {
//     return redirect('/login');
// });
Route::get('shop', 'App\Http\Controllers\Frontend\IndexController@shop');
Route::get('contact', 'App\Http\Controllers\Frontend\IndexController@contact');
Route::get('about-us', 'App\Http\Controllers\Frontend\IndexController@aboutUs');
// Route::get('cart', 'App\Http\Controllers\Frontend\IndexController@cart');
Route::get('buy/{id}', 'App\Http\Controllers\Frontend\IndexController@buy');
Route::get('fetch/{id}', 'App\Http\Controllers\Frontend\IndexController@fetch');
Route::get('buy-consumable/{id}', 'App\Http\Controllers\Frontend\IndexController@buyConsumable');
Route::get('search', 'App\Http\Controllers\Frontend\IndexController@shop');
Route::post('search', [IndexController::class, 'search'])->name('search.post');
Route::get('fill-detail', 'App\Http\Controllers\Frontend\IndexController@fillDetail')->name('fill-detail.get');
Route::post('fill-detail', [IndexController::class, 'filledDetail'])->name('fill-detail.post');
Route::post('contact-post', [IndexController::class, 'contactPost'])->name('contact.post');

Route::get('register-customer', 'App\Http\Controllers\Frontend\IndexController@registerCustomer');
Route::post('register-customer-phone', 'App\Http\Controllers\Frontend\IndexController@registerByPhone');


Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add.cart');
// Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.counts');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('update-cart-dec', [CartController::class, 'updateSubCart'])->name('cart.dec');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('update-cart-ajax', [CartController::class, 'updateCartAjax'])->name('cart.updateajax');
Route::get('checkout', [IndexController::class, 'checkout'])->name('checkout');
Route::post('checkout', [IndexController::class, 'checkoutSubmit'])->name('checkout.submit');

// Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/session', 'App\Http\Controllers\StripeController@session')->name('multi.session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');

///
Route::post('buy-now', [CartController::class, 'buyNow'])->name('buy.now');
Route::post('order-now', [CartController::class, 'orderNow'])->name('order.now');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('products', ProductsController::class);
    Route::resource('bundles', BundleController::class);
    Route::resource('attributes', AttributesController::class);
    Route::resource('attributevalue', AttributeValuesController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('missing', MissingController::class);
    Route::resource('consumables', ConsumablesController::class);
    Route::resource('image', ImageController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('rma', RmaController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('promotions', PromotionController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('settings', SettingController::class);
    Route::patch('/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])
        ->name('users.toggleStatus');

    //Route::get('imagedel', [ImageController::class, 'show'])->name('image.show');
    Route::get('image-delete/{id?}/{parameter?}', [ImageController::class, 'show'])->name('image.delete');
    Route::get('note/{order_id}', [OrdersController::class, 'note'])->name('orders.note');
    Route::post('noted/{order_id}', [OrdersController::class, 'noted'])->name('orders.noted');
    Route::post('order-status', [OrdersController::class, 'orderStatus'])->name('orders.status');
    //products
    Route::post('add-attribute-value/{attribute_id}', [AttributesController::class, 'addAttributeValue'])->name('attributes.valueStore');
    Route::get('add-attribute-value/{attribute_id}', [AttributesController::class, 'show']);
    Route::get('combination-delete/{id}', [AttributesController::class, 'destroycombination'])->name('combination.destroy');
    Route::get('add-product-bundle', [ProductsController::class, 'addProductBunddle'])->name('products.addbundle');
    Route::post('save-product-bundle', [ProductsController::class, 'saveProductBundle'])->name('products.savebundle');
    Route::get('bundle-product-delete/{id}', [BundleController::class, 'destroyBundleProduct'])->name('bundleline.destroy');
    Route::get('products/{id}/history', [ProductsController::class, 'showHistory'])->name('products.history');

    Route::get('banner-delete/{banner}', [ImageController::class, 'bannerDelete'])->name('banner.delete');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    //
    Route::post('orders-export', [OrdersController::class, 'export'])->name('orders.export');
    Route::post('report-export', [OrdersController::class, 'reportExport'])->name('report.export');
    Route::post('orders-import', [OrdersController::class, 'import'])->name('orders.import');
    Route::post('imile-import', [OrdersController::class, 'imileImport'])->name('imile.import');
    Route::get('filter-export', [OrdersController::class, 'filterExport'])->name('filter.export');
    //impress 
    Route::get('impress-export', [OrdersController::class, 'impressExport'])->name('impress.export');
    Route::get('camel-export', [OrdersController::class, 'camelExport'])->name('camel.export');
    Route::get('/product-state', [OrdersController::class, 'productState'])->name('product.state');
    Route::post('/product-state/export', [OrdersController::class, 'exportProductState'])->name('product.state.export');
    Route::get('/product-spands/{product_id}/create', [ProductSpendController::class, 'create'])->name('product-spands.create');
    Route::post('/product-spands/store', [ProductSpendController::class, 'store'])->name('product-spands.store');
    Route::get('/product-spends', [ProductSpendController::class, 'index'])->name('product.spands.index');
    Route::delete('/product-spends/{id}', [ProductSpendController::class, 'destroy'])->name('product.spands.destroy');
    Route::get('/product-spends/{id}/edit', [ProductSpendController::class, 'edit'])->name('product.spands.edit');
    Route::put('/product-spends/{id}', [ProductSpendController::class, 'update'])->name('product.spands.update');
    Route::get('order-log/{order_id}', [OrdersController::class, 'orderLog'])->name('order.log');
    Route::get('generate-invoice-pdf/{order_id}', [PDFController::class, 'generateInvoicePDF'])->name('orders.invoice');
    Route::post('generate-bulk-invoice', [PDFController::class, 'generateBulkInvoicePDF'])->name('bulk.invoice');
    Route::post('barcode-invoice', [PDFController::class, 'barcodeInvoice'])->name('barcode.invoice');
    Route::post('rma-generate-bulk-invoice', [PDFController::class, 'rmaGenerateBulkInvoicePDF'])->name('bulks.invoice');
    Route::post('assign-order', [DriverController::class, 'assignOrder'])->name('drivers.assign');
    Route::post('tawseel-import', [DriverController::class, 'tawseelImport'])->name('tawseel.import');
    Route::post('assigned-status', [DriverController::class, 'orderStatus'])->name('assigned.status');
    Route::post('orders-filter', [OrdersController::class, 'filter'])->name('orders.filter');
    Route::get('orders-filter', [OrdersController::class, 'filter']);
    Route::get('crm-orders', [DriverController::class, 'crmOrders'])->name('crm.orders');
    Route::get('view-detail/{order_id}', [DriverController::class, 'view'])->name('view.orders');
    Route::get('rma-view-detail/{order_id}', [DriverController::class, 'rmaview'])->name('rma.view.orders');
    Route::get('delete-cartitems/{item_id}/{order_id}', [RmaController::class, 'deleteCartItems'])->name('delete.cartitems');
    Route::post('rmas-pdf', [RmaController::class, 'exportRmaPdf'])->name('rma.pdf');
    Route::post('rma-report-export', [RmaController::class, 'reportExport'])->name('rmareport.export');
    Route::get('rma-crm-orders', [DriverController::class, 'rmaCrmOrders'])->name('rma.crm.orders');
    Route::post('rmaassigned-status', [DriverController::class, 'rmaOrderStatus'])->name('assignedrma.status');
    Route::get('view-details/{order_id}', [DriverController::class, 'view'])->name('orders.changeStatus');
    Route::get('todays-orders', [DriverController::class, 'todaysOrders'])->name('drivers.today');
    Route::get('filter-reports', [ReportController::class, 'index']);
    Route::post('filter-reports', [ReportController::class, 'filter'])->name('reports.filter');
    Route::post('get-filtered-data', [ReportController::class, 'exportToCsv']);

    Route::get('sales-reports', [ReportController::class, 'sales'])->name('reports.sales');
    Route::post('filter-sales', [ReportController::class, 'filterSales'])->name('filter.sales');
    Route::get('invoiced-orders', [DriverController::class, 'invoicedOrders'])->name('stores.invoice');
    Route::get('packed-orders', [DriverController::class, 'assignedStoreOrders'])->name('stores.packed');
    Route::post('packed-orders', [DriverController::class, 'assignOrderFromStore'])->name('stores.assigned');
    Route::post('cancelled-orders', [DriverController::class, 'cancelOrders'])->name('stores.cancelled');
    Route::get('cancel-orders', [DriverController::class, 'storeCancel'])->name('stores.cancel');
    Route::get('rto-orders', [DriverController::class, 'storeRto'])->name('rto.store');
    Route::post('rto-recive', [DriverController::class, 'reciveRto'])->name('rto.recive');
    Route::get('delete-cartitem/{item_id}/{order_id}', [OrdersController::class, 'deleteCartItem'])->name('delete.cartitem');
    Route::post('orders-update', [OrdersController::class, 'updateData'])->name('orders.updateData');
    Route::get('confirmed-orders', [DriverController::class, 'confirmedOrders'])->name('confirmed.orders');
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::post('dashbord-filtered', 'App\Http\Controllers\DashboardController@filter')->name('filter.dashboard');
    Route::get('/ads-report', [AdsReportController::class, 'index'])->name('ads_report.index');
    Route::post('/ads-report/upload', [AdsReportController::class, 'upload'])->name('ads_report.upload');


    // Route::put('/rma/{id}', [RmaController::class, 'update'])->name('rma.update');
    Route::get('dashbord-filtered', function () {
        return redirect('/dashboard');
    });
    Route::post('products-search', [ProductsController::class, 'search'])->name('products.search');
    Route::post('bundles-search', [BundleController::class, 'search'])->name('bundles.search');
    Route::get('products-search', function () {
        return redirect('products.index');
    });

    ///////// J & T  //////////
    Route::post('jandt-add-order', [JandTController::class, 'loopAddOrder'])->name('jandt.assign');
    Route::post('/addOrder', [JandTController::class, 'addOrder']);
});
Route::post('/getPhoneDetails', [OrdersController::class, 'getPhoneDetails']);
Route::post('/getCouponDetails', [CouponController::class, 'getCouponDetails']);
Route::post('/getAttributesCombinations', [AttributeValuesController::class, 'getCombinations']);
Route::post('/get-attributes-options', [AttributeValuesController::class, 'getValues']);
Route::post('/getOrderStatus', [OrdersController::class, 'getOrderStatus']);
Route::post('/get-order-status', [OrdersController::class, 'getOrderStatusAlluser']);

Route::get('/update_tawseel_status', [DriverController::class, 'updateTawseelStatus']);


//////////////////////////////////////   front end  ////////////////////////////////////////////
Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('about.us');
Route::get('/shop', [IndexController::class, 'shop'])->name('shop');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/term-condition', [IndexController::class, 'termConditions'])->name('term_condition');
Route::get('/return-policy', [IndexController::class, 'returnPolicy'])->name('return_policy');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::get('/product/{id}', [IndexController::class, 'buy'])->name('products.buy');
Route::get('/order-success', [CartController::class, 'orderSuccess'])->name('order.success');
// Route::get('/{name}-{id}', [IndexController::class, 'details'])->name('products.detail');
Route::get('/bundle/{id}_{name1}', [IndexController::class, 'bundleDetail'])->name('bundles.detail');
Route::get('/cat/{id}', [IndexController::class, 'catView'])->name('cat.view');
Route::post('/add_missing_order', [MissingController::class, 'addMissingOrder']);
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/catalog.xml', [SitemapController::class, 'catalog']);
Route::get('/errorlog', [LogViewerController::class, 'index'])->withoutMiddleware(['web', 'auth']);
Route::get('/log-file', function () {
    try {
        $logPath = storage_path('logs/laravel.log');

        if (!File::exists($logPath)) {
            return response()->json(['error' => 'Log file not found'], 404);
        }

        return response()->file($logPath, ['Content-Type' => 'text/plain']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Unable to read log file', 'message' => $e->getMessage()], 500);
    }
});

Route::get('/send-mail', [OrdersController::class, 'send_mail'])->name('send-mail');

Route::fallback(function () {
    return redirect('/'); // Replace with your desired URL
});

require __DIR__ . '/auth.php';
