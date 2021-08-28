<?php
    session_start();
    require_once "../../modules/reportes/plantilla.php";
    require_once "../../config/database.php";

    if (isset($_GET['idestudiante'])) {
            $codigo = $_GET['idestudiante'];
      
             $query = mysqli_query($mysqli, "SELECT codigo,nombre,apellido,cedula,edad,fecha_nacimiento,direccion,barrio,telefono,celular,correo,sexo,nivel_instruccion,profesion,iglesia,gusto_musica,mision,vision,foto,created_date FROM estudiante WHERE codigo='$_GET[idestudiante]'") 
                                      or die('error: '.mysqli_error($mysqli));
            $data  = mysqli_fetch_assoc($query);
    }
    
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190,0,utf8_decode('FICHA DE MATRICULA'),0,0,'L');
    $pdf->Line(10,35,200,35);
    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,utf8_decode("Código :"),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(20,6,utf8_decode($data['codigo']),0,0,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(28,6,utf8_decode("Fecha ingreso :"),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,6,utf8_decode($data['created_date']),0,0,'L');
    $pdf->Image('../../images/user/andres.jpg', 170, 38, 30 );
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,utf8_decode("Cedula :"),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(22,6,utf8_decode($data['cedula']),0,0,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Ln(7);
    $pdf->Cell(20,6,utf8_decode("Nombres: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,6,utf8_decode($data['nombre']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,utf8_decode("Apellidos: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,6,utf8_decode($data['apellido']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,utf8_decode("Dirección: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,6,utf8_decode($data['direccion']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(42,6,utf8_decode("Fecha Nacimiento: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(22,6,utf8_decode($data['fecha_nacimiento']),0,0,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(18,6,utf8_decode("Edad: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(15,6,utf8_decode($data['edad']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(42,6,utf8_decode("Teléfono convencional: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(22,6,utf8_decode($data['telefono']),0,0,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(18,6,utf8_decode("Celular: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(22,6,utf8_decode($data['celular']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,utf8_decode("E-mail: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,6,utf8_decode($data['correo']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(42,6,utf8_decode("Nivel de instrucción: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(22,6,utf8_decode($data['nivel_instruccion']),0,0,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(18,6,utf8_decode("Profesión: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,6,utf8_decode($data['profesion']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(73,6,utf8_decode("Nombre de la iglesia a la que pertenece: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,6,utf8_decode($data['iglesia']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,6,utf8_decode("Por qué le gusta la música?: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,6,utf8_decode($data['gusto_musica']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(37,6,utf8_decode("¿Cuál es su misión?: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,6,utf8_decode($data['mision']),0,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,6,utf8_decode("¿Cuál es su visión?: "),0,0,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,6,utf8_decode($data['vision']),0,0,'L');    
    $pdf->Ln(12);

    /*************REGLAS***********************/
    $a= utf8_decode("La inscripción tiene un costo de $10 dólares no reembolsable, este costo es al inicio de cada nivel o semestre.");
    $b= utf8_decode("El costo de la pensión es de $ 20 dólares, pero hay meses que lleven 5 semanas prácticamente es como cancelar $5 dólares por cada semana de clases y debe pagar al inicio de cada mes.pción tiene un costo de $10 dólares no reembolsable, este costo es al inicio de cada nivel o semestre.");
    $c= utf8_decode("El nivel o semestre tiene una duración de 6 meses, 15 días adicional por exámenes y supletorios.");
    $d= utf8_decode("Si usted no alcanzo la nota de 7 como mínimo para ser promovido al nivel superior, tendrá que rendir un examen supletorio, el mismo que tiene un costo de $ 5 dólares, por cada materia.");
    $e= utf8_decode("Si usted faltó tiene la obligación de justificar e igualarse en cuanto al avance programático.");
    $f= utf8_decode("Si usted faltó por 4 clases consecutivos sin justificación alguna será desertado o tendrá que esperar el inicio de nuevo nivel para su reingreso.");
    $g= utf8_decode("Se suspenderá clases por fuerza mayor, el mismo que se comunicará con anticipación.");
    $h= utf8_decode("Si usted no asistió a clases normales y faltó por alguna razón no le exime el pago la jornada de clases normalmente, la institución no le restará el valor de ese día al momento de su pago.");
    $i= utf8_decode("Por favor seamos puntuales a la hora de inicio de clases si usted llega atrasado se convierte en un factor distractor para el resto de estudiantes e instructores.");
    $j= utf8_decode("Mantenga su celular en modo de silencio o vibración o cualquier dispositivo electrónico.");
    $k= utf8_decode("Si existiera novedad, sugerencias, inconformidad comunicar inmediatamente del mismo al Director de la institución, evitemos malos comentarios e interpretaciones dentro y fuera de la misma.");
    $l= utf8_decode("Si usted por imprudencia daño o rompió algún accesorio o dispositivo de la institución tendrá que responder por ella, la institución no dispone de fondos extras para cubrir gastos imprevistos.");
    /*********************************/
    //Reglamentos o condicione
    $pdf->Line(10,129,200,129);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190,0,utf8_decode('INFORMACIÓN GENERAL PARA EL CONOCIMIENTO DE LOS ESTUDIANTES'),0,0,'C');
    $pdf->Ln(2);
    $pdf->SetFont('Arial','',10);
    $pdf->Multicell(190,5,"1.- ".$a);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"2.- ".$b);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"3.- ".$c);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"4.- ".$d);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"5.- ".$e);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"6.- ".$f);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"7.- ".$g);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"8.- ".$h);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"9.- ".$i);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"10.- ".$j);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"11.- ".$k);
    $pdf->Ln(1);
    $pdf->Multicell(190,5,"12.- ".$l);
    $pdf->Ln(20);

    $pdf->Cell(190,0,utf8_decode('--------------------------------------------------'),0,0,'C');
    $pdf->Ln(0);
    $pdf->Cell(190,6,utf8_decode($data['nombre'] . " ".$data['apellido'] ),0,0,'C');
    $pdf->Ln(4);
    $pdf->Cell(190,6,utf8_decode("C.I. " . $data['cedula']),0,0,'C');

    $pdf->Output('FichaDatos_'.$data['cedula'].'.pdf','I');
    
    
?>