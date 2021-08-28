<section class="content-header">
  <h1>
    <i class="fa fa-list-alt"></i> Lista de estudiantes inscritos

    <a class="btn btn-primary btn-social pull-right" href="?module=form_alumno&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Nuevo Estudiante
    </a>
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
             Nuevos datos de estudiantes ha sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del estudiante modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del estudiante
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="left">Cedula</th>
                <th class="left">Nombres</th>
                <th class="left">Apellidos</th>
                <th class="left">Celular</th>
                <th class="left">Correo</th>
                <th class="left">Barrio</th>
                <th class="left">Sexo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT codigo,nombre,apellido,cedula,celular,correo,sexo,barrio FROM estudiante ORDER BY codigo DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[cedula]</td>
                      <td width='100' class='left'>$data[nombre]</td>
                      <td width='100' class='left'>$data[apellido]</td>
                      <td width='60' class='left'>$data[celular]</td>
                      <td width='80' align='left'>$data[correo]</td>
                      <td width='80' class='left'>$data[barrio]</td>
                      <td width='60' class='left'>$data[sexo]</td>
                      <td class='center' width='120'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Editar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_alumno&form=edit&id=$data[codigo]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/alumno/proses.php?act=delete&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data['nombre']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
                          <a data-toggle="tooltip" data-placement='top' title='Imprimir' style='margin-right:5px' class='btn btn-info btn-sm' href='modules/reportes/reporte_individual.php?idestudiante=<?php echo $data['codigo'];?>'><i style='color:#fff' class='glyphicon glyphicon-print' target="_blank"></i></a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content