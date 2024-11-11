<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\TaskManagerController;
use App\Http\Controllers\FileManagerController;
Route::get('/',[HomeController::class,'index']);
Route::get('command/{command}',[CommandController::class,'execute']);
Route::get('task-manager',[TaskManagerController::class,'index']);
Route::get('file-manager',[FileManagerController::class,'index']);