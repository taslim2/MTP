<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalTest extends Model
{
    protected $fillable = ['hospital_id','test_id','cost'];



    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

}
