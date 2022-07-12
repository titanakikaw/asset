<?php
require('../tcpdflibrary/tcpdf.php');
require('../model/clsConnection.php');
require('../model/clsStandard.php');
class MYPDF extends TCPDF
{
    private $company = 'Company Name';
    private $catFrom = '';
    private $catTo = '';
    private $deptFrom = '';
    private $deptTo = '';
    public function setParameter($company, $catFrom, $catTo, $deptFrom, $deptTo)
    {
        if ($company || $company != '') {
            $this->company = $company;
        }
        if ($catFrom || $catFrom != '') {
            $this->catFrom = $catFrom;
        }
        if ($catTo || $catTo != '') {
            $this->catTo = $catTo;
        }
        if ($deptFrom || $deptFrom != '') {
            $this->deptFrom = $deptFrom;
        }
        if ($deptTo || $deptTo != '') {
            $this->deptTo = $deptTo;
        }
    }

    public function Header()
    {
        $html = '<table cellspacing="0" cellpadding="2">
                    <tr>
                        <td colspan=""><h1>' . $this->company . '</h1></td>
                    </tr>
                    <tr>
                        <td colspan=""><h3>SAMPLE REPORT</h3></td>
                    </tr>
                    <tr>
                        <td style="font-size:9px;width:100px;">Category [ FROM ] :</td>
                        <td style="font-size:9px;width:100px;">' . $this->catFrom . '</td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:100px;">Category [ TO ] :</td>
                        <td style="font-size:9px;width:100px;">' . $this->catTo . '</td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size:9px;width:100px;">Department [ FROM ] :</td>
                        <td style="font-size:9px;width:100px;">' . $this->deptFrom . '</td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:100px;">Department [ TO ] :</td>
                        <td style="font-size:9px;width:80px;">' . $this->deptTo . '</td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                        <td style="font-size:9px;width:70px;"></td>
                    </tr>
                    <hr>
                    <tr>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Asset Code</td>
                        <td style="font-size:9px;width:150px;border-bottom:1px solid black">Description</td>
                        <td style="font-size:9px;width:100px;border-bottom:1px solid black">Cateogry</td>
                        <td style="font-size:9px;width:95px;border-bottom:1px solid black">Onhand Quantity</td>
                        <td style="font-size:9px;width:95px;border-bottom:1px solid black">Onhand Value</td>
                        <td style="font-size:9px;width:90px;border-bottom:1px solid black">Counted Quantity</td>
                        <td style="font-size:9px;width:95px;border-bottom:1px solid black">Counted Value</td>
                        <td style="font-size:9px;width:95px;border-bottom:1px solid black">Variance Quantity</td>
                        <td style="font-size:9px;width:95px;border-bottom:1px solid black">Asset Cost</td>
                        <td style="font-size:9px;width:95px;border-bottom:1px solid black">Variance Value</td>
                    </tr>
                </table>';
        $this->writeHTML($html, true, false, false, false, '');
    }
}



$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setParameter('', '', '', '', '', '');
$pdf->SetHeaderMargin(4);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setAutoPageBreak(true, 23);
$pdf->SetMargins(5, 40, 5);
$pdf->setPrintHeader(true);
// $pdf->SetFooterMargin(20);
$pdf->AddPage('L', 'LEGAL');


$html = '<table cellspacing="" cellpadding="2" >
            <tbody>';



$html .= '   </tbody>
        </table>';


$pdf->writeHTML($html, true, 0, true, 0);

$pdf->Output('example_021.pdf', 'I');
