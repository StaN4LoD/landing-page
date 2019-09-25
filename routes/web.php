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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group([], function () {

    Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
    Route::get('/page/{alias}', ['uses'=>'PageController@execute', 'as'=>'page']);

    Route::auth();

});

//Закрытая часть сайта

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function () {

    //admin
    Route::get('/', function () {



    });

    //admin/pages
    Route::group(['prefix'=>'pages'], function () {

        //admin/pages
        Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'pages']);

        //admin/pages/add Страница добавления материала
        Route::match(['get', 'post'], '/add', ['uses'=>'PagesAddController@execute', 'as'=>'pagesAdd']);

        //admin/pages/edit/{page} Страница редактирования материала
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses'=>'PagesEditController@execute', 'as'=>'pagesEdit']);


    });

    //admin/portfolios
    Route::group(['prefix'=>'portfolios'], function () {

        //admin/portfolios
        Route::get('/', ['uses'=>'PortfolioController@execute', 'as'=>'portfolio']);

        //admin/portfolios/add Страница добавления материала
        Route::match(['get', 'post'], '/add', ['uses'=>'PortfolioAddController@execute', 'as'=>'portfolioAdd']);

        //admin/portfolios/edit/{portfolio} Страница редактирования материала
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses'=>'PortfolioEditController@execute', 'as'=>'portfolioEdit']);


    });

    //admin/services
    Route::group(['prefix'=>'services'], function () {

        //admin/services
        Route::get('/', ['uses'=>'ServiceController@execute', 'as'=>'services']);

        //admin/services/add Страница добавления материала
        Route::match(['get', 'post'], '/add', ['uses'=>'ServiceAddController@execute', 'as'=>'serviceAdd']);

        //admin/services/edit/{service} Страница редактирования материала
        Route::match(['get', 'post', 'delete'], '/edit/{service}', ['uses'=>'ServiceEditController@execute', 'as'=>'serviceEdit']);


    });

});