<?php

namespace App\Models\MedicalSlipForm;

use Illuminate\Database\Eloquent\Model;

class MedicalSlipForm extends Model
{
    protected $table = 'medical_slip_form';

    protected $fillable = [
        'dateOfApplication',
        'country_name',
        'created_by',
        'updated_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
