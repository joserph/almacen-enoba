<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
    	'nombre',
    	'estado',
    	'id_user'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function subcategorias()
    {
        return $this->hasMany('App\Subcategoria', 'id_categoria');
    }
}
