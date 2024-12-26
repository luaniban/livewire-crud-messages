<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name',
        'destinatario',
        'descricao',
        'file',
        'dataAt',
        'status',
        'titulo',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
