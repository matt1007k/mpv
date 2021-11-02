<?php

namespace Tests\Feature\Documents;

use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CanUserShowADocument extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function can_show_a_document()
    {
        $document = Document::factory()->create();
        $this->get(route('admin.documents.show', $document))
            ->assertStatus(200)
            ->assertViewIs('admin.documents.show')
        ;
    }
}
