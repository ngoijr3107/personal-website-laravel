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

//Frontend Routes
Route::group(['namespace' => 'Frontend'], function () {
    //Home Page
    Route::get('/', 'PagesController@home')->name('home.page');
    //Portfolio Page
    Route::get('/portfolio', 'PagesController@portfolio')->name('portfolio.page');
    //Messages
    Route::get('messages/{id}/read', 'MessagesController@read')->name('messages.read');
    Route::resource('messages', 'MessagesController')->except(['update', 'edit', 'create']);

});

//Backend Routes
Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/admin/logout', 'DashboardController@logout')->name('admin.logout');
    //Categories
    Route::resource('categories', 'CategoriesController')->except('show');
    //Services
    Route::resource('services', 'ServicesController')->except('show');
    //Projects
    Route::resource('projects', 'ProjectsController')->except('show');
    //Profile
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
    //Skills
    Route::resource('skills', 'SkillsController')->except('show');
    //Experiences
    Route::resource('experiences', 'ExperiencesController')->except('show');
    //Educations
    Route::resource('educations', 'EducationsController')->except('show');
    //Stats
    Route::resource('stats', 'StatsController')->except('show');
});
