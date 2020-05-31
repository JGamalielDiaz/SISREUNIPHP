<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'Repositories\Persona\IPersonaPost','Repositories\Persona\PersonaPost',
            'Repositories\Estudiante\IEstudiantePost', 'Repositories\Estudiante\EstudiantePost',
            'Repositories\Cuarto\IcuartoHistorial','Repositories\Cuarto\CuartoHistorialPost'
            
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
