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

Route::get('/','IndexController@showIndex')->name('user.index');
Route::get('/about-us','IndexController@showAboutUs')->name('user.history');
Route::get('/hall/administration','IndexController@showHallAdministration')->name('user.hall.administration');
Route::get('/hall/role/of/honors','IndexController@showRoleOfHonors')->name('user.role.honors');
Route::get('/events','IndexController@showEvents')->name('user.events');
Route::get('/news','IndexController@showNews')->name('user.news');
Route::get('/notice','IndexController@showNotice')->name('user.notice');
Route::get('/contact','IndexController@showContact')->name('user.contact');
Route::get('/detail/news/{id}','IndexController@showNewsDetails');
Route::get('/detail/event/{id}','IndexController@showEventDetails');
Route::get('/detail/notice/{id}','IndexController@showNoticeDetails');
Route::get('/check/email','IndexController@checkEmail');
Route::get('/activate/{id}','IndexController@activateUser');
Route::get('/committee/{name}','IndexController@showCommittee');
Route::get('/history','IndexController@showHistory')->name('user.history');
Route::get('/why-us','IndexController@showWhyus')->name('user.why.us');
Route::post('/submit/message','IndexController@storeMessage')->name('user.submit.message');
Route::get('/admin/check/committee','AdminController@checkCommitteeExistence');
Route::get('/it-fest-5','IndexController@showItFest5')->name('user.it.Fest5');
Route::post('/it-fest-5','IndexController@storeItFest5')->name('it.Fest5.store');

// Code By Rifat
//Route::get('/it-fest-5','IndexController@showItFest5')->name('user.it.Fest5');
// Code By Rifat

Route::group(['middleware' => 'auth'], function (){
});

Auth::routes();
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::group(['prefix' => 'admin',  'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', 'AdminController@ShowDashboard')->name('admin.dashboard');

    Route::get('/add/committee/member', 'AdminController@showAddCommitteeMemberForm')->name('admin.add.committee.member');
    Route::post('/add/committee/member', 'AdminController@storeCommitteeMemberForm')->name('admin.store.committee.member');
    Route::post('/add/committee', 'AdminController@storeCommittee')->name('admin.store.committee');
    Route::post('/update/committee/{id}','AdminController@updateCommittee');
    Route::get('/delete/committee/{id}','AdminController@deleteCommittee');

    Route::get('/add/news','AdminController@showAddnewsForm')->name('admin.news.add');
    Route::post('/add/news','AdminController@storeAddnewsForm')->name('admin.store.news');

    Route::get('/add/events','AdminController@showAddeventsForm')->name('admin.events.add');
    Route::post('/add/events','AdminController@storeEvents')->name('admin.store.events');

    Route::get('/add/notice','AdminController@showAddNoticeForm')->name('admin.notice.add');
    Route::post('/add/notice','AdminController@storeAddNoticeForm')->name('admin.store.notice');

    Route::post('/logout','Auth\AdminLoginController@logout');

    Route::get('/edit/news/{id}','AdminController@showEditNewsForm');
    Route::post('/edit/news/{id}','AdminController@EditNewsForm');
    Route::get('/delete/news/{id}','AdminController@deleteNews');

    Route::get('/edit/event/{id}','AdminController@showEditEventsForm');
    Route::post('/edit/event/{id}','AdminController@EditEventsForm');
    Route::get('/delete/event/{id}','AdminController@deleteEvents');

    Route::get('/edit/notice/{id}','AdminController@showEditNoticeForm');
    Route::post('/edit/notice/{id}','AdminController@EditNoticeForm');
    Route::get('/delete/notice/{id}','AdminController@deleteNotice');

    Route::get('/edit/committee/member/{id}','AdminController@showEditCommitteeMemberForm');
    Route::post('/edit/committee/member/{id}','AdminController@EditCommitteeMemberForm');
    Route::get('/delete/committee/member/{id}','AdminController@deleteCommitteeMember');

    
    
    Route::get('/it-Fest-5', 'AdminController@ShowITFest5')->name('admin.itFest5');
    Route::post('/add/itFest5/cover','AdminController@storeITFestCoverForm')->name('admin.store.itFest.cover');
    Route::post('/add/itFest5/guest','AdminController@storeITFestGuestForm')->name('admin.store.itFest.guest');
    Route::get('/delete/itFest5/cover/{id}','AdminController@deleteItFestCover');
    Route::get('/delete/itFest5/guest/{id}','AdminController@deleteItFestGuest');
});




Route::group(['middleware'=>'auth'],function (){
});