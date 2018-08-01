<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        return view('admin.users.profile',['user'=>Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        return view('admin.users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        
        $request->validate([
            
            'username'=>'required',
            'email'=>'required|email',
            'fb'=>'required',
            'yt'=>'required'
        ]);
        
        
        $user = Auth::user();
        
        if($request->hasFile('ava')){
            
            $avatar = $request->ava;
            
            $avatar_new_name ='uploads/avatar/'. time().$avatar->getClientOriginalName();
            
            $avatar->move('uploads/avatar',$avatar_new_name);
            
            $user->profile->avatar=$avatar_new_name;
            
            $user->profile->save();
        }
        
        $user->name = $request->username;
        $user->email = $request->email;
        $user->profile->facebook = $request->fb;
        $user->profile->youtube = $request->yt;
        
        $user->save();
        
        $user->profile->save();
        
        
        if($request->has('password')){
            $user->password = bcrypt($request->password);
            $user->save();
        }
        
        Session::flash('success','profile updated !');
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
