<?php
    session_start();
    require_once "../../modules/reportes/plantilla.php";
    require_once "../../config/database.php";
    
    $query = "SELECT m.codigo, p.descripcion as periodo_academico,e.nombre , e.apellido ,c.descripcion as carrera, n.descripcion as nivel,pa.descripcion as paralelo, j.descripcion as jornada
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
        on m.jornada = j.codigo  ORDER BY codigo ASC";
    $resultado = $mysqli->query($query);
    $no = 1;


    $pdf = new PDF();
    $pdf->AliasNbPages(); 
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(140,0,utf8_decode('Lista general de estudiantes matriculados'),0,0,'L');
    $pdf->Line(10,36,200,36);
    $pdf->Ln(8);
    
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,6,utf8_decode('Nº'),1,0,'C',1);
    $pdf->Cell(50,6,utf8_decode('Estudiante'),1,0,'C',1);
    $pdf->Cell(42,6,'Periodo academico',1,0,'C',1);
    $pdf->Cell(23,6,'Carrera',1,0,'C',1);
    $pdf->Cell(20,6,utf8_decode('Nivel'),1,0,'C',1);
    $pdf->Cell(45,6,'Jornada',1,1,'C',1);

    $pdf->SetFont('Arial','',8);
    
    while($row = $resultado->fetch_assoc())
    {
        $pdf->CellFitSpace(10,6,utf8_decode($no),1,0,'C');
        $pdf->CellFitSpace(50,6,utf8_decode($row['apellido'].' '.$row['nombre']),1,0,'C');
        $pdf->CellFitSpace(42,6,utf8_decode($row['periodo_academico']),1,0,'C');
         $pdf->CellFitSpace(23,6,utf8_decode($row['carrera']),1,0,'C');
        $pdf->CellFitSpace(20,6,utf8_decode($row['nivel']),1,0,'C');
        $pdf->CellFitSpace(45,6,utf8_decode($row['jornada']),1,1,'C');
       
        $no++;
    }
    $pdf->Output();
    
    
?>