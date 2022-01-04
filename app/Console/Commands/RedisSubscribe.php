<?php

namespace App\Console\Commands;

use App\Events\ArticleCreated;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to redis channel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Redis::subscribe(['article-created'], function ($message) {

            $article =  json_decode($message);
            // dd($article);
            // var_dump($article);

            ArticleCreated::dispatch($article);

            // $client = new Client([
            //     'base_uri' => 'http://127.0.0.1:8000/api/',
            // ]);
            // $response = $client->request('GET', 'article/' . $m->id);

            // // ArticleCreated::dispatch($article, $article->author);

            // // $data = json_decode($response->getBody());
            // echo $response->getBody()->getContents();
        });
    }
}
