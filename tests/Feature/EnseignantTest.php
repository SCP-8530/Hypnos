<?php

namespace Tests\Feature;

use App\Models\Enseignant;
use App\Models\Horaires;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnseignantTest extends TestCase
{

    use DatabaseTransactions;
    private Enseignant $enseignant;
    private User $visiteur;
    private User $admin;
    private User $prof;
    private User $gestionnaire;
    /**
     * @author Philippe Bertrand
     *
     * A basic feature test example.
     */
    public function setUp(): void
    { // TODO: Change the autogenerated stub
        parent::setUp();
        $this->horaire = Horaires::factory(1)->createOne([
            "lundi" =>    "00000000000000001111",
            "mardi" =>    "11110000000000000000",
            "mercredi" => "00000000000011110000",
            "jeudi" =>    "00001111000000000000",
            "vendredi" => "00000000000000000000"
        ]);
        $this->enseignant = Enseignant::factory(1)->createOne([
            'prenom'=> 'François',
            'nom' => 'Pagé',
            'bureau' => '1.083',
            'poste' => 2297,
            'horaire_id'=>1,
        ]);
        $this->visiteur = User::factory()->createOne([
            'admin' => 0,
            'prof' => 0,
            'gestionnaire' => 0
        ]);
        $this->admin = User::factory()->createOne([
            'admin' => 1,
            'prof' => 0,
            'gestionnaire' => 0
        ]);
        $this->prof = User::factory()->createOne([
            'admin' => 0,
            'prof' => 1,
            'gestionnaire' => 0
        ]);
        $this->gestionnaire = User::factory()->createOne([
            'admin' => 0,
            'prof' => 0,
            'gestionnaire' => 1
        ]);
    }
    public function test_index_vue(): void
    {
        //Vue index
        $response = $this->actingAs($this->admin)->get(route('enseignants.index'));

        $response->assertStatus(200);
    }

    public function test_vue_creation_valide():void
    {
        //Vue de création
        $response = $this->actingAs($this->gestionnaire)->get('/enseignants/nouveau');

        $response->assertStatus(200);
    }
    public function test_vue_creation_invalide():void
    {
        //Vue de création
        $response = $this->actingAs($this->visiteur)->get('/enseignants/nouveau');

        $response->assertStatus(403);
    }
    public function test_contenue_vue():void
    {
        $response = $this->actingAs($this->admin)->get('/enseignants/nouveau');

        $response->assertSee('Nouveau enseignant !');
    }
    public function test_creation_valide():void
    {
        $response = $this->actingAs($this->gestionnaire)->post(route("enseignants.store"), [
            "nom" => 'Philippe',
            "poste" => 4059,
            "prenom" => "Bertrand",
            "bureau" => "1.083",
            "horaire_id" => 2
        ]);
        $response->assertRedirect(route("enseignants.index"));
    }

    public function test_creation_invalide():void
    {
        $response = $this->actingAs($this->gestionnaire)->post(route("enseignants.store"), [
            "nom" => 'Phi',
            "poste" => -5,
            "prenom" => "Ber",
            "bureau" => "1.083"
        ]);
        $response->assertInvalid("nom",);
        $response->assertInvalid("prenom",);
        $response->assertInvalid("poste",);
    }
    // Assure la redirection et la création même si les champs Poste et Bureau sont null
    public function test_creation_champ_null(): void
    {
        $response = $this->actingAs($this->gestionnaire)->post(route("enseignants.store"), [
            "nom" => 'Philippe',
            "poste" => null,
            "prenom" => "Bertrand",
            "bureau" => null,
            "horaire_id" => 2
        ]);
        $response->assertRedirect(route("enseignants.index"));
    }

    public function test_show_enseignant(): void
    {
        $reponse = $this->actingAs($this->gestionnaire)->get("/enseignants/{$this->enseignant->id}");
        $reponse->assertStatus(200);
    }
    public function test_prenom_enseignant(): void
    {
        $reponse = $this->actingAs($this->admin)->get("/enseignants/{$this->enseignant->id}");
        $reponse->assertSee($this->enseignant->prenom);
    }

    public function testDatabaseHas()
    {
        $this->assertDatabaseHas('enseignants', [
            'nom' => 'Pagé',
            'prenom' => 'François',
            'bureau' => '1.083',
            'poste' => 2297,
            'horaire_id'=> 1
        ]);
    }

    public function testDatabaseMissing()
    {
        $this->assertDatabaseMissing('enseignants',[
            'nom' => 'Jean',
            'prenom' => 'Michel',
            'bureau' => '2.708A',
            'poste' => 5
        ]);
    }
    public function test_edit_vue(): void
    {
        $reponse = $this->actingAs($this->admin)->get("/enseignants/{$this->enseignant->id}/modifier");
        $reponse->assertStatus(200);
    }
    public function test_modification_valide():void
    {
        $response = $this->actingAs($this->gestionnaire)->put(route("enseignants.update", $this->enseignant->id), [
            "nom" => 'Crosby',
            "prenom" => "Sidney",
            "poste" => 5678,
            "bureau" => "2-909B",
            "horaire_id" => 5 // Modification de la relation
        ]);
        // Message de confirmation dans la session
        $response->assertSessionHas('message', 'L\'enseignant a été modifié avec succès.');
    }

    public function test_modification_invalide():void
    {
        $response = $this->put(route("enseignants.update", $this->enseignant->id), [
            "nom" => 'Cro', // 4 caractères min
            "prenom" => "Si", // 4 caractères min
            "poste" => 78, // Nombre à 4 chiffres obligatoire
            "bureau" => "1.098"
        ]);
        /* Le message de la session pour confirmer la modification doit être null
           Car les données envoyées ne sont pas valides */
        $response->assertSessionHas(null);
    }

    public function testDeleteEnseignant()
    {
        // Créer un enseignant à supprimer
        $enseignant = Enseignant::factory(1)->createOne([
            'prenom'=> 'François',
            'nom' => 'Pagé',
            'bureau' => '1.083',
            'poste' => 2297,
            'horaire_id'=>3,
        ]);

        // Envoyer une requête DELETE pour supprimer l'enseignant
        $response = $this->actingAs($this->admin)->delete("/enseignants/{$enseignant->id}");

        // Vérifier que la suppression a réussi
        $response->assertRedirect('/enseignants')
            ->assertSessionHas('message', 'L\'enseignant a été supprimé avec succès.');

        $this->assertDatabaseMissing('enseignants', ['id' => $enseignant->id]);
    }
    public function test_ajout_refuse_non_admin():void{

        $response = $this->actingAs($this->visiteur)->post(route("enseignants.store"), [
            "nom" => 'test',
            "age" => 2,
        ]);
        $response->assertForbidden();
    }
    public function test_supprimer_refuse_non_admin():void{
        // Créer un enseignant à supprimer
        $enseignant = Enseignant::factory(1)->createOne([
            'prenom'=> 'François',
            'nom' => 'Pagé',
            'bureau' => '1.083',
            'poste' => 2297,
            'horaire_id'=>1,
        ]);

        // Envoyer une requête DELETE pour supprimer l'enseignant
        $response = $this->actingAs($this->prof)->delete("/enseignants/{$enseignant->id}");

        $response->assertForbidden();
    }
    public function test_supprimer_valide_admin():void{
        $enseignant = Enseignant::factory(1)->createOne([
            'prenom'=> 'François',
            'nom' => 'Pagé',
            'bureau' => '1.083',
            'poste' => 2297,
            'horaire_id'=>1,
        ]);
        // Envoyer une requête DELETE pour supprimer l'enseignant
        $response = $this->actingAs($this->admin)->delete("/enseignants/{$enseignant->id}");

        $response->assertSessionHas('message', 'L\'enseignant a été supprimé avec succès.');
    }


}
