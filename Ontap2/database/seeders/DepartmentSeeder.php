<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $f = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table("departments")->insert([
                'name' => $f->randomElement(["phong bao ve ", 'phong ti hoc', 'phong giao duc', 'phong giao ban']),
                'location' => $f->randomElement(['toa A1', 'Toa A2', "Toa b1", "Toa B2"]),
                "manager" => $f->name,

            ]);


        }
    }
}