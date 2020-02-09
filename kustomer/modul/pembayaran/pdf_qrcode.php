<?php
require('../fungsi/fpdf/fpdf.php');
$ido = $_GET['ido'];

class PDF extends FPDF
{
  protected $B = 0;
  protected $I = 0;
  protected $U = 0;
  protected $HREF = '';
	function imageCenterCell($file, $x, $y, $w, $h)
	{
		if (!file_exists($file))
		{
			$this->Error('File does not exist: '.$file);
		}
		else
		{
			list($width, $height) = getimagesize($file);
			$ratio=$width/$height;
			$zoneRatio=$w/$h;
			// Same Ratio, put the image in the cell
			if ($ratio==$zoneRatio)
			{
				$this->Image($file, $x, $y, $w, $h);
			}
			// Image is vertical and cell is horizontal
			if ($ratio<$zoneRatio)
			{
				$neww=$h*$ratio;
				$newx=$x+(($w-$neww)/2);
				$this->Image($file, $newx, $y, $neww);
			}
			// Image is horizontal and cell is vertical
			if ($ratio>$zoneRatio)
			{
				$newh=$w/$ratio;
				$newy=$y+(($h-$newh)/2);
				$this->Image($file, $x, $newy, $w);
			}
		}
	}



    function WriteHTML($html)
    {
        // HTML parser
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
                    $this->Write(5,$e);
            }
            else
            {
                // Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    // Extract attributes
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
        // Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modify style and select corresponding font
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
        // Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
}
$pdf = new PDF();
$pdf->AddPage('P', 'A5', 0);
$pdf->imageCenterCell('../images/icon/logo.png',3,0,40,15);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(130,0,'PRIMAJASA', 0,1,'C');
$pdf->SetFont('Arial','P',9);
$pdf->Cell(130,7,'PT Primajasa Perdanaraya Utama',0,1,'C');
$pdf->imageCenterCell('../images/qrcode/'.$ido.'.png',32,30,86,86);
$pdf->SetY(115);
$pdf->SetX(40);
$pdf->WriteHTML('Kode Transaksi : <b>'.$ido.'</b>');
$pdf->SetY(135);
$pdf->SetX(20);
$pdf->SetFont('Arial','P',13);
$pdf->Cell(105,0,'Tunjukan QRCode ini pada petugas bus setelah Anda', 0,1,'C');
$pdf->Cell(125,10,' memasuki bus. Terimakasih sudah menggunakan jasa kami.', 0,1,'C');
$pdf->Cell(125,10,'Semoga sampai ke tujuan Anda dengan selamat.', 0,1,'C');
//$pdf->WriteHTML('<h2>Tunjukan QRCode ini pada petugas bus setelah Anda memasuki bus. Terimakasih sudah menggunakan jasa kami. Semoga sampai ke tujuan Anda dengan selamat.</h2>');
$pdf->Output('D', $ido.'.pdf');
echo "<script>window.close();</script>";
?>
