<?php
namespace App\admin\controllers;

use App\Solicitante;
use App\Tipo;

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
        View(compact('solicitante','tipos'));
    }

    public function store()
    {

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