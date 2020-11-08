<?php

namespace Tests\Feature;

use App\Models\User;
use App\Repositories\Estudiante\EntidadEstudiante;
use App\Repositories\Persona\EntidadPersona;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class updateStudentTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp():void
     {
        parent::setUp();

        //se crea el primer usuario sin permisos para acceder al sistema
        //segundo usuario que se cree en las pruebas tendra por defecto todos los permisos
        $this->artisan('db:seed');
     }

     public function test_an_user_without_permission_cant_update_StudentData(){

        // $this->withExceptionHandling();
        $persona = factory(EntidadPersona::class)->create();
        factory(EntidadEstudiante::class)->create(['Est_ID' => $persona->id]);
        // dd($persona);
        $userwithoutPermission = User::first();


        $reponse = $this->actingAs($userwithoutPermission)->postJson('Estudent/'.$persona->id,[
            'per_Nombre' =>'Nombre Actualizado sin permiso',
            'per_Apellido' =>'Apellido Actualizado',
            'est_Carnet' => '20300091U',
            'per_Identificacion' =>'123456789Y'
        ]);
        $reponse->assertStatus(403);


     }

     public function test_an_user_with_permission_can_update_StudentData(){

        // $this->withExceptionHandling();
        $persona = factory(EntidadPersona::class)->create();
        factory(EntidadEstudiante::class)->create(['Est_ID' => $persona->id]);
        // dd($persona);
        $user = factory(User::class)->create(['username'=>'jacua','password'=>'secret']);

        $reponse = $this->actingAs($user)->postJson('Estudent/'.$persona->id,[
            'per_Nombre' =>'Nombre Actualizado',
            'per_Apellido' =>'Apellido Actualizado',
            'est_Carnet' => '20300091U',
            'per_Identificacion' =>'123456789Y'
        ]);
        $reponse->assertStatus(302);
        $reponse->assertRedirect('/');

        $this->assertDatabaseHas('tbl_persona',[
            'Per_ID' => $persona->id,
            'per_Nombre' =>'Nombre Actualizado'
        ]);
     }

     public function test_without_carneData_cant_be_update(){

        $this->withExceptionHandling();

        $persona = factory(EntidadPersona::class)->create();
        factory(EntidadEstudiante::class)->create(['Est_ID' => $persona->id]);
        // dd($persona);
        $user = factory(User::class)->create(['username'=>'jacua','password'=>'secret']);

        $reponse = $this->actingAs($user)->postJson('Estudent/'.$persona->id,[
            'per_Nombre' =>'Nombre Actualizado',
            'per_Apellido' =>'Apellido Actualizado',
            'est_Carnet' => '',
            'per_Identificacion' =>'123456789Y'
        ]);
        
        $reponse->assertJsonStructure([
            'message', 'errors'
        ]);
        $reponse->assertStatus(422);
     }

     public function test_without_identificacionData_cant_be_update(){

        $this->withExceptionHandling();

        $persona = factory(EntidadPersona::class)->create();
        factory(EntidadEstudiante::class)->create(['Est_ID' => $persona->id]);
        // dd($persona);
        $user = factory(User::class)->create(['username'=>'jacua','password'=>'secret']);

        $reponse = $this->actingAs($user)->postJson('Estudent/'.$persona->id,[
            'per_Nombre' =>'Nombre Actualizado',
            'per_Apellido' =>'Apellido Actualizado',
            'est_Carnet' => '20160091U',
            'per_Identificacion' =>''
        ]);
        
        $reponse->assertJsonStructure([
            'message', 'errors'
        ]);
        $reponse->assertStatus(422);
     }

     public function test_with_invalid_identificacionData_cant_be_update(){

        $this->withExceptionHandling();

        $persona = factory(EntidadPersona::class)->create();
        factory(EntidadEstudiante::class)->create(['Est_ID' => $persona->id]);
        // dd($persona);
        $user = factory(User::class)->create(['username'=>'jacua','password'=>'secret']);

        $reponse = $this->actingAs($user)->postJson('Estudent/'.$persona->id,[
            'per_Nombre' =>'Nombre Actualizado',
            'per_Apellido' =>'Apellido Actualizado',
            'est_Carnet' => '20160091U',
            'per_Identificacion' =>'*/$*91Y'
        ]);
    
        $reponse->assertStatus(422);
        
        $reponse->assertJsonStructure([
            'message', 'errors'
        ]);
     }
}
