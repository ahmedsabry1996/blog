@extends('layouts.app')

@section('title','create new post')


@section('content')

<div class="panel panel-default text-center">
	<div class="panel-heading">
   <h1 class="text-center">Create new post</h1>
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
     <form action="{{route('add.post')}}" method="POST" role="form" enctype="multipart/form-data">
		    {{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="title">
	</div>
	
	    <div class="form-group">
	
	    @foreach($tags as $tag)    
  <label>
   {{$tag->tag}}<input type="checkbox" name="tags[]" value="{{$tag->id}}"></label><br>
    
    @endforeach
    
    </div>

	
	<div class="form-group">
	    <select name="cat_id" class="form-control">
     
     @foreach($cats as $cat)
     <option value="{{$cat->id}}">{{$cat->name}}</option>
     @endforeach
</select>
	</div>
	<div class="form-group">
		<input type="file" class="form-control" name="featured">
	</div>
	
	<div class="form-group">
   
   <label for="content">post : </label>
    <textarea name="content" id="content" cols="50" rows="10"> {{old('content')}}</textarea>
	</div>
		<button type="submit" class="btn btn-primary">Submit</button>
</form>

	</div>
</div>
@endsection