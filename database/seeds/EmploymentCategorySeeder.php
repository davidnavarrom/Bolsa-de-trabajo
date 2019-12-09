<?php

use App\EmploymentCategory;
use Illuminate\Database\Seeder;

class EmploymentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('employment_categories')->insert([
            'name' => 'Administrativo'
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Informática'
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Marketing'
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Recursos humanos'
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Construcción'
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Contabilidad'
        ]);

//

    }
}
