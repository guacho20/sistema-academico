 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar estudiante
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=alumno"> Estudiantes </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="col-md-12">
            Todos los campos con * son obligatorios
          </div>
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/alumno/proses.php?act=insert" method="POST">
            <div class="box-body col-md-5">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo,6) as codigo FROM estudiante
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
              $codigo = "EST$buat_id";
              ?>
              

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Código</b></label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                  </div>
                   
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Nombres</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="nombre" autocomplete="on" required maxlength="35" >
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Apellidos</b></label>
                <div class="col-sm-7">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="apellido" autocomplete="on" required maxlength="35">
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Cédula</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i  class="glyphicon glyphicon-credit-card"></i></span>
                   <input type="text" class="form-control" name="cedula" autocomplete="off" required maxlength="10">
                  </div>
                  
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Fecha nacimiento</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" class="form-control" name="fecha_nacimiento" autocomplete="off" required>
                  </div>
                  
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Edad</b></label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control" name="edad" autocomplete="on" maxlength="3" >
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Dirección</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    <input type="text" class="form-control" name="direccion" autocomplete="off" required maxlength="50">
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Barrio</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="barrio" autocomplete="on" required maxlength="25">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Teléfono</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                    <input type="text" class="form-control" name="telefono" autocomplete="off" maxlength="10">
                  </div>
                </div>
              </div>

              <div class="form-group required required">
                <label class="col-sm-4 control-label"><b>Celular</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input type="text" class="form-control" name="celular" autocomplete="off" required maxlength="10"> 
                  </div>
                </div>
              </div>

            </div><!-- /.box body -->
            <div class="box-body col-md-6">
            
              
              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Correo</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="email" class="form-control" name="correo" autocomplete="on" required maxlength="50">
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Sexo</b></label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="chosen-select" name="sexo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Nivel de instrucción</b></label>
                <div class="col-sm-4">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                    <select class="chosen-select" name="nivel_instrucion" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Básica">Básica</option>
                    <option value="Bachillerato">Bachillerato</option>
                    <option value="Superior">Superior</option>
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Profeción</b></label>
                <div class="col-sm-5">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                    <input type="text" class="form-control" name="profesion" autocomplete="off" required maxlength="25">
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Iglesia al que pertenece</b></label>
                <div class="col-sm-8">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                    <input type="text" class="form-control" name="iglesia" autocomplete="off" required maxlength="100">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Por qué te gusta la música</b></label>
                <div class="col-sm-8">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-music"></i></span>
                    <select class="chosen-select" name="gusta_musica" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="¿No existe ministerio de música en su iglesia?">¿No existe ministerio de música en su iglesia?</option>
                    <option value="Invitacción">Por invitación</option>
                    <option value="Decisión personal">Decisión personal</option>
                    <option value="Dar gracias a Dios por medio de alabanzas">Dar gracias a Dios por medio de alabanzas</option>
                    <option value="Tiempo libre">Por que dispongo de tiempo libre</option>
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Misión</b></label>
                <div class="col-sm-8">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                    <input type="text" class="form-control" name="mision" autocomplete="off" required maxlength="200">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Visión</b></label>
                <div class="col-sm-8">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                    <input type="text" class="form-control" name="vision" autocomplete="off" required maxlength="200">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Foto</b></label>
                <div class="col-sm-5">
                    <input type="file" name="foto">
                    <br/>
                      <?php  
                      if ($data['foto']=="") { ?>
                        <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png" width="128" ;>
                      <?php
                      }
                      ?>
                </div>
              </div>
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                  <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
                  <a href="?module=alumno" class="btn btn-danger " role="button"><i class="fa fa-ban"></i> Cancelar</a>
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

      $query = mysqli_query($mysqli, "SELECT codigo,nombre,apellido,cedula,edad,fecha_nacimiento,direccion,barrio,telefono,celular,correo,sexo,nivel_instruccion,profesion,iglesia,gusto_musica,mision,vision,foto FROM estudiante WHERE codigo='$_GET[id]'") 
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
          <form role="form" class="form-horizontal" action="modules/alumno/proses.php?act=update" method="POST" enctype="multipart/form-data">
           
           <div class="box-body col-md-5">
                          
              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Código</b></label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                    <input type="text" class="form-control" name="codigo" value="<?php echo $data['codigo']; ?>" readonly required>
                  </div>
                   
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Nombres</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="nombre" autocomplete="on" required maxlength="35" value="<?php echo $data['nombre']; ?>" >
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Apellidos</b></label>
                <div class="col-sm-7">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="apellido" autocomplete="on" required maxlength="35" value="<?php echo $data['apellido']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Cédula</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i  class="glyphicon glyphicon-credit-card"></i></span>
                   <input type="text" class="form-control" name="cedula" autocomplete="off" required maxlength="10" value="<?php echo $data['cedula']; ?>">
                  </div>
                  
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Fecha nacimiento</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" class="form-control" name="fecha_nacimiento" autocomplete="off" required value="<?php echo $data['fecha_nacimiento']; ?>">
                  </div>
                  
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Edad</b></label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control" name="edad" autocomplete="on" maxlength="3" value="<?php echo $data['edad']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Dirección</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    <input type="text" class="form-control" name="direccion" autocomplete="off" required maxlength="50" value="<?php echo $data['direccion']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Barrio</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="barrio" autocomplete="on" required maxlength="25" value="<?php echo $data['barrio']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Teléfono</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                    <input type="text" class="form-control" name="telefono" autocomplete="off" maxlength="10" 
                    value="<?php echo $data['telefono']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group required required">
                <label class="col-sm-4 control-label"><b>Celular</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input type="text" class="form-control" name="celular" autocomplete="off" required maxlength="10" value="<?php echo $data['celular']; ?>"> 
                  </div>
                </div>
              </div>

            </div><!-- /.box body -->
            <div class="box-body col-md-6">
            
              
              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Correo</b></label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="email" class="form-control" name="correo" autocomplete="on" required maxlength="50" value="<?php echo $data['correo']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Sexo</b></label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="chosen-select" name="sexo" data-placeholder="-- Seleccionar --" autocomplete="off" required >
                    <option value="<?php echo $data['sexo']; ?>"><?php echo $data['sexo']; ?></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Nivel de instrucción</b></label>
                <div class="col-sm-4">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                    <select class="chosen-select" name="nivel_instrucion" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['nivel_instruccion']; ?>"><?php echo $data['nivel_instruccion']; ?></option>
                    <option value="Básica">Básica</option>
                    <option value="Bachillerato">Bachillerato</option>
                    <option value="Superior">Superior</option>
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Profeción</b></label>
                <div class="col-sm-5">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                    <input type="text" class="form-control" name="profesion" autocomplete="off" required maxlength="25" value="<?php echo $data['profesion']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-4 control-label"><b>Iglesia al que pertenece</b></label>
                <div class="col-sm-8">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                    <input type="text" class="form-control" name="iglesia" autocomplete="off" required maxlength="100" value="<?php echo $data['iglesia']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Por qué te gusta la música</b></label>
                <div class="col-sm-8">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-music"></i></span>
                    <select class="chosen-select" name="gusta_musica" data-placeholder="-- Seleccionar --" autocomplete="off" required >
                    <option value="<?php echo $data['gusto_musica']; ?>"><?php echo $data['gusto_musica']; ?></option>
                    <option value="¿No existe ministerio de música en su iglesia?">¿No existe ministerio de música en su iglesia?</option>
                    <option value="Invitacción">Por invitación</option>
                    <option value="Decisión personal">Decisión personal</option>
                    <option value="Dar gracias a Dios por medio de alabanzas">Dar gracias a Dios por medio de alabanzas</option>
                    <option value="Tiempo libre">Por que dispongo de tiempo libre</option>
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Misión</b></label>
                <div class="col-sm-8">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                    <input type="text" class="form-control" name="mision" autocomplete="off" required maxlength="200" value="<?php echo $data['mision']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Visión</b></label>
                <div class="col-sm-8">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                    <input type="text" class="form-control" name="vision" autocomplete="off" required maxlength="200" value="<?php echo $data['vision']; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"><b>Foto</b></label>
                <div class="col-sm-5">
                    <input type="file" name="foto">
                    <br/>
                      <?php  
                      if ($data['foto']=="") { ?>
                        <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png" width="128">
                      <?php
                      }
                      ?>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                  <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-check"></i> Actualizar</button>
                  <a href="?module=alumno" class="btn btn-danger " role="button"><i class="fa fa-ban"></i> Cancelar</a>
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

