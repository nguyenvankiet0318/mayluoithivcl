<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index()
    {
        $list = Post::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $topics = Topic::where('status', '!=', 0)->pluck('name', 'id');
        return view("backend.post.index", compact('list','topics'));
    }

    public function store(StorePostRequest $request){
        $post = new Post();
        $post->topic_id = $request->topic_id; //form
        $post->title = $request->title; //form
        $post->slug = Str::of($request->title)->slug('-');
        $post->detail = $request->detail; //form
         //upload image
        //  $files = $request->image;
        //  if ($files != null) {
        //      $extension = $files->getClientOriginalExtension();
        //      if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
        //          $filename = $post->slug . '.' . $extension;
        //          $post->image = $filename;
        //          $files->move(public_path('images/post'), $filename);
        //      }
        //  }
        //
        $post->type = $request->type; //form
        $post->description = $request->description; //form
        // $post->metakey = $request->metakey; //form
        // $post->metadesc = $request->metadesc; //form
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = 1;
        $post->status = $request->status; //form
        $post->save(); //Luuu vao CSDL
        return redirect()->route('admin.post.index'); 
    }
}
