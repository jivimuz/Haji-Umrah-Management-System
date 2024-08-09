<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;
    protected $table = 'm_jobtype';
    protected $guarded = ["id"];
    public $timestamps = false;
}
