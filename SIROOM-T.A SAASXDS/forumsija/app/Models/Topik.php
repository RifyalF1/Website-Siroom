<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;
    protected $table = "topik";
    protected $primaryKey = "id_topik";
    protected $fillable = [
        "id_topik",
        "judul",
        "deskripsi",
        "gambar",
        "id",
    ];

    public function user() 
    { 
        return $this->belongsTo('App\Models\User','id'); 
    }

    public function suka() 
    { 
        return $this->hasMany('App\Models\Suka', 'id_topik'); 
    }

    public function komen() 
    { 
        return $this->hasMany('App\Models\Komen', 'id_topik'); 
    }

}
