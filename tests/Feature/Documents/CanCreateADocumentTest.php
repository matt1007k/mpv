<?php

namespace Tests\Feature\Documents;

use App\Http\Livewire\Documents\Create;
use Tests\TestCase;

class CanCreateADocumentTest extends TestCase
{
    /** @test **/
    public function can_see_the_page_for_create_a_document()
    {
        $response = $this->get(route('documents.create'));

        $response
            ->assertViewIs('pages.create-document')
            ->assertStatus(200)
            ->assertSeeText('Registrar documento');
    }

    /** @test **/
    public function can_are_presence_the_create_form()
    {
        $response = $this->get(route('documents.create'));
        $response->assertSeeLivewire(Create::class);
    }
}
