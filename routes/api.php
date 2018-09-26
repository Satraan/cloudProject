<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


https://api.scryfall.com
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/cards', function (){

    $request = new GuzzleHttp\Psr7\Request (
        "GET",
        "https://api.scryfall.com/cards/random"

    );

    $guzzle = new GuzzleHttp\Client();
    $result = $guzzle->send($request);

    $randomCard = json_decode($result->getBody()->getContents());
    return $randomCard->name;
});




