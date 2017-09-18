<?php
namespace App\admin\controllers;

use App\Solicitud;
use App\Tipo;
use App\admin\models\ConsultasModel;
use Controller,View,Token,Session,Arr,Message,Redirect;

class Consultas extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		View::ver('admin/consultas/index');
    }

    public function cerradas()
    {
        extract($_GET);
        $usuario = (object) Session::get('current_user');
        $organismo_id = $usuario->organismo_id; 

        if(isset($tipo))
        {
            $solicitudes = Solicitud::where('tipo_solicitud_id',$tipo)
            ->where('estatus','!=',1)
            ->where('organismo_id',$organismo_id)
            ->get();
        }
        else
        {
            $solicitudes = Solicitud::where('organismo_id',$organismo_id)
            ->where('estatus','!=',1)
            ->get();
        }
        
        $tipos = Tipo::all();
        View(compact('solicitudes','tipos'));
    }
}