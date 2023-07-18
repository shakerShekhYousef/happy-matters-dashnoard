<?php

use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\PropertyController;
use App\Http\Controllers\dashboard\users\LandlordController;

use App\Models\Landlord;
use App\Models\Feature;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Utility;
use Illuminate\Http\Request;
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


route::get('login', [HomeController::class, 'login']);
Auth::routes();

route::middleware('auth')->group( function () {
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/', [HomeController::class, 'index'])->name('home');

});

////////////////properties group
route::prefix('properties')->middleware('auth')->group( function () {
    Route::get('create', [App\Http\Controllers\dashboard\PropertyController::class, 'create'])->name('web_create_property');
    Route::post('store', [App\Http\Controllers\dashboard\PropertyController::class, 'store'])->name('web_store_property');
    Route::get('properties', [App\Http\Controllers\dashboard\PropertyController::class, 'index'])->name('web_properties_list');
    Route::get('edit/{id}', [App\Http\Controllers\dashboard\PropertyController::class, 'edit'])->name('web_edit_property');
    Route::get('show/{id}', [App\Http\Controllers\dashboard\PropertyController::class, 'show'])->name('web_show_property');
    Route::post('update/{id}', [App\Http\Controllers\dashboard\PropertyController::class, 'update'])->name('web_update_property');
    Route::delete('delete/{id}', [App\Http\Controllers\dashboard\PropertyController::class, 'destroy'])->name('web_delete_property');
});

/////////////////////unit group
route::prefix('units')->middleware('auth')->group( function () {

    Route::get('units', [App\Http\Controllers\dashboard\UnitController::class, 'index'])->name('web_units_list');
    Route::get('create', [App\Http\Controllers\dashboard\UnitController::class, 'create'])->name('web_create_unit');
    Route::post('store', [App\Http\Controllers\dashboard\UnitController::class, 'store'])->name('web_store_unit');
    Route::get('show/{id}', [App\Http\Controllers\dashboard\UnitController::class, 'show'])->name('web_show_unit');
    Route::get('edit/{id}', [App\Http\Controllers\dashboard\UnitController::class, 'edit'])->name('web_edit_unit');
    Route::post('update/{id}', [App\Http\Controllers\dashboard\UnitController::class, 'update'])->name('web_update_Unit');
    Route::delete('delete/{id}', [App\Http\Controllers\dashboard\UnitController::class, 'destroy'])->name('web_delete_Unit');
});
////////////////Announcement
route::prefix('announcements')->middleware('auth')->group( function () {
    Route::get('create', [App\Http\Controllers\dashboard\AnnouncementController::class, 'create'])->name('web_create_announcement');
    Route::post('store', [App\Http\Controllers\dashboard\AnnouncementController::class, 'store'])->name('web_store_announcement');
    Route::get('announcements', [App\Http\Controllers\dashboard\AnnouncementController::class, 'index'])->name('web_announcements_list');
    Route::get('edit/{id}', [App\Http\Controllers\dashboard\AnnouncementController::class, 'edit'])->name('web_edit_announcement');
    Route::get('show/{id}', [App\Http\Controllers\dashboard\AnnouncementController::class, 'show'])->name('web_show_announcement');
    Route::post('update/{id}', [App\Http\Controllers\dashboard\AnnouncementController::class, 'update'])->name('web_update_announcement');
    Route::delete('delete/{id}', [App\Http\Controllers\dashboard\AnnouncementController::class, 'destroy'])->name('web_delete_announcement');
});
//////////////tenant management
route::prefix('tenants')->middleware('auth')->group( function () {
    Route::get('create', [App\Http\Controllers\dashboard\users\TenantController::class, 'create'])->name('web_create_tenant');
    Route::post('store', [App\Http\Controllers\dashboard\users\TenantController::class, 'store'])->name('web_store_tenant');
    Route::get('tenants', [App\Http\Controllers\dashboard\users\TenantController::class, 'index'])->name('web_tenants_list');
    Route::get('edit/{id}', [App\Http\Controllers\dashboard\users\TenantController::class, 'edit'])->name('web_edit_tenant');
    Route::get('show/{id}', [App\Http\Controllers\dashboard\users\TenantController::class, 'show'])->name('web_show_tenant');
    Route::get('tenantpets/{id}', [App\Http\Controllers\dashboard\users\TenantController::class, 'pet'])->name('web_pets_list');
    Route::get('tenantguests/{id}', [App\Http\Controllers\dashboard\users\TenantController::class, 'guest'])->name('web_guests_list');
    Route::get('tenantcompany/{id}', [App\Http\Controllers\dashboard\users\TenantController::class, 'company'])->name('web_company_list');
    Route::get('tenantvehicles/{id}', [App\Http\Controllers\dashboard\users\TenantController::class, 'vehicle'])->name('web_vehicles_list');

    Route::post('update/{id}', [App\Http\Controllers\dashboard\users\TenantController::class, 'update'])->name('web_update_tenant');
    Route::delete('delete/{id}', [App\Http\Controllers\dashboard\users\TenantController::class, 'destroy'])->name('web_delete_tenant');
});

///////////////contract management
route::prefix('contracts')->middleware('auth')->group( function () {
    Route::get('create', [App\Http\Controllers\dashboard\ContractController::class, 'create'])->name('web_create_contract');
    Route::post('store', [App\Http\Controllers\dashboard\ContractController::class, 'store'])->name('web_store_contract');
    Route::get('contracts', [App\Http\Controllers\dashboard\ContractController::class, 'index'])->name('web_contracts_list');
    Route::get('edit/{id}', [App\Http\Controllers\dashboard\ContractController::class, 'edit'])->name('web_edit_contract');
    Route::get('show/{id}', [App\Http\Controllers\dashboard\ContractController::class, 'show'])->name('web_show_contract');
    Route::post('update/{id}', [App\Http\Controllers\dashboard\ContractController::class, 'update'])->name('web_update_contract');
    Route::delete('delete/{id}', [App\Http\Controllers\dashboard\ContractController::class, 'destroy'])->name('web_delete_contract');
});

