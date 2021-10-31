<?php

namespace Modules\WidePayLaravelSistema1Challenge\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'email_verified_at', 'password'];
    
    protected static function newFactory()
    {
        return \Modules\WidePayLaravelSistema1Challenge\Database\factories\ClientFactory::new();
    }


    public function urls()
    {
        return $this->hasMany(Url::class);
    }

}