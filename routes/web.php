<?php

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

Route::get('/studenti','App\Http\Controllers\StudentiController@studenti');


Route::get('/index',function (){return view('index');})->name('index');
Route::post('/create-member', 'App\Http\Controllers\GymMemberController@createNewMember')->name('create.gym.member');
Route::get('/show-members','App\Http\Controllers\GymMemberController@showMembers')->name('show.members');
Route::delete('/delete-member/{id}','App\Http\Controllers\GymMemberController@deleteMember')->name('delete.member');
Route::put('/editing-member/{id}','App\Http\Controllers\GymMemberController@editingMember')->name('editing.member');
Route::put('/edit-member/{id}','App\Http\Controllers\GymMemberController@editMember')->name('edit.member');

