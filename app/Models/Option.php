<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
     protected $table= "option";
    public $timestamps = false;
    protected $fillable =[
     'name'
    ];

}
