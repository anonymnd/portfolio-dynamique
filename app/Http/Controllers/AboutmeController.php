<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Aboutme;
use Illuminate\Support\Facades\Auth;
use App\Models\Pages;

class AboutmeController extends Controller
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
        $aboutme = Aboutme::where('pages_id', $x)->get();

        return view('dashboard.section-list', ['sectionKey' => 'aboutme', 'records' => $aboutme]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.section-form', ['sectionKey' => 'aboutme']);
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
            'full_name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'birthday' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);


        $aboutme = new Aboutme();
        $aboutme->full_name = $request->full_name;
        $aboutme->job = $request->job;
        $aboutme->description = $request->description;
        $aboutme->birthday = $request->birthday;
        $aboutme->city = $request->city;
        $aboutme->pages_id = $page->id;

        $prof_file = $request->file('image');
        Storage::putFile('public/images/', $prof_file);
        $aboutme->image = "storage/images/" . $prof_file->hashName();

        $aboutme -> save();

        return redirect()->route('dashboard.aboutme.list')->with('success', 'Your introduction added to your portfolio.');
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
        $aboutme = Aboutme::where('pages_id', Auth::user()->page_id)->findOrFail($id);
       return view('dashboard.section-form', ['sectionKey' => 'aboutme', 'record' => $aboutme]);
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
        'full_name' => 'required|string|max:255',
        'job' => 'required|string|max:255',
        'description' => 'required|string|max:5000',
        'birthday' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $aboutme = Aboutme::where('pages_id', Auth::user()->page_id)->findOrFail($id);
    $aboutme->full_name = $request->input('full_name');
    $aboutme->job = $request->input('job');
    $aboutme->description = $request->input('description');
    $aboutme->birthday = $request->input('birthday');
    $aboutme->city = $request->input('city');


    if($request->file('image')){
        $img_file = $request->file('image');
        Storage::putFile('public/images/', $img_file);
        $aboutme->image = 'storage/images/' . $img_file->hashName();
    }

    
    $aboutme->save();

    return redirect()->route('dashboard.aboutme.list')->with('success', 'Your introduction was updated.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutme = Aboutme::where('pages_id', Auth::user()->page_id)->findOrFail($id);
       if (str_starts_with($aboutme->image, 'storage/')) {
           Storage::disk('public')->delete(substr($aboutme->image, strlen('storage/')));
       }
       $aboutme->delete();

       return redirect()->route('dashboard.aboutme.list')->with('success', 'Your introduction was removed from your portfolio.');
    }
}
