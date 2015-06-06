<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("/", "HomeController@index");
Route::get("/home", "HomeController@home");
Route::get("/latestcommit.json", "HomeController@getLatestCommit");
Route::get("/trends", "TrendsController@index");
Route::get("/search", "SearchController@index");
Route::get("/crawler", "CrawlerController@index");
Route::get("/crawler/status.json", "CrawlerController@getStatus");
Route::get("/debug", "DebugController@index");
