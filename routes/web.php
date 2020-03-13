<?php



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/regi', function(){
	return view('auth.register');});




Route::get('/inbox', function(){
	echo "inbox";
})->name('inbox')->middleware('verified');

Route::get('/calendar', function(){
	echo "calendar";
})->name('calendar');

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

//Employee route here............
Route::get('/add-employee','EmployeeController@index')->name('add.employee');
Route::post('/insert-employee','EmployeeController@store');
Route::get('/all-employee','EmployeeController@Employees')->name('all.employee');
Route::get('/view-employee/{id}','EmployeeController@view');
Route::get('delete-employee/{id}','EmployeeController@DeleteEmployee');
Route::get('edit-employee/{id}','EmployeeController@EditEmployee');
Route::post('/update-employee/{id}','EmployeeController@UpdateEmployee');
//customers route here
Route::get('/add-customers','CustomerController@index')->name('add.customers');
Route::post('/insert-customers','CustomerController@store');
Route::get('/all-customers','CustomerController@customers')->name('all.customers');
Route::get('view-customer/{id}','CustomerController@view');
Route::get('edit-customer/{id}','CustomerController@EditCustomer');
Route::post('/update-customers/{id}','CustomerController@UpdateCustomer');
Route::get('delete-customer/{id}','CustomerController@DeleteCustomer');
///Supliers route here
Route::get('/add-supliers','SuplierController@index')->name('add.supliers');
Route::post('/insert-suplier','SuplierController@store');
Route::get('/all-suplier','SuplierController@suplier')->name('all.suplier');
Route::get('view-suplier/{id}','SuplierController@view');
Route::get('edit-suplier/{id}','SuplierController@EditSuplier');
Route::post('/update-suplier/{id}','SuplierController@UpdateSuplier');
Route::get('delete-suplier/{id}','SuplierController@DeleteSuplier');
///Advanced salaries here-------
Route::get('/add-salary','SalaryController@advance')->name('add.salary');
Route::post('/insert-advanced','SalaryController@store');
Route::get('/edit-advanced/{id}','SalaryController@edit_advanced');
Route::post('/update-advanced/{id}','SalaryController@update');
Route::get('delete-advanced/{id}','SalaryController@delete');
Route::get('/all.advance','SalaryController@All_advance')->name('all.advance');
Route::get('/pay.salary','SalaryController@pay_advance')->name('pay.salary');
///category  routes----------
Route::get('/add-category','SalaryController@add_category')->name('add.category');
Route::post('/insert-category','SalaryController@cat_store');
Route::get('/all-supliers','SalaryController@all_category')->name('all.category');
Route::get('/edit-category/{id}','SalaryController@edit_category');
Route::post('/update-category/{id}','SalaryController@update_category');
Route::get('delete-category/{id}','SalaryController@delete_category');
/// products route here----------
Route::get('view-product/{id}','ProductController@view_product');
 Route::get('/add-product','ProductController@add_product')->name('add.product');
Route::post('/insert-product','ProductController@product_store');
 Route::get('/all-products','ProductController@all_products')->name('all.products');
Route::get('/edit-product/{id}','ProductController@edit_product');
 Route::post('/update-product/{id}','ProductController@update_product');
Route::get('delete-product/{id}','ProductController@delete_product');
///product exel route-------------
 Route::get('/import-products','ProductController@import_products')->name('import.products');
 Route::get('/export','ProductController@export')->name('export');
 Route::post('/import','ProductController@import')->name('import');


///expense category here-------------
Route::get('/add-expense','ExpenseController@add_expense')->name('add.expense');
Route::post('/insert-expense','ExpenseController@expense_store');
 Route::get('/today-expense','ExpenseController@today_expense')->name('today.expense');
 Route::get('/monthly-expense','ExpenseController@monthly_expense')->name('monthly.expense');
 Route::get('/yearly-expense','ExpenseController@yearly_expense')->name('yearly.expense');
Route::get('/edit-expense/{id}','ExpenseController@edit_expense');
Route::post('/update-expense/{id}','ExpenseController@update_expense');
Route::get('delete-expense/{id}','ExpenseController@delete_expense');
///attendance route---------------------
Route::get('view-attendance/{edit_date}','AttendanceController@view_attendance');
 Route::get('/add-attendance','AttendanceController@add_attendance')->name('add.attendance');
 Route::post('/insert-attendance','AttendanceController@attendance_store');
  Route::get('/all-attendance','AttendanceController@all_attendance')->name('all.attendance');
 Route::get('/edit-attendance/{edit_date}','AttendanceController@edit_attendance');
Route::post('/update-attendance','AttendanceController@update_attendance');
Route::get('delete-attendance/{edit_date}','AttendanceController@delete_attendance');
//// pos route--------------------------
Route::get('/pos','PosController@index')->name('pos');
Route::get('/pending.order','PosController@pending_order')->name('pending.order');
Route::get('/success.order','PosController@success_order')->name('success.order');
Route::get('view_order/{id}', 'PosController@view_order');
Route::get('/invoice_done/{id}', 'PosController@invoice_done');


///cart route here--------
Route::post('/add-cart', 'CartController@index');
Route::post('/update-cart/{rowId}', 'CartController@cart_update');
Route::get('/remove-cart/{rowId}', 'CartController@cart_remove');
Route::post('/invoice', 'CartController@cart_invoice');
Route::post('/final-invoice', 'CartController@final_invoice');
////pdf============
Route::get('/add_pdf/{id}', 'CartController@generate_pdf');










