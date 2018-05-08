@extends('layouts.app')
    @section('content')

    @foreach($users as $user)
        <li><a href="/users/{{ $user->id }}">{{ $user->name }}</a></li>
    @endforeach
    
@endsection