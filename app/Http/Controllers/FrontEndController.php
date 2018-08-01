<?php

namespace App\Http\Controllers;


use App\Setting as settings;
use App\Tag as tags;
use App\Post as posts;
use App\Category as categories;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;

class FrontEndController extends Controller
{
    //
    
    public function index(){
        
        
        $settigs  = settings::first();
        
        $latestPost = posts::orderBy('created_at','desc')->first();
        
        $secondPost = posts::orderBy('created_at','desc')->skip(1)->take(1)->first();
        
        $thirdPost = posts::orderBy('created_at','desc')->skip(2)->take(1)->first();
        
        $allPosts = posts::orderBy('created_at','desc')->get();
        
        $allCategories = categories::all();
        
        $sportCat = categories::find(1);
        $economicsCat = categories::find(2);
        return view('index',[
                               'settings'=>$settigs,
                               'posts'=>$allPosts,
                               'latestPost'=>$latestPost,
                               'secondPost'=>$secondPost,
                               'thirdPost'=>$thirdPost,
                               'categories'=>$allCategories,
                               'sport'=>$sportCat,
                               'economics'=>$economicsCat,
                   ]);
    }
    
    
    public function single($slug){
        
        $currentPost = posts::where('slug',$slug)->first();
        
        $postTags = tags::where('id',$currentPost->id);
        
        $settigs = settings::first();
        
        return view('single',[
            'post'=>$currentPost,
            'settings'=>$settigs,
            'tags'=>['title']
        
        ]);
        
    }
    
}
