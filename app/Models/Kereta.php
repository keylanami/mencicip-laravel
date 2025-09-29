<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kereta extends Model
{
    use HasFactory;

    protected $table = 'kereta';
    protected $primaryKey = 'id_kereta';
    public $timestamps = false;

    protected $fillable = [
        'nama_kereta',
        'no_kereta',
    ];


    function tiket(){
        return $this->hasMany(Tiket::class, 'id_kereta', 'id_kereta');
    }


}
