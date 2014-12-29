@extends('layouts.main')

@section('content')
   
    {{ Form::open(array('url' => 'login')) }}
		<h1>Login</h1>

		<p>
			{{ $errors->login->first() }}
		</p>

		<p>
			{{ Form::label('login', 'Login') }}<br>
			{{ Form::text('login', Input::old('email')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}<br>
			{{ Form::password('password') }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}
	
@stop