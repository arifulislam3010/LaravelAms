<?php

namespace App\Models\Visa;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $table = "visaentrys";

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function Company()
    {
        return $this->belongsTo('App\Models\Company\Company','company_id');
    }

    public function Contact()
    {
        return $this->belongsTo('App\Models\Contact\Contact','local_Reference');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\User','updated_by');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
