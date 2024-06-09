<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::where('status', '!=', 0)->orderBy('created_at','DESC')->get();
        $htmlparentId = "";
        $htmlsortOrder = "";
        foreach($list as $item)
        {
            $htmlparentId .= "<option value='".$item->id."'>".$item->name."</option>";
            $htmlsortOrder .="<option value='" . $item->sort_order + 1 . "'>" . $item->name . "</option>";        
        }
        return view("backend.category.index", compact('list','htmlparentId','htmlsortOrder'));  
        // return view('backend.category.index',compact("list"));
    }
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        // dd($request->all());
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->description = $request->description;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;
        $category->status = $request->status;
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $category->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/categorys"), $fileName);
                $category->image = $fileName;
            }
        }
        $category->save();
        $request->session()->flash('addsuccess', 'Thêm thành công.');
        return redirect()->route('admin.category.index');
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
        $category = Category::find($id);
        if($category == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.category.index");
        }
        $list = Category::where('category.status', '!=', 0)
            ->select('category.id', 'category.name', 'category.image', 'category.slug', 'category.sort_order')
            ->orderBy('category.created_at', 'desc')
            ->get();
            $htmlparentid = "";
            $htmlsortorder = "";
            foreach ($list as $item) {
                if($category->parent_id == $item->id){
                    $htmlparentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
                }
                else{
                    $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
                }

                if($category->sort_order-1 == $item->sort_order){
                    $htmlsortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
                }
                else{
                    $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
                }
            }
        return view("backend.category.edit", compact("category", "htmlparentid", "htmlsortorder"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if($category==null){
            //chuyen trang va bao loi
        }
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->description = $request->description;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;
        $category->status = $request->status;
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $category->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/categorys"), $fileName);
                $category->image = $fileName;
            }
        }
        $category->save();
        $request->session()->flash('success', 'sửa thành công.');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
