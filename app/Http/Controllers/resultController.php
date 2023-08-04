<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Support\Facades\DB;

class resultController extends Controller
{
    public function index()
    {
        $templateId = auth()->user()->page?->templates_id;
        if (!isset(Template::catalog()[$templateId])) {
            return redirect()->route('dashboard')->with('status', 'Choose a portfolio template first.');
        }
        return $this->render($templateId, false);
    }

    public function preview(int $template)
    {
        abort_unless(isset(Template::catalog()[$template]) && Template::whereKey($template)->exists(), 404);
        return $this->render($template, true);
    }

    private function render(int $templateId, bool $preview)
    {
        $pageId = auth()->user()->page_id;
        $sections = [];
        foreach (config('portfolio.sections') as $key => $section) {
            $sections[$key] = $pageId ? DB::table($section['table'])->where('pages_id', $pageId)->orderBy('id')->get() : collect();
        }
        $profile = $sections['aboutme']->first();
        $design = Template::catalog()[$templateId];
        $name = $profile?->full_name ?: auth()->user()->name;
        $role = $profile?->job ?: 'A portfolio in the making.';

        return view('templates.portfolio', compact('sections', 'profile', 'design', 'templateId', 'preview', 'name', 'role'));
    }
}
