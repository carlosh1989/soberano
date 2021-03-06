<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Cuentas de banco de sangre</h3>
  </div>
  <div class="panel-body">
    <a class="btn btn-success" href="<?php echo baseUrl ?>admin/cuentas/create">  <i class="fa fa-plus"></i> Agregar Cuenta Nueva</a>
    <br><br>
    <table class="table table-striped table-condensed table-responsive" data-striped="true">
      <thead>
        <tr>
          <th>id</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cuentas_banco_sangre as $c): ?>
        <tr>
          <td><?php echo $c->id ?></td>
          <td><?php echo $c->name ?></td>
          <td><?php echo $c->email ?></td>
          <td><?php echo $c->role ?></td>
          <td width="15%">
            <!-- Single button -->
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle fa fa-cog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $baseUrl ?>admin/cuentas/<?php echo $c->id ?>"> <pre class="text-primary">VER DATOS <i class="fa fa-search"></i></pre></a></li>
                <li> <a href="<?php echo $baseUrl ?>admin/cuentas/<?php echo $c->id ?>/edit"> <pre class="text-success">EDITAR <i class="fa fa-pencil"></i></pre></a></li></a></li>
                <li><a href="<?php echo $baseUrl ?>admin/cuentas/<?php echo $c->id ?>/delete"><pre class="text-danger">ELIMINAR <i class="fa fa-times"></i></pre></a></li>
              </ul>
            </div>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>