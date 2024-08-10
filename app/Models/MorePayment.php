<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MorePayment extends Model
{
    use HasFactory;
    protected $table = 't_morepayment';
    protected $guarded = ["id"];
    public $timestamps = false;
}
