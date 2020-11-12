<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['idmarca','idcategoria','nombre','descripcion','foto','cantidad','precioventa','estado'];
    
    public function marca(){
        return $this->belongsTo('App\Models\Marca');
    }
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
    
}
