<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\DashboardController;

// Authentication Routes
Auth::routes(['verify' => false]); // Disable email verification for now

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/welcome', fn () => view('welcome'));
});

// Public Routes (no auth required)
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/menu', fn () => view('menu'))->name('menu');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::get('/dbcon', fn () => view('dbcon'))->name('dbcon');

// Form Submissions
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', fn () => view('home'))->name('home');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
         ->name('profile.delete');

    // Cart Routes
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'view'])->name('cart.view');
        Route::post('/add', [CartController::class, 'add'])->name('cart.add');
        Route::post('/update', [CartController::class, 'update'])->name('cart.update');
        Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
        Route::post('/submit', [CartController::class, 'submit'])->name('cart.submit');
    });

    // Order Flow
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order', [OrderController::class, 'create'])->name('order.create');
    Route::get('/order/form', [OrderController::class, 'form'])->name('order.form');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    // Delivery
    Route::get('/delivery', [DeliveryController::class, 'create'])->name('delivery.create');
    Route::post('/delivery', [DeliveryController::class, 'store'])->name('delivery.store');

    // Payment
    Route::get('/payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/success/{payment}', [PaymentController::class, 'success'])->name('payment.success');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/welcome');
    })->name('logout');
});

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Products
    Route::prefix('products')->group(function () {
           Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
        Route::get('/', [AdminController::class, 'products'])->name('admin.products.index');
        Route::get('/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
        Route::post('/', [AdminController::class, 'storeProduct'])->name('admin.products.store');
        Route::get('/{product}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
        Route::put('/{product}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
        Route::delete('/{product}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');
    });
    
    // Orders
    Route::prefix('orders')->group(function () {
           Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
        Route::get('/', [AdminController::class, 'orders'])->name('admin.orders.index');
        Route::get('/create', [AdminController::class, 'createOrder'])->name('admin.orders.create');
        Route::post('/', [AdminController::class, 'storeOrder'])->name('admin.orders.store');
        Route::get('/{order}', [AdminController::class, 'showOrder'])->name('admin.orders.show');
        Route::get('/{order}/edit', [AdminController::class, 'editOrder'])->name('admin.orders.edit');
        Route::put('/{order}', [AdminController::class, 'updateOrder'])->name('admin.orders.update');
        Route::delete('/{order}', [AdminController::class, 'destroyOrder'])->name('admin.orders.destroy');
        Route::post('/{order}/status', [AdminController::class, 'updateStatus'])->name('admin.orders.status');
        Route::get('/{order}/invoice', [AdminController::class, 'showInvoice'])->name('admin.orders.invoice');
    });
    
    // Payments & Messages
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
    
    // Admin-specific logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});