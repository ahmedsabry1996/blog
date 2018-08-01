@extends('layouts.app')
@section('title','all categories')


@section('content')

<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">All posts</h3>
	  </div>
	  <div class="panel-body">

	  <table class="table table-hover">
    
            <tr>
               <th>Title</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
          </tr>
                @foreach($posts as $post)
                
                <tr>
                    <td>{{$post->title}}</td>
                    <td><img src="{{$post->featured}}" alt="{{$post->featured}}" class="img-responsive" width="30"></td>
                    <td><a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-warning">Trash</a></td>
                    
                </tr>
                
                @endforeach
            
    </table>

	  	  
	  	  	  	  </div>
</div>





@endsection