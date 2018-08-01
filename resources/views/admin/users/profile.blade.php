@extends('layouts.app')


@section('title','new cat')

@section('content')


<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">Edit user : {{$user->name}} </h3>
	  </div>
	  <div class="panel-body">
			<form action="{{route('profile.update')}}" method="POST" role="form" enctype="multipart/form-data">
{{ csrf_field() }}

	<div class="form-group">
<input type="text" class="form-control" value="{{$user->name}}" name="username" placeholder="username">
	</div>
	<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="new password">
	</div>
	
	<div class="form-group">
<input type="text" class="form-control" value="{{$user->email}}" name="email" placeholder="email">
	</div>
	
	<div class="form-group">
	<label>Avatar</label>
<input type="file" class="form-control" name="ava">
	</div>
	
	<div class="form-group">
<input type="text" class="form-control" value="{{$user->profile->facebook}}" name="fb" placeholder="Facebook">
	</div>
	<div class="form-group">
<input type="text" class="form-control" value="{{$user->profile->youtube}}" name="yt" placeholder="Youtube">
	</div>
	<div class="form-group">
<input type="text" class="form-control" value="{{$user->profile->twitter}}" name="tw" placeholder="Twitter">
	</div>
	<div class="form-group">
<textarea class="form-control" name="about" cols="30" rows="10">{{$user->profile->about}}</textarea>
                </div>



	<button type="submit" class="btn btn-primary">Edit</button>
</form>

	  </div>
</div>




@endsection