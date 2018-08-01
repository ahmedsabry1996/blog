@extends('layouts.app')


@section('title','new cat')

@section('content')


<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">Edit cat : {{$current_cat->name}}</h3>
	  </div>
	  <div class="panel-body">
			<form action="{{route('cat.update',['id'=>$current_cat->id])}}" method="POST" role="form">

        {{ csrf_field() }}
	<div class="form-group">
		
<input type="text" class="form-control" name="catname" placeholder="cat name" value="{{$current_cat->name}}">
	</div>



	<button type="submit" class="btn btn-success">Edit</button>
</form>

	  </div>
</div>




@endsection