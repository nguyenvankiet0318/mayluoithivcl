<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $list = Order::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $users = User::where('status', '!=', 0)->pluck('name', 'id');
        return view("backend.order.index", compact('list','users'));
    }
    //store
    public function store(StoreOrderRequest $request)
{
    $delivery = new Order();
    $delivery->user_id = $request->user_id;
    $delivery->delivery_name = $request->delivery_name;
    $delivery->delivery_gender = $request->delivery_gender;
    $delivery->delivery_email = $request->delivery_email;
    $delivery->delivery_phone = $request->delivery_phone;
    $delivery->delivery_address = $request->delivery_address;
    $delivery->note = $request->note;
    $delivery->created_at = date('Y-m-d H:i:s');
    $delivery->type = $request->type;
    $delivery->updated_at = date('Y-m-d H:i:s');
    $delivery->updated_by = Auth::id() ?? 1;
    $delivery->status = $request->status;
    $delivery->save();
    $request->session()->flash('addsuccess', 'Thêm thành công.');

    return redirect()->route('admin.order.index');
}
}
