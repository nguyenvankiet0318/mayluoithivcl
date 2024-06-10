<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('banner.status','!=',0)
        ->select('banner.id','banner.name','banner.link','banner.image','banner.position')
        ->orderBy('banner.created_at','desc')
        ->get();
        return view("backend.banner.index",compact("list"));   
    }

    /**
     * Show the form for creating a new resource.
     */
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        // $banner->imgae = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->description = $request->description;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1;
        $banner->status = $request->status;
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $currentDateTime = now()->format('YmdHis');
                $fileName = $currentDateTime . '.' . $request->image->extension();
                $request->image->move(public_path("images/banners"), $fileName);
                $banner->image = $fileName;
            }
        }
        $banner->save();
        $request->session()->flash('addsuccess', 'Thêm thành công.');

        return redirect()->route('admin.banner.index');
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
        $banner = Banner::find($id);
        if($banner == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.banner.index");
        }
        $list = Banner::where('banner.status', '!=', 0)
        ->select('banner.id', 'banner.name', 'banner.image', 'banner.position')
        ->orderBy('banner.created_at', 'desc')
        ->get();
        return view("backend.banner.edit", compact("banner"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::find($id);
        if($banner==null){
            //chuyen trang va bao loi
        }
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position=$request->position;
        $banner->description =$request->description;
        $banner->created_by =Auth::id()??1; //Cái này là nếu có id của người tạo thì nó lấy id còn không có thì để mặc định là 1
        $banner->status = $request->status;
        $banner->created_at =date('Y-m-d H:i:s');
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $currentDateTime = now()->format('YmdHis');
                $fileName = $currentDateTime . '.' . $request->image->extension();
                $request->image->move(public_path("images/banners"), $fileName);
                $banner->image = $fileName;
            }
        }
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}