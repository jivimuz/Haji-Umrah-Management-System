<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;
    protected $table = "t_jamaah";
    protected $guarded = ["id"];
    // public $timestamps = true;
}
