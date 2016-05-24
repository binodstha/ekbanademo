<?php

use Illuminate\Database\Seeder;

class StdinfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++){
            DB::table('stdinfos')->insert([ //,
                'stdname' => $faker->name,
                'stdbatch' => $faker->numberBetween($min = 2005, $max = 2015),
                'stdfaculty' => $faker->randomElement($array = ['Computer', 'Business', 'Management', 'Science']),
                'stdemail' => $faker->unique()->email,
                
            ]);
        }
    }
}
