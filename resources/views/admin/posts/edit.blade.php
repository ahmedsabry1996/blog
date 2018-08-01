@extends('layouts.app')

@section('title','create new post')
@section('content')

<div class="panel panel-default text-center">
	<div class="panel-heading">
   <h1 class="text-center">Edit post</h1>
    </div>
		<div class="panel-body">
       @if($errors->any())
           @foreach($errors->all() as $error)
       		  <div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
</button>
                <p><b>{{$error}}</b></p>
</div>
@endforeach
       		  		  @endif		  
     <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" role="form" enctype="multipart/form-data">
		    {{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control" name="title" placeholder="title" value="{{$post->title}}">
	</div>
	<div class="form-group">
	    <select name="cat_id" class="form-control">
     
     @foreach($cats as $cat)
     
     <option value="{{$cat->id}}"
     
            @if($cat->id == $post->category_id)
            
                selected
            @endif
     
     
     >{{$cat->name}}</option>
     @endforeach
     
</select>
<div class="form-group">
	
	    @foreach($tags as $tag)    
  <label>
  <input type="checkbox" name="tags[]" value="{{$tag->id}}"
   
   @foreach($post->tags as $ta)
   @if($ta->id == $tag->id)   
   checked
   @endif
   @endforeach
   ></label> {{$tag->tag}}<br>
    
    @endforeach
    </div>

	</div>
	<div class="form-group">
		<input type="file" class="form-control" name="featured">
	</div>
	
	<div class="form-group">
    <textarea name="content" id="" cols="50" rows="10" placeholder="content">{{$post->content}}</textarea>
	</div>
		<button type="submit" class="btn btn-primary">Submit</button>
</form>

	</div>
</div>


@endsection