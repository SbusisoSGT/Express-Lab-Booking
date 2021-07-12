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

        $lab = new Lab();
        $lab->name = 'Computer Science';
        $lab->number_of_computers = 30;
        $lab->building_id = 1;
        $lab->save();
        $lab->purposes()->attach([2, 3]);

        $lab = new Lab();
        $lab->name = 'English';
        $lab->number_of_computers = 33;
        $lab->building_id =  1;
        $lab->save();
        $lab->purposes()->attach([2, 3]);

        $lab = new Lab();
        $lab->name = 'CBE';
        $lab->number_of_computers =  43;
        $lab->building_id = 1;
        $lab->save();
        $lab->purposes()->attach([1, 2]);

        $lab = new Lab();
        $lab->name = 'E-learning Center';
        $lab->number_of_computers = 89;
        $lab->building_id =  1;    
        $lab->save();         
        $lab->purposes()->attach(1);

        $lab = new Lab();
        $lab->name = 'Small E-learning Center';
        $lab->number_of_computers = 22;
        $lab->building_id =  1; 
        $lab->save();            
        $lab->purposes()->attach(2);

        $lab = new Lab();
        $lab->name = 'Chemistry';
        $lab->number_of_computers = 10;  
        $lab->building_id =  1; 
        $lab->save();          
        $lab->purposes()->attach(6);

        $lab = new Lab();
        $lab->name = 'Study Hall';
        $lab->number_of_computers = 94;
        $lab->building_id =  2;   
        $lab->save();  
        $lab->purposes()->attach([1, 2, 3]);

        $lab = new Lab();
        $lab->name = 'BMS-301';
        $lab->number_of_computers =  80;
        $lab->building_id =  2;
        $lab->save();               
        $lab->purposes()->attach([1, 2, 3]);

        $lab = new Lab();
        $lab->name = 'BMS-303';
        $lab->number_of_computers = 30;
        $lab->building_id =  2;  
        $lab->save();             
        $lab->purposes()->attach([1, 2, 3]);

        $lab = new Lab();
        $lab->name = 'Physiology';
        $lab->number_of_computers = 20;
        $lab->building_id =  2;    
        $lab->save();           
        $lab->purposes()->attach([2, 3]);

        $lab = new Lab();
        $lab->name = 'Pharmacy';
        $lab->number_of_computers = 64;
        $lab->building_id =  2; 
        $lab->save();              
        $lab->purposes()->attach([2, 3]);

        $lab = new Lab();
        $lab->name = 'Physics';
        $lab->number_of_computers = 0;
        $lab->building_id =  2;  
        $lab->save();             
        $lab->purposes()->attach(3);

        $lab = new Lab();
        $lab->name = 'Main Hall';
        $lab->number_of_computers = 100;
        $lab->building_id =  3;   
        $lab->save();            
        $lab->purposes()->attach(1);

        $lab = new Lab();
        $lab->name = 'MTN Multimedia Center';
        $lab->number_of_computers = 42;
        $lab->building_id =  3;    
        $lab->save();           
        $lab->purposes()->attach([2, 3]);

        $lab = new Lab();
        $lab->name = 'Postgraduate';
        $lab->number_of_computers = 17;
        $lab->building_id = 3;     
        $lab->save();          
        $lab->purposes()->attach([1, 7]);

        $lab = new Lab();
        $lab->name = 'E-Learning';
        $lab->number_of_computers = 30;
        $lab->building_id =  4;     
        $lab->save();          
        $lab->purposes()->attach([1, 5]);
        
        $lab = new Lab();
        $lab->name = 'Glass-cabinet';
        $lab->number_of_computers = 24;
        $lab->building_id =  5;   
        $lab->save();            
        $lab->purposes()->attach(1);

        $lab = new Lab();
        $lab->name = 'Res-2B';
        $lab->number_of_computers = 108;
        $lab->building_id =  6;    
        $lab->save();           
        $lab->purposes()->attach([1, 2, 3]);

        $lab = new Lab();
        $lab->name = 'Statistics';
        $lab->number_of_computers = 17;
        $lab->building_id =  7;    
        $lab->save();           
        $lab->purposes()->attach([2, 3]);

        $lab = new Lab();
        $lab->name = 'South Point-Lab 1';
        $lab->number_of_computers = 20;
        $lab->building_id =  8;    
        $lab->save();           
        $lab->purposes()->attach([1, 5]);

        $lab = new Lab();
        $lab->name = 'South Point-Lab 2';
        $lab->number_of_computers = 26;
        $lab->building_id =  8;   
        $lab->save();            
        $lab->purposes()->attach(1);
    }
}