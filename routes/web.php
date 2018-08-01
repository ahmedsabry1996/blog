<?php

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
Route::get('/t',function(){
   return App\User::find(1)->profile->user_id;
});


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

        Route::get('/post/create','PostsController@create')->name("post.create");

        Route::get('/home',function(){
            return view('home');
        })->name('homepage');
    
    
    
        //categories
    
        //show all
    Route::get('/cat/all','CategoriesController@index')->name("cat.all");
    
    //create new one
    Route::get('/cat/create','CategoriesController@create')->name("cat.create");
    
    //store a cat
    Route::post('/cat/add','CategoriesController@store')->name("cat.add");
    
    //edit cat
    Route::get('/cat/edit/{id}','CategoriesController@edit')->name("cat.edit");
    
    //apply editiing cat
    Route::post('/cat/update/{id}','CategoriesController@update')->name("cat.update");
    
    //delete cat
    Route::get('/cat/delete/{id}','CategoriesController@destroy')->name('cat.delete');
    
    /*catrgrories are done*/
    
    //posts
    
    //show all
    Route::get('/posts/all','PostsController@index')->name('posts.all');
    
    
    //delete post
    
    Route::get('/post/delete/{id}','PostsController@destroy')->name('post.delete');
    
    Route::get('/post/trash/','PostsController@trash')->name('post.trash');
    //delete permentntaly
    Route::get('/post/kill/{id}','PostsController@kill')->name('post.kill');
    
    //restore post
    Route::get('/post/restore/{id}','PostsController@restore')->name('post.restore');
    
    //edit post
    
    Route::get('/post/edit/{id}','PostsController@edit')->name('post.edit');
    
    //update post
    Route::post('/post/update/{id}','PostsController@update')->name('post.update');
    /*End post*/
    
    
    /*Edit tags*/
    
    //list all tags
    Route::get('/tag/all','TagsController@index')->name('tag.all');
    
    //create new tag
    Route::get('/tag/create','TagsController@create')->name('tag.create');
    
    //store a new tag
    Route::post('/tag/create','TagsController@store')->name('tag.add');
    
    //trash a tag
    Route::get('/tag/delete/{id}','TagsController@destroy')->name('tag.delete');
    
    //edit a tag
    Route::get('/tag/edit/{id}','TagsController@edit')->name('tag.edit');
    
    //apply edit tag
    Route::post('/tag/update/{id}','TagsController@update')->name('tag.update');
    
    //show trahed tags
    Route::get('/tag/trashed','TagsController@trashed')->name('tag.trashed');   
    
    
    //remove tag
    Route::get('/tag/kill/{id}/{tagname}','TagsController@kill')->name('tag.kill');
    
    //restore a tag
    Route::get('/tag/restore/{id}','TagsController@restore')->name('tag.restore');   
    
    
    //all users
    Route::get('/users/all','UserControllerController@index')->name('user.all');
    
    //create a user
    Route::get('/users/create','UserControllerController@create')->name('user.create');
    

    Route::post('/users/add','UserControllerController@store')->name('user.add');
    
    //edit roles    
    Route::get("/user/role/{id}/{role}",'UserControllerController@role')->name('user.role')->middleware('admin');
    
    Route::get('/user/profile/edit','ProfileController@index')->name('profile.edit');
    
    Route::post('/user/profile/update','ProfileController@update')->name('profile.update');
    
    Route::get('/user/delete/{id}','UserControllerController@destroy')->name('user.delete');
    
    
    //settings
    Route::get('/settings','SettingController@index')->name('allsettigns');
    Route::post('/settings/update/','SettingController@update')->name('settings.update');
    
    
});

    //frontend
    
Route::get('/single/{slug}','FrontEndController@single')->name('post.show');
    

Route::get('/', 'FrontEndController@index');




Route::post('/post/store','PostsController@store')->name('add.post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
