<div>
    @foreach($posts as $post)
    <h2>Contenuto:</h2>
    <p>{{ $post->content}}</p>
    <p>{{ $categories->name}}</p>
    @endforeach
</div>