<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/



// Admin Posts!
Route::group(array('before' => 'authadmin'), function()
{	
    Route::get('admin/posts', array('as' => 'admin.posts.all', 'uses' => 'admin.posts@index'));
    Route::get('admin/posts/new', array('as' => 'admin.posts.new', 'uses' => 'admin.posts@new'));
    Route::get('admin/posts/(:any)', array('as' => 'admin.posts.show', 'uses' => 'admin.posts@show'));
    Route::get('admin/posts/(:any)/edit', array('as' => 'admin.posts.edit', 'uses' => 'admin.posts@edit'));

    Route::post('admin/posts/new', array('as' => 'admin.posts.create', 'uses' => 'admin.posts@create'));
    Route::put('admin/posts/(:any)', array('as' => 'admin.posts.update', 'uses' => 'admin.posts@update'));
    Route::delete('admin/posts/(:num)', array('as' => 'admin.posts.delete', 'uses' => 'admin.posts@delete'));
});

// Admin Pages!
Route::group(array('before' => 'authadmin'), function()
{	
    Route::get('admin/pages', array('as' => 'admin.pages.all', 'uses' => 'admin.pages@index'));
    Route::get('admin/pages/new', array('as' => 'admin.pages.new', 'uses' => 'admin.pages@new'));
    Route::get('admin/pages/(:any)', array('as' => 'admin.pages.show', 'uses' => 'admin.pages@show'));
    Route::get('admin/pages/(:any)/edit', array('as' => 'admin.pages.edit', 'uses' => 'admin.pages@edit'));
    Route::get('admin/pages/order', array('as' => 'admin.pages.order', 'uses' => 'admin.pages@order'));

    Route::post('admin/pages/order', array('as' => 'admin.pages.save', 'uses' => 'admin.pages@save'));
    Route::post('admin/pages/new', array('as' => 'admin.pages.create', 'uses' => 'admin.pages@create'));
    Route::put('admin/pages/(:any)', array('as' => 'admin.pages.update', 'uses' => 'admin.pages@update'));
    Route::delete('admin/pages/(:any)', array('as' => 'admin.pages.delete', 'uses' => 'admin.pages@delete'));
});

// Admin Gallery!
Route::group(array('before' => 'authadmin'), function()
{	
    Route::get('admin/gallery', array('as' => 'admin.gallery.all', 'uses' => 'admin.gallery@index'));
    Route::get('admin/gallery/new', array('as' => 'admin.gallery.new', 'uses' => 'admin.gallery@new'));
    Route::get('admin/gallery/(:any)', array('as' => 'admin.gallery.show', 'uses' => 'admin.gallery@show'));
    Route::get('admin/gallery/(:any)/edit', array('as' => 'admin.gallery.edit', 'uses' => 'admin.gallery@edit'));

    Route::post('admin/gallery/new', array('as' => 'admin.gallery.create', 'uses' => 'admin.gallery@create'));
    Route::put('admin/gallery/(:id)', array('as' => 'admin.gallery.update', 'uses' => 'admin.gallery@update'));
    Route::delete('admin/gallery/(:id)', array('as' => 'admin.gallery.delete', 'uses' => 'admin.gallery@delete'));
});

// Admin Settings!
Route::group(array('before' => 'authadmin'), function()
{	
    Route::get('admin/settings', array('as' => 'admin.settings.all', 'uses' => 'admin.settings@index'));
    Route::get('admin/settings/new', array('as' => 'admin.settings.new', 'uses' => 'admin.settings@new'));
    Route::get('admin/settings/(:any)', array('as' => 'admin.settings.show', 'uses' => 'admin.settings@show'));
    Route::get('admin/settings/(:any)/edit', array('as' => 'admin.settings.edit', 'uses' => 'admin.settings@edit'));

    Route::post('admin/settings/new', array('as' => 'admin.settings.create', 'uses' => 'admin.settings@create'));
    Route::put('admin/settings/(:id)', array('as' => 'admin.settings.update', 'uses' => 'admin.settings@update'));
    Route::delete('admin/settings/(:id)', array('as' => 'admin.settings.delete', 'uses' => 'admin.settings@delete'));
});

//makeitvalue.co.uk
Route::get('/', function()
{
	return View::make('home.index');
});

//Route::filter('pattern: admin/*', 'authadmin');


//Route::controller(Controller::detect());

//DELETE ON PRODUCTION
Route::any('create/test', function(){
	$user = New User();

	$user->email = 'ryan-tn-fc@hotmail.co.uk';
	$user->password = Hash::make('tyuuisk3');
	$user->role = '1';

	$user->save();

	echo "test data created";

});

//registering dynamic pages with slugs
Route::any('(:any)', function($segment){
	$pages = Page::where('slug', '=', $segment)->first();
	if ($pages){
	return View::make('pages.page-content')
			->with('content', $pages);
	}
	return Response::error('404');
});

//registering controllers
Route::controller('admin.posts');
Route::controller('admin.home');
Route::controller('admin.logout');
Route::controller('admin.settings');
Route::controller('admin.gallery');







/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::filter('authadmin', function()
{
	if (Auth::guest()) return Redirect::to('/');

});