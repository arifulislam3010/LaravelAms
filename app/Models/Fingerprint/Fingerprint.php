<?php

namespace App\Models\Fingerprint;

use Illuminate\Database\Eloquent\Model;

class Fingerprint extends Model
{
    protected $table = 'fingerprint';

    protected $fillable = [
        'assignedDate',
        'receivingDate',
        'comment',
        'paxid',
        'created_by',
        'updated_by',
    ];

    public function paxId()
    {
        return $this->belongsTo('App\Models\Recruit\Recruitorder','paxid');
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
