<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Lecturer']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Super-Admin']);
    }
}
