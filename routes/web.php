<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ViewClientController;
use App\Http\Controllers\AppointmentController;

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

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth', 'admin')->group(function(){

        //--------------------Users views--------------------------
        Route::get('/user/show', [UserController::class, 'index'] )->name('user.show');
        // Route create front-end controller
        Route::get('/user/create', [UserController::class,'create'])->name('user.create');
        // Route create back-end controller
        Route::post('/userStore', [UserController::class,'store']);
        // Route editing front-end controller
        Route::get('/user/edit/{user_id}', [UserController::class,'edit'])->name('user.edit');
        // Route update back-end controller
        Route::put('/user/update/{users}', [UserController::class,'update'])->name('user.update');
        // Route delete back-end controller
        Route::delete('user/destroy/{id}', [UserController::class,'destroy'])->name('user.destroy');

});

Route::middleware('auth', 'employee','admin')->group(function(){

        //------------------- Categories Views--------------------------
        Route::get('/category/show', [CategoryController::class, 'index'] )->name('category.show');
        //Ruta para Crear (FrontEnd)
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        //Ruta para Crear (BackEnd)
        Route::post('/categoryStore', [CategoryController::class, 'store']);
        //Ruta para Modificar (FrontEnd)
        Route::get('/category/edit/{id_category}', [CategoryController::class, 'edit'])->name('category.edit');
        //Ruta para Modificar BackEnd)
        Route::put('/category/update/{categories}', [CategoryController::class, 'update'])->name('category.update'); 
        //Ruta para Eliminar (BackEnd)
        Route::delete('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy'); 
    
        // -----------------Services views--------------------------
        Route::get('/service/show', [ServiceController::class,'index'])->name('service.show');
        //Ruta para Crear (FrontEnd)
        Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
        //Ruta para Crear (BackEnd)
        Route::post('/serviceStore', [ServiceController::class, 'store']);
        //Ruta para Modificar (FrontEnd)
        Route::get('/service/edit/{id_service}', [ServiceController::class, 'edit'])->name('service.edit');
        //Ruta para Modificar BackEnd)
        Route::put('/service/update/{services}', [ServiceController::class, 'update'])->name('service.update'); 
        //Ruta para Eliminar (BackEnd)
        Route::delete('service/destroy/{id}', [ServiceController::class, 'destroy'])->name('service.destroy'); 
    
        //--------------------Appointments views--------------------------
        Route::get('/appointment/show', [AppointmentController::class, 'index'] )->name('appointment.show');
        //Ruta para Crear (FrontEnd)
        Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
        //Ruta para Crear (BackEnd)
        Route::post('/appointmentStore', [AppointmentController::class, 'store']);
        //Ruta para Modificar (FrontEnd)
        Route::get('/appointment/edit/{id_appointment}', [AppointmentController::class, 'edit'])->name('appointment.edit');
        //Ruta para Modificar BackEnd)
        Route::put('/appointment/update/{appointments}', [AppointmentController::class, 'update'])->name('appointment.update'); 
        //Ruta para Eliminar (BackEnd)
        Route::delete('appointment/destroy/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy'); 
    
        //--------------------Payment views--------------------------
        Route::get('/payment/show', [PaymentController::class, 'index'] )->name('payment.show');
        //Ruta para Crear (FrontEnd)
        Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
        //Ruta para Crear (BackEnd)
        Route::post('/paymentStore', [PaymentController::class, 'store']);
        //Ruta para Modificar (FrontEnd)
        Route::get('/payment/edit/{id_payment}', [PaymentController::class, 'edit'])->name('payment.edit');
        //Ruta para Modificar BackEnd)
        Route::put('/payment/update/{payments}', [PaymentController::class, 'update'])->name('payment.update'); 
        //Ruta para Eliminar (BackEnd)
        Route::delete('payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy'); 

});

Route::middleware('auth', 'client')->group(function(){
//--------------------views to Client--------------------------
        // show category
        Route::get('/client/category/show', [ViewClientController::class, 'viewClient'] )->name('client.category.show');
        // show service by category
        Route::get('client/service/search/{id_category}', [ViewClientController::class, 'search'])->name('client.service.search');
        // show service all
        Route::get('client/service/all/', [ViewClientController::class, 'index'])->name('client.service.all');
        //--------------------views to Shopping Cart--------------------------
        // show shopping cart
        Route::get('/cart/show', [CartController::class, 'index'] )->name('cart.show');

});

// Without login 
        // view home with category
        Route::get('/', [ViewClientController::class,'home'])->name('home');
        // view home with service
        Route::get('/service/search/{id_category}', [ViewClientController::class,'service'])->name('service.search');

        Route::get('/about', function () {
                return view('Home/About');
            })->name('about');














require __DIR__.'/auth.php';