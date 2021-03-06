<?php
namespace App\admin\controllers;

class BancoPersonal
{
    function __construct()
    {
        Role('admin');
    }

    // localhost/proyecto/modulo/principal
    public function index()
    {
        View(Repo());
    }

    // localhost/proyecto/modulo/principal/create
    public function create()
    {
        View();
    }

    // localhost/proyecto/modulo/principal/
    public function store()
    {
        //se manda los datos del formulario al repositorio para ser guardados
        RepoConfirm($_POST,'bancoPersonal','bancoPersonal/create');
    }

    // localhost/proyecto/modulo/principal/ID
    public function show($id)
    {
        View(Repo($id));
    }

    // localhost/proyecto/modulo/principal/ID/edit
    public function edit($id)
    {
        View(Repo($id));
    }

    // localhost/proyecto/modulo/principal/ID/put
    public function update($id)
    {
        //Actualizar datos con el ID
    }

    // localhost/proyecto/modulo/principal/ID/delete
    public function destroy($id)
    {
        //Borrar un registro usando el ID
    }
}