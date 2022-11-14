<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propietario>
 */
class PropietarioFactory extends Factory
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
            Storage::disk('public')->put("propietarios/" . $filename, Http::get($random_dog->json("message")));
            $imagen = "/storage/propietarios/" . $filename;
        } else {
            $imagen = fake()->imageUrl(360, 360);
        }
        return [
            'nombre' => fake("es_ES")->firstName(),
            'apellidos' => fake("es_ES")->lastName(),
            'rutafoto' => $imagen
        ];
    }
}
