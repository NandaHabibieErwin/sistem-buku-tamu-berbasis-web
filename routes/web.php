<?php

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

Route::withoutMiddleware(['auth'])->group(function () {
    Route::get('/bukutamu', [App\Http\Controllers\HomeController::class, 'index'])->name('bukutamu');
    Route::POST('/send-whatsapp', [WhatsappController::class, 'sendWhatsAppMessage']);
    Route::get('/department', 'App\Http\Controllers\DepartmentController@index')->name('department');
});

Auth::routes();

Route::get('/datatamu', [App\Http\Controllers\tamuController::class, 'index'])->name('datatamu');


Route::get('/', function () {
    return view('dashboard');
});



Route::POST('/whatsapp/{id_tamu}/{new_status}', 'WhatsAppController@updateStatus');
Route::POST('/whatsapp/{id_tamu}/{new_status}', [WhatsappController::class, 'updateStatus']);


Route::get('/menu', function () {
    return view('layout.menu');
});


Route::resource('form', 'App\Http\Controllers\tamuController');

Route::get('/menu', function () {
    return view('layout.menu');
});


Route::post('/update-status/{id}/{newStatus}', 'WhatsappController@updateStatus')->name('update.status');

//Route::get('/datatamu', App);
Auth::routes();



