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
    
        return redirect()->route('admin.contact.index');
    }
}
