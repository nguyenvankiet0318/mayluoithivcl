<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class lastPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args1=[
            ['status','=',1],
            ['type','=','post']
        ];
        $list = Post::where($args1)
        ->orderBy('created_at','desc')
        ->limit(3)
        ->get();
        return view('components.last-post',compact('list'));
    }
}
