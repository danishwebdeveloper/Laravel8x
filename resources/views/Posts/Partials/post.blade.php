


<a href="{{ route('posts.show' , ['post' => $post->id]) }}">
    <h3>{{ $post->title }}</h3>
</a>

<div>
    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Edit</a>
    <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="btn btn-primary"/>
    </form>
</div>