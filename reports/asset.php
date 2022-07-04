<?php
require('../tcpdflibrary/tcpdf.php');
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

class MYPDF extends TCPDF
{
    public function Header()
    {
        $html = '<table cellspacing="0" cellpadding="2">
                    <tr>
                        <td colspan=""><h1>Company Name</h1></td>
                    </tr>
                    <tr>
                        <td colspan=""><h3>Company Name</h3></td>
                    </tr>
                    <tr>
                        <td style="font-size:9px;width:100px;">Category [ FROM ] :</td>
                        <td style="font-size:9px;width:70px;">Sample Test</td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:100px;">Category [ TO ] :</td>
                        <td style="font-size:9px;width:80px;">Sample Test</td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size:9px;width:100px;">Department [ FROM ] :</td>
                        <td style="font-size:9px;width:70px;">Sample Test</td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:100px;">Department [ TO ] :</td>
                        <td style="font-size:9px;width:80px;">Sample Test</td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                    </tr>
                    <hr>
                    <tr>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Asset Code</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Description</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Category</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Department</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Location</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Start Warranty</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">End Warranty</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Status</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Useful life</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Cost</td>
                        <td style="font-size:9px; width: 70px;border-bottom:1px solid black">Qty</td>
                        <td style="font-size:9px;border-bottom:1px solid black">Salvage Value</td>
                        <td style="font-size:9px;border-bottom:1px solid black">Salvage Value</td>
                        <td style="font-size:9px;border-bottom:1px solid black">Monthly</td>
                    </tr>
                </table>';
        $this->writeHTML($html, true, false, false, false, '');
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetHeaderMargin(4);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setAutoPageBreak(true, 23);
$pdf->SetMargins(5, 40, 5);
$pdf->setPrintHeader(true);
$pdf->SetFooterMargin(20);
$pdf->AddPage('L', 'LEGAL');


$test = array();
$test['assetno'] = "Asset123";
$test['description'] = "Publishing and graphic design, Lorem ipsum is a placeholder text commonly";
$test['cat_code'] = "CATCODE123";
$test['dept_code'] = "DEPTCODE123";
$test['loc_code'] = "LOCCODE123";
$test['dteFrm'] = "02-02-2222";
$test['dteTo'] = "02-02-2222";
$test['status_code'] = "STATCODE12";
$test['usefullife'] = "3";
$test['cost'] = "PHP 50000";
$test['qty'] = "1000";
$test['salvalue'] = "PHP 2000";
$test['monthlydep'] = "PHP 4000";
$test['annualdep'] = "PHP 4000";




$html = '<table cellspacing="" cellpadding="2" >
            <tbody>';

foreach ($test as $key => $value) {
    $html .= '<tr>
                    <td style="font-size:9px">ASSETCODE - 0123</td>
                    <td style="font-size:9px">Publishing and graphic design, Lorem ipsum is a placeholder text commonly</td>
                    <td style="font-size:9px">CATEGORY-0125</td>
                    <td style="font-size:9px;">DEPARTMENT</td>
                    <td style="font-size:9px">LOCATION</td>
                    <td style="font-size:9px">07-02-2022</td>
                    <td style="font-size:9px">07-02-2022</td>
                    <td style="font-size:9px">Non - Operational</td>
                    <td style="font-size:9px">25</td>
                    <td style="font-size:9px">PHP 100000.00</td>
                    <td style="font-size:9px">1000</td>
                    <td style="font-size:9px">PHP 50000</td>
                    <td style="font-size:9px">PHP 10000</td>
                    <td style="font-size:9px">PHP 10000</td>
                </tr>';
}

$html .= '   </tbody>
        </table>';


$pdf->writeHTML($html, true, 0, true, 0);

$pdf->Output('example_021.pdf', 'I');
