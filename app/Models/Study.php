<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;
    protected $table = 'm_study';
    protected $guarded = ["id"];
    public $timestamps = false;
}
