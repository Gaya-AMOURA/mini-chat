<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/Inscription', [RegisterUserController::class,'form'])
    ->name('Inscription');
Route::post('/Inscription', [RegisterUserController::class,'enregistrer'])->name('Inscription');

Route::get('/Connexion', [AuthenticatedSessionController::class,'form'])
    ->name('Connexion');
Route::post('/Connexion', [AuthenticatedSessionController::class,'connexion']);

Route::view('/accueil','user.accueil')->name('accueil')->middleware('is_user');

Route::get('/déconnexion', [AuthenticatedSessionController::class,'déconnexion'])
    ->name('déconnexion')->middleware('auth');

Route::view('/erreur','erreur')->middleware('auth');

Route::view('/admin','admin.adminaccueil')->name('admin')->middleware('auth')
            ->middleware('is_admin');

Route::get('/admin_modify', [AdminController::class,'adminmodify'])
    ->name('admin_modify')->middleware('auth')->middleware('is_admin');
Route::get('/admin_modify_accept:{id}', [AdminController::class,'accept'])
    ->name('admin_accept')->middleware('auth')->middleware('is_admin');
Route::get('/admin_modify_reject:{id}', [AdminController::class,'reject'])
    ->name('admin_reject')->middleware('auth')->middleware('is_admin');

Route::get('/inofsed', [UserController::class,'showEditForm'])
    ->name('infos.edit')->middleware('auth');

Route::post('/infosed/{id}/edit', [UserController::class,'edit'])->name('infosedit')->middleware('auth');


Route::get('/changermdp', [RegisterUserController::class,'update'])
    ->name('mdp.update')->middleware('auth');

Route::post('/mdp/{id}/edit', [RegisterUserController::class,'edit'])->name('editmdp');

Route::get('/showusers',[UserController::class,'showuser'])->name('showUsers')->middleware('auth');


Route::get('/user_invit:{id}', [UserController::class,'message'])
    ->name('user_invit')->middleware('auth')->middleware('is_user');

Route::post('/user_message:{id}',[UserController::class,'messageenvoyé'])->name('messages')
    ->middleware('auth')->middleware('is_user');

Route::get('/adminadd', [AdminController::class,'showEditAdminForm'])
    ->name('admin_add')->middleware('is_admin');
Route::post('/adminadd', [AdminController::class,'add'])->name('admin_add')->middleware('is_admin');

Route::get('/admindelete', [AdminController::class,'showDeleteForm'])->name('admin_delet')
    ->middleware('auth')->middleware('is_admin');

Route::get('/admindelet:{id}',[AdminController::class,'delete'])->name('admin_delete')
    ->middleware('auth')->middleware('is_admin');

Route::get('/canalMessage', [UserController::class,'showmessageGénéral'])->name('canal')
    ->middleware('auth');

Route::post('/messagecanal',[UserController::class,'messageGénéral'])->name('messagecanal')
    ->middleware('auth');

Route::post('/recherche', [UserController::class,'recherche'])->name('recherche')
    ->middleware('auth');

Route::get('/adminedit', [AdminController::class,'showEditForm'])
    ->name('admin_edit')->middleware('is_admin');
Route::get('/admin_edit_1/{id}', [AdminController::class,'Users'])
    ->name('admin_edit1')->middleware('is_admin');
Route::post('/admin_edit_2/{id}', [AdminController::class,'edit'])->name('admin_edit2')->middleware('is_admin');
