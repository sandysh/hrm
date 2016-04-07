<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punch extends Model
{
   // protected $fillable = ['punch_in','punch_out','punch_note'];

    protected $guarded = ['id'];

    protected $table = 'records';
}
