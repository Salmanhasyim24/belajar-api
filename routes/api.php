<?php

use App\Http\Controllers\API\QuoteController;
use App\Models\Quote;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function(){
    $data = ["message" => "Hello, Salman H"];
    return response()->json($data,200);
});

// kurang siip
// Route::get('/quote/{id}', function($id){
//     $data = Quote::find($id);
//     if ($data) {
//         return response()->json($data);
//     }else {
//          return response()->json(["message"=> "Quote Not Found"], 404);
//     }
// });
//siip
Route::apiResource('/quote', QuoteController::class);
