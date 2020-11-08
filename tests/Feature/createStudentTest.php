<?php

namespace Tests\Feature;

use App\Models\EntidadRoleUser;
use App\Models\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class createStudentTest extends TestCase
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

    public function test_an_invited_cant_access(){

        $response= $this->postJson(route('student.store'),[]);
        $response->assertStatus(302);
        $response->assertSessionHas('flash');
        $response->assertRedirect('/'); // redirige al login
    }

    public function test_redirect_user_authenticated_toHome()
    {
        $this->withoutExceptionHandling();

        factory(User::class)->create(['username'=>'jacua']);

        $response = $this->post(route('Login'),[
            'username' => 'jacua',
            'password' => 'secret'
        ]);
        $this->assertDatabaseHas('users',[
            'username' => 'jacua'
        ]);

        $response->assertRedirect('/home');
    }

    public function test_an_user_without_permission_cant_be_access_toCreate_StudentInterface(){

        $userWithoutPermission = User::first();
        $response = $this->actingAs($userWithoutPermission)->get(route('student.Iregistro'));
        $response->assertStatus(403);
    }

    public function test_an_authenticated_user_with_permission_can_save_studentInfo(){

        $user = factory(User::class)->create(['username'=>'jacua','password'=>'secret','email'=>'jacua@gmail.com']);

        $response =$this->actingAs($user)->ajaxPost(route('student.store'),[
            'per_Nombre' => 'Jonathan Alejandro',
            'per_Apellido' => 'Acuña Barrios',
            'est_Carnet' => '20160019U',
            'per_Identificacion' => '001110597Y',
            'Gen_ID'=> 2,
            'Cuar_ID' => 2,
            'Car_ID' => 2,
            'Tel_Descripcion' => '12345678',
            'Dep_ID' => 1,
            'Mun_ID' => 2,
            'cor_Descripcion' => 'hola@gmail.com',
            'dir_Descripcion' => 'waspan sur'
        ]);

        $this->assertDatabaseHas('tbl_persona',[
            'per_Nombre' => 'Jonathan Alejandro'
        ]);
        $this->assertDatabaseHas('tbl_estudiante',[
            'est_Carnet' => '20160019U'
        ]);
        // dd($response->getContent()); //muestra el contenido de la respuesta
    }

    public function test_with_invalid_identificacionData_cant_be_save(){

        $user = factory(User::class)->create(['username'=>'jacua','password'=>'secret','email'=>'jacua@gmail.com']);

        $response =$this->actingAs($user)->ajaxPost(route('student.store'),[
            'per_Nombre' => 'Jonathan Alejandro',
            'per_Apellido' => 'Acuña Barrios',
            'est_Carnet' => '20160019U',
            'per_Identificacion' => '001M52',
            'Gen_ID'=> 2,
            'Cuar_ID' => 2,
            'Car_ID' => 2,
            'Tel_Descripcion' => '12345678',
            'Dep_ID' => 1,
            'Mun_ID' => 2,
            'cor_Descripcion' => 'hola@gmail.com',
            'dir_Descripcion' => 'waspan sur'
        ]);

        $response->assertJsonStructure([
            'message','errors'
        ]);

        $response->assertStatus(422);

    }

    //metodo creado para controladores que comprueba peticion ajax
    protected function ajaxPost($uri, array $data = [])
    {
        return $this->postJson($uri, $data, array('HTTP_X-Requested-With' => 'XMLHttpRequest'));
    }
}
