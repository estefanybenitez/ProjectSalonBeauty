<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array(
            [
                'cost'=> 25.00,
                'paymentmethod'=> 'efectivo',
                'fk_user'=> 1,
                'fk_service'=> 1,
                'created_at' => Carbon::now()
            ],
           
        );

        DB::table('payment')->insert($data);
    }
}
