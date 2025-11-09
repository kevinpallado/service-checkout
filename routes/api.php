<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingController;

Route::apiResource('shopping', ShoppingController::class)->except(['edit','destroy']);