<?php

use App\Http\Controllers\Admin\FrontUserController;
use App\Http\Controllers\DailyUsagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpertChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\UsersApiController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WebhookController;
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

Route::post('runpodWidget/beautiful_redesign', [WidgetController::class, 'runpodWidgetBeautifulRedesign'])->name('runpodWidget.beautiful_redesign');
