<?php

use App\Http\Controllers\WidgetController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('user/fill-spaces', [WidgetController::class, 'fillSpaces'])->name('user.fill-spaces');

Route::get('/widget/{feature}', [WidgetController::class, 'showFeature'])->name('widget.showFeature');

Route::get('/widgetData/{id}', [WidgetController::class, 'showWidgetData']);
Route::get('/widget', [WidgetController::class, 'showWidget'])->name('widget.show');

Route::post('decorCount', [HomeController::class, 'decorCount'])->name('decor.clickCount');

Route::get('/widget-testing', function () {
    return view('widget-testing');
});