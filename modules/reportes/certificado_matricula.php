<?php
    session_start();
    require_once "../../modules/reportes/plantilla.php";
    require_once "../../config/database.php";

    if (isset($_GET['idestudiante'])) {
            $codigo = $_GET['idestudiante'];
      
             $query = mysqli_query($mysqli, "SELECT m.codigo as num_matricula, p.descripcion as periodo_academico,e.nombre , e.apellido ,e.cedula as cedula ,c.descripcion as carrera, n.descripcion as nivel,pa.descripcion as paralelo, j.descripcion as jornada
                from matricula m
                join periodo_academico p 
                on m.periodo_academico = p.codigo
                join estudiante e
                on m.estudiante = e.cedula
                join carrera c
                on m.carrera = c.codigo
                join nivel n 
                on m.nivel = n.codigo
                join paralelo pa
                on m.paralelo = pa.codigo
                join jornada j 
                on m.jornada = j.codigo WHERE m.codigo='$_GET[idestudiante]'") 
                                      or die('error: '.mysqli_error($mysqli));
            $data  = mysqli_fetch_assoc($query);
    }
    


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    /**********CERTIFICADO DE MATRICULA ********/
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',11);
    //$pdf->Cell(190,0,utf8_decode('MATRÍCULA PERIODO : '),0,0,'C');
    $pdf->Cell(190, 0,utf8_decode('Periodo Matricula: ' . $data['periodo_academico']), 0,0,'C');
    $pdf->Ln(15);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,0,utf8_decode('CERTIFICADO DE MATRICULA'),0,0,'C');
    $pdf->Ln(15);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(30,0,utf8_decode('Matricula'),0,0,'L');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(0,0,utf8_decode($data['num_matricula']),0,0,'L');
    $pdf->Ln(8);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(30,0,utf8_decode('Fecha'),0,0,'L');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(0,0,utf8_decode(date('d/m/Y')),0,0,'L'); 
    $pdf->Ln(25);

    $pdf->SetFont('Arial','',11);

    $html ='<b>Certifico</b> que el/la estudiante <b>'.utf8_decode($data['apellido'] ).' '. utf8_decode($data['nombre']) .'</b> previo a los requisitos legales se  encuentra matriculado(a) en el <b>'.$data['nivel'].'</b>'.utf8_decode(' de la carrera Técnico en <b>' ). utf8_decode($data['carrera']).'</b> en la jornada '.'<b>'.utf8_decode($data['jornada']).'</b>.';
    $pdf->WriteHTML($html);

    
    $pdf->Ln(45);


    $pdf->Cell(190,0,utf8_decode('------------------------------------'),0,0,'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(190,0,utf8_decode('SECRETARIA'),0,0,'C');


    
    $pdf->Output('CertificadoMatricula_'.$data['cedula'].'.pdf','I');
    

?>