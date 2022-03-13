<?php

namespace Tests\Feature;

use App\Jobs\ParseFileJob;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /** @test */
    public function get_main_page()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }

    /** @test */
    public function get_rows_page()
    {
        $response = $this->get(route('rows'));

        $response->assertStatus(200);
    }

    /** @test */
    public function upload_file()
    {
        Queue::fake();
        $response = $this->uploadFile()
        ->assertSessionHas('success', 'Файл импортирован')
        ->assertRedirect(route('home'));
        Queue::assertPushed(ParseFileJob::class);
    }

    public function uploadFile(): \Illuminate\Testing\TestResponse
    {
        return $this->postJson(route('upload'), [
            'file' => new \Illuminate\Http\UploadedFile(resource_path('demo/demo_file.xlsx'), 'demo_file.xlsx', null, null, true),
        ]);
    }
}
