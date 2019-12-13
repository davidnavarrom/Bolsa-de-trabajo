<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    public function employmentCategories() {
        return $this->belongsToMany('App\EmploymentCategory','categories_job','job_offers_id','employment_categories_id');
    }
}
