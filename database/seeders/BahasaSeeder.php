<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahasa =[
            ['nama_bahasa'=>'Inggris'],
            ['nama_bahasa'=>'Indonesia'],
            ['nama_bahasa'=>'Spanyol'],
            ['nama_bahasa'=>'Rusia'],
        ];

        DB::table('bahasa')->insert($bahasa);
    }
}
