<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class Tipo extends Model {
    protected $table = 'tipo_solicitud';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

}

