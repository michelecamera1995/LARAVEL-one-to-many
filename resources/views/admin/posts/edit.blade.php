<div>
    <form action="{{route('admin.posts.update', $post)}}" method="POST">
        @csrf
        @method ('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="content">Description</label>
            <input type="text" name="content">
        </div>
        <div>
            <select name="category_id" id="">
                <option value="">select category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">submit</button>
    </form>
</div>