<?php

use Illuminate\Database\Seeder;
use App\Candidature;
class CandidaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $candidature = new Candidature();
        $candidature->status = 'pending';
        $candidature->user_id = 2;
        $candidature->job_offers_id = 1;
        $candidature->save();

        $candidature2 = new Candidature();
        $candidature2->status = 'pending';
        $candidature2->user_id = 2;
        $candidature2->job_offers_id = 2;
        $candidature2->save();



    }
}
