<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\pages;
use App\Models\User;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*    public function list()
    {
    $user = Auth::user();
    $page = $user->pages_id;

    $portfolios = $page->portfolios;
    return view('dashboard.works.list', compact('portfolios'));

    // Handle the case when the user doesn't have a page
    // For example, redirect to a different route or display an error message
}*/
public function list()
{
    $user = Auth::user();
    $x=$user->page_id;
    $projects = Project::where('pages_id', $x)->get();
    
    return view('dashboard.section-list', ['sectionKey' => 'projects', 'records' => $projects]);
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.section-form', ['sectionKey' => 'projects']);
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
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'big_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'small_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'description' => 'required|string|max:5000',
            'client' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $page = $user->page;

        $projects = new Project;
        $projects->title = $request->title;
        $projects->sub_title = $request->sub_title;
        $projects->description = $request->description;
        $projects->client = $request->client;
        $projects->category = $request->category;
        $projects->pages_id = $page->id;

        $big_file = $request->file('big_image');
        Storage::putFile('public/images/', $big_file);
        $projects->big_image = "storage/images/" . $big_file->hashName();

        $small_file = $request->file('small_image');
        Storage::putFile('public/images/', $small_file);
        $projects->small_image = "storage/images/" . $small_file->hashName();

        $projects->save();

        return redirect()->route('dashboard.projects.list')->with('success', 'Project added to your portfolio.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $projects = Project::where('pages_id', Auth::user()->page_id)->findOrFail($id);
         return view('dashboard.section-form', ['sectionKey' => 'projects', 'record' => $projects]);
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
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'description' => 'required|string|max:5000', 
            'client' => 'required|string|max:255', 
            'category' => 'required|string|max:255',
            'big_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'small_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', 
        ]);

        $user = Auth::user();
        $page = $user->page;

        $projects = Project::where('pages_id', Auth::user()->page_id)->findOrFail($id);
        $projects->title = $request->title;
        $projects->sub_title = $request->sub_title;
        $projects->description = $request->description;
        $projects->client = $request->client;
        $projects->category = $request->category;

        if($request->file('big_image')){
            $big_file = $request->file('big_image');
            Storage::putFile('public/images/', $big_file);
            $projects->big_image = "storage/images/".$big_file->hashName();
        }
        
        if($request->file('small_image')){
            $small_file = $request->file('small_image');
            Storage::putFile('public/images/', $small_file);
            $projects->small_image = "storage/images/".$small_file->hashName();
        }
        
        $projects -> save();

        return redirect()->route('dashboard.projects.list')->with('success', 'Project updated.');
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
         $projects = Project::where('pages_id', Auth::user()->page_id)->findOrFail($id);
         foreach ([$projects->big_image, $projects->small_image] as $image) {
             if (str_starts_with($image, 'storage/')) {
                 Storage::disk('public')->delete(substr($image, strlen('storage/')));
             }
         }
         $projects->delete();

        return redirect()->route('dashboard.projects.list')->with('success', 'Project removed from your portfolio.');
 
     }


}
