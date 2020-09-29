<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapeController extends Controller
{
    public function get_data(){
        $client = new Client();

        $page = $client->request('GET', 'https://www.imdb.com/title/tt7395114/?ref_=hm_fanfav_tt_1_pd_fp1/');

        //echo '<pre>';
        //print_r($page);
        $title = $page->filter('.title_wrapper')->filter('h1')->text();
        $rating = $page->filter('.ratingValue', 'title')->text();

        echo $title;
        echo $rating;
    }
}
