<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\Page;
use App\Models\Hobbie;

class HobbiesController extends Controller
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
        $hobbies = Hobbie::where('pages_id', $x)->get();

        return view('dashboard.section-list', ['sectionKey' => 'hobbies', 'records' => $hobbies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.section-form', ['sectionKey' => 'hobbies']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'required|string|max:255',
            'name' => 'required|string|max:255',

        ]);

        $user = Auth::user();
        $page = $user->page;

        $hobbies = new Hobbie();
        $hobbies->icon = $request->icon;
        $hobbies->name = $request->name;
        $hobbies->pages_id = $page->id;

        $hobbies->save();

        return redirect()->route('dashboard.hobbies.list')->with('success', 'Interest added to your portfolio.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Logic to show a specific perso_info
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hobbies = Hobbie::where('pages_id', Auth::user()->page_id)->findOrFail($id);

        return view('dashboard.section-form', ['sectionKey' => 'hobbies', 'record' => $hobbies]);
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
        ]);

        $hobbies = Hobbie::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $hobbies->icon = $request->icon;
        $hobbies->name = $request->name;

        $hobbies->save();

        return redirect()->route('dashboard.hobbies.list')->with('success', 'Interest updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hobbies = Hobbie::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $hobbies->delete();

        return redirect()->route('dashboard.hobbies.list')->with('success', 'Interest removed from your portfolio.');
    }
}
