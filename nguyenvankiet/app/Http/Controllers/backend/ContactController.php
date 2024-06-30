<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $users = User::where('status', '!=', 0)->pluck('name', 'id');
        $list = Contact::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.contact.index", compact('list','users'));
    }

    //store
    public function store(StoreContactRequest $request)
    {
        $contact = new Contact();
        $contact->user_id = $request->user_id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->replay_id = $request->replay_id;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->status = $request->status;
        $contact->save();
        $request->session()->flash('addsuccess', 'Thêm thành công.');
        return redirect()->route('admin.contact.index');
    }
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        $users  = User::where('status', '!=', 0)
            ->select('user.id', 'user.name' )
            ->get();
        if($contact == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.contact.index");
        }
        $list = Contact::where('contact.status', '!=', 0)
            ->select('contact.id', 'contact.name', 'contact.email', 'contact.phone', 'contact.content', 'contact.replay_id')
            ->orderBy('contact.created_at', 'desc')
            ->get();
            $htmlusers = "";
            foreach ($users as $item) {
                if($contact->user_id == $item->id){
                    $htmlusers .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
                }
                else{
                    $htmlusers .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
                }
            }

        return view("backend.contact.edit", compact("contact", "htmlusers"));
    }
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);
        if($contact==null){
            //chuyen trang va bao loi
        }
        $contact->user_id = $request->user_id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->replay_id = $request->replay_id;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->status = $request->status;
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $currentDateTime = now()->format('YmdHis');
                $fileName = $currentDateTime . '.' . $request->image->extension();
                $request->image->move(public_path("images/contacts"), $fileName);
                $contact->image = $fileName;
            }
        }
        $contact->save();

        return redirect()->route('admin.contact.index');
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return response()->json(
                ['message' => 'Tai du lieu khong thanh cong', 'success' => false, 'id' => null],
                404
            );
        }
        $contact->delete();
        return redirect()->route('admin.contact.index');

    }


}
