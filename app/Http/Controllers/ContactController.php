<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:contacts,email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create($data);
        return redirect()->route('admin.index')->with('success', 'Contact submited Successfully');
    }

    public function confirmation()
    {
        return view('users.confirm');
    }

    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        if (!$contact->viewed) {
            $contact->viewed = true;
            $contact->save();
        }
        return view('admin.showinfo', compact('contact'));
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('admin.index')->with('success', 'Contact deleted Successfully');
    }

    public function search(Request $request)
    {
        $contacts = Contact::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        return view('admin.index', compact('contacts'));
    }

    public function deleteAll()
    {
        Contact::truncate();
        return redirect()->route('admin.index')->with('success', 'All contact deleted successfully.');
    }
}
