<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // import model User
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $list = User::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.user.index", compact('list'));
    }
    //store
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->image = $request->image;
        $user->address = $request->address;
        $user->remember_token = $request->remember_token;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id()??1; // hoặc bất kỳ giá trị nào bạn muốn
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id()??1; // hoặc bất kỳ giá trị nào bạn muốn
        $user->status = $request->status;
        $user->save();
        return redirect()->route('admin.user.index');
    }
}
