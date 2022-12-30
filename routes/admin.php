<?php
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Dashboard\IndexController::class, 'index'])->name('index');


Route::put('settings/{setting}/update',[App\Http\Controllers\Dashboard\SettingController::class , 'update'])->name('settings.update');
Route::get('settings',[App\Http\Controllers\Dashboard\SettingController::class , 'index'])->name('settings.index');
?>