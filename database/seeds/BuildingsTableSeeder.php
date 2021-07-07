<?php

use Illuminate\Database\Seeder;
use App\Building;

class BuildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Building::create(['name' => 'NSB']);
        Building::create(['name' => 'BMS']);
        Building::create(['name' => 'Library']);
        Building::create(['name' => 'Clinical Pathology']);
        Building::create(['name' => 'Dental']);
        Building::create(['name' => 'Residence-2B']);
        Building::create(['name' => 'Pink Building']);
        Building::create(['name' => 'South Point']);
    }
}
