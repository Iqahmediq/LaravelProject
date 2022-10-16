<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    
Route::view('/', 'welcome')->name('welcome');


Auth::routes();
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login', 'Dashboards.user.login')->name('login');
        Route::view('/register', 'Dashboards.user.register')->name('register');
        Route::post('/create' ,[UserController::class, 'create'])->name('create');
        Route::post('/check' ,[UserController::class, 'check'])->name('check');
        
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
       Route::get('/home',[UserController::class, 'home'] )->name('home');
       Route::post('/logout' ,[UserController::class, 'logout'])->name('logout');
       Route::get('/profile',[UserController::class,'Profile'])->name('profile');
        Route::get('/ProfileName',[UserController::class,'ProfileName'])->name('ProfileName');
        Route::PUT('/ChangeProfileName',[UserController::class,'ChangeProfileName'])->name('ChangeProfileName');
        Route::get('/ProfileEmail',[UserController::class,'ProfileEmail'])->name('ProfileEmail');
        Route::PUT('/ChangeProfileEmail',[UserController::class,'ChangeProfileEmail'])->name('ChangeProfileEmail');
    });
});
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login', 'Dashboards.admin.login')->name('login');
        Route::post('/check' ,[AdminController::class, 'check'])->name('check');

    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home', 'Dashboards.admin.home')->name('home');
        Route::post('/logout' ,[AdminController::class, 'logout'])->name('logout');
        Route::get('/addCategory',[CategoryController::class,'getForm'])->name('addCategory');
        Route::post('/storeCategory',[CategoryController::class,'AddCategory'])->name('storeCategory');
        route::DELETE('/delete/category/{id}',[CategoryController::class,'Destroy'])->name('DeleteCategory');
        Route::get('/editCategory/{id}',[CategoryController::class,'GetCategoryById'])->name('editCategory');
        Route::PUT('/updateCategory/{id}',[CategoryController::class,'UpdateCategoryById'])->name('UpdateCategory');
        Route::get('/searchCategory',[CategoryController::class,'searchCategory'])->name('searchCategory');
        Route::get('/getForm',[ProductController::class,'getForm'])->name('getform');
        Route::post('/storeProduct',[ProductController::class,'store'])->name('storeProduct');
        Route::get('/ListProduct',[ProductController::class,'getListProduct'])->name('ListProduct');
        route::DELETE('/delete/product/{id}',[ProductController::class,'Destroy'])->name('DeleteProduct');
        Route::get('/editProduct/{id}',[ProductController::class,'GetProductById'])->name('editProduct');
        Route::PUT('/updateProduct/{id}',[ProductController::class,'UpdateProductById'])->name('updateProduct');
        
        Route::get('/profile',[AdminController::class,'Profile'])->name('profile');
        Route::get('/ProfileName',[AdminController::class,'ProfileName'])->name('ProfileName');
        Route::PUT('/ChangeProfileName',[AdminController::class,'ChangeProfileName'])->name('ChangeProfileName');
        Route::get('/ProfileEmail',[AdminController::class,'ProfileEmail'])->name('ProfileEmail');
        Route::PUT('/ChangeProfileEmail',[AdminController::class,'ChangeProfileEmail'])->name('ChangeProfileEmail');
        Route::get('/ProfilePassword',[AdminController::class,'ProfilePassword'])->name('ProfilePassword');
        Route::PUT('/ChangeProfilePassword',[AdminController::class,'ChangeProfilePassword'])->name('ChangeProfilePassword');

        




        
    });
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
