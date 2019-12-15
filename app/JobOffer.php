<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    const COMPLETE = "complete";
    const PART = "part";





    public function employmentCategories() {
        return $this->belongsToMany('App\EmploymentCategory','categories_job','job_offers_id','employment_categories_id');
    }


    public function getCreatedAtAttribute($value){

        return \Carbon\Carbon::parse($value)->format('d-m-Y');


    }

    public function getTypeWorkingAttribute($value) {

        switch($value){
            case JobOffer::COMPLETE:
                return "Completa";
                break;
            case JobOffer::PART:
                return "Parcial";
                break;
            default:
                return "";

        }

    }
}
