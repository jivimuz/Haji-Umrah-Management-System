<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarialStatus extends Model
{
    use HasFactory;

    protected $table = "m_marialstatus";
    protected $guarded = ["id"];
    public $timestamps = false;
}
