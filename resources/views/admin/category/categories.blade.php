@extends('layouts.app')
@section('title','all categories')


@section('content')

<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">All categories</h3>
	  </div>
	  <div class="panel-body">
			@foreach($cats as $cat)
			<p>{{$cat->name}}
			 <a href="{{route('cat.edit',['id'=>$cat->id])}}" class="btn btn-success">edit</a>
			 <a href="{{route('cat.delete',['id'=>$cat->id])}}" class="btn btn-danger">Delete</a>    
			 </p>
			@endforeach
	  </div>
</div>





@endsection