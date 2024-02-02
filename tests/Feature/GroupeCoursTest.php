<?php

namespace Tests\Feature;

use App\Models\Enseignant;
use App\Models\GroupeCours;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupeCoursTest extends TestCase
{
    use DatabaseTransactions;
    private GroupeCours $groupe_cours;
    private User $prof;
    private User $gestio;
    private User $admin;

    /**
     * @author Guillaume
     *
     * donner initial
     */
    public function setUp(): void {
        parent::setUp();
        $this->groupe_cours = GroupeCours::factory()->createOne([
            'no_groupe'=> 5,
            'nb_etudiants' => 25,
            'campus_id' => 1,
            'session_id' => 3,
            'cours_id' => 5,
        ]);
        $this->prof = User::factory()->createOne(['prof' => 1,'gestionnaire' => 0, 'admin' => 0]);
        $this->gestio = User::factory()->createOne(['gestionnaire' => 1, 'prof' => 0, 'admin' => 0]);
        $this->admin = User::factory()->createOne(['admin' => 1, 'prof' => 0, 'gestionnaire' => 0]);
    }

    public function testNoAuthIndex(): void {
        $response = $this->get(route("groupe_cours.index"));
        $response->assertRedirect('/login');
    }
    public function testProfIndex(): void {
        $response = $this->actingAs($this->prof)->get(route("groupe_cours.index"));
        $response->assertStatus(403);
    }
    public function testGestioIndex(): void {
        $response = $this->actingAs($this->gestio)->get(route("groupe_cours.index"));
        $response->assertStatus(200);
    }
    public function testAdminIndex(): void {
        $response = $this->actingAs($this->admin)->get(route("groupe_cours.index"));
        $response->assertStatus(200);
    }


    public function testAdminCreate(): void {
        $response = $this->actingAs($this->admin)->get(route("groupe_cours.create"));
        $response->assertStatus(200);
    }

    public function testAdminEdit(): void {
        $response = $this->actingAs($this->admin)->get(route("groupe_cours.edit", $this->groupe_cours->id));
        $response->assertStatus(200);
    }

    public function testAdminShow(): void {
        $response = $this->actingAs($this->admin)->get(route("groupe_cours.show", $this->groupe_cours->id));
        $response->assertStatus(200);
    }


    public function testRedirection(): void {
        $groupe_cour = GroupeCours::factory()->createOne();
        $reponse = $this->actingAs($this->admin)->post(route("groupe_cours.destroy", $groupe_cour->id));
        $reponse->assertRedirect("groupe_cours/index");
    }

    public function testCreateInvalide(): void {
        $response = $this->actingAs($this->admin)->post(route("groupe_cours.store"), [
            'no_groupe' => 0, // Valeur invalide pour le champ 'no_groupe'
            'nb_etudiants' => 50, // Valeur invalide pour le champ 'nb_etudiants'
            'campus_id' => 2,
            'session_id' => 4,
            'cours_id' => 5
        ]);

        $response->assertSessionHasErrors(['no_groupe', 'nb_etudiants'])
            ->assertSessionMissing('message');
    }

    public function testCreationUserNoAutorize(): void {
        $reponse = $this->actingAs($this->prof)->post(route("groupe_cours.store"),[
            'no_groupe'=> 1,
            'nb_etudiants' => 35,
            'campus_id' => 2,
            'session_id' => 4,
            'cours_id' => 5
        ]);
        $reponse->assertForbidden();
    }

    public function testSuppValide(): void {
        $groupe_cours = GroupeCours::factory(1)->createOne();
        $response = $this->actingAs($this->admin)->delete("/groupe_cours/{$groupe_cours->id}");
        $response->assertSessionHas('message', 'Le groupe cours a été supprimé avec succès.');
    }
}
