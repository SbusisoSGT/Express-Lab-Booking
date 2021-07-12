<?php

use Illuminate\Database\Seeder;
use App\Purpose;

class PurposesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purpose = new Purpose;
        $purpose->name = "General Use";
        $purpose->save();
        
        $purpose = new Purpose;
        $purpose->name = "Teaching";
        $purpose->save();

        $purpose = new Purpose;
        $purpose->name = "Practicals";
        $purpose->save();

        $purpose = new Purpose;
        $purpose->name = "Exams";
        $purpose->save();

        $purpose = new Purpose;
        $purpose->name = "Training";
        $purpose->save();

        $purpose = new Purpose;
        $purpose->name = "Postgraduate";
        $purpose->save();

        $purpose = new Purpose;
        $purpose->name = "Research";
        $purpose->save();
    }
}
