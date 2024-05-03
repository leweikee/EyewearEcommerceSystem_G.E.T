<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Http\Controllers\HomeController;


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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/header', function () {
    return view('header');
});

Route::get('/temp', function () {
    return view('template');
});

Route::get('/header_success', function () {
    return view('header_success');
});

// Route::get('/custProfile', function () {
//     return view('custProfile');
// });

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
/*
Route::get('/catalogue', function () {
    return view('catalogue');
});*/

Route::get('/register_success', function () {
    return view('register_success');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/contactUs', function () {
    return view('contact');
});



Route::resource('items', ItemController::class);

Route::resource('brands', BrandController::class);

Route::resource('variations', VariationController::class);

Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/home', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::get('/manageProduct', [AdminController::class, 'manageProducts'])->name('admin.manageProducts');
    Route::get('/manageBrand', [AdminController::class, 'viewBrands'])->name('admin.manageBrands');
    Route::post('/addBrand', [AdminController::class, 'addBrands'])->name('admin.addBrands');
    Route::get('/deleteBrand/{brandID}', [AdminController::class, 'deleteBrands'])->name('admin.deleteBrands');
    Route::get('/viewReport', [AdminController::class, 'viewReport']);

    Route::get('/manageOrder', [AdminController::class, 'manageOrder'])->name('admin.manageOrders');
    Route::get('/orderDetail/{id}', [AdminController::class, 'orderDetail'])->name('admin.showOrderDetails');
    Route::get('/orderToShip/{id}', [AdminController::class, 'orderToShip']);
    Route::post('/orderShipped/{id}', [AdminController::class, 'orderShipped']);


    Route::get('/addProduct', [AdminController::class, 'viewProducts'])->name('admin.addProducts');
    Route::post('/addProduct', [AdminController::class, 'addProducts'])->name('admin.addProducts');
    Route::get('/deleteProduct/{itemID}', [AdminController::class, 'deleteProducts'])->name('admin.deleteProducts');
    Route::get('/updateProduct/{itemID}', [AdminController::class, 'updateProducts'])->name('admin.updateProducts');
    Route::post('/updateProductConfirm/{itemID}', [AdminController::class, 'updateProductsConfirm'])->name('admin.updateProductsConfirm');
    Route::get('/viewProduct', [AdminController::class, 'viewProducts'])->name('admin.viewProducts');
    Route::get('/showProduct', [AdminController::class, 'showProducts'])->name('admin.showProducts');

   
});

Route::get('/admin/items/create', [ItemController::class, 'create'])->name('items.create');





//zejun test..
use App\Http\Controllers\Controller;
Route::post('/register', [Controller::class, 'register'])->name('register');


    Route::post('register', [Controller::class, 'register']);

    Route::post('login', [Controller::class, 'register'])->name('login');

    //Route::post('login', [Controller::class, 'register']);


//catalogue
Route::get('/catalogue', [ItemController::class, 'index']);
Route::get('/catalogue/{categoryName?}', [ItemController::class, 'index'])->name('catalogue.index');
Route::get('/catalogue/{categoryName}', [ItemController::class, 'categoryredirect']);

route::get('/redirect',[HomeController::class,['home']]);


Route::get('/loginn', [HomeController::class, 'showLoginForm'])->name('login.form');

Route::post('/loginn', [HomeController::class, 'authenticate'])->name('login.submit');

//logout
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

//product_details
Route::get('/product_details/{id}', [ItemController::class, 'product_details']);

Route::post('/add_cart/{id}', [ItemController::class, 'add_cart']);


Route::get('/show_cart', [HomeController::class,'show_cart']);

Route::get('/remove_cart/{id}', [HomeController::class,'remove_cart']);
Route::post('/update_cart/{id}', [HomeController::class, 'update_cart']);

Route::get('/custProfile', [HomeController::class, 'show_profile']);
Route::post('/updateProfile/{id}', [HomeController::class, 'update_profile']);
Route::post('/addAddress/{id}', [HomeController::class, 'add_address']);
Route::post('/editAddress/{id}/{addressID}', [HomeController::class, 'edit_address']);
Route::get('/deleteAddress/{addressID}', [HomeController::class, 'delete_address']);
Route::get('/setDefaultAddress/{id}/{addressID}', [HomeController::class, 'set_default_address']);

Route::get('/promotion', [HomeController::class, 'show_promotion']);

//Testing
Route::get('/paymentGateway','App\Http\Controllers\StripeController@index')->name('index');
Route::get('/success','App\Http\Controllers\StripeController@success')->name('success');

//checkout
Route::get('/checkout/{selectedItems}', [HomeController::class, 'checkout'])->name('checkout');

//Payment Gateway
Route::get('/payment','App\Http\Controllers\StripeController@index')->name('index');
Route::post('/checkoutOrder','App\Http\Controllers\StripeController@checkoutOrder')->name('checkoutOrder');
// Route::post('/checkoutOrder/{order}', 'App\Http\Controllers\StripeController@checkoutOrder')->name('checkoutOrder');


Route::get('/success','App\Http\Controllers\StripeController@success')->name('success');

//Customer Order
Route::get('/viewOrders', [Controller::class, 'viewOrderList'])->name('custOrderList');
Route::get('/viewOrders/{orderID}', [Controller::class, 'viewOrderDetail'])->name('custOrderDetail');

//place Order
// Route::post('/placeOrder', [Controller::class, 'placeOrder'])->name('confirmOrder');

Route::post('/updateCancelOrder/{orderID}', [Controller::class, 'updateCancelOrder']);

Route::post('/updateCompleteOrder/{orderID}', [Controller::class, 'updateCompleteOrder']);