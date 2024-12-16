<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Casts\UpperCase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ultimo_acesso_at',
        'cpf',
        'matricula',
        'data_nascimento',
        'escola_id',
        'cargo_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'name' => UpperCase::class,
            'password' => 'hashed',
            'escola_id' => 'integer',
            'cargo_id' => 'integer',
        ];
    }

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }

    public function scopePesquisa($query, $pesquisa)
    {
        if ($pesquisa === '') {
            return;
        }

        return $query
            ->orWhere('id', 'LIKE', "%{$pesquisa}%")
            ->orWhere('name', 'LIKE', "%{$pesquisa}%")
            ->orWhere('escola_id', 'LIKE', "%{$pesquisa}%")
            ->orWhere('email', 'LIKE', "%{$pesquisa}%");
    }

    public function scopeName($query, $name)
    {
        if ($name === null or $name === '') {
            return;
        }

        return $query->whereName($name);
    }

    public function scopeEmail($query, $email)
    {
        if ($email === null or $email === '') {
            return;
        }

        return $query->whereEmail($email);
    }

    public function scopeEscola_id($query, $escola_id)
    {
        if (! empty($escola_id)) {
            $query->where('escola_id', $escola_id);
        }

        return $query;
    }
}
