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

    public function users()
    {
        return $this->belongsToMany(User::class, 'message_user', 'message_id', 'user_id')->withPivot('visualizado')->withTimestamps();
    }
}
