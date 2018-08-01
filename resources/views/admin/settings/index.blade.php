@extends('layouts.app')

@section('title','create new post')
@section('content')

<div class="panel panel-default text-center">
	<div class="panel-heading">
   <h1 class="text-center">Edit settings</h1>
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
     <form action="{{route('settings.update')}}" method="POST" role="form" enctype="multipart/form-data">
		    {{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control" name="site_name" placeholder="site" value="{{$setting->site_name}}">
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name="email" placeholder="email" value="{{$setting->email}}">
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name="contact_num" placeholder="contact number" value="{{$setting->contact_num}}">
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name="address" placeholder="address" value="{{$setting->address}}">
	</div>
	
		<button type="submit" class="btn btn-primary">Submit</button>
</form>

	</div>
</div>


@endsection