<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array(
            [
                'date'=> '2023-06-01',
                'time'=> '13:00',
                'fk_user'=> 1,
                'fk_status'=> 1,
                'fk_service'=> 1,
                'created_at' => Carbon::now()
            ],

        );

        DB::table('appointment')->insert($data);
    }
}
