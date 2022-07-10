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
                        <td style="font-size:9px;width:50px;border-bottom:1px solid black">Useful life</td>
                        <td style="font-size:9px;width:70px;border-bottom:1px solid black">Cost</td>
                        <td style="font-size:9px; width: 40px;border-bottom:1px solid black">Qty</td>
                        <td style="font-size:9px;border-bottom:1px solid black">Salvage Value</td>
                        <td style="font-size:9px; width: 60px;border-bottom:1px solid black">Monthly Dep.</td>
                        <td style="font-size:9px; width: 60px;border-bottom:1px solid black">Annual Dep.</td>
                        <td style="font-size:9px;border-bottom:1px solid black">Assigned</td>
                    </tr>
                </table>';
        $this->writeHTML($html, true, false, false, false, '');
    }
}
$xdata = $_GET['data'];
$condition = "";
if ($xdata['dteFrom'] != '') {
    $condition .= "dtefrom = '" . $xdata['dteFrom'] . "'";
    $condition .= " AND ";
}
if ($xdata['dteTo'] != '') {
    $condition .= "dteto = '" . $xdata['dteTo'] . "'";
    $condition .= " AND ";
}

if ($xdata["cat_code_from"] != '' || $xdata['cat_code_to'] != '') {
    if ($xdata["cat_code_from"] != '') {
        $condition .= "cat_code <= '" . $xdata["cat_code_from"] . "'";
        $condition .= " AND ";
    }
    if ($xdata['cat_code_to'] != '') {
        $condition .= "cat_code >= '" . $xdata["cat_code_from"] . "'";
    }
}
if ($xdata["dept_code_from"] != '' || $xdata['dept_code_to'] != '') {
    $condition .= " AND ";
    if ($xdata["dept_code_from"] != '') {
        $condition .= "dept_code <= '" . $xdata["dept_code_from"] . "'";
        $condition .= " AND ";
    }
    if ($xdata['dept_code_to'] != '') {
        $condition .= "dept_code >= '" . $xdata["dept_code_to"] . "'";
    }
}

if ($condition != '') {
    $condition = "where " . $condition;
}


$assetData = array();
$query = "SELECT a.* , b.description as status from assets as a INNER JOIN status as b on a.status_code = b.status_code  $condition";
$clsController = new clsController('', '');
$assetData = $clsController->list_custom($query, []);
foreach ($assetData as $key => $value) {
    $query = "SELECT CONCAT(b.lname,', ', b.fname,' ', b.mi) as name from emp_asset_assigned as a inner join employee as b where assetno=?";
    $assignedData = $clsController->list_custom($query, [$value['assetno']]);
    if (count($assignedData) > 0) {
        $assetData[$key]['name'] = $assignedData[0]['name'];
    }
}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setParameter('', $xdata["cat_code_from"], $xdata["cat_code_to"], $xdata["dept_code_from"], $xdata["dept_code_to"]);
$pdf->SetHeaderMargin(4);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setAutoPageBreak(true, 23);
$pdf->SetMargins(5, 40, 5);
$pdf->setPrintHeader(true);
$pdf->SetFooterMargin(20);
$pdf->AddPage('L', 'LEGAL');


$html = '<table cellspacing="" cellpadding="2" >
            <tbody>';

foreach ($assetData as $key => $value) {
    $html .= '<tr>
                    <td style="font-size:9px;width:70px">' . $value['assetno'] . '</td>
                    <td style="font-size:9px;width:70px">' . $value['description'] . '</td>
                    <td style="font-size:9px;width:70px">' . $value['cat_code'] . '</td>
                    <td style="font-size:9px;width:70px">' . $value['dept_code'] . '</td>
                    <td style="font-size:9px;width:70px">' . $value['loc_code'] . '</td>
                    <td style="font-size:9px;width:70px">' . $value['dtefrom'] . '</td>
                    <td style="font-size:9px;width:70px">' . $value['dteto'] . '</td>
                    <td style="font-size:9px;width:70px">' . $value['status'] . '</td>
                    <td style="font-size:9px;width:50px">' . $value['usefullife'] . '</td>
                    <td style="font-size:9px;width:70px">' . $value['cost'] . '</td>
                    <td style="font-size:9px;width:40px">' . $value['qty'] . '</td>
                    <td style="font-size:9px;width:70px">' . $value['salvalue'] . '</td>
                    <td style="font-size:9px;width: 60px;">PHP ' . $value['monthlydep'] . '</td>
                    <td style="font-size:9px;width: 60px;">PHP ' . $value['annualdep'] . '</td>
                    <td style="font-size:9px;">' . $value['name'] . '</td>
                </tr>';
}

$html .= '   </tbody>
        </table>';


$pdf->writeHTML($html, true, 0, true, 0);

$pdf->Output('example_021.pdf', 'I');
