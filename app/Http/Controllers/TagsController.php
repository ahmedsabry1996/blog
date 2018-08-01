<?php

namespace App\Http\Controllers;
use App\Tag as tags;
use Illuminate\Http\Request;
use Session;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
        //
        
        $allTags = tags::all();
        
        if($allTags->count() === 0)
        {
        Session::flash('info','No tags to display , create one');
            return redirect()->route('tag.create');
        }
        return view('admin.tags.index',['tags'=>$allTags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
        //
        return view('admin.tags.newTag');
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
        'tag'=>"required|max:200"
    ]);
    

        tags::create([
            'tag'=>$request->tag
        ]);
    
        Session::flash('success','tag '. $request->tag . ' created successfully');
        return redirect()->route('tag.all');

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
        
    $currentTag= tags::find($id);
    return view('admin.tags.edit',['tag'=>$currentTag]);
        
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
        
        $currentTag = tags::find($id);
        
        $currentTag->tag = $request->tag;
        
        $currentTag->save();
        Session::flash('success','tag ' . $request->tag . ' updated successfully');
        return redirect()->route('tag.all');
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
        $currentTag = tags::find($id);
        
        $currentTag->delete();
        
        Session::flash('success','tag  ' . $currentTag->tag .' moved to trash');
        return redirect()->route('tag.all');
    }
    
    public function trashed()
        {
        
        $trshedTags = tags::onlyTrashed()->get();
        
        if($trshedTags->count() == 0 ){
            
            Session::flash('success','no trashed tags');
        
            return redirect()->route('tag.create');

        }
                   

        return view ('admin.tags.trashed',['tags'=>$trshedTags]);

    }
     
    public function kill($id,$tagname)
        {
        
        $trshedTags = tags::withTrashed()->where('id',$id);
        
        $trshedTags->forceDelete();
        
        $currentRes = tags::find($id);    

        Session::flash('success','tag'. $tagname .' removed successfully');

        return redirect()->route('tag.trashed');
    
    }
    
        public function restore($id)
        {
        
        $trshedTags = tags::withTrashed()->where('id',$id);
        
        $trshedTags->restore();
                    
        Session::flash('success','tag restoered successfully');

        return redirect()->route('tag.all');
    
    }
    
    
    
}
