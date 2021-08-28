

<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Lista de estudiantes inscritos 
    <div class="pull-right" >
      <a class="btn btn-info " href="modules/reportes/estudiantes_inscritos.php" title="Exportar PDF" target="_blank">
      <i class="fa fa-download"></i> Exportar PDF
      </a> 
      <a class="btn btn-success  " href="modules/reportes/reporte.php" title="Exportar XLS" target="_blank">
        <i class="fa fa-share-square-o"></i> Exportar XLS
      </a>
    </div>
    

  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
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
                <th class="left">Iglesia</th>
              </tr>
            </thead>
          
            <tbody>
            <?php  
            $no = 1;
          
            $query = mysqli_query($mysqli, "SELECT codigo,nombre,apellido,cedula,celular,correo,barrio,sexo,iglesia FROM estudiante ORDER BY nombre ASC")
                                            or die('Error: '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 
              
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='left'>$data[cedula]</td>
                      <td width='100' class='left'>$data[nombre]</td>
                      <td width='100' class='left'>$data[apellido]</td>
                      <td width='60' class='left'>$data[celular]</td>
                      <td width='80' align='left'>$data[correo]</td>
                      <td width='80' class='left'>$data[barrio]</td>
                      <td width='60' class='left'>$data[sexo]</td>
                      <td width='120' class='left'>$data[iglesia]</td>
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