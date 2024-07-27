<?php

namespace Database\Seeders;

use App\Models\gene;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('genes')->insert([
        //     ['name'=>'Hài'],
        //     ['name'=>'Hành động'].
        //     ['name'=>'Tình cảm'],
        //     ['name'=>'Kiếm hiệp'],
        // ]);
        // gene::create([
        //     'name'=>'Hài'
        // ]);
        gene::create([
            'name'=>'Hành động'
        ]);
        gene::create([
            'name'=>'Tình Cảm'
        ]);
        gene::create([
            'name'=>'Kiếm Hiệp'
        ]);
    }
}
