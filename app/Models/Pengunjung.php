<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
      use HasFactory;
     protected $table= "pengunjung";
    public $timestamps = false;
    protected $fillable =[
       
       'nama'
    ];
}
