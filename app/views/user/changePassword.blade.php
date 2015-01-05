@extends('layouts.main')

@section('content')
   
    {{ Form::open(array('url' => 'account/password')) }}
		<h1>Change password</h1>

		<p>
			{{ $errors->first() }}
			@if(Session::has('message'))
			    {{ Session::get('message') }}
			@endif
		</p>

		<p>
			{{ Form::label('password', 'Password') }}<br>
			{{ Form::password('password', Input::old('email')) }}
		</p>

		<p>
			{{ Form::label('re_password', 'Repeat') }}<br>
			{{ Form::password('re_password') }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}
	
@stop