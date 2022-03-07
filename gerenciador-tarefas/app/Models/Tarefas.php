<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model{

    protected $fillable = [
        'titulo',
        'motivacao',
        'detalhamento',
        'usuarioId',
        'created_at',
        'updated_at',
        'finalizada',
        'previsaoEntrega',
        'status'
    ];
    protected $table = 'tarefas';
    public $timestamps = false;
}

?>
