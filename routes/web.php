<?php

use App\Http\Controllers\HomeController;
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

Route::get('/widget', [HomeController::class, 'showWidget'])->name('widget.show');
Route::get('/widget/{feature}', [HomeController::class, 'showFeature'])->name('widget.showFeature');
Route::post('runpodWidget/beautiful_redesign', [WidgetController::class, 'runpodWidgetBeautifulRedesign'])->name('runpodWidget.beautiful_redesign');
Route::post('runpodWidget/fill_space', [WidgetController::class, 'runpodWidgetFillSpace'])->name('runpodWidget.fill_space');
Route::post('runpodWidget/precision', [WidgetController::class, 'runpodWidgetPrecision'])->name('runpodWidget.precision');
Route::post('runpodWidget/color-and-texture', [WidgetController::class, 'runpodWidgetColorAndTexture'])->name('runpodWidget.color-and-texture');
Route::post('runpodWidget/paint-visualizer', [WidgetController::class, 'runpodWidgetPaintVisualizer'])->name('runpodWidget.paint-visualizer');
Route::post('runpodWidget/getMasking', [WidgetController::class, 'runpodWidgetGetMasking'])->name('runpodWidget.getmasking');
Route::post('runpodWidget/fullHD', [WidgetController::class, 'runpodWidgetFullHD'])->name('runpodWidget.fullHD');


//Widget response

Route::get('/widgetData/{id}', [WidgetController::class, 'showWidgetData']);

Route::get('/widget-testing', function () {
    return view('web.widget-testing');
});

Route::get('/widget-testing-2', function () {
    return view('web.widget-testing-2');
});

Route::get('/widget-testing-lm-1', function () {
    return view('web.widget-testing-lm-1');
});

Route::get('/widget-testing-lm-2', function () {
    return view('web.widget-testing-lm-2');
});
