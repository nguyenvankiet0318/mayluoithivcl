<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class productcategoryHome extends Component
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
        $args_category = [
            ['status','=',1],
            ['parent_id', '=', 0]
        ];
        $category_list = Category::where($args_category)->orderBy('sort_order', 'asc')->get();
        return view('components.productcategory-home', compact('category_list'));
    }
}
