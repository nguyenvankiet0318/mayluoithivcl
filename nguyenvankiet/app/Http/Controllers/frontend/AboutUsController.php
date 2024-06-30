<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AboutUsController extends Controller
{
    //
    public function index()
    {
        $args =
        [
            ['status', '=', 1],
            ['type','=','page']
        ];
        $list_policy = Post::where($args)->get();
        return view("frontend.policy",compact('list_policy'));
    }

}
