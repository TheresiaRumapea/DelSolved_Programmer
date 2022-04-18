<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifStatus extends Model
{
    use HasFactory;

    public function notif() {
        return $this->belongsTo(Notif::class);
    }
}
