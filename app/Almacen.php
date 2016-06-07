<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacenes';

    protected $fillable = [
    	'nombre', 
    	'id_user'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto')->withTimestamps();
    }
}
