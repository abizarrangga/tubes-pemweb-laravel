<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

// ─── Halaman Publik ───────────────────────────────────────────────────────────

Route::get('/',        [PageController::class, 'home'])->name('home');
Route::get('/about',   [PageController::class, 'about'])->name('about');
Route::get('/events',  [PageController::class, 'events'])->name('events');

// Midtrans webhook callback
Route::post('/midtrans/callback', [TicketController::class, 'callback'])->name('midtrans.callback');

// Alur Pendaftaran & Tiket (Harus Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'userTickets'])->name('tickets');
    Route::get('/tickets/payment/finish', [TicketController::class, 'paymentFinish'])->name('tickets.payment.finish');
    Route::get('/tickets/{id}/success', [TicketController::class, 'bookSuccess'])->name('tickets.book.success');

    Route::get('/events/{slug}/register', [RegistrationController::class, 'showForm'])->name('events.register');
    Route::post('/events/{slug}/register', [RegistrationController::class, 'register'])->name('events.register.store');
    Route::get('/events/{slug}/register/success/{id}', [RegistrationController::class, 'success'])->name('events.register.success');

    Route::get('/events/{slug}/book', [TicketController::class, 'showBookForm'])->name('events.book');
    Route::post('/events/{slug}/book', [TicketController::class, 'book'])->name('events.book.store');
});

// Berita publik
Route::get('/news',        [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Form kontak — menampung POST dari pages/about
Route::post('/contact', [PageController::class, 'contact'])->name('contact.store');

// ─── Auth ─────────────────────────────────────────────────────────────────────

Route::get('/login',    [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',   [AuthController::class, 'login'])->name('login.store');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

Route::get('/register',  [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// ─── Panel Admin (harus login + role admin) ───────────────────────────────────

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Dashboard (Bisa diakses Admin & Superadmin)
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Registrasi & Tiket (Bisa diakses Admin & Superadmin)
        Route::get('/registrations', [\App\Http\Controllers\Admin\AdminTicketController::class, 'indexRegistrations'])->name('registrations.index');
        Route::get('/registrations/event/{id}', [\App\Http\Controllers\Admin\AdminTicketController::class, 'showRegistrations'])->name('registrations.show');
        Route::delete('/registrations/{id}', [\App\Http\Controllers\Admin\AdminTicketController::class, 'destroyRegistration'])->name('registrations.destroy');

        Route::get('/tickets', [\App\Http\Controllers\Admin\AdminTicketController::class, 'indexTickets'])->name('tickets.index');
        Route::get('/tickets/event/{id}', [\App\Http\Controllers\Admin\AdminTicketController::class, 'showTickets'])->name('tickets.show');

        // Validasi Tiket (Bisa diakses Admin & Superadmin)
        Route::get('/tickets/validate', [\App\Http\Controllers\Admin\AdminTicketController::class, 'showValidateForm'])->name('tickets.validate');
        Route::post('/tickets/validate', [\App\Http\Controllers\Admin\AdminTicketController::class, 'validateTicketCode'])->name('tickets.validate.check');
        Route::post('/tickets/validate/{code}/check-in', [\App\Http\Controllers\Admin\AdminTicketController::class, 'checkInTicketCode'])->name('tickets.validate.checkin');

        // Kelola Konten & User (Hanya Superadmin)
        Route::middleware(['superadmin'])->group(function () {
            // Halaman About
            Route::get('/about', [\App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about');
            Route::put('/about', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');

            // CRUD Berita
            Route::resource('berita', BeritaController::class)->except('show')->parameters([
                'berita' => 'berita',
            ]);

            // CRUD Event
            Route::resource('event', EventController::class)->except('show');

            // Manajemen User
            Route::resource('users', UserController::class)->only(['index', 'update', 'destroy']);

            // Hapus Pemesanan Tiket (Hanya Superadmin)
            Route::delete('/tickets/{id}', [\App\Http\Controllers\Admin\AdminTicketController::class, 'destroyTicket'])->name('tickets.destroy');
        });
    });
