<div class="box-body col-md-6">
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
                <label class="col-sm-2 control-label"><b>Código</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                  </div>
                   
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-2 control-label"><b>Nombres</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="nombre" autocomplete="on" required >
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-2 control-label"><b>Apellidos</b></label>
                <div class="col-sm-3">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="apellido" autocomplete="on" required>
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-2 control-label"><b>Cédula</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i  class="fa fa-calendar"></i></span>
                   <input type="text" class="form-control" name="cedula" autocomplete="off" required>
                  </div>
                  
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-2 control-label"><b>Fecha nacimiento</b></label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" class="form-control" name="fecha_nacimiento" autocomplete="off" required>
                  </div>
                  
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Edad</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control" name="edad" autocomplete="on" >
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-2 control-label">Dirección Domiciliaria</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    <input type="text" class="form-control" name="direccion" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Barrio</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="barrio" autocomplete="on" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono convencional</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                    <input type="text" class="form-control" name="telefono" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-2 control-label">Celular</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input type="text" class="form-control" name="celular" autocomplete="off" required> 
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="email" class="form-control" name="correo" autocomplete="on" required>
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-2">
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
                <label class="col-sm-2 control-label">Nivel de instrucción</label>
                <div class="col-sm-2">
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
                <label class="col-sm-2 control-label">Profeción</label>
                <div class="col-sm-3">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                    <input type="text" class="form-control" name="profesion" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-2 control-label">Iglesia al que pertenece</label>
                <div class="col-sm-5">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                    <input type="text" class="form-control" name="iglesia" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Por que te gusta la música</label>
                <div class="col-sm-5">
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
                <label class="col-sm-2 control-label">Misión</label>
                <div class="col-sm-5">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                    <input type="text" class="form-control" name="mision" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Visión</label>
                <div class="col-sm-5">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                    <input type="text" class="form-control" name="vision" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto</label>
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