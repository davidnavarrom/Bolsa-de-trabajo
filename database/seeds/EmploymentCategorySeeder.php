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
            'name' => 'Administrativo',
            'slug' => 'administrativo',
            'description' => ''
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Informática',
            'slug' => 'informatica',
            'description' => ''
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Marketing',
            'slug' => 'marketing',
            'description' => ''
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Recursos humanos',
            'slug' => 'recursoshumanos',
            'description' => ''
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Construcción',
            'slug' => 'construccion',
            'description' => ''
        ]);

        DB::table('employment_categories')->insert([
            'name' => 'Contabilidad',
            'slug' => 'contabilidad',
            'description' => ''
        ]);

//

    }
}
