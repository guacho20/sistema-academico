<?php
    session_start();
    require_once "../../modules/reportes/plantilla.php";
    require_once "../../config/database.php";
    
    $query = "SELECT codigo,nombre,apellido,cedula,celular,correo,barrio,iglesia FROM estudiante ORDER BY nombre ASC";
    $resultado = $mysqli->query($query);
    $no = 1;
    $total=0;


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(140,0,utf8_decode('Lista general de estudiantes inscritos'),0,0,'L');
    $pdf->Cell(200,0,"Fecha: ". date('d/m/Y'));
    $pdf->Line(10,36,200,36);
    $pdf->Ln(8);
    
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,6,utf8_decode('Nº'),1,0,'C',1);
    $pdf->Cell(20,6,utf8_decode('Cédula'),1,0,'C',1);
    $pdf->Cell(55,6,'Apellidos y Nombres',1,0,'C',1);
    $pdf->Cell(20,6,utf8_decode('Teléfono'),1,0,'C',1);
    $pdf->Cell(33,6,'Correo',1,0,'C',1);
    $pdf->Cell(20,6,'Barrio',1,0,'C',1);
    $pdf->Cell(32,6,'Iglesia',1,1,'C',1);

    $pdf->SetFont('Arial','',8);
    
    while($row = $resultado->fetch_assoc())
    {
        $pdf->CellFitSpace(10,6,utf8_decode($no),1,0,'C');
        $pdf->CellFitSpace(20,6,utf8_decode($row['cedula']),1,0,'C');
        $pdf->CellFitSpace(55,6,utf8_decode($row['apellido'].' '.$row['nombre']),1,0,'C');
        $pdf->CellFitSpace(20,6,utf8_decode($row['celular']),1,0,'C');
        $pdf->CellFitSpace(33,6,utf8_decode($row['correo']),1,0,'C');
        $pdf->CellFitSpace(20,6,utf8_decode($row['barrio']),1,0,'C');
        $pdf->CellFitSpace(32,6,utf8_decode($row['iglesia']),1,1,'C');
        $no++;
        
    }
    $total= $total+$no-1;
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(140,8,'Total de estudiantes escritos: '.''.$total,0,1,'L');


    $pdf->Output('Lista_Estudiantes_Inscritos.pdf','I');
    
    
?>