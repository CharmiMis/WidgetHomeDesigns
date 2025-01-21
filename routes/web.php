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
Route::post('failed_response_data', [HomeController::class, 'failedResponseData'])->name('failed_response.data');
Route::post('imageDelete', [HomeController::class, 'imageDelete'])->name('image.delete');
Route::get('user/fill-spaces', [WidgetController::class, 'fillSpaces'])->name('user.fill-spaces');
// Route::post('next/billing', [HomeController::class, 'nextBilling'])->name('delay_next.billing');

Route::get('/widget/{feature}', [WidgetController::class, 'showFeature'])->name('widget.showFeature');

Route::get('/widgetData/{id}', [WidgetController::class, 'showWidgetData']);
Route::get('/widget', [WidgetController::class, 'showWidget'])->name('widget.show');
Route::post('getFullHd', [HomeController::class, 'getFullHDData'])->name('getHdImages');

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

Route::post('check-request-status', [WidgetController::class, 'checkRequestStatus'])->name('runpod.check-request-status');
Route::get('get-base64', [HomeController::class, 'downloadFile'])->name('file.download');
Route::post('runpodWidget/creative_redesign', [WidgetController::class, 'runpodWidgetCreativeRedesign'])->name('runpodWidget.creative_redesign');
// Route::post('runpodWidget/perfect_redesign', [WidgetController::class, 'runpodWidgetPerfectRedesign'])->name('runpodWidget.perfect_redesign');
Route::post('runpodWidget/render_realistic', [WidgetController::class, 'runpodWidgetRenderRealistic'])->name('runpodWidget.render_realistic');
Route::post('runpodWidget/furniture_removal', [WidgetController::class, 'runpodWidgetFurnitureRemoval'])->name('runpodWidget.furniture_removal');
Route::post('runpodWidget/virtual_staging', [WidgetController::class, 'runpodWidgetVirtualStaging'])->name('runpodWidget.virtual_staging');
Route::post('check-runpod-status', [WidgetController::class, 'checkRunpodStatus'])->name('runpod.flux_precision');
Route::get('custom-credit-request', [WidgetController::class, 'customCredit'])->name('api.custom-credit');
Route::post('custom-credit-email', [WidgetController::class, 'customCreditEmail'])->name('api.custom-credit-email');
Route::post('translateText', [WidgetController::class, 'translateText'])->name('user.translateText');
Route::post('runpodWidget/sky-color-change', [WidgetController::class, 'runpodWidgetSkyColorChange'])->name('runpodWidget.sky-color-change');

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
