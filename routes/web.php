<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//all listing
Route::get('/', [ListingController::class, 'index']);

//Show create form
Route::get('/listings/create', [ListingController::class, 'create'])
->middleware('auth');

//Store listing data
Route::post('/listings', [ListingController::class, 'store'])
->middleware('auth');

//Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
->middleware('auth');

//Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])
->middleware('auth');

//Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
->middleware('auth');

//Manage listing
Route::get('/listings/manage', [ListingController::class, 'manage'])
->middleware('auth');

//single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Register/create form
Route::get('/register', [UserController::class,  'create'])
->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout'])
->middleware('auth');

//Login form
Route::get('/login', [UserController::class, 'login'])
->middleware('guest')
->name('login');

//Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

