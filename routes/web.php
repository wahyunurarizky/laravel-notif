<?php

use App\Events\ArticleCreated;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     Redis::publish('article-created', json_encode([
//         'id' => 'asdasd'
//     ]));
// });

// Route::get('/', function () {
//     ArticleCreated::dispatch(['title' => 'asd'], ['name' => 'wahyu']);
//     return view('article.index');
// });

Route::get('/', [ArticleController::class, 'index']);
Route::get('/test', function () {


    // broadcast(new ArticleCreated([
    //     'id' => 'test',
    //     'name' => 'wahyu',
    //     'title' => 'title',
    //     'content' => 'content'
    // ]));


    ArticleCreated::dispatch([
        'id' => '1',
        'name' => 'wahyu',
        'title' => 'title',
        'content' => 'content'
    ]);
});
