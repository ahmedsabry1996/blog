@extends('layouts.app')


@section('title','new cat')

@section('content')


<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">create new category </h3>
	  </div>
	  <div class="panel-body">
			<form action="{{route('cat.add')}}" method="POST" role="form">
{{ csrf_field() }}

	<div class="form-group">
		
<input type="text" class="form-control" name="catname" placeholder="cat name">
	</div>



	<button type="submit" class="btn btn-success">Add</button>
</form>

	  </div>
</div>




@endsection