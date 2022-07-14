<?php

use Illuminate\Database\Seeder;
// importo la libreria FakerPHP per inserire dati fake in tabella
use Faker\Generator as Faker;
use App\Train;


class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) // <-- dependecy injection
    {
         $companies = ['atac', 'cotral', 'flixBuss'];
       
          
          for($i = 0; $i < 10; $i++){

          
            $newTrain = new Train();
            // $newTrain->company='atac';
            $newTrain->wagons_number = rand(2, 100);
            // inserimento con opzioni in array
            $newTrain->company =$companies[rand(0, count($companies) - 1)];

            // da libreria FakerPHP
            $newTrain->departure_station = $faker->city();
            $newTrain->departure_date= $faker->dateTimeThisMonth('+ 60 days');
            $newTrain->arrival_date = $faker->dateTimeThisMonth('+ 60 days');
            $newTrain->departure_time = $faker->time();
            $newTrain->arrival_time = $faker->time();
            $newTrain->train_code = $faker->bothify('?-####');
            $newTrain->is_in_time = $faker->boolean();
            $newTrain->is_deleted = $faker->boolean();

            $newTrain->save();
          }   
    }
}
// php artisan db:seed --class=TrainsTableSeeder