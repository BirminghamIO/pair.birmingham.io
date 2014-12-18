<!-- app/views/login.blade.php -->

<!doctype html>
<html>
<head>
	<title>Look at me Login</title>
</head>
<body>
    <div class="navbar navbar-default">
        <a href="{{ URL::to('/') }}">Birmingham.IO Pair Programming</a>
        @if (Auth::check())
            @include('components.menu_user')
        @else
            @include('components.menu_guest')
        @endif
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>