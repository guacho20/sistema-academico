<?php
	require_once "../../fpdf/fpdf.php";
	
	class PDF extends FPDF
	{
				protected $B = 0;
        protected $I = 0;
        protected $U = 0;
        protected $HREF = '';
		function Header()
		{
			$this->Image('../../images/logo.png', 15, 6, 21 );
			$this->Image('../../images/corazon.png', 170, 6, 21 );
			$this->SetFont('Arial','B',18);
			$this->Cell(190,6,utf8_decode('INSPIRACIÓN MUSICAL'),0,0,'C');
			$this->Ln(6);
			$this->SetFont('Arial','',14);
			$this->Cell(190,6,utf8_decode('Instituto Cristiano de Música y Arte'),0,0,'C');
			$this->Ln(6);
			$this->SetFont('Arial','I',12);
			$this->Cell(190,6,utf8_decode('Acuerdo Ministerial Nº-171'),0,0,'C');
			$this->Ln(10);
			$this->Line(10,28,200,28);
			$this->Line(10,28,200,28);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			/*//convertimos el texto a utf8
			$dir = utf8_decode('Dirección: ');
			$text_dir = utf8_decode('La ecuatoriana (sector camal metropolitano)camilo orejuela entre calle “c” pasaje 5 de junio lote # 2, a 2 cuadras de la  parada de buses la Ecuatoriana a san roque junto al hotel');

			$this->Line(10,270,200,270);
			
			$this->SetFont('Arial','B',10);
			$this->SetFont('Arial','',10);
			$this->Multicell(190,5,$text_dir);*/


			$this->SetFont('Arial','I', 9);
			
			$this->Cell(0,10,utf8_decode('Fecha de impresión '. date('d/m/Y')),0,0,'L' );
			$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'R' );
		}



function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(8,$e);
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(8);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

//***** Aquí comienza código para ajustar texto *************
    //***********************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//************** Fin del código para ajustar texto *****************
//******************************************************************

	}
?>