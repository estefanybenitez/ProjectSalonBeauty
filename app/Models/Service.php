<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $primaryKey = 'id_service';
    protected $fillable = ['name_service', 'timeframe','img', 'description','precio','fk_category'];
}
