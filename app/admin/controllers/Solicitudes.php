<?php
namespace App\admin\controllers;

use App\Categoria;
use App\DetalleSolicitud;
use App\Organismo;
use App\Requerimientos;
use App\Solicitante;
use App\Solicitud;
use App\Tipo;
use Carbon\Carbon;

class Solicitudes
{
    function __construct()
    {
        Role('admin');
    }

    public function index()
    {
        View();
    }

    public function create()
    {
        $solicitante = Solicitante::find(Uri(5));
        $tipos = Tipo::all();
        View(compact('solicitante','tipos','requerimientos'));
    }

    public function documentos()
    {
        extract($_POST);
        list($organismoid, $tipo_solicitud_id) = explode('-', $tipo_solicitud
            );
        $data['organismo_id'] = $organismo_id;
        $data['solicitante_id'] = $solicitante_id;
        $data['tipo_solicitud_id'] = $tipo_solicitud_id;
        $data['requerimiento_categoria_id'] = $requerimiento_categoria_id;
        $data['requerimientos'] = Requerimientos::where('tipo_solicitud_id',$tipo_solicitud_id)->get();

        //Arr($requerimientos);
        View($data);
    }

    public function combo()
    {
        extract($_GET);
        $organismos = Organismo::where('id',$organismo_id)->get();
        //var_dump($parroquias);
        echo "<option value=''>ORGANISMO</option>";
        echo "<optgroup label='-------'></optgroup>";
        foreach ($organismos as $key => $organismo) {
            echo '<option value="'.$organismo->id.'">'.$organismo->tipo.'</option>';
        }
    }

    public function categorias()
    {
        extract($_GET);
        $categorias = Categoria::where('tipo_solicitud_id',$tipo_id)->get();
        //var_dump($parroquias);
        echo "<option value=''>CATEGORIAS</option>";
        echo "<optgroup label='-------'></optgroup>";
        echo "<option value='0'>NINGUNA</option>";
        foreach ($categorias as $key => $categoria) {
            echo '<option value="'.$categoria->id.'">'.$categoria->nombre.'</option>';
        }
    }

    public function store()
    {
        //Arr($_POST);
        //TABLA SOLICITUDES
        extract($_POST);
        $solicitud = new Solicitud;
        $solicitud->organismo_id = $organismo_id;
        $solicitud->requerimiento_categoria_id = $requerimiento_categoria_id;
        $solicitud->solicitante_id = $solicitante_id;
        $solicitud->tipo_solicitud_id = $tipo_solicitud_id;
        $solicitud->fecha_hora_registrado = Carbon::now();
        $solicitud->estatus = 2;
        $solicitud->save();

        //TABLA DETALLES_SOLICITUD
        foreach ($requerimientos as $key => $r) 
        {
            $detalle = new DetalleSolicitud;
            $detalle->solicitud_id = $solicitud->id;
            //$detalle->tipo_requerimiento_id = $tipo_requerimiento_id;
            $detalle->requerimiento_categoria_id = $solicitud->requerimiento_categoria_id;
            $detalle->requerimiento_id =$r;
            $detalle->consignado = 1;
            $detalle->save();
            //echo $r;
            //echo "<hr>";
        }
        echo $solicitante_id;

/*        if($solicitante->id and $detalle->id)
        {
            Success('');
        }
        else
        {

        }*/
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        View(compact('id'));
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}