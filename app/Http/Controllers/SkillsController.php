<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class SkillsController extends Controller
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
        $skills = Skill::where('pages_id', $x)->get();



        return view('dashboard.section-list', ['sectionKey' => 'skills', 'records' => $skills]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.section-form', ['sectionKey' => 'skills']);
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
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
        ]);

        $skills = new Skill();
        $skills->name = $request->name;
        $skills->level = $request->level;
        $skills->pages_id = $page->id;


        $skills -> save();

        return redirect()->route('dashboard.skills.list')->with('success', 'Skill added to your portfolio.');
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
        $skills = Skill::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        return view('dashboard.section-form', ['sectionKey' => 'skills', 'record' => $skills]);
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
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
        ]);

        $skills = Skill::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $skills->name = $request->name;
        $skills->level = $request->level;

        $skills -> save();

        return redirect()->route('dashboard.skills.list')->with('success', 'Skill updated.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skills = Skill::where('pages_id', Auth::user()->page_id)->findOrFail($id);

        $skills->delete();

        return redirect()->route('dashboard.skills.list')->with('success', 'Skill removed from your portfolio.');

    }
}
