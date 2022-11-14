<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foto_Mascota>
 */
class Foto_MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $random_dog = Http::get("https://dog.ceo/api/breeds/image/random");
        
        if($random_dog->json("status") == "success") {
            $filename = Str::random(40);
            Storage::disk('public')->put("mascotas/" . $filename, Http::get($random_dog->json("message")));
            $imagen = "/storage/mascotas/" . $filename;
        } else {
            $imagen = fake()->imageUrl(360, 360);
        }

        return [
            //
            "rutafoto" => $imagen
        ];
    }
}
