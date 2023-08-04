<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Page;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $user = Auth::user();
        $x=$user->page_id;
        $contacts = Contact::where('pages_id', $x)->get();



        return view('dashboard.section-list', ['sectionKey' => 'contact', 'records' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.section-form', ['sectionKey' => 'contact']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $user = Auth::user();
    $page = $user->page;

    $this->validate($request, [
        'icon' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'lien' => ['required', 'string', 'max:2048', 'regex:/^(https?:\/\/|mailto:|tel:)[^\s]+$/i'],
    ]);

    $contacts = new Contact();
    $contacts->icon = $request->icon;
    $contacts->name = $request->name;
    $contacts->lien = $request->lien;
    $contacts->pages_id = $page->id;

    $contacts->save();

    return redirect()->route('dashboard.contacts.list')->with('success', 'Contact link added to your portfolio.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Logic to show a specific service
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::where('pages_id', Auth::user()->page_id)->findOrFail($id);

        return view('dashboard.section-form', ['sectionKey' => 'contact', 'record' => $contacts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'icon' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'lien' => 'required|string|max:255',
        ]);

        $contacts = Contact::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $contacts->icon = $request->icon;
        $contacts->name = $request->name;
        $contacts->lien = $request->lien;

        $contacts->save();

        return redirect()->route('dashboard.contacts.list')->with('success', 'Contact link updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacts = Contact::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $contacts->delete();

        return redirect()->route('dashboard.contacts.list')->with('success', 'Contact link removed from your portfolio.');
    }
}
