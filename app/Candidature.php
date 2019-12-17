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
        return $this->hasOne('App\JobOffer','id');
    }

    public function user()
    {
        return $this->hasOne('App\User');
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
