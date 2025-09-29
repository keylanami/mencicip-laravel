<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';
    public $timestamps = false;

    protected $fillable = [
        'id_kereta',
        'id_stasiun_asal',
        'id_stasiun_tujuan',
        'tanggal_keberankatan',
        'waktu_keberangkatan',
    ];


    public function kereta(){
        return $this->belongsTo(Kereta::class, 'id_kereta');
    }

    public function stasiunAsal(){
        return $this->belongsTo(Stasiun::class, 'id_stasiun_asal');
    }

    public function stasiunTujuan(){
        return $this->belongsTo(Stasiun::class, 'id_stasiun_tujuan');
    }

}
