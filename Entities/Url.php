<?php

namespace Modules\WidePayLaravelSistema1Challenge\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'url'];
    
    protected static function newFactory()
    {
        return \Modules\WidePayLaravelSistema1Challenge\Database\factories\UrlFactory::new();
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
