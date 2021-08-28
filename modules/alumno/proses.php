
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
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $apellido= mysqli_real_escape_string($mysqli, trim($_POST['apellido']));
            $cedula= mysqli_real_escape_string($mysqli, trim($_POST['cedula']));
            $fecha_nacimiento= mysqli_real_escape_string($mysqli, trim($_POST['fecha_nacimiento']));
            $edad= mysqli_real_escape_string($mysqli, trim($_POST['edad']));
            $direccion= mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $barrio= mysqli_real_escape_string($mysqli, trim($_POST['barrio']));
            $telefono= mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $celular= mysqli_real_escape_string($mysqli, trim($_POST['celular']));
            $correo= mysqli_real_escape_string($mysqli, trim($_POST['correo']));
            $sexo= mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
            $nivel_instrucion= mysqli_real_escape_string($mysqli, trim($_POST['nivel_instrucion']));
            $profesion= mysqli_real_escape_string($mysqli, trim($_POST['profesion']));
            $iglesia= mysqli_real_escape_string($mysqli, trim($_POST['iglesia']));
            $gusta_musica= mysqli_real_escape_string($mysqli, trim($_POST['gusta_musica']));
            $mision= mysqli_real_escape_string($mysqli, trim($_POST['mision']));
            $vision= mysqli_real_escape_string($mysqli, trim($_POST['vision']));
            $foto= mysqli_real_escape_string($mysqli, trim($_POST['foto']));

            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO estudiante(
                codigo,nombre,apellido,cedula,fecha_nacimiento,edad,direccion,barrio,telefono,celular,correo,sexo,nivel_instruccion,profesion,iglesia,gusto_musica,mision,vision,foto,created_user,updated_user) 
                                            VALUES('$codigo','$nombre','$apellido','$cedula','$fecha_nacimiento','$edad','$direccion','$barrio','$telefono','$celular','$correo','$sexo','$nivel_instrucion','$profesion','$iglesia','$gusta_musica','$mision','$vision','$foto','$created_user','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=alumno&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
                $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
                $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
                $apellido= mysqli_real_escape_string($mysqli, trim($_POST['apellido']));
                $cedula= mysqli_real_escape_string($mysqli, trim($_POST['cedula']));
                $fecha_nacimiento= mysqli_real_escape_string($mysqli, trim($_POST['fecha_nacimiento']));
                $edad= mysqli_real_escape_string($mysqli, trim($_POST['edad']));
                $direccion= mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
                $barrio= mysqli_real_escape_string($mysqli, trim($_POST['barrio']));
                $telefono= mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
                $celular= mysqli_real_escape_string($mysqli, trim($_POST['celular']));
                $correo= mysqli_real_escape_string($mysqli, trim($_POST['correo']));
                $sexo= mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
                $nivel_instrucion= mysqli_real_escape_string($mysqli, trim($_POST['nivel_instrucion']));
                $profesion= mysqli_real_escape_string($mysqli, trim($_POST['profesion']));
                $iglesia= mysqli_real_escape_string($mysqli, trim($_POST['iglesia']));
                $gusta_musica= mysqli_real_escape_string($mysqli, trim($_POST['gusta_musica']));
                $mision= mysqli_real_escape_string($mysqli, trim($_POST['mision']));
                $vision= mysqli_real_escape_string($mysqli, trim($_POST['vision']));

                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE estudiante SET  nombre         = '$nombre',
                                                                    apellido            = '$apellido',
                                                                    cedula              = '$cedula',
                                                                    fecha_nacimiento    = '$fecha_nacimiento',
                                                                    edad                = '$edad',
                                                                    direccion           = '$direccion',
                                                                    barrio              = '$barrio',
                                                                    telefono            = '$telefono',
                                                                    celular             = '$celular',
                                                                    correo              = '$correo',
                                                                    sexo                = '$sexo',
                                                                    nivel_instruccion    = '$nivel_instrucion',
                                                                    profesion           = '$profesion',
                                                                    iglesia             = '$iglesia',
                                                                    gusto_musica        = '$gusta_musica',
                                                                    mision              = '$mision',
                                                                    vision              = '$vision'
                                                              WHERE codigo              = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=alumno&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM estudiante WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=alumno&alert=3");
            }
        }
    }       
}       
?>