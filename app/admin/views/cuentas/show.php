<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">DATOS DE USUARIO</h3>
  </div>
  <div class="panel-body">
    <?php if (!$usuario->banco_personal): ?>
    <div class="row">
      <div class="col-lg-4 dl-horizontal">
        <dt>Nombre:</dt>
        <dd><?php echo $usuario->name ?></dd>
      </div>
      <div class="col-lg-4 dl-horizontal">
        <dt>Email:</dt>
        <dd><?php echo $usuario->email ?></dd>
      </div>
      <div class="col-lg-4 dl-horizontal">
        <dt>Role:</dt>
        <dd><?php echo $usuario->role?> </dd>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-4">
        <a class="btn btn-success" href="<?php echo baseUrl ?>admin/personal/create/<?php echo $usuario->id ?>">  <i class="fa fa-plus"></i> Agregar Datos Personales</a>
      </div>
    </div>
    <?php else: ?>
    <div class="row">
      <div class="col-lg-4 dl-horizontal">
        <dt>Nombre:</dt>
        <dd><?php echo $usuario->name ?></dd>
      </div>
      <div class="col-lg-4 dl-horizontal">
        <dt>Cedula:</dt>
        <dd><?php echo $usuario->banco_personal->nacionalidad ?>-<?php echo $usuario->banco_personal->cedula ?> </dd>
      </div>
      <div class="col-lg-4 dl-horizontal">
        <dt>Telefono celular:</dt>
        <dd><?php echo $usuario->banco_personal->telefono_celular ?> </dd>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-4 dl-horizontal">
        <dt>Telefono fijo:</dt>
        <dd><?php echo $usuario->banco_personal->telefono_fijo ?> </dd>
      </div>
      <div class="col-lg-4 dl-horizontal">
        <dt>Fecha nacimiento:</dt>
        <dd><?php echo $usuario->banco_personal->fecha_nacimiento ?> </dd>
      </div>
      <div class="col-lg-3 dl-horizontal">
        <dt>Edad:</dt>
        <dd>
        <?php list($dia,$mes,$ano) = explode('/',$usuario->banco_personal->fecha_nacimiento) ?>
        <?php echo \Carbon\Carbon::createFromDate($ano,$mes,$dia)->age;  ?>
        </dd>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-4 dl-horizontal">
        <dt>Cargo:</dt>
        <dd><?php echo $usuario->banco_personal->cargo ?> </dd>
      </div>
      <div class="col-lg-4 dl-horizontal">
        <dt>Fecha de registro:</dt>
        <dd><?php echo $usuario->created_at ?> </dd>
      </div>
    </div>
    <?php endif ?>
  </div>
</div>