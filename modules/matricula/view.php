<section class="content-header">
  <h1>
    <i class="fa fa-list-alt"></i> Lista de estudiantes matriculados

    <a class="btn btn-primary btn-social pull-right" href="?module=form_matricula&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Nueva Matricula
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
              Estudiante matriculado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Matricula modificado correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            	Matricula eliminada satisfactoriamente
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="left">Código Matricula</th>
                <th class="left">Estudiante</th>
                <th class="left">Materia</th>
                <th class="left">Nivel</th>
                <th class="center">Paralelo</th>
                <th class="center">Periodo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT m.codigo, p.descripcion as periodo_academico,e.nombre , e.apellido ,c.descripcion as carrera, n.descripcion as nivel,pa.descripcion as paralelo, j.descripcion as jornada, m.anio as anio
				from matricula m
				join periodo_academico p 
				on m.periodo_academico = p.codigo
				join estudiante e
				on m.estudiante = e.cedula
				join carrera c
				on m.carrera = c.codigo
				join nivel n 
				on m.nivel = n.codigo
				join paralelo pa
				on m.paralelo = pa.codigo
				join jornada j 
				on m.jornada = j.codigo ORDER BY codigo DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='left'>$data[codigo]</td>
                      <td width='180' class='left'>$data[apellido] $data[nombre]</td>
                      <td width='120' class='left'>$data[carrera]</td>
                      <td width='100' class='left'>$data[nivel]</td>
                      <td width='50' class='center'>$data[paralelo]</td>
                      <td width='50' align='center'>$data[anio]</td>
                      
                      <td class='center' width='100'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Editar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_matricula&form=edit&id=$data[codigo]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/matricula/proses.php?act=delete&id=<?php echo $data['codigo'];?>" onclick="return confirm('Estas seguro de eliminar <?php echo $data['apellido'] .' '. $data['nombre']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
                          <a data-toggle="tooltip" data-placement='top' title='Imprimir' style='margin-right:5px' class='btn btn-info btn-sm' href='modules/reportes/certificado_matricula.php?idestudiante=<?php echo $data['codigo'];?>'><i style='color:#fff' class='glyphicon glyphicon-print' target="_blank"></i></a>
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