<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBrandRequest;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $list = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        // // return view("backend.category.index", compact("list"));
        // return view('backend.brand.index',compact("list"));
        $list = Brand::where('status', '!=', 0)->orderBy('created_at','DESC')->get();
        $htmlsortOrder = "";
        foreach($list as $item)
        {
            $htmlsortOrder .="<option value='" . $item->sort_order + 1 . "'>" . $item->name . "</option>";        
        }
        return view("backend.brand.index", compact('list','htmlsortOrder'));  
        // return view('backend.category.index',compact("list"));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
       
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->slug = Str::of($request->name)->slug('-');
            $brand->sort_order = $request->sort_order;
            $brand->description = $request->description;
            $brand->created_at = date('Y-m-d H:i:s');
            $brand->created_by = Auth::id() ?? 1;
            $brand->status = $request->status;
            if($request->hasFile('image')){
                if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                    $fileName = $brand->slug . '.' . $request->image->extension();
                    $request->image->move(public_path("images/brands"), $fileName);
                    $brand->image = $fileName;
                }
            }
            $brand->save();
            return redirect()->route('admin.brand.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.brand.index");
        }
        $list = Brand::where('brand.status', '!=', 0)
            ->select('brand.id', 'brand.name', 'brand.image', 'brand.slug', 'brand.sort_order')
            ->orderBy('brand.created_at', 'desc')
            ->get();
     
        $htmlsortOrder = "";
        foreach ($list as $item) {
          

            if($brand->sort_order-1 == $item->sort_order){
                $htmlsortOrder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            }
            else{
                $htmlsortOrder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.brand.edit", compact("brand",  "htmlsortOrder"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        if($brand==null){
            //chuyen trang va bao loi
        }
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
       
        $brand->sort_order = $request->sort_order;
        $brand->description = $request->description;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1;
        $brand->status = $request->status;
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $brand->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/brands"), $fileName);
                $brand->image = $fileName;
            }
        }
        $brand->save();
        return redirect()->route('admin.brand.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
