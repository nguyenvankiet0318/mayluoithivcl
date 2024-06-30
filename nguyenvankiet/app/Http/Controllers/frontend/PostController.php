<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{
    public function index()
    {
    $list_post = Post::where([['status', '=', 1], ['type','=','post']])
    ->orderBy('created_at','desc')
    ->paginate(9);
    return view("frontend.postall", compact('list_post'));
    }

    public function detail($slug)
    {
        $post=Post::where([['status','=',1], ['slug', '=', $slug]])->first();

         $args=[
            ['status', '=', 1], ['type', '=', 'post'],
            ['topic_id', '=', $post->topic_id], ['id', '!=', $post->id]
        ];
        $list_post = Post::where($args)
        ->orderBy('created_at','desc')
        ->limit(3)
        ->get();
        return view('frontend.postdetail', compact('post', 'list_post'));
    }


       //product category
       public function topic($slug)
       {
           $row = Topic::where('slug', '=', $slug)->select("id", "name", "slug")->first();
           $list_post = Post::where([['status', '=', 1], ['type', '=', 'post'], ['topic_id', '=', $row->id]])
               ->orderBy('created_at', 'desc')
               ->paginate(9);
           return view("frontend.posttopic", compact('list_post', 'row'));
       }


}
