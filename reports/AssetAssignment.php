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
        $html = '<table cellspacing="0" cellpadding="0" style="width:100%">
                    <tr>
                        <td colspan="9"><h1>' . $this->company . '</h1></td>
                    </tr>
                    <tr>
                        <td colspan="9"><h5>Fixed Asset by Employee</h5></td>
                    </tr>
                    <tr>
                        <td><p style="font-size:7px;">DATE PRINTED :</p></td>
                        <td><p style="font-size:7px;">' . date('m-d-y') . '</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>    
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr style="outline: 1px solid black">    
                        <td style="font-size:7px; border-bottom: 1px solid black">Asset No.</td>
                        <td style="font-size:7px; border-bottom: 1px solid black">Description</td>
                        <td style="font-size:7px; border-bottom: 1px solid black">Category</td>
                        <td style="font-size:7px; border-bottom: 1px solid black">Department</td>
                        <td style="font-size:7px; border-bottom: 1px solid black">Location</td>
                        <td style="font-size:7px; border-bottom: 1px solid black">Serial No.</td>
                        <td style="font-size:7px; border-bottom: 1px solid black">Model No.</td>
                        <td style="font-size:7px; border-bottom: 1px solid black">Cost</td>
                        <td style="font-size:7px; border-bottom: 1px solid black">Months</td>
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
$pdf->SetMargins(5, 30, 5);
$pdf->setPrintHeader(true);
$pdf->AddPage('L', 'LETTER');
$pdf->SetFont("", "", 7);


$content = "";
$clsController = new clsController('', '');
$query = "SELECT * from emp_asset_assigned as a INNER JOIN employee as b on a.empno = b.empno where status = 'Assigned'";
$Employees = $clsController->fullcustom($query);
foreach ($Employees as $key => $employee) {
    $name = $employee['lname'] . ', ' . $employee['fname'] . ' ' . $employee['mi'];
    $content = "<tr>";
    $content .= '<td colspan="9" style ="font-weight:bold;font-size:8px;">' . strtoupper($name) . '</td>';
    $content .= "</tr>";
    $content .= "<tr>";

    $clsController = new clsController('', '');
    $query = "SELECT * from assets where assetno=?";
    $assets = $clsController->list_custom($query, [$employee['assetno']]);
    foreach ($assets as $key => $asset) {
        $content .= "<td>" . $asset['assetno'] . "</td>";
        $content .= '<td>' . $asset['description'] . '</td>';
        $content .= "<td>" . $asset['cat_code'] . "</td>";
        $content .= "<td>" . $asset['dept_code'] . "</td>";
        $content .= "<td>" . $asset['loc_code'] . "</td>";
        $content .= "<td>" . $asset['serialno'] . "</td>";
        $content .= "<td>" . $asset['modelno'] . "</td>";
        $content .= "<td>Php " . number_format($asset['cost']) . "</td>";
        $content .= "<td>" . $asset['usefullife'] . "</td>";
    }
    $content .= "</tr>";
}
$html = '<table cellspacing="" cellpadding="1" style="width:100%">
            <tbody>';
$html .= $content;
$html .= '   </tbody>
        </table>';

$pdf->writeHTML($html, true, 0, true, 0);
$pdf->Output('example_021.pdf', 'I');
