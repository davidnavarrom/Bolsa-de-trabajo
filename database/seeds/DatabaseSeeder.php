<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EmploymentCategorySeeder::class);
        $this->call(JobOfferSeeder::class);
        $this->call(CandidaturesTableSeeder::class);



    }
}
