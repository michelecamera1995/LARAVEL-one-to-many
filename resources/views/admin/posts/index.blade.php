<a class="nav-link" href="{{ route('admin.posts.create') }}">crea</a>
@foreach($posts as $post)
<h2>Titolo:</h2>
<h2>{{ $post->title}}</h2>
<h2>Contenuto:</h2>
<p>{{ $post->content}}</p>
<button><a class="nav-link" href="{{ route('admin.posts.edit', $post) }}">modifica</a></button>

<form action="{{route('admin.posts.destroy', $post)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" value="">delete</button>
</form>
@endforeach