<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'David';
        $user->surname = 'Navarro Muerza';
        $user->phone = '670652278';
        $user->status=1;
        $user->email='david@dnservices.es';
        $user->cvpath='ejemplo_cv.pdf';
        $user->password = Hash::make('david123');
        $user->save();

        $user->roles()->attach(1);


        $user2 = new User();
        $user2->name = 'Miguel';
        $user2->surname = 'Subero Martinez';
        $user2->phone = '678787854';
        $user2->status=1;
        $user2->cvpath='ejemplo_cv_2.pdf';
        $user2->email='miguel@dnservices.es';
        //$user2->roles()->sync(['user_id' => 2]);
        $user2->password = Hash::make('miguel123');
        $user2->save();

        $user2->roles()->attach(2);


        $user3 = new User();
        $user3->name = 'Marta';
        $user3->surname = 'Pérez Castillo';
        $user3->phone = '678342356';
        $user3->status=1;
        $user3->cvpath='ejemplo_cv_3.pdf';
        $user3->email='marta@dnservices.es';
        //$user3->roles()->sync(['user_id' => 3]);
        $user3->password = Hash::make('marta123');
        $user3->save();
        $user3->roles()->attach(2);

        $user4 = new User();
        $user4->name = 'Cristina';
        $user4->surname = 'Rodriguez Fuentes';
        $user4->phone = '690789423';
        $user4->status=1;
        $user4->cvpath='ejemplo_cv_4.pdf';
        $user4->email='cristina@dnservices.es';
        //$user4->roles()->sync(['user_id' => 4]);
        $user4->password = Hash::make('cristina123');
        $user4->save();
        $user4->roles()->attach(2);





    }
}
