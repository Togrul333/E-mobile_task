<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel_district extends Model
{
    use HasFactory;
    protected $fillable=['user_id','name','date_of_travel','duration'];
}
