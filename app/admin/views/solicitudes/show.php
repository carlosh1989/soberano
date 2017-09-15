<?php
list($fecha,$hora) = explode(' ', $solicitud->fecha_hora_registrado);
list($ano,$mes,$dia) = explode('-', $fecha);
$fecha = $dia.'/'.$mes.'/'.$ano;
?>
<style>
.form-group input[type="checkbox"] {
display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span {
width: 20px;
height: 10px;
}
.form-group input[type="checkbox"] + .btn-group > label span:first-child {
display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
display: none;
}
</style>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h4 class="panel-title text-muted"><i class="fa fa-user fa-2x"></i> SOLICITUD<b> <?php echo strtoupper($solicitud->tipo_solicitud->nombre) ?></b>
    </h4>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-6 animated fadeIn">
        <table class="table table-user-information panel panel-default animated fadeIn">
          <tbody>
            <tr>
              <td width="30%" style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> Solicitante:</b></td>
              <td><?php echo ucwords($solicitud->solicitante->nombre_apellido) ?></td>
            </tr>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> Requerimiento:</b></td>
              <td><?php echo ucwords($solicitud->requerimiento_categoria->nombre) ?></td>
            </tr>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> Organismo Asignado:</b></td>
              <td><?php echo ucwords($solicitud->organismo->nombre) ?></td>
            </tr>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> Fecha Registro:</b></td>
              <td><?php echo $fecha ?></td>
            </tr>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> Hora Registro:</b></td>
              <td><?php echo $hora ?></td>
            </tr>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> Estatus:</b></td>
              <td>
                <?php if ($solicitud->estatus == 1): ?>
                <a class="btn btn-primary" href="#"><i class="fa fa-gear"></i> Procesando</a>
                <?php endif ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-6 animated fadeIn panel panel-default animated">
        <div class="panel-heading">
          <h5 class="text-muted text-primary">
          <i class="fa fa-file"></i> Documentos Consignados
          </h5>
        </div>
        <?php if (isset($solicitud->documentos_consignados[0])): ?>
        <div class="form-group">
          <?php foreach ($solicitud->documentos_consignados as $key => $r): ?>
          <?php if ($r->requerimiento->prioridad == true): ?>
          <?php $required = "required" ?>
          <?php $requerido ="(Obligatorio)" ?>
          <?php else: ?>
          <?php $required = "" ?>
          <?php $requerido ="(Opcional)" ?>
          <?php endif ?>
          <div class="[ form-group ]">
            <input type="checkbox" name="requerimientos[]" id="fancy-checkbox-default-custom-icons-<?php echo $r->id ?>"  <?php echo $required ?> value="<?php echo $r->id ?>"/>
            <div class="[ btn-group ]">
              <label for="fancy-checkbox-default-custom-icons-<?php echo $r->requerimiento->id ?>" class="[ btn btn-default ]">
                <span class="fa fa-check"></span>
              </label>
              <label for="fancy-checkbox-default-custom-icons-<?php echo $r->requerimiento->id ?>" class="[ btn btn-default active ]">
                <?php echo $r->requerimiento->nombre ?>
                <?php echo $r->nombre ?>
                <?php if ($requerido == "(Obligatorio)"): ?>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                <label class="text-danger"> <?php echo $requerido?></label>
                <?php else: ?>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                <label class="text-primary"> <?php echo $requerido?></label>
                <?php endif ?>
              </label>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
      <?php else: ?>
      <div class="form-group">
        <h3>No hay requerimientos.</h3>
      </div>
      <?php endif ?>
      <br>
    </div>
  </div>
</div>