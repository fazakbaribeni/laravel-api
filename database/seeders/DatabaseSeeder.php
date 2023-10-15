<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private $run = true;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // set Run to true on fresh install for Dummy Data Seeder.
        if ($this->run){
            \App\Models\Booking::factory(10)->create();
        }
    }
}
