<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(120);
        date_default_timezone_set('America/Managua');
    }
}
