<div>
    <a class="nav-link" href="{{ route('admin.posts.create') }}">Create new post</a>
    @foreach($posts as $post)
    <h2>Titolo: {{ $post->title}}</h2>
    <button><a class="nav-link" href="{{ route('admin.posts.edit', $post) }}">Modify</a></button>
    <button><a class="nav-link" href="{{ route('admin.posts.show', $post) }}">Details</button>
    <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" value="">Delete</button>
    </form>
    @endforeach
</div>