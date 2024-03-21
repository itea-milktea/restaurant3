<?php

use App\Http\Controllers\PaymentGatewayEventController;
use App\Http\Controllers\PaymentGatewayReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AssignStaffController;
use App\Http\Controllers\PaymentGatewayController;

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
    return view('auth.login');
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 //BILLING
 Route::get('invoice', [InvoiceController::class,'index']);
 Route::get('payment-gateway/{id}', [PaymentGatewayController::class, 'index']);
 Route::post('checkout-card/{id}', [PaymentGatewayController::class, 'payment']);
 Route::get('/success', [PaymentGatewayController::class, 'success'])->name('success');
 Route::get('/cancel', [PaymentGatewayController::class, 'cancel'])->name('checkout');
 Route::post('update-quantity/{id}', [PaymentGatewayController::class, 'updateCart']);
 Route::get('delete-item/id={id}/{item_id}', [PaymentGatewayController::class, 'deleteItem']);
 Route::view('/apps/invoice/list', 'apps.invoice.list');

 Route::get('continue-order/{id}', [PaymentGatewayController::class, 'continueOrder']);
 Route::get('cash-on-receipt/{id}', [PaymentGatewayController::class, 'cashOnReceipt']);

 //R1 RESERVATION PAYMENT GATEWAY
 Route::get('table-reservation-payments/{id}', [PaymentGatewayReservationController::class, 'paymentReservation']);
 Route::get('success-reservation-payment', [PaymentGatewayReservationController::class, 'success'])->name('success_table_reservation');

 //RI EVENT RESERVATION PAYMENT GATEWAY
 Route::get('event-reservation-payments/{id}', [PaymentGatewayEventController::class, 'eventPayment']);
Route::get('success-event-reservation-payment', [PaymentGatewayEventController::class, 'success'])->name('event.success');

 Route::view('/apps/notes', 'apps.notes');
Route::middleware(['auth', 'verified'])->group(function(){
    //PLACE YOUR ROUTES HERE FOR VERIFIED USER
    

    //APPS
   

    Route::get('apps-todolist', [HomeController::class, 'todolist']);
    Route::get('employee-info', [EmployeeController::class,'index']);
    Route::get('add-employee', [EmployeeController::class, 'addEmployee']);
    Route::POST('submit-profiles', [EmployeeController::class, 'createProfile']);
    Route::get('view-profile/{id}', [EmployeeController::class, 'viewProfile']);
    Route::put('submit-performance/{id}', [EmployeeController::class, 'submitPerformance']);
    Route::put('update-profiles{id}', [EmployeeController::class, 'updateProfile']);
    Route::get('delete-employee-profile/{id}', [EmployeeController::class, 'deleteEmployee']);

   

    //PAYMENT
  

    //calendar
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');


    //SERVER STAFF ASSIGNATION
    Route::post('assign-staff', [AssignStaffController::class, 'assignStaff']);
});


require __DIR__.'/auth.php';
