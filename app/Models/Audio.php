<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon;

class Audio extends Model {

    use HasFactory;

    protected $table = 'audios';
    protected $primaryKey = 'audio_id';
    protected $casts = ['created_at' => 'datetime:d F, Y'];

}
