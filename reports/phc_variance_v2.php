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
                        <td colspan=""><h3>ASSET VARIANCE REPORT</h3></td>
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
                    <hr>';
        $html .= '<tr>
                    <td style="font-size:9px;width:70px;border-bottom:1px solid black">Asset Code</td>
                    <td style="font-size:9px;width:120px;border-bottom:1px solid black">Description</td>
                    <td style="font-size:9px;width:80px;border-bottom:1px solid black">Cateogry</td>
                    <td style="font-size:9px;width:95px;border-bottom:1px solid black">Asset Cost</td>
                    <td style="font-size:9px;width:55px;border-bottom:1px solid black">UM</td>
                    <td style="font-size:9px;width:90px;border-bottom:1px solid black">Onhand Quantity</td>
                    <td style="font-size:9px;width:95px;border-bottom:1px solid black">Onhand Value</td>
                    <td style="font-size:9px;width:90px;border-bottom:1px solid black">Counted Quantity</td>
                    <td style="font-size:9px;width:95px;border-bottom:1px solid black">Counted Value</td>
                    <td style="font-size:9px;width:95px;border-bottom:1px solid black">Variance Quantity</td>
                    <td style="font-size:9px;width:95px;border-bottom:1px solid black">Variance Value</td>
                </tr>';
        $html .= '</table>';
        $this->writeHTML($html, true, false, false, false, '');
    }
}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setParameter('', '', '', '', '', '');
$pdf->SetHeaderMargin(2);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setAutoPageBreak(true, 23);
$pdf->SetMargins(5, 40, 5);
$pdf->setPrintHeader(true);
// $pdf->SetFooterMargin(20);
$pdf->AddPage('L', 'LEGAL');




$asset = [];
$content = '';
$TotalAssetCost  = 0;
$TotalOnhandQty  = 0;
$TotalOnhandValue  = 0;
$TotalCounted  = 0;
$TotalCountedValue  = 0;
$TotalValue  = 0;
$TotalVarianceQty  = 0;
$TotalVarianceValue  = 0;



$clsController = new clsController('', '');
$query = "SELECT a.*, b.description, b.qty as onhand_qty,b.cost, c.description as category
from phc_assets as a LeFT JOIN assets as b on a.assetno = b.assetno 
INNER JOIN category as c on b.cat_code = c.cat_code where phc_code = 'test' ORDER BY category DESC";
$data  = $clsController->list_custom($query, []);

foreach ($data as $key => $value) {
    $onHand_qty = $value['onhand_qty'] - $value['qty'];
    $onHand_value = $onHand_qty * $value['cost'];
    $counted_value  = $value['qty'] * $value['cost'];
    $variance_qty =  $value['qty'] - $onHand_qty;
    $variance_value =  $variance_qty  * $value['cost'];

    $TotalAssetCost += $value['cost'];
    $TotalOnhandQty += $onHand_qty;
    $TotalOnhandValue +=  $onHand_value;
    $TotalCounted += $value['qty'];
    $TotalCountedValue +=  $counted_value;
    $TotalVarianceQty += $variance_qty;
    $TotalVarianceValue +=  $variance_value;
    $content .= '<tr>';
    $content .= '<td style="font-size:9px;width:70px;">' . $value['assetno'] . '</td>';
    $content .= '<td style="font-size:9px;width:120px;">' . $value['description'] . '</td>';
    $content .= '<td style="font-size:9px;width:80px;">' . $value['category'] . '</td>';
    $content .= '<td style="font-size:9px;width:95px;">PHP ' . number_format($value['cost']) . '</td>';
    $content .= '<td style="font-size:9px;width:55px;">Pcs</td>';
    $content .= '<td style="font-size:9px;width:95px;">' . $onHand_qty . '</td>';
    $content .= '<td style="font-size:9px;width:90px;">PHP ' .  number_format($onHand_value) . '</td>';
    $content .= '<td style="font-size:9px;width:90px;">' . $value['qty'] . '</td>';
    $content .= '<td style="font-size:9px;width:95px;">PHP ' .  number_format($counted_value) . '</td>';
    $content .= '<td style="font-size:9px;width:95px;">' . $variance_qty . '</td>';
    $content .= '<td style="font-size:9px;width:95px;">PHP ' .  number_format($variance_value) . '</td>';
    $content .= '</tr>';
}
$content .= '<hr>
            <tr>
                <td style="font-size:9px;width:70px;"></td>
                <td style="font-size:9px;width:120px;"></td>
                <td style="font-size:9px;width:80px;"></td>
                <td style="font-size:9px;width:95px;">PHP ' .  number_format($TotalAssetCost) . '</td>
                <td style="font-size:9px;width:55px;"></td>
                <td style="font-size:9px;width:95px;">' .  number_format($TotalOnhandQty) . '</td>
                <td style="font-size:9px;width:90px;">PHP ' .  number_format($TotalOnhandValue) . '</td>
                <td style="font-size:9px;width:90px;">' .  number_format($TotalCounted) . '</td>
                <td style="font-size:9px;width:95px;">PHP ' .  number_format($TotalCountedValue) . '</td>
                <td style="font-size:9px;width:95px;">' .  number_format($TotalVarianceQty) . '</td>
                <td style="font-size:9px;width:95px;">PHP ' .  number_format($TotalVarianceValue) . '</td>
            </tr>
            ';
$html = '<table cellspacing="" cellpadding="2" >
            <tbody>';
$html .=  $content;
$html .= '   </tbody>
        </table>';

$pdf->writeHTML($html, true, 0, true, 0);

$pdf->Output('example_021.pdf', 'I');
