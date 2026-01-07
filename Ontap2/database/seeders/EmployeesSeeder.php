<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $department_ids = DB::table("departments")->pluck("id")->toArray();
        $f = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table("employees")->insert([
                "department_id" => $f->randomElement($department_ids),
                "name" => $f->name,
                "email" => $f->safeEmail(),
                "phone" => $f->phoneNumber,
                "position" => $f->randomElement(["pho ban", "truong ban", "thanh vien"]),
                "salary" => $f->numberBetween(5000000, 100000000),

            ]);
        }
    }
}