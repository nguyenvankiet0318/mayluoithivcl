<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $list_product = Product::where('status', '=', 1)
        ->orderBy('created_at','desc')
        ->paginate(6);
        return view("frontend.productall", compact('list_product'));
    }

    public function detail($slug)
    {
        $product=Product::where([['status','=',1], ['slug', '=', $slug]])->first();
        $listcatid = $this->getlistcategoryid($product->category_id);
        $list_product = Product::where([['status', '=', 1], ['id', '!=', $product->id]])
        ->whereIn('category_id', $listcatid)
        ->orderBy('created_at','desc')
        ->limit(8)
        ->get();
        return view('frontend.productdetail', compact('product', 'list_product'));
    }

     //get list category
     public function getlistcategoryid($rowid)
     {
         $listcatid=[];
             array_push($listcatid, $rowid);
             $list1 = Category::where([['parent_id','=',$rowid], ['status','=',1]])->select("id")->get();
             if(count($list1)>0)
             {
                 foreach($list1 as $row1)
                 {
                     array_push($listcatid, $row1->id);
                     $list2 = Category::where([['parent_id','=', $row1->id],['status','=',1]])->select("id")->get();
                     if(count($list2)>0)
                     {
                         foreach($list2 as $row2)
                         {
                             array_push($listcatid, $row2->id);
                             // $list2 = Category::where([['parent_id','=',$row1->id],['status','=',1]])->select("id")->get();
                         }
                     }
                 }
             }
             return $listcatid;
     }
      //product category
      public function category($slug)
    {
        $row=Category::where('slug','=',$slug)->select("id", "name", "slug")->first();
        $listcatid=[];
        if($row!=null)
        {
            $listcatid = $this->getlistcategoryid($row->id);
        }
        $list_product = Product::where('status', '=', 1)
        ->whereIn('category_id', $listcatid)
        ->orderBy('created_at','desc')
        ->paginate(6);
        return view("frontend.productcategory", compact('list_product', 'row'));
    }
    //tìm kiếm
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Tìm kiếm sản phẩm có tên chứa từ khóa tìm kiếm
        $list_product = Product::where('name', 'like', '%'.$search.'%')
        ->paginate(6);
        return view('frontend.SearchProduct', compact('list_product', 'search'));
    }
}
