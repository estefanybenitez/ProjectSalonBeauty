<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array(
            [
                'name_category'=> 'Alisados',
                'img' => $this->storeImage('alisado.jpg'),
                'description' => 'Descripción de la categoría 1',
                'created_at' => Carbon::now()
            ],
            [
                'name_category'=> 'Cortes',
                'img' => $this->storeImage('corte2.jpg'),
                'description' => 'Descripción de la categoría 2',
                'created_at' => Carbon::now()
            ],

        );
        

        DB::table('category')->insert($data);
    }
    private function storeImage($fileName)
    {
        $filePath = 'public/images/' . $fileName;

        // Almacena la imagen en el almacenamiento
        Storage::put($filePath, file_get_contents(public_path('img/' . $fileName)));

        return Storage::url($filePath);
    }
}
