<?php

namespace Modules\WidePayLaravelSistema1Challenge\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;

    protected $fillable = ['name', 'email', 'email_verified_at', 'password'];
    
    protected static function newFactory()
    {
        return \Modules\WidePayLaravelSistema1Challenge\Database\factories\ClientFactory::new();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function urls()
    {
        return $this->hasMany(Url::class);
    }


}