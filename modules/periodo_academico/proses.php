
<?php
session_start();


require_once "../../config/database.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {

    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
    
            $descripcion  = mysqli_real_escape_string($mysqli, trim($_POST['descripcion']));
            $fecha_inicio  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_inicio']));
            $fecha_final  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_final']));
            $anio  = mysqli_real_escape_string($mysqli, trim($_POST['anio']));
            $estado  = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
            

            $query = mysqli_query($mysqli, "INSERT INTO periodo_academico (descripcion,fecha_inicio,fecha_final,anio,estado)
                                            VALUES('$descripcion','$fecha_inicio','$fecha_final','$anio','$estado')")
                                            or die('error: '.mysqli_error($mysqli));    

          
            if ($query) {
                header("location: ../../main.php?module=periodo_academico&alert=1");
            }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
                $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
                $descripcion  = mysqli_real_escape_string($mysqli, trim($_POST['descripcion']));
                $fecha_inicio  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_inicio']));
                $fecha_final  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_final']));
                $anio  = mysqli_real_escape_string($mysqli, trim($_POST['anio']));
                $estado  = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
                              
                $query = mysqli_query($mysqli, "UPDATE periodo_academico SET 
                                                descripcion  = '$descripcion',
                                                fecha_inicio = '$fecha_inicio',
                                                fecha_final = '$fecha_final',
                                                anio = '$anio',
                                                estado = '$estado'                       
                                                WHERE codigo     = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));

                
                if ($query) {
                  
                    header("location: ../../main.php?module=periodo_academico&alert=2");
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM periodo_academico WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=periodo_academico&alert=3");
            }
        }
    }            
}       
?>