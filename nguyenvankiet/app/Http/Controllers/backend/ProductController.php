<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; // import model Category
use App\Models\Brand; // import model Category

class ProductController extends Controller
{
    //
    public function index()
    {
        $categories = Category::where('status', '!=', 0)->pluck('name', 'id');
        $brands = Brand::where('status', '!=', 0)->pluck('name', 'id');
        $list = Product::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.product.index", compact('categories','brands','list'));
    }
     /* them */
     public function store(StoreProductRequest $request)
{
    $product = new Product();
    $product->name = $request->name;
    $product->slug = Str::of($request->name)->slug('-');
    $product->brand_id = $request->brand_id;
    $product->category_id = $request->category_id;
    $product->detail = $request->detail;
    $product->description = $request->description;
    // $product->image = $request->file('image')->store('products', 'public');
    $product->price = $request->price;
    $product->pricesale = $request->pricesale;
    $product->created_at = date('Y-m-d H:i:s');
    $product->created_by = Auth::id() ?? 1;
    $product->status = $request->status;
    $product->save();

    return redirect()->route('admin.product.index');
}

}
