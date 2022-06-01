<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostsModel extends Model
{
    //
    protected $table = "posts";
    protected $fillable = ['title', 'content', 'category_id', 'slug'];

    public function category()
    {
        return $this->belongsTo('App/CategoryModel');
    }

    public static function convertToSlug($title)
    {
        $slug = Str::slug($title);
        $alternateslug = $slug;
        $postexist = PostsModel::where('slug', $slug)->first();
        $counter = 1;
        while ($postexist) {
            $alternateslug = $slug . '_' . $counter;
            $counter++;
            $postexist = PostsModel::where('slug', $alternateslug)->first();
        }
        return $alternateslug;
    }
}
