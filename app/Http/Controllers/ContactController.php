<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            $contacts = Contact::all();
        } elseif ($user->isBranchAdmin()) {
            $contacts = Contact::where('branch_code', $user->branch_code)->get();
        } else {
            $contacts = Contact::where('empid', $user->empid)->get();
        }

        $datas = [
            'users' => User::all(),
            'contacts' => $contacts,
        ];

        return view('dashboard', compact('datas'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'branch' => 'required',
            'branch_code' => 'required',
            'name' => 'required',
            'empid' => 'required',
            'designation' => 'required',
            'email' => 'required',
        ]);
    
        // Find the contact by ID
        $contact = Contact::findOrFail($id);
    
        // Update the contact fields
        $contact->branch = $request->input('branch');
        $contact->branch_code = $request->input('branch_code');
        $contact->name = $request->input('name');
        $contact->empid = $request->input('empid');
        $contact->designation = $request->input('designation');
        $contact->email = $request->input('email');
    
        // Save the updated contact
        $contact->save();
    
        return redirect('dashboard')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('dashboard')->with('success', 'Contact has been deleted successfully.');
    }
}
