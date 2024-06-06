<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;
    protected $table = "komen";
    protected $primaryKey = "id_komen";
    protected $fillable = [
        "id_komen",
        "id_topik",
        "id",
        "komentar",
    ];

    public function topik() 
    { 
        return $this->belongsTo('App\Models\Topik', 'id_topik'); 
    }

    public function user() 
    { 
        return $this->belongsTo('App\Models\User','id'); 
    }
}
