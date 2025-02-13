<?php

namespace App\Models\MedicalSlip;

use Illuminate\Database\Eloquent\Model;

class Medicalslip extends Model
{
    protected $table = 'medicalslip';

    protected $fillable = [
        'pax_id',
        'medical_centre',
        'testdate',
        'status',
        'comment',
        'created_by',
        'updated_by',
    ];
    public function paxId()
    {
        return $this->belongsTo('App\Models\Recruit\Recruitorder','pax_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User','created_by');
    }

}
