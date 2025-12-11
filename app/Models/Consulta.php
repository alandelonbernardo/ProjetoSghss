<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'paciente_id',
        'medico_id',
        'date',
        'time',
        'observations',

    ];

    use HasFactory;

    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }

    public function medico() {
        return $this->belongsTo(Medico::class);
    }
}
