<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting as settings;
use Session;
class SettingController extends Controller
{
    //

    
    public function index(){
        $settings = settings::first();
        return view('admin.settings.index',['setting'=>$settings]);
    }
    
    public function update(Request $req){
        
        
        $req->validate([
            'site_name'=>'required',
            'email'=>'required|email',
            'contact_num'=>'required',
            'address'=>'required', 
        ]);
        
        $settings = settings::first();
        
        $settings->site_name = $req->site_name;
        $settings->email =  $req->email;
        $settings->contact_num =$req->contact_num;
        $settings->address=$req->address;
        
        
        $settings->save();
        
        Session::flash('success','settings updated successfully');
        
        return redirect()->back();
        
    }
}
