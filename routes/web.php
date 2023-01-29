<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Authentication Routes...
// Route::get('/', 'Auth\LoginController@showLoginForm');
// Route::get('logout', 'Auth\LoginController@logout');
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

// Route for Admin User
Route::group(['prefix' => '/home', 'middleware' => ['is_admin'], 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@home')->name('home');
    Route::resource('profile', 'ProfileController');
    Route::resource('customer', 'CustomerController');
    Route::resource('supplier', 'SupplierController');
    Route::post('categorylist', 'JsonController@categoryList')->name('categorylist');
    Route::post('brandname', 'JsonController@brandName')->name('brandname');
    Route::post('unitproduct', 'JsonController@unitProduct')->name('unitproduct');
    Route::resource('purchase', 'PurchaseController');
    Route::resource('category', 'CategoryController');
    Route::resource('unit', 'UnitController');
    Route::resource('brand', 'BrandController');
    Route::resource('purchase', 'PurchaseController');
    Route::post('productname', 'JsonpurchaseController@jsonPurchase')->name('productname');
    Route::post('productprice', 'JsonpurchaseController@jsonPrice')->name('productprice');
    Route::delete('product/destroy/{id}', 'JsonpurchaseController@destroy')->name('productdestroy');
    Route::resource('expense', 'ExpenseController');
    // Route::resource('storage', 'StoreController');
    Route::resource('stock', 'StockController');
    Route::post('purchaseproduct-name', 'ProductpurchaseController@jsonPurchaseProduct')->name('purchase-name');
    // Use for Purchase Return
    Route::resource('purchase-return', 'PurchaseReturnController');
    Route::post('purchase-productreturn', 'ProductpurchaseController@purchaseProductName')->name('purchase-productreturn');

    Route::post('purchase-product', 'ProductpurchaseController@showPurchaseproduct')->name('purchase-product');
    // use for Order
    Route::resource('order', 'OrderController');
    Route::resource('challan', 'ChallanController');

    Route::post('customer-details', 'ProductpurchaseController@customer')->name('customer-details');
    Route::post('order-purchaseproduct', 'ProductpurchaseController@orderPurchaseproduct')->name('order-purchaseproduct');
    // use for Sales return
    Route::resource('sales-return', 'SalesreturnController');
    // use for Sales api
    Route::post('order-return', 'SalesreturnapiController@salesreturn')->name('order-return');
    // use for Customer Email
    Route::resource('customer-email', 'CustomeremailController');
    Route::post('customer-api', 'CustomeremailapiController@customeremailapi')->name('customer-api');
    // use for Supplier Email
    Route::resource('supplier-email', 'SupplieremailController');
    Route::post('supplier-api', 'SupplieremailapiController@supplieremailapi')->name('supplier-api');
    // use for Create Role and Permission
    Route::resource('role-permission', 'RoleandPermissionController');
    // use for User Create
    Route::resource('user-create', 'UserCreateController');
    // All Reports
    Route::get('purchase-report', 'PurchaseReportController@index')->name('purchase-report');
    Route::post('purchase-report', 'PurchaseReportController@purchaseReport')->name('purchaseReport');
    Route::get('purchase-excelsheet', 'PurchaseReportController@purchaseExcelsheet')->name('purchaseExcelsheet');
    // Sales Report
    Route::get('sales-report', 'SalesReportController@index')->name('sales-report');
    Route::post('sales-report', 'SalesReportController@salesReport')->name('salesReport');
    Route::get('sales-excelsheet', 'SalesReportController@salesExcelsheet')->name('salesexcelsheet');
    // Inventory Report
    Route::get('inventory-report', 'InventoryreportController@index')->name('inventory-report');
    Route::post('inventory-report', 'InventoryreportController@inventoryReport')->name('inventoryReport');
    Route::get('inventory-excelsheet', 'InventoryreportController@inventoryExcelsheet')->name('inventoryexcelsheet');
    // Companysetting
    Route::resource('company-setting', 'CompanysettingController');
    // Account Route
    Route::resource('accounts', 'AccountController');
    // Fund Transfer Route
    Route::resource('fundtransfer', 'FundtransferController');
    Route::post('account-information', 'FundtransferApiController@accountInfo')->name('account-info');
    // Warehouse Route
    Route::resource('warehouse', 'WarehouseController');
    // Product Route
    Route::resource('product', 'ProductController');
    Route::post('product-details', 'ProductpurchaseController@productPurchasedetails')->name('product-details');
    Route::post('warehouse-details', 'ProductpurchaseController@warehouseDetails')->name('warehouse-details');
});
