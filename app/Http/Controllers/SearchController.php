<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class SearchController extends Controller {
    public function index($query = null){
        if(isset($_GET) && !empty($_GET))
            if(isset($_GET['q']) && !empty($_GET['q'])){
                $query = $_GET['q'];
                return redirect("/search/" . $query);
            }
        if(isset($query) && !empty($query) && $query != null)
            return view("pages.search_results")->with(["query" => $query]);
        else
            return view("pages.search");
    }
}