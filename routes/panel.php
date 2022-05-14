<?php
Route::middleware('main')->group(function () {

//-------------------------------------Panel---------------------------------------------------------
    Route::get('panel/register', 'Panel\LoginController@getRegister')->name('panel.register');
    Route::post('panel/register', 'Panel\LoginController@postRegister')->name('register');
    Route::get('panel/login', 'Panel\LoginController@getPanelLogin')->name('panel.log');
    Route::post('panel/login', 'Panel\LoginController@postLogin')->name('panel.login');
    Route::post('panel/login-temp', 'Panel\LoginController@postPanelLogin')->name('panel.login-temp');
    Route::get('panel/login2', 'Panel\LoginController@getLoginWpass')->name('panel.logpass');
    Route::get('panel/confirm/{mobile}', 'Panel\LoginController@getConfirm')->name('panel.confirm');
    Route::get('panel/login-pass/{mobile}', 'Panel\LoginController@getPassword')->name('panel.password');
    Route::post('panel/confirm', 'Panel\LoginController@postConfirm')->name('confirm');
    Route::post('panel/re-confirm/{mobile?}', 'Panel\LoginController@postReCon');
    Route::post('/panel/login/{mobile}', 'Panel\LoginController@postRePassword');
    Route::post('/panel/login-pass/', 'Panel\LoginController@postPassword');
    Route::get('/panel/logout', 'Panel\LoginController@getlogout')->name('panel.logout');
    Route::post('/vue-post-like', 'Panel\LikeController@postVueLike')->name('pro.like');

});

Route::namespace('Panel')->prefix('panel')->group(function () {
    Route::middleware('PanelPermission')->group(function (){
Route::get('/dashboard', 'PanelController@dashboard')->name('panel.dashboard');
        Route::get('/pdf/{order_id}', 'PanelController@getPdf')->name('panel.pdf');
//==info====
Route::get('/edit-info', 'PanelController@info')->name('panel.edit');
Route::post('/save-info', 'PanelController@postEditInfo');
//====pass==
Route::get('/reset-password', 'PanelController@pass')->name('panel.pass');
Route::post('/save-pass', 'PanelController@savePassword');
//==address==
Route::post('/post-address', 'PanelController@postAddAddress');
Route::post('/edit-address/{id}', 'PanelController@postEditAddress');
Route::get('/delete-address/{id?}', 'PanelController@getDeleteAddress');
Route::get('/default-address/{id?}', 'PanelController@defaultAddress');
Route::get('/addresses', 'PanelController@address')->name('panel.address');
Route::post('/setcity', 'PanelController@setCity')->name('panel.set-city');
Route::post('/setcity-edit', 'PanelController@setCityEdit')->name('panel.set-city-edit');
//==fav==
Route::get('/favorites', 'PanelController@favorites')->name('panel.favorites');
//==order==
Route::get('/orders', 'PanelController@orders')->name('panel.orders');
Route::get('/order-details/{id}', 'PanelController@orderDetails')->name('panel.order.details');
Route::get('/order-steps/{id}', 'PanelController@orderStep')->name('panel.order.steps');
//==discount==
Route::get('/discounts', 'PanelController@discounts')->name('panel.discounts');
//==like====
Route::post('/post-like', 'LikeController@postLike');
Route::get('/delete-like/{id}', 'LikeController@getDeleteLike');
//==ticket===
Route::get('/tickets', 'TicketController@tickets')->name('panel.tickets');
Route::get('/tickets/new', 'TicketController@getNewTicket')->name('panel.new-tickets');
Route::get('/returns/new/{id?}', 'TicketController@getReturn')->name('panel.new-return');
Route::post('/new-ticket', 'TicketController@postNewTicket');
Route::get('/tickets/details/{id}', 'TicketController@ticketDetail')->name('panel.ticket-det');
Route::post('/ticket-details-post', 'TicketController@postTicketDetails');
Route::any('/ticket-status/{id}', 'TicketController@ticketStatus');
//==track==
Route::get('/tracking', 'PanelController@tracking')->name('panel.tracking');
Route::get('/post-track', 'PanelController@track')->name('panel.track');

});

});
