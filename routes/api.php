<?php
use App\Http\Controllers\ProductsController;
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
// Route::get('/products',[ProductsController::class,'index']
// );
Route::resource('products', ProductsController::class);

// Route::post('/products',function(){
// return product::create([
// 'name'=>'product One',
// 'slug'=>'product One',
// 'description'=>'This is number one',
// 'price'=>'99.8'
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
