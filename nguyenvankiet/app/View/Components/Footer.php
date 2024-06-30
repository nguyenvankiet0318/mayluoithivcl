<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;
use App\Models\User;
use App\Models\Menu;

class Footer extends Component
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
        $about_us = Post::where([['status', '=', 1],['slug', '=', 'gioi-thieu']])->first();
        $list_contactadmin = User::where([['status', '=', 1],['roles', '=', 'admin']])
        ->first();
        $args =
        [
            ['status', '=', 1],
            ['position', '=', 'footermenu'],
            ['parent_id', '=', 0]
        ];
        $listmenu = Menu::where($args)->orderBy('sort_order','asc')->get();
        return view('components.footer',compact('listmenu','list_contactadmin','about_us'));
    }
}
