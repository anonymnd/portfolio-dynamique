<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Education;


class EducationController extends Controller
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
        $educations = Education::where('pages_id', $x)->get();

        return view('dashboard.section-list', ['sectionKey' => 'education', 'records' => $educations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.section-form', ['sectionKey' => 'education']);
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
            'place' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000'
        ]);

        $user = Auth::user();
        $page = $user->page;

        $educations = new Education();
        $educations->date = $request->date;
        $educations->place = $request->place;
        $educations->title = $request->title;
        $educations->description = $request->description;
        $educations->pages_id = $page->id;

        $educations->save();

        return redirect()->route('dashboard.education.list')->with('success', 'Education added to your portfolio.');
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
        $educations = Education::where('pages_id', Auth::user()->page_id)->findOrFail($id);

        return view('dashboard.section-form', ['sectionKey' => 'education', 'record' => $educations]);
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
            'place' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000'
        ]);

        $educations = Education::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $educations->date = $request->date;
        $educations->place = $request->place;
        $educations->title = $request->title;
        $educations->description = $request->description;

        $educations->save();

        return redirect()->route('dashboard.education.list')->with('success', 'Education updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educations = Education::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $educations->delete();

        return redirect()->route('dashboard.education.list')->with('success', 'Education removed from your portfolio.');
   
    }
}
