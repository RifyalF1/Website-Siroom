<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suka extends Model
{
    use HasFactory;
    protected $table = "suka";
    protected $primaryKey = "id_suka";
    protected $fillable = [
        "id_suka",
        "id_topik",
        "id",
    ];

    public function topik() 
    { 
        return $this->belongsTo('App\Models\Topik', 'id_topik'); 
    }
}
