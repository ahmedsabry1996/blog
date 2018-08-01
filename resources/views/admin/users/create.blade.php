@extends('layouts.app')


@section('title','new cat')

@section('content')


<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">create a new user </h3>
	  </div>
	  <div class="panel-body">
			<form action="{{route('user.add')}}" method="POST" role="form">
{{ csrf_field() }}

	<div class="form-group">
<input type="text" class="form-control" name="username" placeholder="username">
	</div>
	
	<div class="form-group">
<input type="text" class="form-control" name="email" placeholder="email">
	</div>



	<button type="submit" class="btn btn-success">Add</button>
</form>

	  </div>
</div>




@endsection