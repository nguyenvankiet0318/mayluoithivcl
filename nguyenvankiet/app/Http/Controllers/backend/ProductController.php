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
    if($request->hasFile('image')){
        if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
            $fileName = $product->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/products"), $fileName);
            $product->image = $fileName;
        }
    }

    $product->save();

    return redirect()->route('admin.product.index');
}

public function edit(string $id)
{
    $product = Product::find($id);
    if($product == null)
    {

    }
    $list = Product::where('status', '!=', 0)->orderBy('created_at','DESC')->get();
    $categories = Category::where('status', '!=', 0)->pluck('name', 'id');
    $brands = Brand::where('status', '!=', 0)->pluck('name', 'id');
    // foreach($list as $item){
    //     if($categories->id = $item->id){
    //         $categories .= "<option selected value='".$item->category_id."'>".$item->name."</option>";
    //     } else {
    //         $categories .= "<option value='".$item->category_id."'>".$item->name."</option>";
    //     }
    //     if($product->brand_id == $item->sort_order){
    //         $brands .="<option selected value='" . $item->brand_id. "'>" . $item->name . "</option>";        
    //     } else {
    //         $brands .="<option value='" . $item->brand_id. "'>" . $item->name . "</option>";        

    //     }
    // }
    return view("backend.product.edit", compact("product", "categories","brands"));  
}







}
