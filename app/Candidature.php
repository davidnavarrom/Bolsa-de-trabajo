<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{

    const PENDING = "pending";
    const SELECTED = "selected";
    const NOTSELECTED = "notselected";


    public function jobOffer()
    {
        return $this->belongsTo('App\JobOffer','job_offers_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
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
