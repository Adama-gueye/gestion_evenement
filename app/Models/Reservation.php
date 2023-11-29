<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    function evenement() {
        return $this->belongsTo(Evenement::class);
     }
     function user() {
        return $this->belongsTo(User::class);
     }
}
