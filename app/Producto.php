<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
    	'nombre',
    	'id_subcateg',
    	'id_categ',
    	'id_user'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function sub()
    {
        return $this->belongsTo('App\Subcategoria', 'id_subcateg');
    }

    public function almacenes()
    {
        return $this->belongsToMany('App\Almacen')->withTimestamps();
    }
}
