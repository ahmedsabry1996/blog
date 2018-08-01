<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/toaster.min.css')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-md navbar-default">
                <div class="container-fluide">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">


                        <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @else
                        <li class="dropdown navbar-right">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @if(Auth::check())

            <div class="col-lg-4">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{route('homepage')}}">home</a></li>
            <li class="list-group-item divider">Posts</li>
                    <li class="list-group-item"><a href="{{route('posts.all')}}">posts</a></li>
                    <li class="list-group-item"><a href="{{route('post.create')}}">create a new post</a></li>
                    <li class="list-group-item"><a href="{{route('post.trash')}}">trashed posts</a></li>
                    <li class="list-group-item divider">Categories</li>
                    <li class="list-group-item">

                        <a href="{{route('cat.all')}}">categories</a>

                    </li>
                    <li class="list-group-item">
                        <a href="{{route('cat.create')}}">create a category</a>
                    </li>
                    <li class="divider list-group-item">
                        Tags
                    </li>

                    <li class="list-group-item">
                        <a href="{{route('tag.all')}}">tags</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('tag.create')}}">create a tag</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('tag.trashed')}}">trashed tags</a>
                    </li>
                    
                    @if(Auth::user()->admin)
                    
                    <li class="divider list-group-item">
                    Users
                    </li>
                    <li class="list-group-item">
                    <a href="{{route('user.all')}}">users</a>
                    </li>
                    <li class="list-group-item">
                    <a href="{{route('user.create')}}">create a user</a>
                    </li>
                    @endif
                    
                    <li class="list-group-item">
                    <a href="{{route('profile.edit')}}">profile</a>
                    </li>
                    
                    <li class="divider list-group-item">Settings</li>
                    <li class="list-group-item">
                        <a href="{{route('allsettigns')}}">Settings</a>
                    </li>
                    
                </ul>

            </div>
            @endif
            <div class="col-lg-8">
                @yield('content')
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{asset('js/toaster.min.js')}}"></script>

    <script>
        @if(Session::has('success'))

        toastr.success("{{Session::get('success')}}");

        @endif

        @if(Session::has('info'))

        toastr.info("{{Session::get('info')}}");

        @endif

    </script>
</body>

</html>
