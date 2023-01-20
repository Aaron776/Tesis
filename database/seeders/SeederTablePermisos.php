<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablePermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            //Operaciones en la tabla rol
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            /*Operaciones en la tabla blogs
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',*/

             //Operaciones en la tabla usuario
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //Reportes
            'generar-reporte',

            // Biometrico
            'marcar-biometrico',
            'ver-biometrico',

            // Docentes
            'ver-docentes'

            
    


        ];

        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
