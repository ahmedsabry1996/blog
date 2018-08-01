<?php

namespace App\Http\Controllers;
use App\Category as category;
use Illuminate\Http\Request;
use Session;
use App\Post as posts;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
       $allCategories = category::all();
       
        
        if($allCategories->count() === 0){
            Session::flash('info','create at least one category to show');
            return redirect()->route('cat.create');
        }
       return view('admin.category.categories',['cats'=>$allCategories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    
    $cat = new category;
        
    $cat->name = $request->catname;
        
    $cat->save();
    
    Session::flash('success','category '. $request->catname .' added successfully');
        
    return redirect()->route('cat.all');    
    
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
        $current_cat = category::find($id);
       
        return view('admin.category.edit',['current_cat'=>$current_cat]);

       
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
        
        $current_cat = category::find($id);
        
        $current_cat->name = $request->catname;
        
        $current_cat->save();
        
        Session::flash('success',$request->catname .' Edited successfully');

        return redirect()->route('cat.all');
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
    
        $delete = category::find($id);
        
        
        foreach($delete->posts as $post):
            
        $post->delete();
        
        endforeach;
        
        $cat_name = $delete->name;
        
        $delete->delete();
        
        Session::flash('success',$cat_name . 'category delete successfully');

        
        return redirect()->route('cat.all');
        
    }
}
