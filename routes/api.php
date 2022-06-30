<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Creazione prima api
/*  Route::get('posts', function ()
{
    $posts = Post::all();

    return response()->json([
        'status_code' => 200,
        'post' => $posts,
    ]);
}); */

//Creazione api con impaginazione usando il controller
Route::get('posts', 'Api\PostController@index');
Route::get('posts/{post:slug}', 'Api\PostController@show');
Route::get('categories', 'Api\CategoryController@index');
Route::get('tags', 'Api\TagController@index');


