<section class="content-header">
  <h1>
    <i class="fa fa-database"></i> Generar e importar base de datos 
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
               Nuevo paralelo almacenado correctamente.
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
               Paralelo modificado correcamente.
              </div>";
      }

      elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Se elimino el paralelo correctamente
              </div>";
      }
      ?>

      <div class="box box-primary">
      </div><!-- /.box -->
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>
                  <span class="fa fa-download"></span>
                  <span>Respaldar Base de Datos</span>
               </strong>
              </div>
              <div class="panel-body">
                <form method="post" action="modules/" align="center" >
                  <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-download"></i> Respaldar</button>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>
                  <span class="fa fa-database"></span>
                  <span>Restaurar Base de Datos</span>
               </strong>
              </div>
                <div class="panel-body">
                  <form method="post" action="modules" align="center" >
                    <input type="file" class="form-control" name="descripcion" placeholder="Ingrese el paralelo" required>
                    <br>
                    <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-upload"></i> Restaurar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div><!--/.col -->
  </div>   <!-- /.row -->
  
</section><!-- /.content 


  