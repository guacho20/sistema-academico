<section class="content-header">
  <h1>
    <i class="fa fa-line-chart"></i> Gestión de nivel
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
               Nuevo nivel ha sido  almacenado correctamente.
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
               Nivel modificado correcamente.
              </div>";
      }

      elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Se elimino el nivel correctamente
              </div>";
      }
      ?>

      <div class="box box-primary">
      </div><!-- /.box -->
          <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>
                  <span class="fa fa-line-chart"></span>
                  <span>Agregar nuevo nivel</span>
               </strong>
              </div>
              <div class="panel-body">
                <form method="post" action="modules/nivel/proses.php?act=insert">
                  <div class="form-group">
                      <input type="text" class="form-control" name="descripcion" placeholder="Nombre del nivel" required>
                  </div>
                  <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</button>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>
                  <span class="fa fa-line-chart"></span>
                  <span>Lista de niveles</span>
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
                    $query = mysqli_query($mysqli, "SELECT codigo,descripcion,fecha_creacion FROM nivel ORDER BY codigo ASC")
                    or die('error: '.mysqli_error($mysqli));

                    while ($data = mysqli_fetch_assoc($query)) { 
                      
                   
                      echo "<tr>
                              <td width='30' class='center'>$no</td>
                              <td width='100' class='Left'>$data[descripcion]</td>
                              <td width='100' class='left'>$data[fecha_creacion]</td>
                              <td class='center' width='100'>
                                <div>
                                  <a data-toggle='tooltip' data-placement='top' title='Editar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_nivel&form=edit&id=$data[codigo]'>
                                      <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                                  </a>";
                    ?>
                                  <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/nivel/proses.php?act=delete&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data['descripcion']; ?> ?');">
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


  