<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppoinmentTest extends Model
{
    protected $fillable =['appoinment_id','test_id','cost'];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
