@extends('layouts.main')

@section('content')
   
    {{ Form::open(array('url' => 'account')) }}
		<h1>Edit profile</h1>

		<p>
			{{ $errors->first() }}
			@if(Session::has('message'))
			    {{ Session::get('message') }}
			@endif
		</p>
		
		<p>
			{{ Form::label('email', 'E-mail') }}<br>
			{{ Form::text('email', Auth::user()->email) }}
		</p>

		<p>
			{{ Form::label('nick', 'Username') }}<br>
			{{ Form::text('nick', Auth::user()->nick) }}
		</p>
		
		<p>
			{{ Form::label('name', 'Name') }}<br>
			{{ Form::text('name', Auth::user()->name) }}
		</p>
		
		<p>
			{{ Form::label('www', 'Website') }}<br>
			{{ Form::text('www', Auth::user()->www) }}
		</p>
		
		<p>
			{{ Form::label('description', 'Some about you') }}<br>
			{{ Form::textarea('description', Auth::user()->description) }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}
	
@stop