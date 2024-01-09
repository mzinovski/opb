<?php

use Illuminate\Support\Facades\Route;

use App\Models\Settings;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //for admin

    Route::get('/proekti', [\App\Http\Controllers\Proekti::class, 'index'])->name('proekti');
    Route::get('/proekti/create', [\App\Http\Controllers\Proekti::class, 'create'])->name('proekti.create');
    Route::get('/proekti/edit/{project}', [\App\Http\Controllers\Proekti::class, 'edit'])->name('proekti.edit');

    Route::get('/novosti', [\App\Http\Controllers\Proekti::class, 'index'])->name('novosti');
    Route::get('/novosti/create', [\App\Http\Controllers\Proekti::class, 'create'])->name('novosti.create');
    Route::get('/novosti/edit/{project}', [\App\Http\Controllers\Proekti::class, 'edit'])->name('novosti.edit');
    
    

    //for clients
    Route::middleware(['approved'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        
    });

    

    Route::resource('user', \App\Http\Controllers\UserController::class);
   

    Route::post('/upload', [\App\Http\Controllers\Controller::class, 'upload']);

    Route::resource('settings', \App\Http\Controllers\SettingsController::class);
    Route::resource('faq', \App\Http\Controllers\FaqController::class);
    Route::resource('subscriber', \App\Http\Controllers\SubscriberController::class);
    
    Route::get('/download_csv', [\App\Http\Controllers\Controller::class, 'download_csv'])->name('download_csv');

    Route::get('/clients/baned', [\App\Http\Controllers\ClientsController::class, 'baned_clients'])->name('baned_clients');

});


Route::get('/images/{params?}/{file}', [\App\Http\Controllers\FileController::class, 'fileStorageServe'])->where('params', '(.*)')->name('file_storage_serve');
Route::get('/fetch_pdf_contract/{params?}/{file}', [\App\Http\Controllers\FileController::class, 'fileStorageContractPdf'])->where('params', '(.*)')->name('file_storage_contract_pdf');

Route::get('/faqs', [\App\Http\Controllers\Controller::class, 'list_faqs'])->name('list_faqs');
Route::get('/landing_page', [\App\Http\Controllers\Controller::class, 'landing_page'])->name('landing_page');

// Route::get('/{main_slug}/{slug}', [\App\Http\Controllers\Controller::class, 'list_blog'])->name('list_blog');
// Route::get('/{main_slug}', [\App\Http\Controllers\Controller::class, 'list_blogs'])->name('list_blogs');

//front pages
Route::controller(App\Http\Controllers\PageController::class)->group(function () {
    //main pages
    Route::get('/', 'index')->name('index');
    Route::get('/statija/{tip?}/{kategorija?}/{slug?}', 'statija')->name('statija');
    
});









