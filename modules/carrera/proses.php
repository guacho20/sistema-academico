
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
            

            $query = mysqli_query($mysqli, "INSERT INTO carrera (descripcion)
                                            VALUES('$descripcion')")
                                            or die('error: '.mysqli_error($mysqli));    

          
            if ($query) {
                header("location: ../../main.php?module=carrera&alert=1");
            }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
                $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
                $descripcion  = mysqli_real_escape_string($mysqli, trim($_POST['descripcion']));
                              
                $query = mysqli_query($mysqli, "UPDATE carrera SET descripcion  = '$descripcion'
                                                                        
                                                                  WHERE codigo     = '$codigo'")
                                                    or die('error: '.mysqli_error($mysqli));

                
                if ($query) {
                  
                    header("location: ../../main.php?module=carrera&alert=2");
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM carrera WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=carrera&alert=3");
            }
        }
    }            
}       
?>