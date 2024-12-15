<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;



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
 
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'prevent-back-history'],function(){
   
    
Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

Route::middleware('auth')->group(function () {
Route::get('/your/profile', [AdminController::class, 'YourProfile'])->name('your.profile');
Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');
Route::get('/edit/profile/store/{id}', [AdminController::class, 'EditProfileStore'])->name('edit.profile.store');
Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');

});

Route::middleware('auth')->group(function () {

Route::controller(AdminController::class)->group(function(){

    Route::get('/all/users' , 'AllUsers')->name('all.users')->middleware('permission:role.and.users.menu');
    Route::get('/add/user' , 'AddUser')->name('add.user')->middleware('permission:role.and.users.menu');
    Route::post('/store/user','StoreUser')->name('user.store');
    Route::get('/edit/user/{id}','Edituser')->name('edit.user');
    Route::post('/update/user','UpdateUser')->name('user.update');
    Route::get('/delete/user/{id}','DeleteUser')->name('delete.user');
    Route::get('/reset/user/{id}','ResetUserPassword')->name('reset.user.password');
    Route::post('/reset/password/','ResetPassword')->name('reset.password');

});


     //Permission All Route 
     Route::controller(RoleController::class)->group(function(){

        Route::get('/all/permission','AllPermission')->name('all.permission')->middleware('permission:role.and.users.menu');
        Route::get('/add/permission','AddPermission')->name('add.permission')->middleware('permission:role.and.users.menu');
        Route::post('/store/permission','StorePermission')->name('permission.store');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
       
       Route::post('/update/permission','UpdatePermission')->name('permission.update');
          Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission');
       
       });
    
    //Roles All Route 
    Route::controller(RoleController::class)->group(function(){
    
        Route::get('/all/roles','AllRoles')->name('all.roles')->middleware('permission:role.and.users.menu');
        //Route::get('/add/roles','AddRoles')->name('add.roles');
        Route::post('/store/roles','StoreRoles')->name('roles.store');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles')->middleware('permission:role.and.users.menu');
       
       Route::post('/update/roles','UpdateRoles')->name('roles.update');
        Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles');
       
       });
    
    
    ///Add Roles in Permission All Route 
    Route::controller(RoleController::class)->group(function(){
    
        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission')->middleware('permission:role.and.users.menu');
         Route::post('/role/permission/store','StoreRolesPermission')->name('role.permission.store');
       
          Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission')->middleware('permission:role.and.users.menu');
       
         Route::get('/admin/edit/roles/{id}','AdminEditRoles')->name('admin.edit.roles');
       
           Route::post('/role/permission/update/{id}','RolePermissionUpdate')->name('role.permission.update');
       
         Route::get('/admin/delete/roles/{id}','AdminDeleteRoles')->name('admin.delete.roles');


         Route::get('/import/permissions','importPermissions')->name('import.permissions')->middleware('permission:role.and.users.menu');
         Route::post('/import/roles','importRoles')->name('import.roles');
        
       });


  


Route::controller(ReportController::class)->group(function(){

    

    Route::get('/expense/report/view','ExpenseReportView')->name('expense.report.view')->middleware('permission:expense.reports');
    Route::post('/expense/report/pdf','ExpenseReportPdf')->name('expense.report.pdf');

   
});






Route::controller(SettingsController::class)->group(function(){

    Route::get('/company/setting' , 'Setting')->name('company.setting')->middleware('permission:settings.menu');
    Route::post('/company/setting/update' , 'companySettingUpdate')->name('company.setting.update');

});



Route::controller(StatementController::class)->group(function(){

    Route::get('/statement/view' , 'StatementView')->name('statement.view');
    Route::post('/transaction/history' , 'TransactionHistory')->name('transaction.history');
   

});

Route::controller(ExpenseController::class)->group(function(){

    Route::get('/expense/list' , 'ExpenseList')->name('expense.list');
    Route::post('/expense/store' , 'ExpenseStore')->name('expense.store');
    Route::get('/expense/detail/{id}' , 'ExpenseDetail')->name('expense.detail');
    Route::post('/expense/update/{id}' , 'ExpenseUpdate')->name('expense.update');
    Route::get('/expense/delete/{id}' , 'ExpenseDelete')->name('expense.delete');

});


Route::controller(IncomeController::class)->group(function(){

    Route::get('/income/list' , 'IncomeList')->name('income.list');
    Route::post('/income/store' , 'IncomeStore')->name('income.store');
    Route::get('/income/detail/{id}' , 'IncomeDetail')->name('income.detail');
    Route::post('/income/update/{id}' , 'IncomeUpdate')->name('income.update');
    Route::get('/income/delete/{id}' , 'IncomeDelete')->name('income.delete');

});



});/// ENd Middleware


});/// ENd Prevent Back History



