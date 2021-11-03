<?php

namespace Modules\WidePayLaravelSistema1Challenge\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'url', 'time', 'status_code', 'body'];
    
    protected static function newFactory()
    {
        return \Modules\WidePayLaravelSistema1Challenge\Database\factories\RequestFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
