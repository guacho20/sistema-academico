 <?php  
 //select combox box

  $query = "SELECT codigo,descripcion,anio FROM periodo_academico where estado = 'Activado' ORDER BY codigo DESC";
  $periodo=$mysqli->query($query);

  $query = "SELECT cedula,nombre,apellido FROM estudiante ORDER BY apellido";
  $estudiante=$mysqli->query($query);

  $query = "SELECT * FROM carrera ORDER BY codigo";
  $carrera=$mysqli->query($query);

  $query = "SELECT * FROM nivel ORDER BY codigo";
  $nivel=$mysqli->query($query);

  $query = "SELECT * FROM paralelo ORDER BY codigo";
  $paralelo=$mysqli->query($query);

  $query = "SELECT * FROM jornada ORDER BY codigo";
  $jornada=$mysqli->query($query);

 /************************************/

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Matricular estudiante
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=matricula"> Matricula </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary ">
          <!-- form start -->
          <form role="form" class="well form-horizontal" action="modules/matricula/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo,6) as codigo FROM matricula
                                                ORDER BY codigo DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 1;
              }


              $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
              $codigo = "MAT$buat_id";
              ?>
              
              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Codigo</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                  </div> 
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Periodo académico</b></label>
                <div class="col-sm-2">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                    <select class="chosen-select" name="periodo_academico" data-placeholder="-- Seleccionar --" autocomplete="off" required data-error="Por favor ingresa tu nombre">
                      <option value="0">Seleccionar periodo académico</option>
                      <?php while($row = $periodo->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion'] .' - '.$row['anio']; ?></option>
                      <?php } ?>                  
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Estudiante</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <select class="chosen-select" name="estudiante" data-placeholder="-- Seleccionar --" autocomplete="off" required data-error="Por favor ingresa tu nombre">
                    <option value="0">Seleccionar estudiante</option>
                      <?php while($row = $estudiante->fetch_assoc()) { ?>
                        <option value="<?php echo $row['cedula']; ?>"><?php echo $row['apellido'] .' '. $row['nombre']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Carrera</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                    <select class="chosen-select" name="carrera" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="0">Seleccionar carrera</option>
                      <?php while($row = $carrera->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Nivel</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-line-chart"></i></span>
                    <select class="chosen-select" name="nivel" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="0">Seleccionar nivel</option>
                      <?php while($row = $nivel->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Paralelo</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-font"></i></span>
                    <select class="chosen-select" name="paralelo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="0">Seleccionar paralelo</option>
                      <?php while($row = $paralelo->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Jornada</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <select class="chosen-select" name="jornada" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="0">Seleccionar jornada</option>
                      <?php while($row = $jornada->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Año</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                    <input type="text" class="form-control" name="anio" required>
                  </div> 
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
                  <a href="?module=matricula" class="btn btn-danger " role="button"><i class="fa fa-ban"></i> Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>


            </div><!-- /.box -->
      </div><!--/.col -->

    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      $cod= $_GET['id'];
      $query = mysqli_query($mysqli, "SELECT m.codigo,m.anio as anio, p.descripcion as periodo_academico,e.nombre , e.apellido ,c.descripcion as carrera, n.descripcion as nivel,pa.descripcion as paralelo, j.descripcion as jornada
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
        on m.jornada = j.codigo WHERE m.codigo='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar estudiante
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=alumno"> Estudiantes </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/matricula/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Codigo</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                    <input type="text" class="form-control" name="codigo" value="<?php echo $data['codigo']; ?>" readonly required>
                  </div>
                   
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Periodo académico</b></label>
                <div class="col-sm-2">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                    <select class="chosen-select" name="periodo_academico" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                      <option value="<?php echo $data['periodo_academico']; ?>"><?php echo $data['periodo_academico']; ?></option>
                      <?php while($row = $periodo->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion']; ?></option>
                      <?php } ?>                  
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Estudiante</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <select class="chosen-select" name="estudiante" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['apellido'] .' '.$data['nombre']; ?>"><?php echo $data['apellido'] .' '.$data['nombre']; ?></option>
                      <?php while($row = $estudiante->fetch_assoc()) { ?>
                        <option value="<?php echo $row['cedula']; ?>"><?php echo $row['apellido'] .' '. $row['nombre']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Carrera</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                    <select class="chosen-select" name="carrera" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['carrera']; ?>"><?php echo $data['carrera']; ?></option>
                      <?php while($row = $carrera->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Nivel</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-line-chart"></i></span>
                    <select class="chosen-select" name="nivel" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['nivel']; ?>"><?php echo $data['nivel']; ?></option>
                      <?php while($row = $nivel->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Paralelo</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-font"></i></span>
                    <select class="chosen-select" name="paralelo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['paralelo']; ?>"><?php echo $data['paralelo']; ?></option>
                      <?php while($row = $paralelo->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Jornada</b></label>
                <div class="col-sm-2">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <select class="chosen-select" name="jornada" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['jornada']; ?>"><?php echo $data['jornada']; ?></option>
                      <?php while($row = $jornada->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['descripcion']; ?></option>
                      <?php } ?> 
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><b>Año</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                    <input type="text" class="form-control" name="anio" value="<?php echo $data['anio']; ?>" required>
                  </div> 
                </div>
              </div>
              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-check"></i> Actualizar</button>
                  <a href="?module=matricula" class="btn btn-danger " role="button"><i class="fa fa-ban"></i> Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>