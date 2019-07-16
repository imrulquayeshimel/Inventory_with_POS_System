<?php

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
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


//Employee Routes---------
Route::get('/add-employee', 'EmployeeController@addEmployee')->name('add.employee');
Route::post('/insert-employee','EmployeeController@store');
Route::get('/all-employee', 'EmployeeController@AllEmployees')->name('all.employee');
Route::get('/view-employee/{id}','EmployeeController@viewEmployee');
Route::get('/delete-employee/{id}','EmployeeController@deleteEmployee');
Route::get('/edit-employee/{id}','EmployeeController@editEmployee');
Route::post('/update-employee/{id}','EmployeeController@updateEmployee');


//Customers Routes----------
Route::get('/add-customer', 'CustomerController@addCustomer')->name('add.customer');
Route::post('/insert-customer','CustomerController@store');
Route::get('/all-customer', 'CustomerController@allCustomer')->name('all.customer');
Route::get('/view-customer/{id}','CustomerController@viewCustomer');
Route::get('/delete-customer/{id}','CustomerController@deleteCustomer');
Route::get('/edit-customer/{id}','CustomerController@editCustomer');
Route::post('/update-customer/{id}','CustomerController@updateCustomer');


//Supplier Route-----------
Route::get('/add-supplier', 'SupplierController@addSupplier')->name('add.supplier');
Route::post('/insert-supplier','SupplierController@store');
Route::get('/all-supplier', 'SupplierController@allSupplier')->name('all.supplier');
Route::get('/view-supplier/{id}','SupplierController@viewSupplier');
Route::get('/delete-supplier/{id}','SupplierController@deleteSupplier');
Route::get('/edit-supplier/{id}','SupplierController@editSupplier');
Route::post('/update-supplier/{id}','SupplierController@updateSupplier');



//Employee salary -----------
Route::get('/add-advancedsalary', 'SalaryController@addAdvancedSalary')->name('add.Advancedsalary');
Route::post('/insert-advancedsalary','SalaryController@storeAdvancedSalary');
Route::get('/all-advancedsalary', 'SalaryController@allAdvancedSalary')->name('all.Advancedsalary');
Route::get('/pay-salary', 'SalaryController@paySalary')->name('pay.salary');



//Category-------------
Route::get('/add-category', 'CategoryController@addCategory')->name('add.category');
Route::post('/insert-category','CategoryController@storeCategory');
Route::get('/all-category', 'CategoryController@allCategory')->name('all.category');
Route::get('/delete-category/{id}','CategoryController@deleteCategory');
Route::get('/edit-category/{id}','CategoryController@editCategory');
Route::post('/update-category/{id}','CategoryController@updateCategory');


//Product-----------
Route::get('/add-product', 'ProductController@addProduct')->name('add.product');
Route::post('/insert-product','ProductController@storeProduct');
Route::get('/all-product', 'ProductController@allProduct')->name('all.product');
Route::get('/view-product/{id}','ProductController@viewProduct');
Route::get('/delete-product/{id}','ProductController@deleteProduct');
Route::get('/edit-product/{id}','ProductController@editProduct');
Route::post('/update-product/{id}','ProductController@updateProduct');

//Excel import & export---------
Route::get('/import-product', 'ProductController@importProduct')->name('import.product');
Route::get('/export', 'ProductController@export')->name('export');
Route::post('/import', 'ProductController@Import')->name('import');



//expense-------------
//today expense----
Route::get('/add-expense', 'ExpenseController@addExpense')->name('add.expense');
Route::post('/insert-expense','ExpenseController@storeExpense');
Route::get('/today-expense', 'ExpenseController@todayExpense')->name('today.expense');
Route::get('/edit-today-expense/{id}','ExpenseController@editTodayExpense');
Route::post('/update-expense/{id}','ExpenseController@updateTodayExpense');
//monthly Expense----------
Route::get('/monthly-expense', 'ExpenseController@monthlyExpense')->name('monthly.expense');
//yearly expense---
Route::get('/yearly-expense', 'ExpenseController@yearlyExpense')->name('yearly.expense');

//monthly more expense------
Route::get('/january-expense', 'ExpenseController@januaryExpense')->name('january.expense');
Route::get('/february-expense', 'ExpenseController@februaryExpense')->name('february.expense');
Route::get('/march-expense', 'ExpenseController@marchExpense')->name('march.expense');
Route::get('/april-expense', 'ExpenseController@aprilExpense')->name('april.expense');
Route::get('/may-expense', 'ExpenseController@mayExpense')->name('may.expense');
Route::get('/june-expense', 'ExpenseController@juneExpense')->name('june.expense');
Route::get('/july-expense', 'ExpenseController@julyExpense')->name('july.expense');
Route::get('/august-expense', 'ExpenseController@augustExpense')->name('august.expense');
Route::get('/september-expense', 'ExpenseController@septemberExpense')->name('september.expense');
Route::get('/october-expense', 'ExpenseController@octoberExpense')->name('october.expense');
Route::get('/november-expense', 'ExpenseController@novemberExpense')->name('november.expense');
Route::get('/december-expense', 'ExpenseController@decemberExpense')->name('december.expense');




//Attendence-----
Route::get('/take-attendence', 'AttendenceController@takeAttendence')->name('take.attendence');
Route::post('/insert-attendence','AttendenceController@InsertAttendence');
Route::get('/all-attendence', 'AttendenceController@allAttendence')->name('all.attendence');
Route::get('/edit-attenedence/{edit_date}','AttendenceController@editAttendence');
Route::post('/update-attendence','AttendenceController@updateAttendence');
Route::get('/view-attenedence/{edit_date}','AttendenceController@viewAttendence');


//Setting------
Route::get('/website-setting', 'SettingController@Setting')->name('setting');
Route::post('/update-wesite/{id}','SettingController@updateWebsite');


//POS---------------
Route::get('/pos', 'PosController@index')->name('pos');

//Orders-----------
Route::get('/pending-order', 'PosController@PendingOrder')->name('pending.orders');
Route::get('/view-order-status/{id}', 'PosController@ViewOrder');
Route::get('/pos-done/{id}', 'PosController@PosDone');
Route::get('/sucess-order', 'PosController@SucessOrder')->name('success.orders');



//Cart---------------
Route::post('/add-cart', 'CartController@addCart');
Route::post('/cart-update/{rowId}', 'CartController@UpdateCart');
Route::get('/cart-remove/{rowId}', 'CartController@RemoveCart');
Route::post('/invoice', 'CartController@CreateInvoice');
Route::post('/final-invoice', 'CartController@FinalInvoice');

















// Route::get('/',function ()
//      {
// 	      echo ' ';
//       })->name('');
// Route::get('/',function ()
//      {
// 	      echo ' ';
//       })->name('');