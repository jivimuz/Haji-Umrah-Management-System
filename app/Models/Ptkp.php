<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptkp extends Model
{
    use HasFactory;
    protected $table = 'm_ptkp';
    protected $guarded = ["id"];
    public $timestamps = false;
}
