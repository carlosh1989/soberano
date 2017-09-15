<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-user-plus fa-2x"></i> SOLICITUD</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form id="formulario" method="POST" action="">
          <?php echo Token::field() ?>
          <div class="col-md-6">
          <select name="tipo" class="form-control" onchange="this.form.submit()">
          <?php foreach ($tipos as $key => $t): ?>
            
          <?php endforeach ?>
            <option value="1">uno</option>
            <option value="1">uno</option>
          </select>
          </div>
        </form>
      </div>
    </div>
    <br>
    <h5 class="text-muted text-primary text-center">
    SOLICITANTE REGISTRADOS
    </h5>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-condensed table-responsive animated fadeIn" data-striped="true">
          <thead>
            <tr class="bg-primary text-white">
              <th width="18%" class="text-uppercase">Solicitante</th>
              <th width="5%" class="text-uppercase">Cédula</th>
              <th class="text-uppercase">Telefonos</th>
              <th class="text-uppercase">Solicitud</th>
              <th class="text-uppercase">Organismo</th>
              <th width="1%" class="text-uppercase">Ver</th>
              <th width="1%" class="text-uppercase">Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($solicitudes as $c): ?>
            <tr>
              <td class="text-uppercase"><?php echo $c->solicitante->nombre_apellido ?></td>
              <td class="text-uppercase">V-<?php echo $c->solicitante->cedula ?></td>
              <td class="text-uppercase"><?php echo $c->telefono1 ?> <?php echo $c->telefono2 ?></td>
              <td class="text-uppercase"><?php echo $c->tipo_solicitud->nombre ?></td>
              <td class="text-uppercase"><?php echo $c->organismo->tipo ?></td>
              <td class="text-uppercase">
                <a class="btn btn-default" href="<?php echo baseUrl ?>admin/solicitudes/<?php echo $c->id ?>"><i class="fa fa-search text-primary"></i></a>
              </td>
              <td>
                <form action="<?php echo baseUrl ?>admin/solicitudes/aprobar">
                  <?php echo Token::field() ?>
                  <input type="hidden" name="solicitud_id" value="<?php echo $c->id ?>">
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                </form>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>