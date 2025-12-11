<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'phone',
        'address',
    ];

    use HasFactory;

    public function consultas() {
        return $this-hasMany(Consulta::class);
    }
}
