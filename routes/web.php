<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AttandanceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CartController;



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Employees Route
Route::get('/add-employee', [EmployeeController::class, 'index'])->name('add.employee');
Route::post('/insert-employee', [EmployeeController::class, 'store']);
Route::get('/all-employee', [EmployeeController::class, 'show'])->name('all.employee');
Route::get('/view-employee/{id}', [EmployeeController::class, 'view']);
Route::get('/delete-employee/{id}', [EmployeeController::class, 'destroy']);
Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit']);
Route::post('/update-employee/{id}', [EmployeeController::class, 'update']);

// Customer Route
Route::get('/add-customer', [CustomerController::class, 'index'])->name('add.customer');
Route::post('/insert-customer', [CustomerController::class, 'store']);
Route::get('/all-customer', [CustomerController::class, 'show'])->name('all.customer');
Route::get('/view-customer/{id}', [CustomerController::class, 'view']);
Route::get('/delete-customer/{id}', [CustomerController::class, 'destroy']);
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit']);
Route::post('/update-customer/{id}', [CustomerController::class, 'update']);

// Supplier Route
Route::get('/add-supplier', [SupplierController::class, 'index'])->name('add.supplier');
Route::post('/insert-supplier', [SupplierController::class, 'store']);
Route::get('/all-supplier', [SupplierController::class, 'show'])->name('all.supplier');
Route::get('/view-supplier/{id}', [SupplierController::class, 'view']);
Route::get('/delete-supplier/{id}', [SupplierController::class, 'destroy']);
Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit']);
Route::post('/update-supplier/{id}', [SupplierController::class, 'update']);

// Salary Route
Route::get('/add-advanced-salary', [SalaryController::class, 'advancedSalary'])->name('add.advancedSalary');
Route::post('/insert-advanced-salary', [SalaryController::class, 'InsertAdvanced']);
Route::get('/all-advancedSalary', [SalaryController::class, 'showAdvancedSalary'])->name('all.advancedSalary');
Route::get('/pay-salary', [SalaryController::class, 'paySalary'])->name('pay.salary');
Route::get('/last-salary', [SalaryController::class, 'lastSalary'])->name('last.salary');

// Category Route
Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add.category');
Route::post('/insert-category', [CategoryController::class, 'insertCategory']);
Route::get('/all-category', [CategoryController::class, 'allCategory'])->name('all.category');
Route::get('/delete-category/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
Route::post('/update-category/{id}', [CategoryController::class, 'update']);

// Product Route
Route::get('/add-product', [ProductController::class, 'index'])->name('add.product');
Route::post('/insert-product', [ProductController::class, 'store']);
Route::get('/all-product', [ProductController::class, 'show'])->name('all.product');
Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);
Route::get('/view-product/{id}', [ProductController::class, 'view']);
Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
Route::post('/update-product/{id}', [ProductController::class, 'update']);

// Expense Route
Route::get('/add-expense', [ExpenseController::class, 'index'])->name('add.expense');
Route::post('/insert-expense', [ExpenseController::class, 'store']);
Route::get('/today-expense', [ExpenseController::class, 'todayExpense'])->name('today.expense');
Route::get('/edit-today-expense/{id}', [ExpenseController::class, 'editTodayExpense']);
Route::post('/update-today-expense/{id}', [ExpenseController::class, 'updateTodayExpense']);
Route::get('/monthly-expense', [ExpenseController::class, 'monthlyExpense'])->name('monthly.expense');
Route::get('/yearly-expense', [ExpenseController::class, 'yearlyExpense'])->name('yearly.expense');

// Attandance Route
Route::get('/add-attendance', [AttandanceController::class, 'index'])->name('add.attendance');
Route::post('/insert-attendance', [AttandanceController::class, 'store']);
Route::get('/all-attendance', [AttandanceController::class, 'show'])->name('all.attendance');

// Setting Route update-setting
Route::get('/setting', [SettingController::class, 'setting'])->name('setting');
Route::post('/update-setting/{id}', [SettingController::class, 'update']);

// POS Route
Route::get('/pos', [PosController::class, 'index'])->name('pos');
Route::get('/pending/orders', [PosController::class, 'pendingOrders'])->name('pending.orders');
Route::get('/view-orders-status/{o_id}', [PosController::class, 'viewOrders']);
Route::get('/pos-done/{o_id}', [PosController::class, 'posDone']);


// Cart Route 
Route::post('/add-cart', [CartController::class, 'index']);
Route::post('/cart-update/{rowId}', [CartController::class, 'update']);
Route::get('/cart-remove/{rowId}', [CartController::class, 'destroy']);

// Invoice Route
Route::post('/create-invoice', [CartController::class, 'create_invoice']); 
Route::post('/final-invoice', [CartController::class, 'finalInvoice']); 
