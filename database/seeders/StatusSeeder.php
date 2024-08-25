<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array(
            [
                'name_status'=> 'activa',
                'created_at' => Carbon::now()
            ],
            [
                'name_status'=> 'cancelada',
                'created_at' => Carbon::now()
            ]

        );

        DB::table('status')->insert($data);
    }
}
