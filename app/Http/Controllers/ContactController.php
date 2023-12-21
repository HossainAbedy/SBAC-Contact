<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $contacts = Contact::all();

        $datas = [
            'users' => $users,
            'contacts' => $contacts,
        ];
        // dd($datas);
        return view('welcome', compact('datas'));
    }

    public function dashboard()
    {
        $contacts = Contact::all();
        return view('dashboard', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addContact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch' => 'required',
            'branch_code' => 'required',
            'name' => 'required',
            'empid' => 'required',
            'designation' => 'required',
            'email' => 'required',
        ]);

        $input = $request->all();    
        Contact::create($input);
       
        return redirect()->route('contacts.create')->with('success', 'Contact created successfully.');
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
    public function edit($id)
    {
        // Fetch the contact details with the given ID and pass it to the view
        $contact = Contact::findOrFail($id);

        return view('editContact', compact('contact', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'branch' => 'required',
            'branch_code' => 'required',
            'name' => 'required',
            'empid' => 'required',
            'designation' => 'required',
            'email' => 'required',
        ]);

        $input = $request->all();    
        $contact->update($request->all());
       
        return redirect('dashboard')->with('success','Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('dashboard')->with('success', 'Contact has been deleted successfully.');
    }
}
