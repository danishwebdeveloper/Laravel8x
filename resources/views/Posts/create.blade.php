@extends('layouts.app')

@section('title', 'The Content Page')

@section('content')
{{-- <h1>Hello there</h1> --}}
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div><input type="text" name="title"/></div>
        <div><textarea name="content"></textarea></div>
        <div><input type="submit" value="Create"/></div>
    </form>
@endsection


