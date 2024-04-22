<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'status'=>1,
        ]);
        DB::table('direcciones')->insert([
            'nombre'=>'OFICINA DE PRUEBA',
        ]);

        DB::table('tipo_personas')->insert([
            ['codigo' => '01','nombre' => 'NATURAL'],
            ['codigo' => '02','nombre'=>'JURÍDICO']
        ]);

        DB::table('regiones')->insert([
            ['nombre' => 'LORETO',]
        ]);

        DB::table('provincias')->insert([
            ['id_regiones' => '1',
            'nombre_provincia' => 'ALTO AMAZONAS'],
            ['id_regiones' => '1',
            'nombre_provincia' => 'DATEM DEL MARAÑON'],
            ['id_regiones' => '1',
            'nombre_provincia' => 'LORETO'],
            ['id_regiones' => '1',
            'nombre_provincia' => 'MAYNAS'],
            ['id_regiones' => '1',
            'nombre_provincia' => 'RAMON CASTILLA'],
            ['id_regiones' => '1',
            'nombre_provincia' => 'REQUENA'],
            ['id_regiones' => '1',
            'nombre_provincia' => 'UCAYALI'],
            ['id_regiones' => '1',
            'nombre_provincia' => 'PUTUMAYO'],
        ]);

        DB::table('distritos')->insert([
            // Distritos para la provincia de ALTO AMAZONAS
            ['id_provincias' => 1, 'nombre_distrito' => 'BALSAPUERTO'],
            ['id_provincias' => 1, 'nombre_distrito' => 'JEBEROS'],
            ['id_provincias' => 1, 'nombre_distrito' => 'LAGUNAS'],
            ['id_provincias' => 1, 'nombre_distrito' => 'SANTA CRUZ'],
            ['id_provincias' => 1, 'nombre_distrito' => 'TENIENTE CESAR LOPEZ ROJAS'],
            ['id_provincias' => 1, 'nombre_distrito' => 'YURIMAGUAS'],
            
            // Distritos para la provincia de DATEM DEL MARAÑON
            ['id_provincias' => 2, 'nombre_distrito' => 'ANDOAS'],
            ['id_provincias' => 2, 'nombre_distrito' => 'BARRANCA'],
            ['id_provincias' => 2, 'nombre_distrito' => 'CAHUAPANAS'],
            ['id_provincias' => 2, 'nombre_distrito' => 'MANSERICHE'],
            ['id_provincias' => 2, 'nombre_distrito' => 'MORONA'],
            ['id_provincias' => 2, 'nombre_distrito' => 'PASTAZA'],
            
            // Distritos para la provincia de LORETO
            ['id_provincias' => 3, 'nombre_distrito' => 'NAUTA'],
            ['id_provincias' => 3, 'nombre_distrito' => 'PARINARI'],
            ['id_provincias' => 3, 'nombre_distrito' => 'TIGRE'],
            ['id_provincias' => 3, 'nombre_distrito' => 'TROMPETEROS'],
            ['id_provincias' => 3, 'nombre_distrito' => 'URARINAS'],
            
            // Distritos para la provincia de MAYNAS
            ['id_provincias' => 4, 'nombre_distrito' => 'ALTO NANAY'],
            ['id_provincias' => 4, 'nombre_distrito' => 'BELEN'],
            ['id_provincias' => 4, 'nombre_distrito' => 'INDIANA'],
            ['id_provincias' => 4, 'nombre_distrito' => 'IQUITOS'],
            ['id_provincias' => 4, 'nombre_distrito' => 'FERNANDO LORES'],
            ['id_provincias' => 4, 'nombre_distrito' => 'LAS AMAZONAS'],
            ['id_provincias' => 4, 'nombre_distrito' => 'MAZAN'],
            ['id_provincias' => 4, 'nombre_distrito' => 'NAPO'],
            ['id_provincias' => 4, 'nombre_distrito' => 'PUNCHANA'],
            ['id_provincias' => 4, 'nombre_distrito' => 'TORRES CAUSANA'],
            ['id_provincias' => 4, 'nombre_distrito' => 'SAN JUAN BAUTISTA'],
            
            // Distritos para la provincia de RAMOS CASTILLA
            ['id_provincias' => 5, 'nombre_distrito' => 'PEBAS'],
            ['id_provincias' => 5, 'nombre_distrito' => 'RAMON CASTILLA'],
            ['id_provincias' => 5, 'nombre_distrito' => 'SAN PABLO'],
            ['id_provincias' => 5, 'nombre_distrito' => 'YAVARI'],
            
            
            // Distritos para la provincia de REQUENA
            ['id_provincias' => 6, 'nombre_distrito' => 'ALTO TAPICHE'],
            ['id_provincias' => 6, 'nombre_distrito' => 'CAPELO'],
            ['id_provincias' => 6, 'nombre_distrito' => 'EMILIO SAN MARTIN'],
            ['id_provincias' => 6, 'nombre_distrito' => 'JENARO HERRERA'],
            ['id_provincias' => 6, 'nombre_distrito' => 'MAQUIA'],
            ['id_provincias' => 6, 'nombre_distrito' => 'PUINAHUA'],
            ['id_provincias' => 6, 'nombre_distrito' => 'REQUENA'],
            ['id_provincias' => 6, 'nombre_distrito' => 'SAQUENA'],
            ['id_provincias' => 6, 'nombre_distrito' => 'SOPLIN'],
            ['id_provincias' => 6, 'nombre_distrito' => 'TAPICHE'],
            ['id_provincias' => 6, 'nombre_distrito' => 'YAQUERANA'],

            // Distritos para la provincia de REQUENA
            ['id_provincias' => 7, 'nombre_distrito' => 'CONTAMANA'],
            ['id_provincias' => 7, 'nombre_distrito' => 'INAHUAYA'],
            ['id_provincias' => 7, 'nombre_distrito' => 'PADRE MARQUEZ'],
            ['id_provincias' => 7, 'nombre_distrito' => 'PAMPA HERMOSA'],
            ['id_provincias' => 7, 'nombre_distrito' => 'SARAYACU'],
            ['id_provincias' => 7, 'nombre_distrito' => 'VARGAS GUERRA'],

            // Distritos para la provincia de REQUENA
            ['id_provincias' => 8, 'nombre_distrito' => 'PUTUMAYO'],
            ['id_provincias' => 8, 'nombre_distrito' => 'ROSA PANDURO'],
            ['id_provincias' => 8, 'nombre_distrito' => 'TENIENTE MANUEL CLAVERO'],
            ['id_provincias' => 8, 'nombre_distrito' => 'YAGUAS'],

            
        ]);



    }
}
