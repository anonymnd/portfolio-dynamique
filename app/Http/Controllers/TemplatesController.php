<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class TemplatesController extends Controller
{
    public function index()
    {
        $templates = Template::whereIn('id', array_keys(Template::catalog()))->orderBy('id')->get();
        $activeTemplate = auth()->user()->page?->templates_id;
        $pageId = auth()->user()->page_id;
        $sectionCounts = [];
        foreach (config('portfolio.sections') as $key => $section) {
            $sectionCounts[$key] = $pageId ? DB::table($section['table'])->where('pages_id', $pageId)->count() : 0;
        }
        $profile = $pageId ? DB::table('aboutmes')->where('pages_id', $pageId)->orderBy('id')->first() : null;

        return view('dashboard.dashboard', compact('templates', 'activeTemplate', 'sectionCounts', 'profile'));
    }

    public function selectTemplate(Request $request)
    {
        $validated = $request->validate([
            'template_id' => ['required', 'integer', Rule::in(array_keys(Template::catalog())), 'exists:templates,id'],
        ]);
        DB::transaction(function () use ($validated, $request) {
            $user = User::whereKey($request->user()->id)->lockForUpdate()->firstOrFail();
            $page = $user->page;
            if ($page) {
                $page->update(['templates_id' => $validated['template_id']]);
            } else {
                $page = Pages::create(['templates_id' => $validated['template_id']]);
                $user->page()->associate($page);
                $user->save();
            }
        });

        return redirect()->route('dashboard')->with('success', 'Your new look is ready. All your content stays with you.');
    }

    public function list()
    {
        $templates = Template::all();
        return view('admin.templates.list', compact('templates'));
    }

    public function create()
    {
        return view('admin.templates.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255', 'temp_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120']);
        $path = $request->file('temp_image')->store('images', 'public');
        abort_unless($path, 500, 'The image could not be stored. Please try again.');
        Template::create(['title' => $request->title, 'temp_image' => 'storage/'.$path]);
        return redirect()->route('admin.templates.list')->with('success', 'Template preview added.');
    }

    public function edit($id)
    {
        $template = Template::findOrFail($id);
        return view('admin.templates.edit', compact('template'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:255', 'temp_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120']);
        $template = Template::findOrFail($id);
        $template->title = $request->title;
        if ($request->hasFile('temp_image')) {
            $path = $request->file('temp_image')->store('images', 'public');
            abort_unless($path, 500, 'The image could not be stored. Please try again.');
            $template->temp_image = 'storage/'.$path;
        }
        $template->save();
        return redirect()->route('admin.templates.list')->with('success', 'Template preview updated.');
    }

    public function destroy($id)
    {
        $template = Template::findOrFail($id);
        if (isset(Template::catalog()[$template->id]) || Pages::where('templates_id', $id)->exists()) {
            return redirect()->route('admin.templates.list')->withErrors([
                'template' => 'Built-in templates and templates used by a portfolio cannot be deleted.',
            ]);
        }
        $template->delete();
        if (str_starts_with($template->temp_image, 'storage/')) {
            Storage::disk('public')->delete(substr($template->temp_image, strlen('storage/')));
        }
        return redirect()->route('admin.templates.list')->with('success', 'Template preview deleted.');
    }
}
