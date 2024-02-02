<?php


use App\Models\Horaires;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @author Guillaume Paoli
 */

class HoraireTest extends TestCase
{
    use DatabaseTransactions;
    private Horaires $horaires;

    private User $visiteur;
    private User $admin;
    private User $prof;
    private User $gestionnaire;

    public function setUp(): void
    {
        parent::setUp();
        $this->horaires = Horaires::factory(1)->createOne([
            "lundi" =>    "00000000000000001111",
            "mardi" =>    "11110000000000000000",
            "mercredi" => "00000000000011110000",
            "jeudi" =>    "00001111000000000000",
            "vendredi" => "00000000000000000000"
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

    /**
     * Le test d'existance d'un page
     */
    public function test_index_existe(): void
    {
        $response = $this->actingAs($this->admin)->get('/horaire');
        $response->assertStatus(200);
    }

    public function test_show_existe(): void
    {
        $horaire = Horaires::factory(1)->createOne();
        $response = $this->actingAs($this->gestionnaire)->get("/horaire/{$horaire->id}");
        $response->assertStatus(200);
    }

    public function test_show_affiche_id(): void
    {
        $horaire = Horaires::factory(1)->createOne();
        $response = $this->actingAs($this->gestionnaire)->get("/horaire/{$horaire->id}");
        $response->assertSee($horaire->id);
    }

    /**
     * le test de suppresion d'un horaire
    */
    public function test_suppretion_horaire(): void
    {
        $horaire = Horaires::factory(1)->createOne();
        $response = $this->delete("/horaire/{$horaire->id}");
        $this->assertDatabaseMissing('enseignants', ['id' => $horaire->id]);
    }

    /**
     * test de la redirection
    */
    public function test_redirection():void{
        $response = $this->actingAs($this->admin)->post(route("horaire.store"), [
            "lundi" =>    "00000000000000000000",
            "mardi" =>    "00000000000000000000",
            "mercredi" => "00000000000000000000",
            "jeudi" =>    "00000000000000000000",
            "vendredi" => "00000000000000000000"
        ]);
        $response->assertRedirect(route("horaire.index"));
    }

    /**
     * test l'ajout d'un horraire valide
    */
    public function test_ajout_valide():void{

        $response = $this->actingAs($this->gestionnaire)->post(route("horaire.store"),[
            "lundi" =>    "00000000000000000000",
            "mardi" =>    "00000000000000000000",
            "mercredi" => "00000000000000000000",
            "jeudi" =>    "11110000000000001111",
            "vendredi" => "11111111111111111111"
        ]);
        $this->assertDatabaseHas("horaires",[
            "lundi" =>    "00000000000000000000",
            "mardi" =>    "00000000000000000000",
            "mercredi" => "00000000000000000000",
            "jeudi" =>    "11110000000000001111",
            "vendredi" => "11111111111111111111"
        ]);
    }

    /**
     * test l'ajout d'un horraire invalide
     */
    public function test_ajout_invalide():void{
        $response = $this->actingAs($this->admin)->post(route("horaire.store"),[
            "lundi" =>    "22220000000000000000",//il n'est pas possible d'avoir des "2"
            "mardi" =>    "00000000000000000000",
            "mercredi" => "00000000000000000000",
            "jeudi" =>    "11110000000000001111",
            "vendredi" => "11111111111111111111"
        ]);
        $this->assertDatabaseMissing("horaires",[
            "lundi" =>    "22220000000000000000",
            "mardi" =>    "00000000000000000000",
            "mercredi" => "00000000000000000000",
            "jeudi" =>    "11110000000000001111",
            "vendredi" => "11111111111111111111"
        ]);
    }

    /**
     * test de modification valide
    */
    public function test_modif_valide(): void {
        $response = $this->actingAs($this->admin)->put(route("horaire.update", $this->horaires->id), [
            "lundi" =>    "00000000000000001111",
            "mardi" =>    "11110000000000000000",
            "mercredi" => "00000000000011110000",
            "jeudi" =>    "00001111000000000000",
            "vendredi" => "00000000111100000000" //la modification est les 1 dans vendredi
        ]);
        $this->assertDatabaseHas("horaires",[
            "id" => $this->horaires->id,
            "lundi" =>    "00000000000000001111",
            "mardi" =>    "11110000000000000000",
            "mercredi" => "00000000000011110000",
            "jeudi" =>    "00001111000000000000",
            "vendredi" => "00000000111100000000"
        ]);
    }

    /**
     * test de modification invalide
     */
    public function test_modif_invalide(): void {
        $response = $this->actingAs($this->gestionnaire)->put(route("horaire.update", $this->horaires->id), [
            "lundi" =>    "00000000000000001111",
            "mardi" =>    "11110000000000000000",
            "mercredi" => "00000000000011110000",
            "jeudi" =>    "00001111000000000000",
            "vendredi" => "00000000222200000000" //la modification est les 2 dans vendredi
        ]);
        $this->assertDatabaseMissing("horaires",[
            "id" => $this->horaires->id,
            "lundi" =>    "00000000000000001111",
            "mardi" =>    "11110000000000000000",
            "mercredi" => "00000000000011110000",
            "jeudi" =>    "00001111000000000000",
            "vendredi" => "00000000222200000000"
        ]);
    }

    /**
     * test de presence d'un message pres un ajout
    */
    public function test_message_ajout(): void {
        $response = $this->actingAs($this->gestionnaire)->post(route("horaire.store"), [
            "lundi" =>    "00000000000000000000",
            "mardi" =>    "00000000000000000000",
            "mercredi" => "00000000000000000000",
            "jeudi" =>    "00000000000000000000",
            "vendredi" => "00000000000000000000"
        ]);
        $response->assertSessionHas('message',"L'horaire a ete ajouter avec succes");
    }
}
