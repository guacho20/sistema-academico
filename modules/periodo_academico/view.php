<section class="content-header">
  <h1>
    <i class="fa fa-calendar-plus-o"></i> Gestión de periodo académico
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

      <?php  

      if (empty($_GET['alert'])) {
        echo "";
      } 
    
      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
               Nuevo periodo académico almacenado correctamente.
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                Periodo académico modificado correcamente.
              </div>";
      }

      elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                Se elimino el periodo académico correctamente
              </div>";
      }
      ?>

      <div class="box box-primary">
      </div><!-- /.box -->
          <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>
                  <span class="fa fa-calendar-plus-o"></span>
                  <span>Agregar periodo académico</span>
               </strong>
              </div>
              <div class="panel-body">
                <form role="form" class="form-horizontal" method="post" action="modules/periodo_academico/proses.php?act=insert">
                 
                  <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Descripción</b></label>
                    <div class="col-sm-8">
                       <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="descripcion" autocomplete="on" required maxlength="35" placeholder="Ingrese periodos académico">
                      </div>
                    </div>
                  </div>
                   <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Fecha inicio</b></label>
                    <div class="col-sm-8">
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control" name="fecha_inicio" autocomplete="on" required maxlength="35" placeholder="Ingrese periodos académico">
                      </div>
                    </div>
                  </div>

                   <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Fecha final</b></label>
                    <div class="col-sm-8">
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control" name="fecha_final" autocomplete="on" required maxlength="35" placeholder="Ingrese periodos académico">
                      </div>
                    </div>
                  </div>

                  <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Año</b></label>
                    <div class="col-sm-8">
                       <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="anio" autocomplete="on" required maxlength="35" placeholder="Ingrese el año">
                      </div>
                    </div>
                  </div>

                  <div class="form-group required">
                    <label class="col-sm-4 control-label"><b>Estado</b></label>
                    <div class="col-sm-7">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        <select class="chosen-select" name="estado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option value=""></option>
                        <option value="Activado">Activo</option>
                        <option value="Desactivado">Desactivado</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar </button>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>
                  <span class="fa fa-calendar-plus-o"></span>
                  <span>Lista de periodo académico</span>
               </strong>
              </div>
                <div class="panel-body">
                  <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
                    <thead>
                      <tr>
                        <th class="center">No.</th>
                        <th class="left">Descripción</th>
                        <th class="left">Año</th>
                        <th class="left">Estado</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $no = 1;
                    $query = mysqli_query($mysqli, "SELECT * FROM periodo_academico ORDER BY codigo ASC")
                    or die('error: '.mysqli_error($mysqli));

                    while ($data = mysqli_fetch_assoc($query)) { 
                      
                   
                      echo "<tr>
                              <td width='30' class='center'>$no</td>
                              <td width='180' class='Left'>$data[descripcion]</td>
                              <td width='70' class='left'>$data[anio]</td>
                              <td width='70' class='left'>$data[estado]</td>
                              <td class='center' width='80'>
                                <div>
                                  <a data-toggle='tooltip' data-placement='top' title='Editar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_periodo_academico&form=edit&id=$data[codigo]'>
                                      <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                                  </a>";
                    ?>
                                  <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/periodo_academico/proses.php?act=delete&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data['descripcion']; ?> ?');">
                                      <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                                  </a>
                    <?php
                      echo "    </div>
                              </td>
                            </tr>";
                      $no++;
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div><!--/.col -->
  </div>   <!-- /.row -->
  
</section><!-- /.content 