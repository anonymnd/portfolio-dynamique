<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Experience;

class ExperienceController extends Controller
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
        $experiences = Experience::where('pages_id', $x)->get();



        return view('dashboard.section-list', ['sectionKey' => 'experience', 'records' => $experiences]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.section-form', ['sectionKey' => 'experience']);
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
            'date' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
        ]);
        $user = Auth::user();
        $page = $user->page;

        $experiences = new Experience;
        $experiences->date = $request->date;
        $experiences->title = $request->title;
        $experiences->place = $request->place;
        $experiences->description = $request->description;

        $experiences->pages_id= $page->id;

        $experiences -> save();

        return redirect()->route('dashboard.experience.list')->with('success', 'Experience added to your portfolio.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiences = Experience::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        return view('dashboard.section-form', ['sectionKey' => 'experience', 'record' => $experiences]);
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
            'date' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
        ]);

        $experiences = Experience::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $experiences->date = $request->date;
        $experiences->title = $request->title;
        $experiences->place = $request->place;
        $experiences->description = $request->description;

        $experiences -> save();

        return redirect()->route('dashboard.experience.list')->with('success', 'Experience updated.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiences = Experience::where('pages_id', Auth::user()->page_id)->findOrFail($id);

        $experiences->delete();

        return redirect()->route('dashboard.experience.list')->with('success', 'Experience removed from your portfolio.');

    }
}
