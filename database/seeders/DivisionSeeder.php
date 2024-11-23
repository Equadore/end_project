<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Division::create(['name' => 'IT']);
        Division::create(['name' => 'HR']);
        Division::create(['name' => 'Finance']);
        Division::create(['name' => 'Marketing']);
        // tambahkan division lainnya
    }
}
