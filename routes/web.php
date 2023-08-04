<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AboutmeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplatesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';

Route::middleware('auth')->group(function () {
Route::get('templates/result', [App\Http\Controllers\resultController::class, 'index'])->name('templates.result');
Route::get('templates/preview/{template}', [App\Http\Controllers\resultController::class, 'preview'])->whereNumber('template')->name('templates.preview');



Route::post('/dashboard', [TemplatesController::class, 'selectTemplate'])->name('dashboard.selectTemplate');
Route::get('/dashboard', [TemplatesController::class, 'index'])->name('dashboard');


// -------------------------- AboutMe ----------------------//
Route::get('/dashboard/aboutme/create', [App\Http\Controllers\AboutmeController::class, 'create'])->name('dashboard.aboutme.create');
Route::post('/dashboard/aboutme/create', [App\Http\Controllers\AboutmeController::class, 'store'])->name('dashboard.aboutme.store');
Route::get('/dashboard/aboutme/list', [App\Http\Controllers\AboutmeController::class, 'list'])->name('dashboard.aboutme.list');
Route::get('/dashboard/aboutme/edit/{id}', [App\Http\Controllers\AboutmeController::class, 'edit'])->name('dashboard.aboutme.edit');
Route::delete('/dashboard/aboutme/destroy/{id}', [App\Http\Controllers\AboutmeController::class, 'destroy'])->name('dashboard.aboutme.destroy');
Route::post('/dashboard/aboutme/update/{id}', [App\Http\Controllers\AboutmeController::class, 'update'])->name('dashboard.aboutme.update');


// -------------------------- Languages ----------------------//
Route::get('/dashboard/languages/create', [App\Http\Controllers\LanguagesController::class, 'create'])->name('dashboard.languages.create');
Route::post('/dashboard/languages/create', [App\Http\Controllers\LanguagesController::class, 'store'])->name('dashboard.languages.store');
Route::get('/dashboard/languages/list', [App\Http\Controllers\LanguagesController::class, 'list'])->name('dashboard.languages.list');
Route::get('/dashboard/languages/edit/{id}', [App\Http\Controllers\LanguagesController::class, 'edit'])->name('dashboard.languages.edit');
Route::delete('/dashboard/languages/destroy/{id}', [App\Http\Controllers\LanguagesController::class, 'destroy'])->name('dashboard.languages.destroy');
Route::post('/dashboard/languages/update/{id}', [App\Http\Controllers\LanguagesController::class, 'update'])->name('dashboard.languages.update');

// -------------------------- Hobbies ----------------------//
Route::get('/dashboard/hobbies/create', [App\Http\Controllers\HobbiesController::class, 'create'])->name('dashboard.hobbies.create');
Route::post('/dashboard/hobbies/create', [App\Http\Controllers\HobbiesController::class, 'store'])->name('dashboard.hobbies.store');
Route::get('/dashboard/hobbies/list', [App\Http\Controllers\HobbiesController::class, 'list'])->name('dashboard.hobbies.list');
Route::get('/dashboard/hobbies/edit/{id}', [App\Http\Controllers\HobbiesController::class, 'edit'])->name('dashboard.hobbies.edit');
Route::delete('/dashboard/hobbies/destroy/{id}', [App\Http\Controllers\HobbiesController::class, 'destroy'])->name('dashboard.hobbies.destroy');
Route::post('/dashboard/hobbies/update/{id}', [App\Http\Controllers\HobbiesController::class, 'update'])->name('dashboard.hobbies.update');

// -------------------------- Skills ----------------------//
Route::get('/dashboard/skills/create', [App\Http\Controllers\SkillsController::class, 'create'])->name('dashboard.skills.create');
Route::post('/dashboard/skills/create', [App\Http\Controllers\SkillsController::class, 'store'])->name('dashboard.skills.store');
Route::get('/dashboard/skills/list', [App\Http\Controllers\SkillsController::class, 'list'])->name('dashboard.skills.list');
Route::get('/dashboard/skills/edit/{id}', [App\Http\Controllers\SkillsController::class, 'edit'])->name('dashboard.skills.edit');
Route::delete('/dashboard/skills/destroy/{id}', [App\Http\Controllers\SkillsController::class, 'destroy'])->name('dashboard.skills.destroy');
Route::post('/dashboard/skills/update/{id}', [App\Http\Controllers\SkillsController::class, 'update'])->name('dashboard.skills.update');

// -------------------------- Education ----------------------//
Route::get('/dashboard/education/create', [App\Http\Controllers\EducationController::class, 'create'])->name('dashboard.education.create');
Route::post('/dashboard/education/create', [App\Http\Controllers\EducationController::class, 'store'])->name('dashboard.education.store');
Route::get('/dashboard/education/list', [App\Http\Controllers\EducationController::class, 'list'])->name('dashboard.education.list');
Route::get('/dashboard/education/edit/{id}', [App\Http\Controllers\EducationController::class, 'edit'])->name('dashboard.education.edit');
Route::delete('/dashboard/education/destroy/{id}', [App\Http\Controllers\EducationController::class, 'destroy'])->name('dashboard.education.destroy');
Route::post('/dashboard/education/update/{id}', [App\Http\Controllers\EducationController::class, 'update'])->name('dashboard.education.update');

// -------------------------- Experience ----------------------//
Route::get('/dashboard/experience/create', [App\Http\Controllers\ExperienceController::class, 'create'])->name('dashboard.experience.create');
Route::post('/dashboard/experience/create', [App\Http\Controllers\ExperienceController::class, 'store'])->name('dashboard.experience.store');
Route::get('/dashboard/experience/list', [App\Http\Controllers\ExperienceController::class, 'list'])->name('dashboard.experience.list');
Route::get('/dashboard/experience/edit/{id}', [App\Http\Controllers\ExperienceController::class, 'edit'])->name('dashboard.experience.edit');
Route::delete('/dashboard/experience/destroy/{id}', [App\Http\Controllers\ExperienceController::class, 'destroy'])->name('dashboard.experience.destroy');
Route::post('/dashboard/experience/update/{id}', [App\Http\Controllers\ExperienceController::class, 'update'])->name('dashboard.experience.update');

// -------------------------- Services ----------------------//
Route::get('/dashboard/services/create', [App\Http\Controllers\ServicesController::class, 'create'])->name('dashboard.services.create');
Route::post('/dashboard/services/create', [App\Http\Controllers\ServicesController::class, 'store'])->name('dashboard.services.store');
Route::get('/dashboard/services/list', [App\Http\Controllers\ServicesController::class, 'list'])->name('dashboard.services.list');
Route::get('/dashboard/services/edit/{id}', [App\Http\Controllers\ServicesController::class, 'edit'])->name('dashboard.services.edit');
Route::delete('/dashboard/services/destroy/{id}', [App\Http\Controllers\ServicesController::class, 'destroy'])->name('dashboard.services.destroy');
Route::post('/dashboard/services/update/{id}', [App\Http\Controllers\ServicesController::class, 'update'])->name('dashboard.services.update');

// -------------------------- Projects ----------------------//
Route::get('/dashboard/projects/create', [App\Http\Controllers\ProjectsController::class, 'create'])->name('dashboard.projects.create');
Route::post('/dashboard/projects/store', [App\Http\Controllers\ProjectsController::class, 'store'])->name('dashboard.projects.store');
Route::get('/dashboard/projects/list', [App\Http\Controllers\ProjectsController::class, 'list'])->name('dashboard.projects.list');
Route::get('/dashboard/projects/edit/{id}', [App\Http\Controllers\ProjectsController::class, 'edit'])->name('dashboard.projects.edit');
Route::delete('/dashboard/projects/destroy/{id}', [App\Http\Controllers\ProjectsController::class, 'destroy'])->name('dashboard.projects.destroy');
Route::post('/dashboard/projects/update/{id}', [App\Http\Controllers\ProjectsController::class, 'update'])->name('dashboard.projects.update');


// -------------------------- Contact ----------------------//
Route::get('/dashboard/contact/create', [App\Http\Controllers\ContactController::class, 'create'])->name('dashboard.contacts.create');
Route::post('/dashboard/contact/store', [App\Http\Controllers\ContactController::class, 'store'])->name('dashboard.contacts.store');
Route::get('/dashboard/contact/list', [App\Http\Controllers\ContactController::class, 'list'])->name('dashboard.contacts.list');
Route::get('/dashboard/contact/edit/{id}', [App\Http\Controllers\ContactController::class, 'edit'])->name('dashboard.contacts.edit');
Route::delete('/dashboard/contact/destroy/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('dashboard.contacts.destroy');
Route::post('/dashboard/contact/update/{id}', [App\Http\Controllers\ContactController::class, 'update'])->name('dashboard.contacts.update');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:admin')->group(function () {
// -------------------------- user management ----------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('/admin/user/table', 'index')->middleware('auth:admin')->name('/admin/user/table');
    Route::post('/admin/user/update', 'updateRecord')->name('/admin/user/update');
    Route::post('/admin/user/delete', 'deleteRecord')->name('/admin/user/delete');


});
// -------------------------- Templates management ----------------------//
Route::get('/admin/templates/create', [App\Http\Controllers\TemplatesController::class, 'create'])->name('admin.templates.create');
    Route::put('/admin/templates/create', [App\Http\Controllers\TemplatesController::class, 'store'])->name('admin.templates.store');
    Route::get('/admin/templates/list', [App\Http\Controllers\TemplatesController::class, 'list'])->name('admin.templates.list');
    Route::get('/admin/templates/edit/{id}', [App\Http\Controllers\TemplatesController::class, 'edit'])->name('admin.templates.edit');
    Route::post('/admin/templates/update/{id}', [App\Http\Controllers\TemplatesController::class, 'update'])->name('admin.templates.update');
    Route::delete('/admin/templates/destroy/{id}', [App\Http\Controllers\TemplatesController::class, 'destroy'])->name('admin.templates.destroy');

// -------------------------- Admin route ----------------------//
Route::get('/admin/dashboard', [App\Http\Controllers\PageTemplatesController::class, 'index'])->name('admin.dashboard');


});
