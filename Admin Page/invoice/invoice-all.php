<?php
include '../../fpdf17/fpdf.php';

include '../../Functions/functions.php';

$query = mysqli_query($conn, "SELECT * FROM invoice where invoiceid='" . $_GET['invoiceid'] . "'");
$invoice=mysqli_fetch_array($query);
$date1 = $invoice['date'];
$date = new DateTime($date1);
$date_plus = $date->modify("+3 days");
$LogintDate = strtotime($date1);
// $newDate = DateTime::createFromFormat("d-m-Y", $date1);
// $newDate = $newDate->format('d-m-Y'); 
// $newDate=DateTime::createFromFormat('d-m-Y', $date1)->format('Y-m-d'); 
// $date2 = DateTime::createFromFormat('d/m/Y', $date1);
// $newDate = date("d-m-Y", strtotime($date2)); 


$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('arial','B',14);



//Cell(width , height , text , border , end line , [align] )

// $pdf->Cell(130	,5,'Klasik Room Rental APPLIANCES.CO',0,0);
$pdf->Cell(20	,2.5,'',0,1,);
$pdf->Cell(20	,3,'',0,0,);
$pdf->Cell(147	,10,'Kos Bujang',0,0,);
$pdf->Cell(10	,10,'RENT INVOICE',0,1,'R');//end of line

$pdf->SetFont('Times','',12);
$pdf->Cell(20	,10,'',0,0,);
$pdf->Cell(10	,1,'Jl.Tergelincir',0,0,);

$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->SetFont('arial','B',12);
$pdf->Cell(70	,5,'Bill To',0,0);
$pdf->Cell(70	,5,'Bill From',0,0);
$pdf->Cell(0	,5,'Invoice No : '.$invoice['invoiceid'],0,1);

//set font to arial, regular, 12pt
$pdf->SetFont('Times','',10);

$pdf->Cell(70	,5,'Name : '.$invoice['tenant_name'],0,0);
$pdf->Cell(70	,5,'Name : Ricky Chandrean',0,0);
$pdf->Cell(130	,5,'',0,1);

$pdf->Cell(70	,5,'Status : '.$invoice['company'],0,0);
$pdf->Cell(70	,5,'Company Name : Kos Bujang',0,0);
$pdf->Cell(130	,5,'Invoice date : '.date('d-m-Y', $LogintDate),0,1);

$pdf->Cell(70	,5,'Street Address : '.$invoice['tenant_address'],0,0);
$pdf->Cell(70	,5,'Street Address : Jl. Tergelincir',0,0);
$pdf->Cell(130	,5,'',0,1);

$pdf->Cell(70	,5,'City, ST ZIP Code : '.$invoice['Zip_code'],0,0);
$pdf->Cell(70	,5,'City, ST ZIP Code : Cikarang Utara, 17534',0,0);
$pdf->Cell(130	,5,'Due Date : '.$date_plus->format("d-m-Y"),0,1);

$pdf->Cell(70	,5,'Phone : '.$invoice['tenant_phone'],0,0);
$pdf->Cell(70	,5,'Phone : 081521515366',0,0);
$pdf->Cell(130	,5,'',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('arial','B',12);

$pdf->Cell(60	,5,'Room Size and Label',1,0,'C');
$pdf->Cell(50	,5,'Month(s)',1,0,'C');
$pdf->Cell(37	,5,'Price',1,0,'C');
$pdf->Cell(37	,5,'Total',1,1,'C');//end of line

$pdf->SetFont('Times','',10);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query=mysqli_query($conn,"select * from invoice ORDER BY invoiceid DESC LIMIT 1");
$tax=0;
$amount=0;
$month = $invoice['month'];
$price = $invoice['price'];
$total=$invoice['month']*$invoice['price'];

while($item=mysqli_fetch_array($query)){
	$first=$invoice['room_size'].'/'.$invoice['room_label'];
	$pdf->Cell(60	,5,$first,1,0);
	$pdf->Cell(50	,5,$invoice['month'],1,0);
	$pdf->Cell(37	,5,'Rp.'.number_format($price),1,0);
	$pdf->Cell(37	,5,'Rp.'.number_format($total),1,1,);//end of line
}

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(17	,5,'Subtotal',0,0);
$pdf->Cell(37	,5,'Rp.'.number_format($total),1,1,);//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(17	,5,'Other',0,0);
$pdf->Cell(37	,5,'Rp.0',1,1,);//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(17	,5,'Total ',0,0);
$pdf->Cell(37	,5,'Rp.'.number_format($total),1,1,);//end of line

$pdf->Cell(189	,15,'',0,1);//end of line
$pdf->SetFont('arial','B',12);
$pdf->Cell(190	,5,'Terms and Conditions',0,1,'C');

$pdf->Cell(189	,8,'',0,1);//end of line

$pdf->SetFont('arial','B',11);
$pdf->Cell(190	,5,'- Payment can be transferred via : ',0,1,'L');

$pdf->SetFont('Times','',10);
$pdf->Cell(2.5	,5,'',0,0,);
$pdf->Cell(190	,5,'BANK BCA Rec.	5125206350	a.n. Ricky Chandrean',0,1,'L');
$pdf->Cell(2.5	,5,'',0,0,);
$pdf->Cell(200	,5,'Dana/Shopeepay/Gopay/OVO	081521515366 a.n. Ricky Chandrean',0,1,'L');

$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->SetFont('Arial','B',11);
$pdf->Cell(190	,3,'- Note : ',0,1,'L');

$pdf->SetFont('Times','',10);
$pdf->Cell(2.5	,3,'',0,0,);
$pdf->MultiCell(150	,5,'Thank you for your business. Please send payment withen 3 days of receiving this invoice. There will be a fine 0.5% per day on late invoices. Make sure the total value of your bill is correct according to the name listed above. If you have any questions regarding this invoice, please call +6281521515366.',0,'L');



$pdf->Output();
?>