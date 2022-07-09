<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'nome',
        'categoria_id',
        'categoria',
        'arquivo',
        'link',
        'imagem',
        'idioma',
        'desenvolvedor',
        'plataforma',
        'senha',
        'data'
    ];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
}
