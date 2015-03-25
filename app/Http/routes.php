<?php

Route::get("/", "HomeController@index");
Route::get("/home", "HomeController@home");
Route::get("/trends", "TrendsController@index");
Route::get("/search", "SearchController@index");
Route::get("/live", "LiveController@index");
Route::get("/admin", "AdminController@index");