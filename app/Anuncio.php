<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
	protected $primaryKey='id_anuncio';

	public $timestamps = false;
    
	protected $fillable = ['titulo','cuerpo','precio','url_imagen','creator_id'];

	public function user()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }
}