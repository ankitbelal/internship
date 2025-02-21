<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerForGroup;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\InvokableComponentVariable;

Route::get('/', function () {
    return view('welcome');
});


Route::get('home/',function(){
    return view('welcome');
});

// route::get('about/',function(){
//     return view('about');
// });


// route::view('info/','about');


//this is subroute
route::get('home/dashboard',function(){
    return view('main');
});



//this contains the required parameter and if the parameter is not passed then cause error

route::get('about/{name}',function(string $name){
    return "<h1>hello</h1>".' '.$name;
});



//this contains the optional parameter and if the parameter is not passed then it will not cause error

Route::get('about/{name?}', function (string $name = null) {
  if ($name == null) {
    return "<h1>hello you forgot your name</h1>";
  } else {
    return "<h1>hello: " . $name . "</h1>";
  }
});


//passing multiple parameters in route

route::get('/user/{name}/{id}',function(string $name,int $id){
    return "<h1>hello</h1>".' '.$name.' '.$id;
});


//using laravel route constraints 
route::get('ankit/{contact}',function(string $contact){
    return "user" . $contact;
})->whereNumber('contact');




//passing the value of parameter to the blade

route:: get('profile/{name}',function(string $name){
    return view('profile',['name'=>$name]);
});



//this is example of named route

route::get('home/info',function(){
    return "this is information page";
})->name('information');



//route for first blade
route::get('first',function(){
    return view('first');
});


//route for second blade
route::get('second',function(){
    return view('second');
});



//passing multiple parameters to the blade

route::get('milan/{name}/{age}',function($name, $age){
    return view('about', ['name' => $name, 'age' => $age]);
});








// Route group
Route::prefix('page')->group(function () {
    Route::get('post/1', function () {
        return view('home');
    });

    Route::get('about', function () {
        return view('about');
    });

    Route::get('first', function () {
        return view('first');
    });
});




//route to controller simple

route::get('welcome',[PageController::class,'showWelcome']);

//passing the parameter to controller method and viewfile
route::get('page/user/{name}',[PageController::class,'showPage']);

route::controller(ControllerForGroup::class)->group(function(){
route::get('/message','showMessage');
route::get('group/','showGroup');
route::get('member','showMember');

});



//routing to single action controller
route::get('/action',InvokableController::class);
