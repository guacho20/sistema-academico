<section class="content-header">
  <h1>
    <i class="fa fa-clock-o"></i> Gestión de jornada
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
               Nueva jornada almacenada correctamente.
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                Jornada modificada correcamente.
              </div>";
      }

      elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                Se elimino la jornada correctamente
              </div>";
      }
      ?>

      <div class="box box-primary">
      </div><!-- /.box -->
          <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>
                  <span class="fa fa-clock-o"></span>
                  <span>Agregar jornada</span>
               </strong>
              </div>
              <div class="panel-body">
                <form method="post" action="modules/jornada/proses.php?act=insert">
                  <div class="form-group">
                      <input type="text" class="form-control" name="descripcion" placeholder="Ingrese la jornada" required>
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
                  <span class="fa fa-clock-o"></span>
                  <span>Lista de jornada</span>
               </strong>
              </div>
                <div class="panel-body">
                  <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
                    <thead>
                      <tr>
                        <th class="center">No.</th>
                        <th class="left">Descripción</th>
                        <th class="left">Fecha creación</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $no = 1;
                    $query = mysqli_query($mysqli, "SELECT codigo,descripcion,fecha_creacion FROM jornada ORDER BY codigo ASC")
                    or die('error: '.mysqli_error($mysqli));

                    while ($data = mysqli_fetch_assoc($query)) { 
                      
                   
                      echo "<tr>
                              <td width='30' class='center'>$no</td>
                              <td width='180' class='Left'>$data[descripcion]</td>
                              <td width='100' class='left'>$data[fecha_creacion]</td>
                              <td class='center' width='80'>
                                <div>
                                  <a data-toggle='tooltip' data-placement='top' title='Editar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_jornada&form=edit&id=$data[codigo]'>
                                      <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                                  </a>";
                    ?>
                                  <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/jornada/proses.php?act=delete&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data['descripcion']; ?> ?');">
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