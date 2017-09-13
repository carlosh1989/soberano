    <script language="javascript">
    $(document).ready(function(){
    $("#municipio").change(function () {
    $("#municipio option:selected").each(function () {
    idmunicipio = $(this).val();
    $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
    $("#parroquia").html(data);
    });
    window.console&&console.log(idmunicipio);
    });
    })
    });
    </script>
    <script language="javascript">
    $(document).ready(function(){
    $("#parroquia").change(function () {
    $("#parroquia option:selected").each(function () {
    idparroquia = $(this).val();
    $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
    $("#bodega").html(data);
    });
    window.console&&console.log(idparroquia);
    });
    })
    });
    </script>
    <script language="javascript">
    $(document).ready(function(){
    $("#municipioB").change(function () {
    $("#municipioB option:selected").each(function () {
    idmunicipio = $(this).val();
    $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
    $("#parroquiaB").html(data);
    });
    window.console&&console.log(idmunicipio);
    });
    })
    });
    </script>
    <script language="javascript">
    $(document).ready(function(){
    $("#parroquiaB").change(function () {
    $("#parroquiaB option:selected").each(function () {
    idparroquia = $(this).val();
    $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
    $("#bodegaB").html(data);
    });
    window.console&&console.log(idparroquia);
    });
    })
    });
    </script>
<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-user-plus fa-2x"></i> INGRESAR SOLICITANTE</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrl ?>admin/solicitudes" method="POST">
      <?php echo Token::field() ?>
      <input type="hidden" name="solicitante_id" value="<?php echo $solicitante->id ?>">
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <select class="form-control" name="nacionalidad">
              <option value="">Tipo de Solicitudes</option>
              <option value="">-----------------</option>
              <?php foreach ($tipos as $key => $t): ?>
                <option value="<?php echo $t->id ?>"><?php echo $t->tipo ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <select class="form-control" name="nacionalidad">
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" name="nombre_apellido" placeholder="Nombre y Apellido" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" name="fecha_nacimiento" placeholder="Fecha nacimiento" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Email">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" name="telefono_fijo" placeholder="Telefono fijo" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" name="telefono_celular" placeholder="Telefono celular" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select class="form-control" name="nacionalidad">
              <option value="">MUNICIPIO</option>
              <option value="">------------</option>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select class="form-control" name="nacionalidad">
              <option value="">PARROQUIA</option>
              <option value="">-------------</option>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" name="urbanizacion_barrio" placeholder="Urbanización/Barrio" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" name="avenida_calle" placeholder="Avenida/Calle" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="text" name="casa_edif_apto" placeholder="Casa/Edificio/Apartamento" required>
          </div>
        </div>
      </div>
      <br>
      <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save fa-2x"></i></button>
    </form>
  </div>
</div>