//////////////landlords management

route::prefix('landlords')->middleware('auth')->group( function (){
    Route::get('create',[App\Http\Controllers\dashboard\users\LandlordController::class,'create'])->name('web_create_landlord');
    Route::post('store',[App\Http\Controllers\dashboard\users\LandlordController::class,'store'])->name('web_store_landlord');
    Route::get('landlords',[App\Http\Controllers\dashboard\users\LandlordController::class,'index'])->name('web_landlords_list');
    Route::get('edit/{id}',[App\Http\Controllers\dashboard\users\LandlordController::class,'edit'])->name('web_edit_landlord');
    Route::get('show/{id}',[App\Http\Controllers\dashboard\users\LandlordController::class,'show'])->name('web_show_landlord');
    Route::post('update/{id}',[App\Http\Controllers\dashboard\users\LandlordController::class,'update'])->name('web_update_landlord');
    Route::delete('delete/{id}',[App\Http\Controllers\dashboard\users\LandlordController::class,'destroy'])->name('web_delete_landlord');
    });
    //////////////Vendor management

route::prefix('Vendors')->middleware('auth')->group( function (){
    Route::get('create',[App\Http\Controllers\dashboard\users\VendorController::class,'create'])->name('web_create_vendor');
    Route::post('store',[App\Http\Controllers\dashboard\users\VendorController::class,'store'])->name('web_store_vendor');
    Route::get('Vendors',[App\Http\Controllers\dashboard\users\VendorController::class,'index'])->name('web_vendors_list');
    Route::get('edit/{id}',[App\Http\Controllers\dashboard\users\VendorController::class,'edit'])->name('web_edit_vendor');
    Route::get('show/{id}',[App\Http\Controllers\dashboard\users\VendorController::class,'show'])->name('web_show_vendor');
    Route::post('update/{id}',[App\Http\Controllers\dashboard\users\VendorController::class,'update'])->name('web_update_vendor');
    Route::delete('delete/{id}',[App\Http\Controllers\dashboard\users\VendorController::class,'destroy'])->name('web_delete_vendor');
    });
    //////////////inventory management
    route::prefix('inventory')->middleware('auth')->group( function (){
        Route::get('create',[App\Http\Controllers\dashboard\InventoryItemController::class,'create'])->name('web_create_inventory');
        Route::post('store',[App\Http\Controllers\dashboard\InventoryItemController::class,'store'])->name('web_store_inventory');
        Route::get('inventory',[App\Http\Controllers\dashboard\InventoryItemController::class,'index'])->name('web_inventory_list');
        Route::get('edit/{id}',[App\Http\Controllers\dashboard\InventoryItemController::class,'edit'])->name('web_edit_inventory');
        Route::get('show/{id}',[App\Http\Controllers\dashboard\InventoryItemController::class,'show'])->name('web_show_inventory');
        Route::post('update/{id}',[App\Http\Controllers\dashboard\InventoryItemController::class,'update'])->name('web_update_inventory');
        Route::delete('delete/{id}',[App\Http\Controllers\dashboard\InventoryItemController::class,'destroy'])->name('web_delete_inventory');
        });
         //////////////inspections management
    route::prefix('inspections')->middleware('auth')->group( function (){
        Route::get('create',[App\Http\Controllers\dashboard\InspectionController::class,'create'])->name('web_create_inspection');
        Route::post('store',[App\Http\Controllers\dashboard\InspectionController::class,'store'])->name('web_store_inspection');
        Route::get('inspections',[App\Http\Controllers\dashboard\InspectionController::class,'index'])->name('web_inspections_list');
        Route::get('edit/{id}',[App\Http\Controllers\dashboard\InspectionController::class,'edit'])->name('web_edit_inspection');
        Route::get('show/{id}',[App\Http\Controllers\dashboard\InspectionController::class,'show'])->name('web_show_inspection');
        Route::post('update/{id}',[App\Http\Controllers\dashboard\InspectionController::class,'update'])->name('web_update_inspection');
        Route::delete('delete/{id}',[App\Http\Controllers\dashboard\InspectionController::class,'destroy'])->name('web_delete_inspection');
        });
         //////////////Maintenances management
    route::prefix('Maintenances')->middleware('auth')->group( function (){
        Route::get('create',[App\Http\Controllers\dashboard\MaintenanceController::class,'create'])->name('web_create_maintenance');
        Route::post('store',[App\Http\Controllers\dashboard\MaintenanceController::class,'store'])->name('web_store_maintenance');
        Route::get('maintenances',[App\Http\Controllers\dashboard\MaintenanceController::class,'index'])->name('web_maintenances_list');
        Route::get('edit/{id}',[App\Http\Controllers\dashboard\MaintenanceController::class,'edit'])->name('web_edit_maintenance');
        Route::get('show/{id}',[App\Http\Controllers\dashboard\MaintenanceController::class,'show'])->name('web_show_maintenance');
        Route::post('update/{id}',[App\Http\Controllers\dashboard\MaintenanceController::class,'update'])->name('web_update_maintenance');
        Route::delete('delete/{id}',[App\Http\Controllers\dashboard\MaintenanceController::class,'destroy'])->name('web_delete_maintenance');
        Route::get('document/{id}',[App\Http\Controllers\dashboard\MaintenanceController::class,'document'])->name('web_documents_list');
        Route::get('media/{id}',[App\Http\Controllers\dashboard\MaintenanceController::class,'media'])->name('web_media_list');
  
        });























