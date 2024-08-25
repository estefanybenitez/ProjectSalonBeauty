<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array(
            [
                'name_service'=> 'Alisados Argan',
                'timeframe'=> '2:00',
                'img' => $this->storeImage('alisado.jpg'),
                'description' => 'Descripción del servicio 2',
                'precio'=>25,
                'fk_category'=> 1,
                'created_at' => Carbon::now()
            ],
            [
                'name_service'=> 'Alisados Argan',
                'timeframe'=> '2:00',
                'img' => $this->storeImage('cortepelocorto.jpg'),
                'description' => 'Descripción del servicio 2',
                'precio'=>25,
                'fk_category'=> 2,
                'created_at' => Carbon::now()
            ],
            [
                'name_service'=> 'Alisados Keratina',
                'timeframe'=> '2:00',
                'img' => $this->storeImage('corte1.webp'),
                'description' => 'Descripción del servicio 2',
                'precio'=>25,
                'fk_category'=> 2,
                'created_at' => Carbon::now()
            ],
           

        );
        

        DB::table('service')->insert($data);
    }
    private function storeImage($fileName)
    {
        $filePath = 'public/images/' . $fileName;

        // Almacena la imagen en el almacenamiento
        Storage::put($filePath, file_get_contents(public_path('img/' . $fileName)));

        return Storage::url($filePath);
    }
}
