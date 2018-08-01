<?php

namespace App\Http\Controllers;

use App\Category as category;
use App\Post as posts;
use App\Tag as tags;
use Session;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        $allPosts = posts::all();
        
        if($allPosts->count() === 0){
            
            Session::flash('info','there are no posts yet,create one !');
            return redirect()->back();
        }
        
        return view('admin.posts.index',['posts'=>$allPosts]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $cats = category::all();
        $tags = tags::all();
        
        $allCats = category::all()->count();
        $allTags = tags::all()->count();
        
        if($allCats === 0){
            
            Session::flash('info','create one category to create post');
            return redirect()->back();
        }
        
        if($allTags === 0){
            
            Session::flash('info','create one tag to create post');
            return redirect()->back();
        }
        if($cats->count() === 0){
            
        Session::flash('info','add at least one category to post a post');
        return redirect()->route('cat.create');
        }
        return view('admin.posts.create',['cats'=>$cats,'tags'=>$tags]);
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
            'title'=>'required',
            'featured'=>'required|image',
            'content'=>'required',
            'cat_id'=>'required',
            'tags'=>'required'
            
        ]);
        
        
      $featured = $request->featured ;
        
      $featured_new_name = time().$featured->getClientOriginalName();
        
      $featured->move('uploads/posts',$featured_new_name);
    
        $post = posts::create([
            
            'title'=>$request->title,
            'featured'=>'uploads/posts/'.$featured_new_name,
            'content'=>$request->content,
            'category_id'=>$request->cat_id,
            'slug'=>$request->title
        
        ]);
        
        $post->tags()->attach($request->tags);
        
        Session::flash('success','post '.$request->title.' created successfully');
        
        return redirect()->route('posts.all');
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
        $currentPost = posts::find($id);
        $cats = category::all();
        $tags = tags::all();
        return view('admin.posts.edit',['post'=>$currentPost,'cats'=>$cats,'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $post = posts::find($id);
        
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'cat_id'=>'required',
            'tags'=>'required'
        ]);
        
        if($request->hasFile('featured')){
            
        $featured = $request->featured;
            
        $featured_new_name = 'uploads/posts/'.time().$featured->getClientOriginalName();
        
      $featured->move('uploads/posts',$featured_new_name);
        $post->featured = $featured_new_name;
        
        }
        
        
        $post->title = $request->title;
        
        $post->content = $request->content;
        
        $post->category_id = $request->cat_id;
        
        $post->save();
        
        $post->tags()->sync($request->tags);
        
        return redirect()->route('posts.all');
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
        $currentPost = posts::find($id);
        
        
        
        $currentPost->delete();
         
        $allPosts = posts::all();
            

        if($allPosts->count() == 0){
    
            
        Session::flash('info','all posts are deleted , create one');

       
        return redirect()->route('post.create');

        
        }
     else{
        Session::flash('success','post '.$currentPost->title.' deleted successfully.');

        return redirect()->back();
    
     }

    }
    
    
    public function trash()
    {
        
        $trashedPosts = posts::onlyTrashed()->get();
        
        if($trashedPosts->count() === 0 ){
            Session::flash('info','no posts in the Trash');
            return redirect()->route('post.create');
        }
        
        return view('admin.posts.trashed',['posts'=>$trashedPosts]);
        
    }
    
    
    public function kill($id)
    {
        
        $deleteForEver = posts::withTrashed()->where('id',$id);
        
        $deleteForEver->forceDelete();
        
        Session::flash('success','deleted successfully');

        
        return $this->trash();
    }
    
    public function restore($id)
    {
        
        $trashedPosts = posts::withTrashed()->where('id',$id);
        
        $trashedPosts->restore();
        
        Session::flash('success','post restored successfully');
    
        return redirect()->route('posts.all');
    }
    
}
