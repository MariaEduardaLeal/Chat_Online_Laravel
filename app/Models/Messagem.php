<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Messagem extends Model
{
    use HasFactory;

    // Define o nome da tabela no banco de dados
    public $table = 'messagens';

    // Define os atributos que podem ser preenchidos em massa
    protected $fillable = ['id', 'user_id', 'text'];

    // Define o relacionamento "pertence a" com o modelo User
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define um acessor para formatar o atributo 'create_at' em um formato específico
    public function getTimeAttribute(): string {
        // Retorna a data e hora formatadas
        return date(
            'd M Y, H:i:s',
            // Converte a data e hora do atributo 'create_at' para um timestamp UNIX
            strtotime($this->attributes['created_at'])
        );
    }
}
