<?php

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
Route::get('/', 'PublicController@index');
Route::get('/news-details/{title}/{id}', 'PublicController@newsDetails');
Route::get('/contact', 'PublicController@contactUs');
Route::get('/about', 'PublicController@aboutUs');
Route::get('/movie', 'PublicController@movies');
Route::get('/short-film', 'PublicController@shortFilm');
Route::get('/drama', 'PublicController@drama');

Route::get('/review/{title}/{id}', 'ReviewController@movieReview');
Route::post('/add-review', 'ReviewController@addRevied');
Route::post('/more', 'PublicController@more');
Route::get('/music', 'PublicController@music');
Route::get('/shuting-cholche', 'PublicController@shuttingCholche');
Route::get('/alapon', 'PublicController@alapon');
Route::get('/movie-review', 'PublicController@movieReview');
Route::get('/bivido', 'PublicController@bivido');

Route::group(['middleware' => 'visitors'], function() {
    Route::get('/register', 'RegisterController@register');
    Route::post('/register', 'RegisterController@registerPost');

    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@loginPost');

    Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');
    Route::post('/forgot-password', 'ForgotPasswordController@pastForgotPassword');
    Route::get('/reset-password/{email}/{resetCode}', 'ForgotPasswordController@resetPassword');
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/earnings', 'AdminController@earnings');
    Route::get('/admin-home', 'AdminController@adminHome');
});

Route::group(['middleware' => 'check.authenticate'], function() {
    Route::get('/profile', 'AllAdminController@userProfile');
});

Route::group(['middleware' => 'super.admin'], function() {
    Route::get('/super-admin-home', 'SuperAdminController@superAdminHome');
    Route::get('/create-user', 'RegisterController@createUserBySuperAdmin');
    Route::post('/create-user', 'RegisterController@postCreateUserBySuperAdmin');
    Route::get('/user-profile', 'SuperAdminController@userProfile');
    Route::get('/edit-profile', 'SuperAdminController@editProfile');
    Route::post('/edit-profile', 'SuperAdminController@postEditProfile');


    Route::get('/categories', 'CategoryController@categories');
    Route::get('/add-category', 'CategoryController@addCategory');
    Route::post('/add-category', 'CategoryController@postAddCategory');
    Route::get('/edit-category/{id}', 'CategoryController@editCategory');
    Route::post('/update-category', 'CategoryController@postEditCategory');
    Route::get('/category-publish/{id}', 'CategoryController@categoryPublish');
    Route::get('/category-unpublish/{id}', 'CategoryController@categoryUnpublish');

    Route::get('/gallery', 'GalleryController@gallery');
    Route::get('/add-photo', 'GalleryController@addPhoto');
    Route::post('/add-photo', 'GalleryController@postAddPhoto');
    Route::get('/edit-image/{id}', 'GalleryController@editImage');
    Route::post('/edit-image', 'GalleryController@postEditImage');
    Route::post('/delete-image', 'GalleryController@deleteImage');
    Route::get('/image-publish/{id}', 'GalleryController@imagePublish');
    Route::get('/image-unpublish/{id}', 'GalleryController@imageUnpublish');




    Route::get('/story-types', 'StoryTypeController@storyTypes');
    Route::get('/add-story-type', 'StoryTypeController@addTypeOfSrory');
    Route::post('/add-story-type', 'StoryTypeController@postAddTypeOfSrory');
//    Route::get('/edit-category/{id}','StoryTypeController@editCategory');
//    Route::post('/update-category','StoryTypeController@postEditCategory');


    Route::get('/trailers', 'TrailerController@trailers');
    Route::get('/add-trailer', 'TrailerController@addTrailer');
    Route::post('/add-trailer', 'TrailerController@postAddTrailer');
    Route::get('/trailer-publish/{id}', 'TrailerController@trailerPublish');
    Route::get('/trailer-unpublish/{id}', 'TrailerController@trailerUnpublish');
    Route::post('/delete-trailer', 'TrailerController@deleteTrailer');
    Route::get('/edit-trailer/{id}','TrailerController@editTrailer');
    Route::post('/edit-trailer','TrailerController@postEditTrailer');
//    Route::post('/update-category','TrailerController@postEditCategory');


    Route::get('/manage-news', 'NewsController@manageNews');
    Route::get('/check-news/{id}', 'NewsController@checkNews');
    Route::get('/news-publish/{id}', 'NewsController@newsPublish');
    Route::get('/news-unpublish/{id}', 'NewsController@newsUnpublish');
});

Route::group(['middleware' => 'end.user'], function() {
    Route::get('/customer-home', 'EndUserController@customerHome');
});


Route::group(['middleware' => 'manager'], function() {
    Route::get('/manager-home', 'ManagerController@managerHome');
    Route::get('/tasks', 'ManagerController@tasks');
});

Route::group(['middleware' => 'reporter.middleware'], function() {
    Route::get('/reporter-home', 'NewsReporterController@reporterHome');
    Route::get('/news', 'NewsController@reporterAllNews');
    Route::get('/write-news', 'NewsController@writeNews');
    Route::post('/write-news', 'NewsController@postWriteNews');
    Route::get('/edit-news/{id}', 'NewsController@editNews');
    Route::post('/edit-news', 'NewsController@postEditNews');
});

Route::post('/logout', 'LoginController@logout');

//Route::get('/tasks','ManagerController@tasks')->middleware('manager');


Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');



