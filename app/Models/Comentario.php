<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    use HasFactory;

    protected $fillable = [
        'contenido',
        'id_usuario',
        'id_post',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }


}
