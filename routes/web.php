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

Route::get('/', function () {
    return view('pages.login');
});


Route::get('/logout','masterController@logOut');
Route::post('/performLogin', 'masterController@logUserIn');

Route::post('/submitMessage', 'masterController@submitMessage');
Route::get('/dashboard', ['as'=>'dashboard', 'uses'=>'masterController@renderHome']);
Route::post('/createTicket', 'masterController@createTicket');

Route::post('/getticketDetails', 'masterController@getTicketDetails');
Route::post('/upload', 'masterController@uploadFile');

Route::get('/download/{filename}', 'masterController@downloadImage');
Route::get('/download/pdf/{filename}', 'masterController@downloadPDF');
Route::get('/download/excel/{filename}', 'masterController@downloadExcel');
Route::get('/download/zip/{filename}', 'masterController@downloadZIP');
Route::get('/download/doc/{filename}', 'masterController@downloadDoc');
Route::get('/getIndFiles/{userId}', 'masterController@getFiles');
Route::get('/createUser', ['as'=>'createUser', 'uses'=>'masterController@renderCreateUser']);
Route::get('/settings', ['as'=>'settings', 'uses'=>'masterController@renderCreateUser']);
Route::post('/addUser', 'masterController@addUser');
Route::post('/changePassword', 'masterController@changePassword');
Route::get('/viewDownloads/{filname}', 'masterController@viewDownloads');
Route::get('/users', 'masterController@viewUsers');
Route::post('/deleteFile', 'masterController@deleteFile');

//ADMIN
Route::get('/allFiles', ['as'=>'allfiles', 'uses'=>'masterController@displayAllFiles']);
Route::get('/approve/{id}', 'masterController@approveTicket');
Route::get('/disapprove/{id}', 'masterController@disapproveTicket');
Route::post('/approveMultipe', 'masterController@approveMultipe');
Route::post('/disburseMultipe', 'masterController@disburseMultipe');

Route::get('/ignoreTicket/{id}', 'masterController@ignore');
Route::get('/unignoreTicket/{id}', 'masterController@unignore');
Route::get('/disburse/{id}', 'masterController@disburse');
Route::get('/undisburse/{id}', 'masterController@undisburse');
Route::get('/adminSettings', 'masterController@settings');



Route::get('/giveErrorPage', 'masterController@giveErrorPage');

Route::post('/search', ['as'=>'search', 'uses'=>'masterController@search']);
Route::get('/displaySearch', ['as'=>'searchDisplay', 'uses'=>'masterContrgioller@searchD']);
Route::get('/view/{id}', 'masterController@vieww');
Route::get('/requestTicket', 'masterController@requestTicket');
Route::get('/editTicket/{id}', 'handleSubmit@editTicket');
Route::post('/sendIt', 'handleSubmit@submit');
Route::post('/editIt', 'handleSubmit@editIt');
Route::post('/deleteSingle', 'handleSubmit@deleteSingle');
Route::get('/deleteTicket/{id}', 'handleSubmit@deleteTicket');
Route::get('/appproveT', 'handleSubmit@appproveT');

Route::get('/imprest', 'handleSubmit@impress');
Route::get('/fetchAdmins', 'handleSubmit@fetchAdmins');
Route::post('/addfund', 'handleSubmit@addfund');
Route::get('/d', function(){
	return view('pages.newpage');
});
Route::post('/findtransaction', 'handleSubmit@findtransaction');
Route::post('/cpass', 'handleSubmit@cpass');
Route::post('/updateuser', 'handleSubmit@updateuser');
Route::post('/deleteUser', 'handleSubmit@deleteUser');
Route::get('/record_activity', 'handleSubmit@record_activity');
Route::post('/addpayment', 'handleSubmit@addpayment');

