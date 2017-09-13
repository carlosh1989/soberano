<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-user-plus fa-2x"></i> INGRESAR SOLICITANTE</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrl ?>admin/solicitantes" method="POST">
      <?php echo Token::field() ?>
        <input type="hidden" name="fecha_hora_registro" value="<?php echo $solicitante->fecha_hora_registro ?>">
      <div class="row">
        <div class="col-lg-1">
          <div class="form-group">
            <select class="form-control" name="nacionalidad" required>
            <?php if (isset($solicitante->nacionalidad)): ?>
              <option value="<?php echo $solicitante->nacionalidad ?>"><?php echo $solicitante->nacionalidad ?></option>
            <?php else: ?>
              <option value="V">V</option>
              <option value="E">E</option>
            <?php endif ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
          <?php if (isset($solicitante->cedula)): ?>
            <input class="form-control" type="text" name="cedula" placeholder="Cédula" value="<?php echo $solicitante->cedula ?>" required>
          <?php else: ?>
            <input class="form-control" type="text" name="cedula" placeholder="Cédula" required>
          <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
          <?php if (isset($solicitante->nombre_apellido)): ?>
            <input class="form-control" type="text" name="nombre_apellido" placeholder="Nombre y Apellido" value="<?php echo $solicitante->nombre_apellido ?>" required>
          <?php else: ?>
            <input class="form-control" type="text" name="nombre_apellido" placeholder="Nombre y Apellido" required>  
          <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
          <?php if (isset($solicitante->fecha_nacimiento)): ?>
            <input class="form-control" type="text" name="fecha_nacimiento" placeholder="Fecha nacimiento" value="<?php echo $solicitante->fecha_nacimiento ?>" required>
          <?php else: ?>
            <input class="form-control" type="text" name="fecha_nacimiento" placeholder="Fecha nacimiento" required>
          <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="number" name="telefono_fijo" placeholder="Telefono fijo">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" type="number" name="telefono_celular" placeholder="Telefono celular" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select class="form-control" name="municipio_id">
              <?php 
              use App\Municipio;
              $municipios = Municipio::all(); 
              ?>
              <?php if (isset($solicitante->municipio)): ?>
                <?php $municipio_solicitante = Municipio::find($solicitante->municipio); ?>
                <option value="<?php echo $municipio_solicitante->id ?>"><?php echo $municipio_solicitante->nombre ?></option>
              <?php else: ?>
              <option value="">MUNICIPIOS</option>
              <?php endif ?>
              <option value="">-----------------</option>
              <?php foreach ($municipios as $municipio): ?>
              <option value="<?php echo $municipio->id ?>"><?php echo $municipio->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select class="form-control" name="parroquia_id">
              <?php 
              use App\Parroquia;
              $parroquias = Parroquia::all(); 
              ?>
              <?php if (isset($solicitante->parroquia)): ?>
                <?php $parroquia_solicitante = Parroquia::find($solicitante->parroquia); ?>
                <option value="<?php echo $parroquia_solicitante->id ?>"><?php echo $municipio_solicitante->nombre ?></option>
              <?php else: ?>
              <option value="">PARROQUIAS</option>
              <?php endif ?>
              <option value="">-----------------</option>
              <?php foreach ($parroquias as $parroquia): ?>
              <option value="<?php echo $parroquia->id ?>"><?php echo $parroquia->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
          <?php if (isset($solicitante->urbanizacion_barrio)): ?>
            <input class="form-control" type="text" name="urbanizacion_barrio" placeholder="Urbanización/Barrio" value="<?php echo $solicitante->urbanizacion_barrio ?>" required>
          <?php else: ?>
            <input class="form-control" type="text" name="urbanizacion_barrio" placeholder="Urbanización/Barrio" required>
          <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
          <?php if (isset($solicitante->avenida_calle)): ?>
            <input class="form-control" type="text" name="avenida_calle" placeholder="Avenida/Calle" value="<?php echo $solicitante->avenida_calle ?>" required>
          <?php else: ?>
            <input class="form-control" type="text" name="avenida_calle" placeholder="Avenida/Calle" required>
          <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
          <?php if (isset($solicitante->casa_edificio_apartamento)): ?>
            <input class="form-control" type="text" name="casa_edificio_apartamento" placeholder="Casa/Edificio/Apartamento" value="<?php echo $solicitante->casa_edificio_apartamento ?>" required>
          <?php else: ?>
            <input class="form-control" type="text" name="casa_edificio_apartamento" placeholder="Casa/Edificio/Apartamento" required>
          <?php endif ?>
          </div>
        </div>
      </div>
      <br>
      <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save fa-2x"></i></button>
    </form>
  </div>
</div>