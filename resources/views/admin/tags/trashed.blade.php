@extends('layouts.app')
@section('title','all categories')


@section('content')

<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">All tags</h3>
	  </div>
	  <div class="panel-body">

	  <table class="table table-hover">
    
            <tr>
                <th>tag</th>
                <th>edit</th>
                <th>delete</th>
          </tr>
                @foreach($tags as $tag)
                
                <tr>
                    <td>{{$tag->tag}}</td>
                   
                <td><a href="{{route('tag.restore',['id'=>$tag->id])}}" class="btn btn-success">Restore</a></td>
                
                    <td><a href="{{route('tag.kill',['id'=>$tag->id,'tagname'=>$tag->tag])}}" class="btn btn-danger">Delete</a></td>
                 
                </tr>
                
                @endforeach
            
    </table>

	  	  
	  	  	  	  </div>
</div>





@endsection