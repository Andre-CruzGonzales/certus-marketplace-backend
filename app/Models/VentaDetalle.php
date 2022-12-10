<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
   protected $table = 'venta_detalle';
    protected $fillable = array(
                            'catalogo_venta_id',
                            'venta_id',
                            'precio_venta',
                            'nombre',
                            'cantidad',
                            'precio_unitario',
                            'estado_venta',
                            'estado_registro',

                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
}
