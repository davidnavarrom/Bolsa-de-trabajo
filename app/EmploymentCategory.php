<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentCategory extends Model
{
    protected $fillable = ['name','slug','description'];

    public function jobOffers() {
        return $this->belongsToMany('App\JobOffer','categories_job','employment_categories_id','job_offers_id');
    }
}
