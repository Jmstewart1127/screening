<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'businessName', 'positionName', 'screening',
    ];
}
