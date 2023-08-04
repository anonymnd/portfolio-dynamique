<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Pages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\language;
use Illuminate\Support\Facades\Auth;

class LanguagesController extends Controller
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
        $languages = language::where('pages_id', $x)->get();
        return view('dashboard.section-list', ['sectionKey' => 'languages', 'records' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.section-form', ['sectionKey' => 'languages']);
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
            'language_name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
        ]);

        $languages = new language();
        $languages->language_name = $request->language_name;
        $languages->level = $request->level;
        $languages->pages_id = $page->id;


        $languages -> save();

        return redirect()->route('dashboard.languages.list')->with('success', 'Language added to your portfolio.');
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
        $languages = Language::where('pages_id', Auth::user()->page_id)->findOrFail($id);
       return view('dashboard.section-form', ['sectionKey' => 'languages', 'record' => $languages]);
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
        $user = Auth::user();
        $page = $user->page;
        
        $this->validate($request, [
            'language_name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
        ]);

        $languages = Language::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $languages->language_name = $request->language_name;
        $languages->level = $request->level;
        $languages->pages_id = $page->id;

        $languages -> save();

        return redirect()->route('dashboard.languages.list')->with('success', 'Language updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $languages = Language::where('pages_id', Auth::user()->page_id)->findOrFail($id);
       $languages->delete();

       return redirect()->route('dashboard.languages.list')->with('success', 'Language removed from your portfolio.');
    }
}
