<?php

namespace Tests\Feature;

use App\Models\Campus;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CampusTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     */
    public function test_index_existe(): void
    {
        $response = $this->get('/campus');
        $response->assertStatus(200);
    }

    public function test_show_existe(): void
    {
        $campus = Campus::factory(1)->createOne([
            'nom' => 'Campustest'
        ]);
        $response = $this->get("/campus/{$campus->id}");
        $response->assertStatus(200);
    }

    public function test_show_affiche_nom(): void
    {
        $campus = campus::factory(1)->createOne();
        $response = $this->get("/campus/{$campus->id}");
        $response->assertSee($campus->nom);
    }
}
