<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class Solicitud extends Model {
    protected $table = 'solicitudes';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

}

