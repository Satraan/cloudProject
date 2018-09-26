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
    $cards = "";

    for ($x = 0; $x <= 1; $x++) {
        $request = new GuzzleHttp\Psr7\Request (
            "GET",
            "https://api.scryfall.com/cards/random"

        );

        $guzzle = new GuzzleHttp\Client();
        $result = $guzzle->send($request);

        $randomCard = json_decode($result->getBody()->getContents());

        $cards = $cards . " " . $randomCard->oracle_text;
    }

    return $cards;
});


Route::get('/testApi', function (){

    $request = new GuzzleHttp\Psr7\Request (
        "GET",
            "https://cloudproject-217611.appspot.com/api/cards"

    );

    $guzzle = new GuzzleHttp\Client();
    $result = $guzzle->send($request);

    return $result->getBody()->getContents();
});




