<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\demoController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\home\AboutController;
use App\Http\Controllers\home\PortfolioController;
use App\Http\Controllers\home\HomeSliderController;
use App\Http\Controllers\ServicesController;

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

Route::controller(demoController::class)->group(
    function () {
        Route::get('/', 'home')->name('home');
        Route::get('/contact', 'contact')->name('contact');
    }
);


Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'homeSlide')->name('home.slide');
    Route::post('/home-slide/update', 'homeSlideUpdate')->name('slide.update');
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index')->name('about');
    Route::get('/about/show', 'show')->name('about.show');
    Route::post('/about/update', 'update')->name('about.update');
});



Route::controller(PortfolioController::class)
    ->group(
        function () {
            // frontend
            Route::get('/protfolio', 'protfolio')->name('portfolio');
            Route::get('/portfolio/details/{id}', 'details')->name('portfolio.details');


            // backend
            Route::get('/protfolio/all', 'all')->name('portfolio.all');
            Route::get('/portfolio/page', 'index')->name('portfolio.index');
            Route::post('/portfolio/store', 'store')->name('portfolio.store');
            Route::post('/portfolio/edit/{id}', 'edit')->name('portfolio.edit');
            Route::post('/portfolio/update', 'update')->name('portfolio.update');
            Route::post('/portfolio/destroy/{id}', 'destroy')->name('portfolio.destroy');
        }
    );



Route::controller(ServicesController::class)
    ->group(
        function () {

            Route::get('/services', 'services')->name('services');
            Route::get('/service/details/{id}', 'service_details')->name('service.details');
            Route::get('/service/all', 'all')->name('service.all');
            Route::get('/service/page', 'index')->name('service.page');
            Route::post('/service/store', 'store')->name('service.store');
            Route::post('/service/edit/{id}', 'edit')->name('service.edit');
            Route::post('/service/update', 'update')->name('service.update');
            Route::post('/service/destroy/{id}', 'destroy')->name('service.destroy');
        }
    );


Route::controller(FooterController::class)->group(
    function () {
        Route::get('/footer/edit', 'edit')->name('footer.edit');
        Route::post('/footer/update', 'update')->name('footer.update');
    }
);

Route::controller(BlogCategoryController::class)
    ->group(
        function () {
            Route::get('blog/category/index', 'index')->name('blog.category.index');
            Route::get('blog/category/create', 'create')->name('blog.category.create');
            Route::post('blog/category/store', 'store')->name('blog.category.store');
            Route::post('blog/category/edit/{id}', 'edit')->name('blog.category.edit');
            Route::post('blog/category/update/{id}', 'update')->name('blog.category.update');
            Route::delete('blog/category/destroy/{id}', 'destroy')->name('blog.category.destroy');
        }
    );


Route::controller(BlogController::class)->group(
    function () {
        Route::get('blog/index', 'index')->name('blog.index');
        Route::get('blog/create', 'create')->name('blog.create');
        Route::get('blog/edit/{id}', 'edit')->name('blog.edit');
        Route::post('blog/store', 'store')->name('blog.store');
        Route::post('blog/update/{id}', 'update')->name('blog.update');
        Route::delete('blog/delete/{id}', 'delete')->name('blog.delete');

        // for frontend routes
        Route::get('blog', 'blog')->name('blog');
        Route::get('/blog/details/{id}', 'details')->name('blog.details');
    }
);

require __DIR__ . '/auth.php';



// admin routes
Route::middleware('auth')->group(function () {

    Route::controller(AdminController::class)->group(
        function () {
            Route::get('/admin/dashboard', 'Dashboard')->name('admin.dashboard');
            Route::get('/admin/logout', 'Logout')->name('admin.logout');
            Route::get('/admin/profile', 'Profile')->name('admin.profile');
            Route::post('/admin/profile', 'ProfileStore')->name('admin.profile.store');
            Route::get('/admin/change/password', 'ChangePassword')->name('admin.changepassword');
            Route::post('/admin/update/password', 'UpdatePassword')->name('admin.update.password');
        }
    );
});


Route::get('/login', [AdminController::class,  'Login'])->name('admin.login');
