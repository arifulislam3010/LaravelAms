<?php

namespace App\Models\Recruit;

use Illuminate\Database\Eloquent\Model;

class Recruitorder extends Model
{
    protected $table = 'recruitingorder';

    public function paxId()
    {
        return $this->belongsTo('App\Models\Okala\Okala','paxid','id');
    }

    public function ft_pax()
    {
        return $this->belongsTo('App\Models\Fingerprint\Fingerprint','paxid','id');
    }
    public function mp_pax()
    {
        return $this->belongsTo('App\Models\Manpower\Manpower','paxid','id');
    }
    public function flight()
    {
        return $this->belongsTo('App\Models\Flight\Flight','paxid','id');
    }
    public function mofa()
    {
        return $this->belongsTo('App\Models\Mofa\Mofa','paxid','id');
    }
    public function musan()
    {
        return $this->belongsTo('App\Models\Musaned\Musaned','paxid','id');
    }
    public function medical()
    {
    return $this->belongsTo('App\Models\Medicalslip\Medicalslip','paxid','id');
    }
    public function visa()
    {
        return $this->belongsTo('App\Models\VisaStamp\VisaStamp','paxid','id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Contact\Contact','customer_id');
    }

    public function package()
    {

        return $this->belongsTo('App\Models\Inventory\Item','package_id');
    }

    public function registerserial()
    {

        return $this->belongsTo('App\Models\Visa\Visa','registerSerial_id');
    }

    public function invoice()
    {

        return $this->belongsTo('App\Models\Moneyin\Invoice','invoice_id');
    }

  /*  public  function date(){
        return $this->hasMany('App\Models\Okala\Okala','paxid','date');
    }*/

    public function updatedBy()
    {
        return $this->belongsTo('App\User','updated_by');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
