

<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Lista de estudiantes matriculados
    <div class="pull-right" >
      <a class="btn btn-info " href="modules/reportes/estudiantes_matriculados.php" title="Exportar PDF" target="_blank">
      <i class="fa fa-download"></i> Exportar PDF
      </a> 
      <a class="btn btn-success  " href="modules/reportes/estudiantes_inscritos.php" title="Exportar XLS" target="_blank">
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
                <th class="left">Estudiante</th>
                <th class="left">Periodo Académico</th>
                <th class="left">Carrera</th>
                <th class="left">Nivel</th>
                <th class="left">Paralelo</th>
                <th class="left">Jornada</th>
              </tr>
            </thead>
          
            <tbody>
            <?php  
            $no = 1;
          
            $query = mysqli_query($mysqli, "SELECT m.codigo, p.descripcion as periodo_academico,e.nombre , e.apellido ,c.descripcion as carrera, n.descripcion as nivel,pa.descripcion as paralelo, j.descripcion as jornada
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
        on m.jornada = j.codigo  ORDER BY codigo ASC")
                                            or die('Error: '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 
              
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='120' class='left'>$data[nombre] $data[apellido]</td>
                      <td width='100' class='left'>$data[periodo_academico]</td>
                      <td width='60' class='left'>$data[carrera]</td>
                      <td width='80' align='left'>$data[nivel]</td>
                      <td width='80' class='left'>$data[paralelo]</td>
                      <td width='120' class='left'>$data[jornada]</td>
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