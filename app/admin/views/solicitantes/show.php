<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-user fa-2x"></i><b> SOLCITANTE</b> <?php echo strtoupper($solicitante->nombre_apellido) ?>
    </h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-6 animated fadeIn">
        <h4 class="text-center"><b>Información del Solicitante</b></h4>
        <table class="table table-user-information panel panel-default animated fadeIn">
          <tbody>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> Nombre:</b></td>
              <td><?php echo ucwords($solicitante->nombre_apellido) ?></td>
            </tr>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-address-card"></i> Cédula:</b></td>
              <td><?php echo $solicitante->cedula ?></td>
            </tr>
            <tr>
              <td style="background: #E9E9E9;"><b><i class="fa fa-envelope"></i> Email:</b></td>
              <td><?php echo $solicitante->email ?></td>
            </tr>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-volume-control-phone"></i> Telefono Fijo:</b></td>
              <td><?php echo $solicitante->telefono_fijo ?></td>
            </tr>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-mobile"></i> Telefono Celular:</b></td>
              <td><?php echo $solicitante->telefono_celular ?></td>
            </tr>
            <tr>
              <td style="background: #E9E9E9;"><b><i class="fa fa-map-signs"></i> Municipio:</b></td>
              <td><?php echo $solicitante->municipio->nombre ?></td>
            </tr>
            <tr>
              <td style="background: #E9E9E9;"><b><i class="fa fa-map-signs"></i> Parroquia:</b></td>
              <td><?php echo $solicitante->parroquia->nombre ?></td>
            </tr>
            <tr>
              <td style="background: #E9E9E9;"><b><i class="fa fa-map-signs"></i> Urbanización/Barrio:</b></td>
              <td><?php echo $solicitante->urbanizacion_barrio ?></td>
            </tr>
            <tr>
              <td style="background: #E9E9E9;"><b><i class="fa fa-map-signs"></i> Avenida/Calle:</b></td>
              <td><?php echo $solicitante->avenida_calle ?></td>
            </tr>
            <tr>
              <td style="background: #E9E9E9;"><b><i class="fa fa-map-signs"></i> Casa/Edificio/Apartamento:</b></td>
              <td><?php echo $solicitante->casa_edificio_apartamento ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-6 animated fadeIn">
        <h4 class="text-center"><b>Historial de Solicitudes</b>
        <a class="btn btn-success pull-right" href="<?php echo baseUrl ?>admin/solicitudes/create/<?php echo $solicitante->id ?>"><i class="fa fa-plus"></i> Agregar Solicitud</a>
        </h4>
        <table class="table table-striped table-condensed table-responsive animated fadeIn" data-striped="true">
          <thead>
            <tr class="bg-primary text-white">
              <th>Fecha</th>
              <th>Estatus</th>
              <th>Ver</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($solicitante->solicitudes): ?>
            <?php foreach ($solicitante->solicitudes as $c): ?>
            <tr>
              <td><?php echo $c->fecha ?></td>
              <td>
                <?php if ($c->estatus == 1): ?>
                <button class="btn btn-info btn-default">Verificado</button>
                <?php endif ?>
                <?php if ($c->estatus == 2): ?>
                <button class="btn btn-default">Asignado</button>
                <?php endif ?>
                <?php if ($c->estatus == 3): ?>
                <button class="btn btn-default">Enviado</button>
                <?php endif ?>
                <?php if ($c->estatus == 4): ?>
                <button class="btn btn-default">Procesado</button>
                <?php endif ?>
              </td>
              <td width="15%">
                <a class="btn btn-default" href="<?php echo baseUrl ?>admin/solicitudes/<?php echo $c->id ?>"><i class="fa fa-search text-primary"></i></a>
              </td>
            </tr>
            <?php endforeach ?>
            <?php else: ?>
            <h5>No tiene solicitudes.</h5>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>