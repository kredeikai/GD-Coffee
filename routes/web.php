<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Public\PublicMenuController;

use App\Http\Controllers\Superadmin\DashboardController as SuperadminDashboard;

use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

use App\Http\Controllers\Customer\MenuController;
use App\Http\Controllers\Customer\OrderController;

/*
|--------------------------------------------------------------------------
| Fallback
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return "Maaf, alamat tidak ditemukan";
});


/*
|--------------------------------------------------------------------------
| PUBLIC / CUSTOMER (GUEST & CUSTOMER)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('coffeeshop.home');
});

Route::get('/about', function () {
    return view('coffeeshop.about');
});

Route::get('/menu', [PublicMenuController::class, 'index'])
    ->name('menu.public');

Route::get('/program', function () {
    return view('coffeeshop.program');
});


/*
|--------------------------------------------------------------------------
| AUTH - CUSTOMER
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


/*
|--------------------------------------------------------------------------
| AUTH PROCESS (ALL ROLES)
|--------------------------------------------------------------------------
*/
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'adminLogin'])
    ->name('admin.login.process');


/*
|--------------------------------------------------------------------------
| ADMIN AREA (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        // MENU
        Route::resource('menus', AdminMenuController::class);

        //ORDERS
        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('admin.orders.index');

        Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('admin.orders.updateStatus');

        // CONTACTS
        Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        Route::get('contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::put('contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        Route::post('contacts/{id}/restore', [ContactController::class, 'restore'])->name('contacts.restore');


        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('admin.logout');
    });


/*
|--------------------------------------------------------------------------
| SUPERADMIN AREA (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::prefix('superadmin')
    ->middleware(['auth', 'role:superadmin'])
    ->group(function () {

        Route::get('/dashboard', [SuperadminDashboard::class, 'index'])
            ->name('superadmin.dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('superadmin.logout');
    });

/*
|--------------------------------------------------------------------------
| CUSTOMER AREA (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->group(function () {

        // HOME customer
        Route::get('/home', function () {
            return view('customer.home');
        })->name('customer.home');

        // MENU customer
        Route::get('/menu', [MenuController::class, 'index'])
            ->name('customer.menu');

        // ORDERS customer
        Route::get('order', [OrderController::class, 'index'])
            ->name('customer.order');

        // ABOUT
        Route::get('/about', fn() => view('customer.about'));

        // CONTACT (feedback)
        Route::get('/contact', function () {
            return view('customer.contact');
        })->name('customer.contact');

        Route::post('/contact', [ContactController::class, 'store'])
            ->name('customer.contact.store');
    });
