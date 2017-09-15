<?php
namespace App\admin\controllers;

use App\Categoria;
use App\DetalleSolicitud;
use App\Organismo;
use App\Paso;
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
        extract($_GET);
        
        if(isset($tipo))
        {
            $solicitudes = Solicitud::where('tipo_solicitud_id',$tipo)->where('estatus',1)->get();
        }
        else
        {
            $solicitudes = Solicitud::all();
        }
        
        $tipos = Tipo::all();
        View(compact('solicitudes','tipos'));
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
        echo "<option value=''></option>";
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
        echo "<option value=''></option>";
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
        $solicitud->estatus = 1;
        $solicitud->save();

        //tabla pivote de pasos
        $paso = new Paso;
        $paso->solicitud_id = $solicitud->id;
        $paso->fecha_hora_registro = Carbon::now();
        $paso->paso = 2;
        $paso->save();

        //TABLA DETALLES_SOLICITUD LOS DOCUMENTOS A CONSIGNAR
        foreach ($requerimientos as $key => $r) 
        {
            $detalle = new DetalleSolicitud;
            $detalle->solicitud_id = $solicitud->id;
            //$detalle->tipo_requerimiento_id = $tipo_requerimiento_id;
            $detalle->requerimiento_categoria_id = $solicitud->requerimiento_categoria_id;
            $detalle->requerimiento_id =$r;
            $detalle->consignado = 1;
            $detalle->save();
        }
        //echo $solicitante_id;

        if($solicitud->id and $detalle->id)
        {
            Success('solicitantes/'.$solicitante_id,'La solicitud fue realizada..!');
        }
        else
        {
            Error('solicitantes/'.$solicitante_id,'Error al crear solicitud!');
        }
    }

    public function show($id)
    {
        $solicitud = Solicitud::find($id);
        View(compact('solicitud'));
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