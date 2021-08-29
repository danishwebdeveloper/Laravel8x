@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
{{-- <h1>Hello there</h1> --}}
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        @include('Posts.Partials.form')

        <div><input type="submit" value="Create"/></div>
    </form>
@endsection


