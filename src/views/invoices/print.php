<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


require('../modules/fpdf/tfpdf.php');
require('../modules/slownie.php');

$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);

$pdf->SetFontSize(10);
$pdf->Cell(4,6, $model->ivcPfl->pfl_name_1, 0, 1);
$pdf->Cell(4,6, $model->ivcPfl->pfl_name_2, 0, 1);
$pdf->Cell(4,6, $model->ivcPfl->pfl_name_3, 0, 1);
$pdf->Cell(4,6, $model->ivcPfl->pfl_name_4, 0, 1);
$pdf->Cell(4,6, $model->ivcPfl->pfl_name_5, 0, 1);
$pdf->Cell(4,6, $model->ivcPfl->pfl_name_6, 0, 1);

$pdf->Ln(10);
$pdf->SetFontSize(20);
$pdf->cell(0,10,"Faktura nr: " . $model->ivc_number , 0, 1, 'C');
$pdf->SetFontSize(8);
$pdf->cell(0,6,"(oryginał / kopia)", 0, 1, 'C');

$pdf->Ln(10);
$pdf->SetFontSize(10);
$pdf->Cell(35,6,"Data wystawienia:", 0, 0);     $pdf->Cell(105,6,$model->ivc_date_create, 0, 1);
$pdf->Cell(35,6,"Data sprzedaży:", 0, 0);     $pdf->Cell(105,6,$model->ivc_date_sale, 0, 1);


$pdf->Ln(6);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(95,6,"Sprzedawca", 0, 0);   $pdf->Cell(105,6,"Nabywca", 0, 1);

$pdf->SetFont('DejaVu','',10);

$cln_nip = $model->ivcCln->cln_name_4;
if (strlen($cln_nip) > 0) {
    $cln_nip = 'NIP: ' . $cln_nip;
}

$pdf->Cell(95, 5, $model->ivcPfl->pfl_name_1, 0, 0);   $pdf->Cell(105,5,$model->ivcCln->cln_name_1, 0, 1);
$pdf->Cell(95, 5, $model->ivcPfl->pfl_name_2, 0, 0);   $pdf->Cell(105,5,$model->ivcCln->cln_name_2, 0, 1);
$pdf->Cell(95, 5, $model->ivcPfl->pfl_name_3, 0, 0);   $pdf->Cell(105,5,$model->ivcCln->cln_name_3, 0, 1);
$pdf->Cell(95, 5, $model->ivcPfl->pfl_name_4, 0, 0);   $pdf->Cell(105,5,$cln_nip, 0, 1);
$pdf->Cell(95, 5, $model->ivcPfl->pfl_name_5, 0, 0);   $pdf->Cell(105,5,$model->ivcCln->cln_name_5, 0, 1);
$pdf->Cell(95, 5, $model->ivcPfl->pfl_name_6, 0, 0);   $pdf->Cell(105,5,$model->ivcCln->cln_name_6, 0, 1);

$pdf->Ln(15);
$pdf->Cell(10,6,"Lp.", 1, 0);
$pdf->Cell(110,6,"Nazwa", 1, 0);
$pdf->Cell(20,6,"Ilość", 1, 0, 'R');
$pdf->Cell(10,6,"J.m.", 1, 0, 'R');
$pdf->Cell(20,6,"Cena", 1, 0, 'R');
$pdf->Cell(20,6,"Wartość", 1, 1, 'R');

$i = 0;
foreach (array('', '_2', '_3') as $suffix) {

    if ($model->{'ivc_count' . $suffix} > 0) {

        $i += 1;
        $pdf->Cell(10,6,$i, 1, 0, 'R');
        $pdf->Cell(110,6,$model->{'ivc_name' . $suffix}, 1, 0);
        $pdf->Cell(20,6,$model->{'ivc_count' . $suffix}, 1, 0, 'R');
        $pdf->Cell(10,6,$model->{'ivc_unit' . $suffix}, 1, 0, 'R');
        $pdf->Cell(20,6,number_format($model->{'ivc_price' . $suffix},2), 1, 0, 'R');
        $value = round($model->{'ivc_count' . $suffix} * $model->{'ivc_price' . $suffix}, 2);
        $pdf->Cell(20,6, number_format($value,2) , 1, 1, 'R');

    }

}

$pdf->Cell(170,6,"Do zapłaty:", 0, 0, 'R');
$pdf->Cell(20,6,number_format($model->ivc_value,2), 1, 1, 'R');

$pdf->Ln(10);

$slownie = Kwota::getInstance()->slownie($model->ivc_value);
$pdf->Cell(190,6,"Słownie do zapłaty: " . $slownie, 0, 1, 'R');


$pdf->Ln(10);

$pdf->Cell(30,6,"Forma płatności:", 0, 0);     $pdf->Cell(105,6,$model->ivc_payment_method, 0, 1);
$pdf->Cell(30,6,"Termin płatności:", 0, 0);     $pdf->Cell(105,6,$model->ivc_date_payment, 0, 1);


$pdf->Ln(30);

$pdf->Cell(95,6,str_repeat('.', 50), 0, 0, 'C');   $pdf->Cell(95,6,str_repeat('.', 50), 0, 1, 'C');
$pdf->SetFontSize(5);
$pdf->Cell(95,6,"Podpis osoby upoważnionej do odbioru rachunku", 0, 0, 'C');    $pdf->Cell(95,6,"Podpis osoby upoważnionej do wystawienia rachunku", 0, 1, 'C');

$outname = "rachunek-" . str_replace('/','_',$model->ivc_number) . "-ufaktura.pdf";

$pdf->Output($outname, 'D');

?>
