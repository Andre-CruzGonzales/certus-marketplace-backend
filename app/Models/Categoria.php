<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Categoria extends Model
{
    protected $table = 'categoria';
    protected $fillable = array(
                            'nombre',
                            'url_imagen',
                            'estado_registro'

                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
    public function getUrlImagenAttribute($value)
    {
        if ($value) {
            return url(Storage::url('public/categorias' . '/' . $value));
        }
        return $value;
    }
    public function productos(){
        return $this->hasMany(Producto::class)->where('publicado',1);
    }
}
