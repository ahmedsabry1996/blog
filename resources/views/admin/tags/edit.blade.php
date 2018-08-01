@extends('layouts.app')


@section('title','new cat')

@section('content')


<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">Edit cat : {{$tag->tag}}</h3>
	  </div>
	  <div class="panel-body">
			<form action="{{route('tag.update',['id'=>$tag->id])}}" method="POST" role="form">

        {{ csrf_field() }}
	<div class="form-group">
		
<input type="text" class="form-control" name="tag" placeholder="tag name" value="{{$tag->tag}}">
	</div>



	<button type="submit" class="btn btn-success">Edit</button>
</form>

	  </div>
</div>




@endsection