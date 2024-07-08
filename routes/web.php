<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OperatorController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/all_buses_list', [HomeController::class, 'all_buses_list'])->name('all_buses_list');

Route::get('/bus-information', [HomeController::class, 'busInformation'])->name('bus-information');
// New Added
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::view('/payment', 'pages.payment')->name('payment');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/purchase_history', [AdminController::class, 'purchaseHistory'])->name('purchase_history');
    Route::get('/contact',[AdminController::class,'index'])->name('contact');

    Route::get('/customer',[AdminController::class,'index'])->name('customer');

    Route::post('/buy_now', [HomeController::class, 'seatsLayout'])->name('buy_now')->middleware('store_post_data');
    Route::post('/checkout-ticket', [HomeController::class, 'check_outTicket'])->name('checkout-ticket');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    /**
     * New modified routes
    */

    // Bookings Routes
    Route::get('/bookingsList', [AdminController::class, 'TicketBookingList'])->name('bookingsList');
    Route::get('/bookings', [AdminController::class, 'BookingsPage'])->name('bookings');


    // Salse History Routes
    Route::get('/ticketSalseHistory', [AdminController::class, 'TicketSale'])->name('ticketSalseHistory');
    Route::get('/salse-history', [AdminController::class, 'SalseHistoryPage'])->name('salse-history');


    // User Routes
    Route::get('/userList', [ProfileController::class, 'userList'])->name('users');
    Route::get('/user-all', [ProfileController::class, 'userall']);
    Route::post('user-delete',[ProfileController::class, 'userDelete']);


    // Bus Routes
    Route::get('/busList', [BusController::class, 'busList'])->name('allbus');
    Route::get('/bus-all-list', [BusController::class, 'getAllBus'])->name('bus-all-list');
    Route::post('bus-create', [BusController::class, 'busCreate']);
    Route::post('bus-delete', [BusController::class, 'deleteBus']);
    Route::post('getBusData', [BusController::class, 'getBus']);
    Route::post('bus-update', [BusController::class, 'busUpdate']);
    // Bus Fare Routes

    Route::get('/bus-fares', function () { return view('pages.admin.bus_fares'); })->name('bus-fares');
    Route::get('/bus-fares-list', [BusController::class, 'getAllBusfares'])->name('bus-fares-list');
    Route::post('bus-fares-create', [BusController::class, 'busFaresCreate']);
    // Route::post('bus-fares-delete', [BusController::class, 'busFaresDelete']);
    Route::post('busFaresData', [BusController::class, 'getFares']);
    Route::post('bus-fares-update', [BusController::class, 'busFaresUpdate']);

    // Operator Routes
    Route::get('/operatorList', [OperatorController::class, 'operatorList'])->name('operatorList');
    Route::get('/operators-all-list', [OperatorController::class, 'getAllOperators']);
    Route::post('operator-create', [OperatorController::class, 'operatorCreate']);

    Route::post('operatorData', [OperatorController::class, 'operatorData']);
    Route::post('operator-update', [OperatorController::class, 'operatorUpdate']);

    Route::post('operator-delete', [OperatorController::class, 'deleteOperator']);

// pdf
  Route::get('pdf-generate', [PdfController::class, 'pdfGenerate'])->name('pdf-generate');



    // Bus-Route Routes
    Route::get('/bus-routes', [RoutesController::class, 'index'])->name('bus-routes');
    Route::get('/routes-list',[RoutesController::class, 'show'])->name('routes.show');
    Route::post('/routes-create',[RoutesController::class, 'store'])->name('routes.store');
    Route::delete('/routes/{route}', [RoutesController::class, 'delete'])->name('routes.delete');
    // Route delete Routes
    Route::get('/routes/{id}', [RoutesController::class, 'getRouteId'])->name('routes.getRouteId');
    Route::put('/routes/{route}', [RoutesController::class, 'update'])->name('routes.update');

    Route::view('/payment_verify', 'pages.admin.payment_verify')->name('payment_verify');
    Route::get('/payment-list', [PaymentController::class, 'index'])->name('payment-list');
    Route::post('payment-update', [PaymentController::class, 'paymentUpdate']);

});


require __DIR__.'/auth.php';
