@extends('layouts.main')

@section('content')
   
    <h1>{{ $user->name }}</h1>
    @if($user->nick) {{ $user->nick }} @endif
    
    <ul>
        @if($user->email) <li>E-mail: {{ $user->email }}</li> @endif
        @if($user->www) <li>Website: {{ $user->www }}</li> @endif
    </ul>
   
    <p>
        {{ $user->description }}
    </p>
	
@stop