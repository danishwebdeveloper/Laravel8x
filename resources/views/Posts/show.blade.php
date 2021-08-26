@extends('layouts.app')

{{--  $Post from router as define in return section  --}}
@section('title', $post['title'])

@section('content')

    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>

    @if ($post['is_new'])
        <div>The post is new, using If</div>
        @elseif (!$post['is_new'])
        <div>The post is old, using else if</div>
    @endif


    @unless ($post['is_new'])
          <div>Old post using unless, false should be shown</div>  
    @endunless

    @isset($post['has_comment'])
        <div>The post has comment, using isset and 2nd post has comment</div>
    @endisset

@endsection