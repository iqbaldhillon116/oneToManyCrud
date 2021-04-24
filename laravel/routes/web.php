<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\User;
use App\Post;

//creating or inserting data
Route::get('/create',function(){
    
    $user = User::findOrFail(1);

    $post = new Post(['title' => 'My first Post with edwin diaz 2','body'=>'welcome to my hood 2']);

    $user->posts()->save($post);


});

//reading data
Route::get('/read',function(){

    $user = User::findOrFail(1);

      //even though we are calling the posts function from model we donot needs to add paranthesis infront of posts because findorfail is returning this data in form of object

       // return $user->posts; 

    //we can check the data type of $user by passing it through dd function as follows
        // dd($user->posts);

        foreach($user->posts as $post ){

            echo $post->title."<br>";
        }

});

//updating data

Route::get('/update',function(){

    $user = User::find(1);
    //Note: we will use paranthesis in posts only when we need to chain it with other methods 
    // $user->posts()->whereId(1)->update(['title'=>'its fun learning under pressure','body'=>'learning on saturday']);

    //also 
    $user->posts()->where('id','=',2)->update(['title'=>'its fun learning under pressure','body'=>'learning on saturday']);
});

//deleting data

Route::get('/delete',function(){

    $user = User::find(1);//this is just finding the user
    
    $user->posts()->whereId(2)->delete();//here we are getting the posts related to this user by using id of this table
});