<?php

use Illuminate\Database\Seeder;
use App\Lab;
class LabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Lab::create(
            ['lab_name' => 'Computer Science',
             'number_of_computers' => 30,
             'purpose' => 'Teaching/ Practicals',
             'building_id' => 1             
            ]
        );
        Lab::create(
            ['lab_name' => 'English',
             'number_of_computers' => 33,
             'purpose' => 'Teaching/ Practicals',
             'building_id' => 1             
            ]
        );
        Lab::create(
            ['lab_name' => 'CBE',
             'number_of_computers' => 43,
             'purpose' => 'Teaching/ General Use',
             'building_id' => 1             
            ]
        );

        Lab::create(
            ['lab_name' => 'E-learning Center',
             'number_of_computers' => 89,
             'purpose' => 'Teaching',
             'building_id' => 1             
            ]
        );

        Lab::create(
            ['lab_name' => 'Small E-learning Center',
             'number_of_computers' => 22,
             'purpose' => 'Teaching',
             'building_id' => 1             
            ]
        );

        Lab::create(
            ['lab_name' => 'Chemistry',
             'number_of_computers' => 10,
             'purpose' => 'Postgraduate',
             'building_id' => 1             
            ]
        );

        Lab::create(
            ['lab_name' => 'Study Hall',
             'number_of_computers' => 94,
             'purpose' => 'Teaching/ Practicals/ General Use',
             'building_id' => 2             
            ]
        );

        Lab::create(
            ['lab_name' => 'BMS-301',
             'number_of_computers' => 80,
             'purpose' => 'Teaching/ Practicals/ General Use',
             'building_id' => 2             
            ]
        );

        Lab::create(
            ['lab_name' => 'BMS-303',
             'number_of_computers' => 30,
             'purpose' => 'Teaching/ Practicals/ General Use',
             'building_id' => 2             
            ]
        );

        Lab::create(
            ['lab_name' => 'Physiology',
             'number_of_computers' => 20,
             'purpose' => 'Teaching/ Practicals',
             'building_id' => 2             
            ]
        );

        Lab::create(
            ['lab_name' => 'Pharmacy',
             'number_of_computers' => 64,
             'purpose' => 'Teaching/ Practicals',
             'building_id' => 2             
            ]
        );

        Lab::create(
            ['lab_name' => 'Physics',
             'number_of_computers' => 0,
             'purpose' => 'Practicals',
             'building_id' => 2             
            ]
        );

        Lab::create(
            ['lab_name' => 'Main Hall',
             'number_of_computers' => 100,
             'purpose' => 'General Use',
             'building_id' => 3             
            ]
        );

        Lab::create(
            ['lab_name' => 'MTN Multimedia Center',
             'number_of_computers' => 42,
             'purpose' => 'Teaching/ Practicals',
             'building_id' => 3             
            ]
        );

        Lab::create(
            ['lab_name' => 'Postgraduate',
             'number_of_computers' => 17,
             'purpose' => 'General Use/ Research',
             'building_id' => 3             
            ]
        );

        Lab::create(
            ['lab_name' => 'Glass-cabinet',
             'number_of_computers' => 24,
             'purpose' => 'General Use',
             'building_id' => 5             
            ]
        );

        Lab::create(
            ['lab_name' => 'E-Learning',
             'number_of_computers' => 30,
             'purpose' => 'Training/ General Use',
             'building_id' => 4             
            ]
        );

        Lab::create(
            ['lab_name' => 'Res-2B',
             'number_of_computers' => 108,
             'purpose' => 'Teaching/ Practicals/ General Use',
             'building_id' => 6             
            ]
        );

        Lab::create(
            ['lab_name' => 'Statistics',
             'number_of_computers' => 17,
             'purpose' => 'Teaching/ Practicals',
             'building_id' => 7             
            ]
        );

        Lab::create(
            ['lab_name' => 'South Point-Lab 1',
             'number_of_computers' => 20,
             'purpose' => 'Training/ General Use',
             'building_id' => 8             
            ]
        );

        Lab::create(
            ['lab_name' => 'South Point-Lab 2',
             'number_of_computers' => 26,
             'purpose' => 'General Use',
             'building_id' => 8             
            ]
        );
    }
}