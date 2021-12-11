<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Models\Brand;
use App\Http\Controllers\SliderController;
use App\Models\Slider;
use App\Http\Controllers\AboutController;
use App\Models\About;
use App\Http\Controllers\PortfolioController;
use App\Models\Portfolio;

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

Route::get('/', function () {

    $brands = Brand::all();
    $abouts = About::all();
    $sliders = Slider::all();
    return view('home',compact('brands','abouts','sliders'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// logut route

Route::get('brand/logout',[BrandController::class,'Logout'])->name('logout');

// all brand route

Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');

// brand store route

Route::post('/brand/add',[BrandController::class,'AddBrand'])->name('store.brand');

// edit brand 
 Route::get('brand/edit/{id}',[BrandController::class,'Edit']);

 //update route

 Route::post('/brand/update/{id}',[BrandController::class,'Update']);


 // all slider route

Route::get('/slider/all',[SliderController::class,'AllSlider'])->name('all.slider');
Route::post('/slider/add',[SliderController::class,'AddSlider'])->name('store.slider');
 Route::get('slider/edit/{id}',[SliderController::class,'Edit']);
  Route::post('/slider/update/{id}',[SliderController::class,'Update']);


  // all about route

  Route::get('/about/all',[AboutController::class,'AllAbout'])->name('all.about');
Route::post('/about/add',[AboutController::class,'AddAbout'])->name('store.about');
 Route::get('about/edit/{id}',[AboutController::class,'Edit']);
  Route::post('/about/update/{id}',[AboutController::class,'Update']);


  // portfolio route

Route::get('/portfolio',[PortfolioController::class,'Portfolio'])->name('portfolio');

Route::get('/portfolio/all',[PortfolioController::class,'AllPortfolio'])->name('all.portfolio');
Route::post('/Portfolio/add',[PortfolioController::class,'AddPortfolio'])->name('store.portfolio');
 Route::get('Portfolio/edit/{id}',[PortfolioController::class,'Edit']);
  Route::post('/Portfolio/update/{id}',[PortfolioController::class,'Update']);
