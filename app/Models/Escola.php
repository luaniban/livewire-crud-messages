<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escola extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'regiao',
        'bairro',
        'endereco',
        'telefone',
        'status',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'escola_id');
    }

    public function scopePesquisa($query, $pesquisa)
    {
        if ($pesquisa === '') {
            return;
        }

        return $query->whereAny(
            ['name', 'endereco', 'bairro', 'regiao', 'telefone'],
            'LIKE',
            "%{$pesquisa}%"
        );
    }
}
