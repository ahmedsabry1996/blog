<?php

namespace App\Http\Controllers;

use App\UserController;
use Illuminate\Http\Request;
use App\User as users;
use App\Profile as profiles;

class UserControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     
        $users = users::all();
        return view('admin.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'username'=>'required',
            'email'=>'required|email'
            
        ]);
        
    $user = users::create([
        
        'name'=>$request->username,
        'email'=>$request->email,
        'password'=>bcrypt('password')    

        
    ]);
    
    profiles::create([
            
           'user_id'=>$user->id,
           'avatar'=>'uploads/ava/1.png' 
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserController  $userController
     * @return \Illuminate\Http\Response
     */
    public function show(UserController $userController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserController  $userController
     * @return \Illuminate\Http\Response
     */
    public function edit(UserController $userController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserController  $userController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserController $userController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserController  $userController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $user = users::find($id);
        
        $user->profile->delete();
        
        $user->delete();
        
        return redirect()->back();
    }
    
    public function role($id,$role){
        
        $currentUser = users::find($id);
        
        $currentUser->admin = !$role;
        
    
        $currentUser->save();
        
        return redirect()->back();
        
    }
    
}
