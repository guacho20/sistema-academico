 <?php  

if ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT codigo,descripcion FROM paralelo WHERE codigo='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-font"></i> Modificar paralelo
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=paralelo"> Paralelo </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
        </div><!-- /.box -->

        <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>
                  <span class="fa fa-font"></span>
                  <span>MODIFICANDO <?php echo $data['descripcion'];?> </span>
               </strong>
              </div>
              <div class="panel-body">
                <form action="modules/paralelo/proses.php?act=update" method="POST" >
                  <input type="hidden" name="codigo" value="<?php echo $data['codigo']; ?>">
                  <div class="form-group">
                      <input type="text" class="form-control" name="descripcion" value="<?php echo $data['descripcion']; ?>" required>
                  </div>
                  <button type="submit" name="Guardar" class="btn btn-primary"><i class="fa fa-check"></i> Actualizar</button>
                  <a href="?module=nivel" class="btn btn-danger " role="button"><i class="fa fa-ban"></i> Cancelar</a>
                </form>
              </div>
            </div>
          </div>
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>