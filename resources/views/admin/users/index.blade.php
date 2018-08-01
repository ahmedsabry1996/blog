@extends('layouts.app')
@section('title','all categories')


@section('content')

<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">All users</h3>
	  </div>
	  <div class="panel-body">

	  <table class="table table-hover">
    
            <tr>
                <th>avatar</th>
                <th>name</th>
                <th>role</th>
                <th>delete</th>
          </tr>
                @foreach($users as $user)
                
                <tr>
                    <td><img src="{{asset($user->profile->avatar)}}" alt="man" width="50" class="img-responsive img-circle"></td>
                   
                    <td>{{$user->name}}</td>
                    
                    <td>
                    <a href="{{route('user.role',['id'=>$user->id,'role'=>$user->admin])}}"
                    @if($user->admin == 1)
                     class='btn btn-warning btn-xs'>
                    remove as admin
                    
                    @else
                 class='btn btn-success btn-xs'>
                                       set as admin

                    @endif
                    
                    </a>
                    </td>
                    @if($user->id !== Auth::user()->id)
                    <td><a class="btn btn-danger btn-xs" href="{{route('user.delete',['id'=>$user->id])}}">Delete</a></td>
                    @else
                    
                    <td>thats u</td>
                    @endif
                </tr>
                
                @endforeach
            
    </table>

	  	  
	  	  	  	  </div>
</div>





@endsection