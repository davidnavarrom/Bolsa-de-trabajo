<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobOffer extends Model
{
    #TYPE_JOB
    const COMPLETE = "complete";
    const PART = "part";

    #STATUS
    const ACTIVE = "active";
    const DISABLED = "disabled";
    const FINISHED = "finished";

    protected $fillable = [
        'name', 'description','salary','type_working',
    ];

    public function employmentCategories() {
        return $this->belongsToMany('App\EmploymentCategory','categories_job','job_offers_id','employment_categories_id');
    }


    public function candidatures()
    {
        return $this->hasMany('App\Candidature','job_offers_id');
    }

    public function getCreatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public static function getTypeWorkingAttribute($value) {
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

    public function getStatusAttribute($value) {
        switch($value){
            case JobOffer::ACTIVE:
                return "Activa";
                break;
            case JobOffer::DISABLED:
                return "Desactivada";
                break;
            case JobOffer::FINISHED:
                return "Finalizada";
                break;
            default:
                return "";
        }
    }

    public static function getPossibleTypeWorking(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM job_offers WHERE Field = "type_working"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);

        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $value  = trim($value, "'");
            $valueed = self::getTypeWorkingAttribute($value);
            $values[$value] = $valueed;
        }
        return $values;
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
