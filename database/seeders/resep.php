<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class resep extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ResepModels::create([
            'resep_id' => 1,
            'obatalkes_nama' => 'Paracetamol',
            'signa_nama' => '1X SEHARI 0.5 TABLET (MALAM)',
            'qty' => 1,
        ]);
    }
}
