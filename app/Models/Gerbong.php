<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerbong extends Model
{
    use HasFactory;

    protected $table = 'gerbong';
    protected $primaryKey = 'id_tipe_gerbong';
    public $timestamps = false;

    protected $fillable = [
        'nama_tipe_gerbong',
        'kapasitas_penumpang',
        'id_kereta'
    ];

    public function kereta(){
        return $this->belongsTo(Kereta::class, 'id_kereta');
    }
}
