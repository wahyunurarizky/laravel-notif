<?php

namespace App\Http\Controllers;

use App\Events\ArticleCreated;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // ArticleCreated::dispatch(['title' => 'asd'], ['name' => 'wahyu']);

        $client = new Client([
            'base_uri' => 'http://127.0.0.1:8000/api/',
        ]);
        $response = $client->request('GET', 'article');
        $data = json_decode($response->getBody());

        return view('article.index', ['articles' => $data]);
    }
}
