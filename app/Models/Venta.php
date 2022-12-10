<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $fillable = array(
                            'fecha_emision',
                            'precio_total',
                            'cliente_id',
                            'vendedor_id',
                            'empresa_id',
                            'tipo_documento_venta_id',
                            'estado_venta'

                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
     public function venta_detalle(){
        return $this->belongsTo(VentaDetalle::class);
    }
}
