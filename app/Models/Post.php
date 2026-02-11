<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    protected $table = 'posts';

    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen'
    ];


    

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function comentario()
    {
        return $this->hasMany(Comentario::class, 'id_post');
    }


}
