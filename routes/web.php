<?php

    use App\Http\Controllers\notifController;
use App\Http\Controllers\WhatsappController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/bukutamu', [App\Http\Controllers\HomeController::class, 'index'])->name('bukutamu')->withoutMiddleware(['auth']);
    Route::POST('/send-whatsapp', [WhatsappController::class, 'sendWhatsAppMessage'])->withoutMiddleware(['auth']);
    Route::get('/department', 'App\Http\Controllers\DepartmentController@index')->name('department')->withoutMiddleware(['auth']);


Auth::routes();

Route::get('/datatamu', [App\Http\Controllers\tamuController::class, 'index'])->name('datatamu')->middleware('auth');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/', function () {
    return view('dashboard');
});




Route::POST('/whatsapp/{id_tamu}/{new_status}', 'WhatsAppController@updateStatus')->middleware('auth');
Route::POST('/whatsapp/{id_tamu}/{new_status}', [WhatsappController::class, 'updateStatus'])->middleware('auth');


Route::get('/menu', function () {
    return view('layout.menu');
});

Route::post('/read', [notifController::class, 'markAsRead'])->name('read');


Route::resource('form', 'App\Http\Controllers\tamuController');

Route::get('/menu', function () {
    return view('layout.menu');
});



