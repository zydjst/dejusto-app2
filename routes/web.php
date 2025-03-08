<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//service Container
Route::get('test-container', function (Request $request){
    $input = $request->input(('key'));
    return $input;
});

//service Providers
Route::get('/test-provider', function(UserService $userService){
    dd($userService->ListUsers());
});

//service Provider
Route::get('/test-users', [UserController::class, 'index']);

//service facades
Route::get('/test-facades', function (UserService $userService){
     dd(Response::json($userService->ListUsers()));
});

//Routing Parameter
Route::get('/post/{post}/comment/{comment}', function (string $postID, string $comment){
    return "Post ID: " . $postID . " - Comment: " . $comment;
});

Route::get('/post/{id}', function (string $id){
    return $id ;
})-> where ('id', '[0-9]+');

Route::get('/search/{search}', function (string $search){
    return $search ;
})-> where ('search', '.*');

//route or route alias
Route::get('/test/route/sample', function (){
    return route ('test-route') ;
})-> name ('test-route');



//route middleware group
Route::middleware(['user-middleware']) -> group(function() {
        Route::get('route-middleware-group/first', function (Request $request){
        echo 'first';
    });

        Route::get('route-middleware-group/second', function (Request $request){
        echo 'second';
    });

});

//Route -> Controller
Route::controller(UserController::class)-> group(function (){
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'show');
});

//csrf
Route::get('/token', function (Request $request){
    return view ('token');
});
Route::post('/token', function (Request $request){
    return $request -> all();
});


Route::get('/users', [UserController::class,'index']) ->middleware ('user-middleware');

Route::resource('products', ProductController::class);

Route::get('/product-list', function (ProductService $productService){
    $data ['products']= $productService->listProducts();
    return view ('product.list', $data);
});



