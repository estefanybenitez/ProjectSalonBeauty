<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointment';
    protected $primaryKey = 'id_appointment';
    protected $fillable = ['date', 'time', 'fk_user','fk_status','fk_service'];
}
