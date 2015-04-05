<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('home');
    }

    public function home()
    {
        return view("pages.home");
    }

    public function getLatestCommit(){
        $user = "depressedsheep";
        $repo = "twitter-deepthought";
        $client_id = env("GITHUB_API_ID");
        $client_secret = env("GITHUB_API_SECRET");

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.github.com/repos/$user/$repo/commits");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_USERAGENT, "idkwtfbbq7");
        $response = curl_exec($curl);
        curl_close($curl);

        $latest_commit = json_decode($response)[0];
        $commit_sha = $latest_commit->sha;
        $commit_time = strtotime($latest_commit->commit->committer->date);
        $days_since_commit = floor((time() - $commit_time) / (24 * 60 * 60));
        $commit_url = "https://github.com/$user/$repo/commit/$commit_sha?client_id=$client_id&client_secret=$client_secret";

        return json_encode(array(
            "sha" => substr($commit_sha, 0, 20) . '...',
            "url" => $commit_url,
            "days_since_commit" => $days_since_commit
        ));
    }
}