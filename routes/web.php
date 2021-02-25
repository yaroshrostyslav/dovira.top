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


// Home Page / Product (Best-Bad)
Route::get('/', function () {
    $comments_up = App\Product::getProductComments_up();
    $comments_down = App\Product::getProductComments_down();
    return view('index', compact('comments_up', 'comments_down'));
});

// Home Page / New Comment
Route::post('/comment','CommentController@addComment');
// Home Page / Search / by name product in form of adding Comment
Route::get('/get_product', 'SearchController@get_product')->name('searchController.get_product');
// Home Page / Search / by name category in form of adding Comment
Route::get('/get_type', 'SearchController@get_type')->name('searchController.get_type');
// Home Page / Search / in header
Route::get('/moreResult', 'SearchController@moreResult')->name('searchController.moreResult');

// Product / Result search > "Приблизні результати"
Route::get('/products/{name}', 'ProductController@productsMoreResult');
// Product / Page Product
Route::post('/product', 'ProductController@processForm');
Route::get('/product/{name}', 'ProductController@show');
// Product / All Product
Route::get('/product', 'ProductController@show_all');
// Product / Page: best, bad
Route::get('/products/rate/{name}', 'ProductController@products_rate');
// Product / Management response to feedback
Route::post('/new_answer', 'AnswerController@new_answer');
// Product / Removing Feedback Responses
Route::post('/del_answer', 'AnswerController@del_answer');
// Product / Delete feedback
Route::post('/del_comment', 'CommentController@del_comment');

// Contacts
Route::get('/contacts', function () {
    return view('contacts');
});
// Contacts / Feedback form
Route::post('/contacts', 'ContactsController@send');

// Visitor / cookie
Route::get('/cookie/set','VisitorController@setCookie');
Route::get('/cookie/get','VisitorController@getCookie');

// Admin - manager control
Route::get('/admin','AdminController@show');
// Manager verification
Route::post('/admin/verified','AdminController@verified');
// Visitor blocking
Route::post('/admin/banned','AdminController@banned');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



