<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table = 'subcategorias';

    protected $fillable = [
    	'nombre',
    	'estado',
    	'id_categoria',
    	'id_user'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'id_categoria');
    }

    public function productos()
    {
        return $this->hasMany('App\Producto', 'id_subcateg');
    }
}
