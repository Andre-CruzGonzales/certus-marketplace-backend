<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Producto extends Model
{
    protected $table = 'producto';
    protected $fillable = array(
                            'nombre',
                            'descripcion',
                            'precio',
                            'imagen',
                            'estado_registro',
                            'publicado',
                            'categoria_id'

                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
    public function getImagenAttribute($value)
    {
        if ($value) {
            return url(Storage::url('public/productos' . '/' . $value));
        }
        return $value;
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
