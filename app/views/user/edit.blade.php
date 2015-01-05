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
			{{ Form::text('email', $user->email) }}
		</p>

		<p>
			{{ Form::label('nick', 'Username') }}<br>
			{{ Form::text('nick', $user->nick) }}
		</p>
		
		<p>
			{{ Form::label('name', 'Name') }}<br>
			{{ Form::text('name', $user->name) }}
		</p>
		
		<p>
			{{ Form::label('www', 'Website') }}<br>
			{{ Form::text('www', $user->www) }}
		</p>
		
		<p>
			{{ Form::label('description', 'Some about you') }}<br>
			{{ Form::textarea('description', $user->description) }}
		</p>
		
		@if(isset($github))
		<p>
            An account is connected with GitHub user named <b>{{ $github->login }}</b>. <a href="{{ URL::to('github/disconnect') }}">Disconnect?</a>
		</p>
		@else
		<p>
		    Your account isn't already connected with GitHub. Do you want to <a href="{{ URL::to('github/connect') }}">connect it</a>?
		</p>
		@endif

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}
	
@stop