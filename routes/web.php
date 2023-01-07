<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\RegisterController;

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
// ruta sin controlador es la forma mas basica de hacer una ruta

// Route::get('/', function () {
//     return view('principal');
// });
Route::get('/', HomeController::class)->name('home');

Route::get('/crear-cuenta',[RegisterController::class,'index'])->name('register');
Route::post('/crear-cuenta',[RegisterController::class,'store']);
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

//rutas para el perfil

Route::get('/editar-perfil',[perfilController::class, 'index'])->name('perfil.index');

Route::post('/logout', [logoutController::class, 'store'])->name('logout');
Route::get('/{user:username}', [PostController::class, 'index']) ->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create']) ->name('posts-create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}',[PostController::class, 'show'])->name('posts.show');

Route::post('/{user:username}/posts/{post}',[ComentarioController::class, 'store'])->name('comentarios.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/editar-perfil',[perfilController::class, 'store'])->name('perfil.store');
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');


Route::post('/posts/{post}/likes',[LikeController::class,'store'])->name('post.likes.store');
Route::delete('/posts/{post}/likes',[LikeController::class,'destroy'])->name('post.likes.destroy');

//siguiendo a usuarios

Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');
