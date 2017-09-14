<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-user-plus fa-2x"></i> Solicitante</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form id="formulario" method="POST" action="<?php echo baseUrl ?>admin/solicitantes/create">
          <?php echo Token::field() ?>
          <div class="col-md-6">
            <div class="col-md-10">
              <input class="form-control" data-inputmask="'mask': '99999999'" name="cedula" type="text" id="myInput" placeholder="Cédula de solicitante..">
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <a class="btn btn-block btn-default animated" href="javascript:{}" onclick="$('#formulario').submit();"><i class="fa fa-search fa-2x text-primary"></i></a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
    <h4 class="text-center"><b>Solicitantes Registrados</b></h4>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-condensed table-responsive animated fadeIn" data-striped="true">
          <thead>
            <tr class="bg-primary text-white">
              <th>Nombre</th>
              <th>Cédula</th>
              <th>Telefono celular</th>
              <th>Ver</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($solicitantes as $c): ?>
            <tr>
              <td><?php echo $c->nombre_apellido ?></td>
              <td><?php echo $c->cedula ?></td>
              <td><?php echo $c->telefono_celular ?></td>
              <td width="15%">
                <a class="btn btn-default" href="<?php echo baseUrl ?>admin/solicitantes/<?php echo $c->id ?>"><i class="fa fa-search text-primary"></i></a>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>