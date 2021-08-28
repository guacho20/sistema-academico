
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $periodo_academico  = mysqli_real_escape_string($mysqli, trim($_POST['periodo_academico']));
            $estudiante= mysqli_real_escape_string($mysqli, trim($_POST['estudiante']));
            $carrera= mysqli_real_escape_string($mysqli, trim($_POST['carrera']));
            $nivel= mysqli_real_escape_string($mysqli, trim($_POST['nivel']));
            $paralelo= mysqli_real_escape_string($mysqli, trim($_POST['paralelo']));
            $jornada= mysqli_real_escape_string($mysqli, trim($_POST['jornada']));
            $anio= mysqli_real_escape_string($mysqli, trim($_POST['anio']));
            
  
            $query = mysqli_query($mysqli, "INSERT INTO matricula(
                codigo,periodo_academico,estudiante,carrera,nivel,jornada,paralelo,anio) 
                                            VALUES('$codigo','$periodo_academico','$estudiante','$carrera','$nivel','$jornada','$paralelo','$anio')")
                                            or die('error '.mysqli_error($mysqli));  
        
            if ($query) {
         
                header("location: ../../main.php?module=matricula&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
                $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
                $periodo_academico  = mysqli_real_escape_string($mysqli, trim($_POST['periodo_academico']));
                $estudiante= mysqli_real_escape_string($mysqli, trim($_POST['estudiante']));
                $carrera= mysqli_real_escape_string($mysqli, trim($_POST['carrera']));
                $nivel= mysqli_real_escape_string($mysqli, trim($_POST['nivel']));
                $paralelo= mysqli_real_escape_string($mysqli, trim($_POST['paralelo']));
                $jornada= mysqli_real_escape_string($mysqli, trim($_POST['jornada']));

                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE matricula SET  periodo_academico = '$periodo_academico',
                                                                    estudiante          = '$estudiante',
                                                                    carrera             = '$carrera',
                                                                    nivel               = '$nivel',
                                                                    paralelo            = '$paralelo',
                                                                    jornada             = '$jornada'
                                                              WHERE codigo              = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=matricula&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM matricula WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=matricula&alert=3");
            }
        }
    }       
}       
?>