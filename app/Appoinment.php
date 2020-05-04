<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    protected $fillable =['user_id',
                            'name',
                            'address',
                            'hospital_id',
                            'phone',
                            'date',
                            'status',
                            'data'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

}
