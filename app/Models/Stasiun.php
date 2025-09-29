<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stasiun extends Model
{
    use HasFactory;

    protected $table = 'stasiun';
    protected $primaryKey = 'id_stasiun';
    public $timestamps = false;

    protected $fillable = [
        'nama_stasiun',
        'kota',
    ];

    

}
