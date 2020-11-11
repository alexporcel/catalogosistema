<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [
        'idproveedor','precio','descripcion','cantidad','fecha'
    ];
    public function proveedor(){
        return $this->belongsTo('App\Proveedor');
    }
}