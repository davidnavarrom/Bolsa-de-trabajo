<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $appends = ['originalstatus'];

    const PENDING = "pending";
    const SELECTED = "selected";
    const NOTSELECTED = "notselected";


    public function jobOffer()
    {
        return $this->belongsTo('App\JobOffer','job_offers_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

//    public function users()
//    {
//        return $this->belongsToMany(User::class, 'user_beers_data', 'beer_id', 'user_id');
//    }




    public function getOriginalStatusAttribute() {
        return $this->getOriginal('status');
    }

    public function getStatusAttribute($value) {
        switch($value){
            case Candidature::PENDING:
                return "Pendiente";
                break;
            case Candidature::SELECTED:
                return "Seleccionado";
                break;
            case Candidature::NOTSELECTED:
                return "No seleccionado";
                break;
            default:
                return "";

        }

    }
}
