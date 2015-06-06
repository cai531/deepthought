<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Psy\Exception\ErrorException;

class CrawlerController extends Controller
{
    public function index()
    {
        return view("pages.crawler");
    }
}