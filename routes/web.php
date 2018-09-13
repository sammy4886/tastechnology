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

Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/web', 'FrontEndController@web')->name('web');
Route::get('/business', 'FrontEndController@business')->name('business');
Route::get('/portal', 'FrontEndController@portal')->name('portal');
Route::get('/contact', 'FrontEndController@contact')->name('contact');





Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

//notice
Route::group([ 'as' => 'notice.', 'prefix' => 'notice' ], function ()
{
    Route::get('', 'NoticeController@index')->name('index');
    Route::get('createNotice', 'NoticeController@create')->name('create');
    Route::post('', 'NoticeController@store')->name('store');
    Route::put('{notice}', 'NoticeController@update')->name('update');
    Route::get('{notice}/edit', 'NoticeController@edit')->name('edit');
    Route::delete('{notice}', 'NoticeController@delete')->name('destroy');
    Route::get('{notice}/show','NoticeController@show')->name('show');

});

Route::group([ 'as' => 'document.', 'prefix' => 'document' ], function ()
{
    Route::get('', 'DocumentController@index')->name('index');
    Route::get('create', 'DocumentController@create')->name('create');
    Route::post('store', 'DocumentController@store')->name('store');
    Route::put('{document}', 'DocumentController@update')->name('update');
    Route::get('{document}/edit', 'DocumentController@edit')->name('edit');
    Route::delete('{document}', 'DocumentController@destroy')->name('destroy');
    Route::put('{document}/publish','DocumentController@publishUpdate')->name('publish');
});

//Route::group([ 'as' => 'gallery.', 'prefix' => 'gallery' ], function ()
//{
//    Route::get('', 'GalleryController@index')->name('index');
//    Route::get('create', 'GalleryController@create')->name('create');
//    Route::post('', 'GalleryController@store')->name('store');
//    Route::put('{gallery}', 'GalleryController@update')->name('update');
//    Route::get('{gallery}/edit', 'GalleryController@edit')->name('edit');
//    Route::delete('{gallery}', 'GalleryController@delete')->name('destroy');
//});
/*
|--------------------------------------------------------------------------
|  Album Controller
|--------------------------------------------------------------------------
*/
Route::get('/gallery/{id}', array('as' => 'show_album_view','uses' => 'FrontEndController@gallery'));


Route::group([ 'as' => 'album.', 'prefix' => 'album' ], function ()
{
    Route::get('/index',array('as' => 'index','uses' => 'AlbumController@getlist'));
    Route::get('/createalbum', array('as' => 'createalbum','uses' => 'AlbumController@getForm'));
    Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumController@postCreate'));
    Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumController@getDelete'));
    Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumController@getAlbum'));
    Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImageController@getForm'));
    Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImageController@postAdd'));
    Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImageController@getDelete'));
    Route::post('/moveimage', array('as' => 'move_image', 'uses' => 'ImageController@postMove'));
});

/*
  |--------------------------------------------------------------------------
  | Team
  |--------------------------------------------------------------------------
//  */
//Route::group([ 'as' => 'team.','prefix'=>'team' ], function ()
//{
//    Route::get('', 'TeamController@index')->name('index');
//    Route::get('create', 'TeamController@create')->name('create');
//    Route::post('', 'TeamController@store')->name('store');
//    Route::put('{team}', 'TeamController@update')->name('update');
////    Route::get('{team}/show', 'TeamController@show')->name('show');
//    Route::get('{team}/edit', 'TeamController@edit')->name('edit');
//    Route::put('{team}', 'TeamController@update')->name('update');
//    Route::delete('{team}', 'TeamController@destroy')->name('destroy');
//
//});
Route::group([ 'as' => 'team.', 'prefix' => 'team' ], function ()
{
    Route::get('', 'TeamController@index')->name('index');
    Route::get('create', 'TeamController@create')->name('create');
    Route::post('store', 'TeamController@store')->name('store');
    Route::put('{team}', 'TeamController@update')->name('update');
    Route::get('{team}/edit', 'TeamController@edit')->name('edit');
    Route::delete('{team}', 'TeamController@destroy')->name('destroy');
    Route::put('{team}/publish','TeamController@publishUpdate')->name('publish');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
