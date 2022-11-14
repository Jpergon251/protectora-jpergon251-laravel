<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mascota;
use App\Models\Foto_Mascota;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // crea una mascota sin fotos
        $mascota = Mascota::factory()->create();
        // crea 3 fotos para la mascota
        Foto_Mascota::factory(3)->for($mascota)->create();

        // crea otra mascota con 5 fotos
        Mascota::factory()->has(Foto_Mascota::factory(5), 'fotos')->create();
    }
}
