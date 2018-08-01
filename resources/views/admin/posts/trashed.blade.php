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
                <th>Delete</th>
                <th>Restore</th>
          </tr>
                @foreach($posts as $post)
                
                <tr>
                    <td>{{$post->title}}</td>
                    <td><img src="{{$post->featured}}" alt="{{$post->featured}}" class="img-responsive" width="30"></td>
                    <td><a href="{{route('post.kill',['id'=>$post->id])}}" class="btn btn-danger">Delete</a></td>
                    <td><a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-success">Restore</a></td>
                    
                </tr>
                
                @endforeach
            
    </table>

	  	  
	  	  	  	  </div>
</div>





@endsection