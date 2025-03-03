<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerForGroup;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\InvokableComponentVariable;
use App\Http\Controllers\RestfulController;
use App\Http\Controllers\EmployeeController;

Route::get('/',[UserController::class ,'index'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('login.submit');

Route::get('/register',[UserController::class,'showRegisterForm'])->name('register');
route::post('/register',[UserController::class,'register'])->name('register.submit');




Route::get('home/',function(){
    return view('welcome');
})->name('home');

// route::get('about/',function(){
//     return view('about');
// });


// route::view('info/','about');


//this is subroute
route::get('home/dashboard',function(){
    return view('main');
})->name('dashboard');



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


//restful routing for resourceful controller with restful action


//route for index() action
route::get('/viewall',[RestfulController::class,'index']);



//route for create() action
route::get('/additem',[RestfulController::class,'create']);

//route for store() action

route::post('/submitform',[RestfulController::class,'store']);

//route for show() action
route::get('/showdata/{id}',[RestfulController::class,'show']);


//route for edit() action
route::get('/editdetail/{id}',[RestfulController::class,'edit'] );

//route for update() actionn
route::put('/submitedit/{id}',[RestfulController::class,'update']);
route::patch('/submitedit/{id}',[RestfulController::class,'update']);


route::delete('/deletedata/{id}',[RestfulController::class,'delete']);







//for student crud

route::get('/students',[StudentController::class,'index'])->name('students.index');

route::get('/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
route::delete('/delete/{id}',[StudentController::class,'destroy'])->name('students.destroy');

route::get('/add',[StudentController::class,'create'])->name('students.create');
route::post('/add',[StudentController::class,'store'])->name('students.store');




route::put('/update/{id}',[StudentController::class,'update'])->name('students.update');
route::get('/show/{id}',[StudentController::class,'show'])->name('students.view');


route::get('/layout',function(){
    return view('home-child');
});

route::post('/logout',[UserController::class,'logout'])->name('logout');






//this is the route for the form handling in employee controller

route::get('/employee',[EmployeeController::class,'index'])->name('employees.index');

route::get('/employee/add',[EmployeeController::class,'create'])->name('employees.create');

route::post('/employee/add',[EmployeeController::class,'store'])->name('employees.store');

route::get('/employee/edit/{id}',[EmployeeController::class,'edit'])->name('employees.edit');

route::put('/employee/edit/{id}',[EmployeeController::class,'update'])->name('employees.update');

route::delete('/employee/delete/{id}',[EmployeeController::class,'destroy'])->name('employees.destroy');

route::get('/employee/show/{id}',[EmployeeController::class,'show'])->name('employees.view');


