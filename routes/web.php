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
    Route::controller(App\Http\Controllers\InvestPageController::class)->group(function () {
        Route::get('/admin_started_investments', 'admin_started_investments')->name('admin_started_investments');
        Route::get('/admin_signed_investments', 'admin_signed_investments')->name('admin_signed_investments');
        Route::get('/admin_payed_investments', 'admin_payed_investments')->name('admin_payed_investments');

        Route::get('/admin_investor_profile/{id?}', 'admin_investor_profile')->name('admin_investor_profile');
    });
    

    //for clients
    Route::middleware(['approved'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::controller(App\Http\Controllers\InvestPageController::class)->group(function () {
            Route::get('/invest-page/{project_slug?}', 'index')->name('invest.page.index');
            Route::get('/started-investments-page', 'started_investments_page')->name('started_investments_page');
        });
    });

    Route::get('/approval', [\App\Http\Controllers\DashboardController::class, 'approval'])->name('approval');

    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('blog', \App\Http\Controllers\BlogController::class);

    Route::post('/upload', [\App\Http\Controllers\Controller::class, 'upload']);

    Route::resource('settings', \App\Http\Controllers\SettingsController::class);
    Route::resource('faq', \App\Http\Controllers\FaqController::class);
    Route::resource('subscriber', \App\Http\Controllers\SubscriberController::class);
    
    Route::get('/download_csv', [\App\Http\Controllers\Controller::class, 'download_csv'])->name('download_csv');

    Route::get('/projects', [\App\Http\Controllers\ProjectsController::class, 'index'])->name('projects');
    Route::get('/projects/create', [\App\Http\Controllers\ProjectsController::class, 'create'])->name('project.create');
    Route::get('/projects/edit/{project}', [\App\Http\Controllers\ProjectsController::class, 'edit'])->name('project.edit');

    Route::get('/clients', [\App\Http\Controllers\ClientsController::class, 'index'])->name('clients');
    Route::get('/clients/create', [\App\Http\Controllers\ClientsController::class, 'create'])->name('client.create');

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
});









