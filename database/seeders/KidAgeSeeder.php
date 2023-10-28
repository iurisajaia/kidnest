<?php

namespace Database\Seeders;

use App\Models\KidAge;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KidAgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!DB::table('kid_ages')->count()){
            foreach(['0-1', '0-2', '1-2', '2-3', '3-4', '4-5', '5-6'] as $age){
                KidAge::create ([
                    'age' => $age
                ]);
            }
        }
    }
}
