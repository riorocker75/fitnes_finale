<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjaga extends Model
{
     use HasFactory;
     protected $table= "pengunjung";
    public $timestamps = false;
    protected $fillable =[
       'nama'
       
    ];
}
