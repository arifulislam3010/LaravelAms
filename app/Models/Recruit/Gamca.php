<?php

namespace App\Models\Recruit;

use Illuminate\Database\Eloquent\Model;

class Gamca extends Model
{
    protected $table='gamca';

    protected $fillable=[
        'submission_date',
        'delivary_date',
        'comment',
        'recruit_id',
        'created_by',
        'updated_by'
    ];


    public function recruit(){

        return $this->belongsTo('App\Models\Recruit\Recruitorder','recruit_id');
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
