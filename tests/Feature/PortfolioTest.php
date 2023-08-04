<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Pages;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
        Storage::fake('public');
    }

    private function portfolioUser(): User
    {
        $page = Pages::create(['templates_id' => 1]);
        return User::factory()->create(['page_id' => $page->id]);
    }

    private function sections(): array
    {
        return [
            'aboutme' => ['aboutmes', ['full_name' => 'Portfolio Person', 'job' => 'Developer', 'description' => 'Builds websites', 'birthday' => '1995-01-01', 'city' => 'Casablanca']],
            'languages' => ['languages', ['language_name' => 'English', 'level' => '90']],
            'hobbies' => ['hobbies', ['name' => 'Reading', 'icon' => 'fas fa-book']],
            'skills' => ['skills', ['name' => 'PHP', 'level' => '85']],
            'education' => ['education', ['date' => '2020', 'place' => 'University', 'title' => 'Degree', 'description' => 'Computer science']],
            'experience' => ['experiences', ['date' => '2021', 'place' => 'Studio', 'title' => 'Engineer', 'description' => 'Web development']],
            'services' => ['services', ['icon' => 'fas fa-code', 'title' => 'Web design', 'description' => 'Accessible websites']],
            'projects' => ['projects', ['title' => 'Example project', 'sub_title' => 'Portfolio', 'description' => 'A website', 'client' => 'Demo', 'category' => 'Web']],
            'contact' => ['contacts', ['icon' => 'fas fa-envelope', 'name' => 'Email', 'lien' => 'mailto:demo@example.com']],
        ];
    }

    public function test_guests_are_redirected_to_the_correct_login(): void
    {
        $this->get('/dashboard')->assertRedirect('/login');
        $this->get('/templates/result')->assertRedirect('/login');
        $this->get('/templates/preview/3')->assertRedirect('/login');
        $this->get('/dashboard/aboutme/list')->assertRedirect('/login');
        $this->get('/admin/dashboard')->assertRedirect('/admin/login');
        $this->post('/admin/user/delete', ['id' => 1])->assertRedirect('/admin/login');
    }

    public function test_all_five_templates_render_with_an_empty_portfolio(): void
    {
        $user = $this->portfolioUser();
        $this->actingAs($user)->get('/dashboard')->assertOk()->assertSee('Forma')->assertSee('Noir')->assertSee('Editorial')->assertSee('Studio')->assertSee('Terminal');
        foreach ([1, 2, 3, 4, 5] as $templateId) {
            $this->post('/dashboard', ['template_id' => $templateId])->assertRedirect('/dashboard');
            $this->get('/templates/result')->assertOk();
        }
        $this->post('/dashboard', ['template_id' => 999])->assertSessionHasErrors('template_id');
        $this->assertSame(5, (int) $user->page->fresh()->templates_id);
    }

    public function test_sections_can_be_created_edited_previewed_and_deleted(): void
    {
        $user = $this->portfolioUser();
        $this->actingAs($user);
        foreach ($this->sections() as $section => [$table, $data]) {
            $base = '/dashboard/'.$section;
            $this->get($base.'/create')->assertOk();
            $payload = $data;
            if ($section === 'aboutme') $payload['image'] = new UploadedFile(public_path('assets/images/bg_1.jpg'), 'portrait.jpg', null, null, true);
            if ($section === 'projects') {
                $payload['big_image'] = new UploadedFile(public_path('assets/images/bg_1.jpg'), 'large.jpg', null, null, true);
                $payload['small_image'] = new UploadedFile(public_path('assets/images/bg_2.jpg'), 'small.jpg', null, null, true);
            }
            $store = in_array($section, ['projects', 'contact']) ? '/store' : '/create';
            $this->post($base.$store, $payload)->assertSessionHasNoErrors()->assertRedirect();
            $record = DB::table($table)->where('pages_id', $user->page_id)->first();
            $this->assertNotNull($record, $section);
            $this->get($base.'/list')->assertOk();
            $this->get($base.'/edit/'.$record->id)->assertOk();
            $this->post($base.'/update/'.$record->id, $data)->assertSessionHasNoErrors()->assertRedirect();
        }
        foreach ([1, 2, 3, 4, 5] as $templateId) {
            $this->post('/dashboard', ['template_id' => $templateId]);
            $this->get('/templates/result')->assertOk()->assertSee('Portfolio Person')->assertSee('Example project');
        }
        foreach ($this->sections() as $section => [$table, $data]) {
            $id = DB::table($table)->where('pages_id', $user->page_id)->value('id');
            $this->delete('/dashboard/'.$section.'/destroy/'.$id)->assertRedirect();
            $this->assertDatabaseMissing($table, ['id' => $id]);
        }
    }

    public function test_users_cannot_edit_or_delete_another_portfolio(): void
    {
        $owner = $this->portfolioUser();
        $other = $this->portfolioUser();
        $this->actingAs($other);
        foreach ($this->sections() as $section => [$table, $data]) {
            $stored = $data + ['pages_id' => $owner->page_id];
            if ($section === 'aboutme') $stored['image'] = 'storage/images/portrait.jpg';
            if ($section === 'projects') $stored += ['big_image' => 'storage/images/large.jpg', 'small_image' => 'storage/images/small.jpg'];
            $id = DB::table($table)->insertGetId($stored);
            $this->get('/dashboard/'.$section.'/edit/'.$id)->assertNotFound();
            $this->post('/dashboard/'.$section.'/update/'.$id, $data)->assertNotFound();
            $this->delete('/dashboard/'.$section.'/destroy/'.$id)->assertNotFound();
            $this->assertDatabaseHas($table, ['id' => $id, 'pages_id' => $owner->page_id]);
        }
    }

    public function test_admin_pages_render_and_regular_users_cannot_access_them(): void
    {
        $this->actingAs($this->portfolioUser())->get('/admin/dashboard')->assertRedirect('/admin/login');
        $admin = Admin::create(['name' => 'Test Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')]);
        $this->actingAs($admin, 'admin');
        foreach (['/admin/dashboard', '/admin/user/table', '/admin/templates/list', '/admin/templates/create', '/admin/templates/edit/1'] as $url) {
            $this->get($url)->assertOk();
        }
    }

    public function test_a_template_in_use_cannot_delete_portfolio_data(): void
    {
        $user = $this->portfolioUser();
        $admin = Admin::create(['name' => 'Test Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')]);
        $this->actingAs($admin, 'admin')->delete('/admin/templates/destroy/1')
            ->assertRedirect('/admin/templates/list')->assertSessionHasErrors('template');
        $this->assertDatabaseHas('templates', ['id' => 1]);
        $this->assertDatabaseHas('pages', ['id' => $user->page_id]);
    }

    public function test_deleting_a_profile_preserves_bundled_assets(): void
    {
        $user = $this->portfolioUser();
        $data = $this->sections()['aboutme'][1];
        $id = DB::table('aboutmes')->insertGetId($data + ['pages_id' => $user->page_id, 'image' => 'assets/images/bg_1.jpg']);
        $this->actingAs($user)->delete('/dashboard/aboutme/destroy/'.$id)->assertRedirect();
        $this->assertFileExists(public_path('assets/images/bg_1.jpg'));
        $this->assertDatabaseMissing('aboutmes', ['id' => $id]);
    }

    public function test_previewing_each_design_does_not_change_the_selected_template(): void
    {
        $user = $this->portfolioUser();
        $this->actingAs($user);
        foreach (\App\Models\Template::catalog() as $id => $design) {
            $this->get('/templates/preview/'.$id)->assertOk()->assertSee('theme-'.$design['slug'])->assertSee($user->name);
            $this->assertSame(1, (int)$user->page->fresh()->templates_id);
        }
        $this->get('/templates/preview/999')->assertNotFound();
    }

    public function test_switching_templates_preserves_the_page_and_all_content(): void
    {
        $user = $this->portfolioUser();
        $data = $this->sections()['projects'][1] + ['pages_id' => $user->page_id, 'big_image' => 'assets/images/bg_1.jpg', 'small_image' => 'assets/images/bg_2.jpg'];
        $id = DB::table('projects')->insertGetId($data);
        foreach ([1,2,3,4,5] as $template) {
            $this->actingAs($user)->post('/dashboard', ['template_id' => $template])->assertRedirect('/dashboard');
            $this->assertSame($user->page_id, $user->fresh()->page_id);
            $this->assertDatabaseHas('projects', ['id' => $id, 'pages_id' => $user->page_id]);
        }
    }

    public function test_contact_links_reject_executable_schemes_and_hide_unsafe_legacy_links(): void
    {
        $user = $this->portfolioUser();
        $this->actingAs($user)->post('/dashboard/contact/store', ['name' => 'Bad link', 'icon' => 'icon', 'lien' => 'javascript:alert(1)'])
            ->assertSessionHasErrors('lien');
        DB::table('contacts')->insert(['pages_id' => $user->page_id, 'name' => 'Legacy link', 'icon' => 'icon', 'lien' => 'javascript:alert(1)']);
        foreach ([1,2,3,4,5] as $template) {
            $this->get('/templates/preview/'.$template)->assertOk()->assertSee('Legacy link')->assertDontSee('javascript:alert', false);
        }
    }

    public function test_editor_errors_keep_entered_values_and_invalid_images_do_not_replace_a_portrait(): void
    {
        $user = $this->portfolioUser();
        $data = $this->sections()['aboutme'][1];
        $id = DB::table('aboutmes')->insertGetId($data + ['pages_id' => $user->page_id, 'image' => 'assets/images/bg_1.jpg']);
        $this->actingAs($user)->from('/dashboard/aboutme/edit/'.$id)->post('/dashboard/aboutme/update/'.$id, [
            'full_name' => 'A name I typed', 'image' => UploadedFile::fake()->create('portrait.txt', 1, 'text/plain'),
        ])->assertSessionHasErrors(['job', 'image'])->assertRedirect('/dashboard/aboutme/edit/'.$id);
        $this->get('/dashboard/aboutme/edit/'.$id)->assertOk()->assertSee('A name I typed')->assertSee('aria-invalid="true"',false);
        $this->assertDatabaseHas('aboutmes', ['id' => $id, 'image' => 'assets/images/bg_1.jpg']);
    }

    public function test_previews_show_only_the_signed_in_users_content_and_escape_markup(): void
    {
        $owner = $this->portfolioUser();
        $other = $this->portfolioUser();
        $data = $this->sections()['aboutme'][1];
        DB::table('aboutmes')->insert($data + ['pages_id' => $other->page_id, 'image' => 'assets/images/bg_1.jpg']);
        DB::table('skills')->insert(['pages_id' => $owner->page_id, 'name' => '<script>alert(1)</script>', 'level' => 'Advanced']);
        $this->actingAs($owner)->get('/templates/preview/5')->assertOk()->assertDontSee('Portfolio Person')->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;',false);
    }

    public function test_preview_metadata_without_a_bundled_design_cannot_be_selected(): void
    {
        \App\Models\Template::create(['title' => 'Uploaded preview', 'temp_image' => 'preview.jpg']);
        $user = $this->portfolioUser();
        $this->actingAs($user)->post('/dashboard', ['template_id' => 6])->assertSessionHasErrors('template_id');
        $this->get('/templates/preview/6')->assertNotFound();
        $this->get('/dashboard')->assertDontSee('Uploaded preview');
    }
}
