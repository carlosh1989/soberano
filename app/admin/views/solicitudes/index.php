<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-user-plus fa-2x"></i> SOLICITUD</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form id="formulario" method="POST" action="<?php echo baseUrl ?>banco/donantes/busqueda">
          <?php echo Token::field() ?>
          <div class="col-md-6">
            <div class="col-md-10">
              <input class="form-control" name="cedula" type="text" id="myInput" placeholder="Cédula de solicitante..">
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
  </div>
</div>