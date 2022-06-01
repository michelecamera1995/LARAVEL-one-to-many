<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PostsModel;
use App\CategoryModel;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = CategoryModel::all();
        $posts = PostsModel::all();
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = CategoryModel::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required | max:250',
            'content' =>    'required'
        ]);
        $data = $request->all();
        $newPost = new PostsModel();
        $newPost->fill($data);
        $newPost->slug = PostsModel::convertToSlug($newPost->title);
        $newPost->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostsModel $post)
    {
        //
        $posts = PostsModel::all();
        $categories = CategoryModel::find($post->category_id);
        if ($posts) {
            return view('admin.posts.show', compact('posts', 'categories'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostsModel $post)
    {
        //
        $categories = CategoryModel::all();
        if ($post) {
            return view('admin.posts.edit', compact('post', 'categories'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostsModel $post)
    {
        //
        $request->validate([
            'title' => 'required | max:250',
            'content' =>    'required',
            'category_id' => 'required',
        ]);
        $data = $request->all();
        $post->fill($data);
        $post->slug = PostsModel::convertToSlug($post->title);
        $post->update();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostsModel $post)
    {
        //
        if ($post) {
            $post->delete();
        }
        return redirect()->route('admin.posts.index');
    }
}
