<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Category;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Productcatehome extends Component
{
    /**
     * Create a new component instance.
     */
    public $row_category = null;

public function __construct($rowcategory)
{
    $this->row_category = $rowcategory;
}

public function render(): View|Closure|string
{
    $category_item = $this->row_category;
    $args1 = [
        ['status', '=', 1],
        ['category_id', '=', $category_item->id]
    ];
    $listproduct = Product::where($args1)->orderBy('created_at','desc')->get();
    return view('components.productcatehome', compact('listproduct'));
}
}
