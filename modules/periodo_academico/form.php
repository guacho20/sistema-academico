 <?php  

if ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT * FROM periodo_academico WHERE codigo='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-plus"></i> Modificar periodo académico
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=periodo_academico"> Periodo académico </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
        </div><!-- /.box -->

        <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>
                  <span class="fa fa-plus"></span>
                  <span>MODIFICANDO <?php echo $data['descripcion'];?> </span>
               </strong>
              </div>
              <div class="panel-body">
                <form role="form" class="form-horizontal" action="modules/periodo_academico/proses.php?act=update" method="POST" >
                	<input type="hidden" name="codigo" value="<?php echo $data['codigo']; ?>">
                  <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Descripción</b></label>
                    <div class="col-sm-8">
                       <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="descripcion" autocomplete="on" required maxlength="35" value="<?php echo $data['descripcion']; ?>">
                      </div>
                    </div>
                  </div>
                   <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Fecha inicio</b></label>
                    <div class="col-sm-8">
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control" name="fecha_inicio" autocomplete="on" required value="<?php echo $data['fecha_inicio']; ?>">
                      </div>
                    </div>
                  </div>

                   <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Fecha final</b></label>
                    <div class="col-sm-8">
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control" name="fecha_final" autocomplete="on" required value="<?php echo $data['fecha_final']; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Año</b></label>
                    <div class="col-sm-8">
                       <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="anio" autocomplete="on" required maxlength="5" value="<?php echo $data['anio']; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Estado</b></label>
                    <div class="col-sm-7">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        <select class="chosen-select" name="estado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option  value="<?php echo $data['estado']; ?>"><?php echo $data['estado']; ?></option>
                        <option value="Activado">Activo</option>
                        <option value="Desactivado">Desactivado</option>
                        </select>
                      </div>
                    </div>
                  </div>
	                <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-check"></i> Actualizar</button>
	                <a href="?module=periodo_academico" class="btn btn-danger " role="button"><i class="fa fa-ban"></i> Cancelar</a>
                </form>
              </div>
            </div>
          </div>
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>