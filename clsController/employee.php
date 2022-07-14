<?php
// require('../model/clsStandard.php');
// require('../model/clsConnection.php');
require('../static_components/AUTO_GEN.php');

switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        if ($settings['emp_auto'] == '1') {
            $clsController = new clsController('', 'employee');
            $master = $clsController->getTop();
            $newCode = "EMP-" . strtoupper($col['position'][0]) . strtoupper($col['lname'][0]) . strtoupper($col['fname'][0]) . "-" . $master['master_id'];
            $passed = false;
            while ($passed) {
                $clsController = new clsController(['empno' => $newCode], 'employee');
                if ($clsController->check() != null) {
                    $master['master_id'] += 1;
                    $newCode = "EMP-" . strtoupper($col['position'][0]) . strtoupper($col['lname'][0]) . strtoupper($col['fname'][0]) . "-" . $master['master_id'];
                } else {
                    $passed = true;
                }
            }
            $col['empno'] = $newCode;
        }
        $clsController = new clsController($col, 'employee');
        echo json_encode($clsController->add());
        break;
    case 'delete':
        $data = explode(',', $_POST['data']);
        foreach ($data as $key => $value) {
            $xdata['empno'] = $value;
            $clsController = new clsController($xdata, 'employee');
            $clsController->delete();
        }
        break;
    case 'update':
        break;

    case 'view':
        break;

    case 'table':
        $clsController = new clsController('', 'employee');
        if ($clsController->viewlist()) {
            echo json_encode($clsController->viewlist());
        }
        break;
    case 'getdata':
        $clsController = new clsController('', $_POST['table']);
        if ($clsController->viewlist()) {
            echo json_encode($clsController->viewlist());
        }
        break;
    case 'getEmployee':
        $xdata['loc_code'] = $_POST['location'];
        $xdata['dept_code'] = $_POST['department'];
        $clsController = new clsController('', 'employee');
        echo json_encode($clsController->get2('employee', $xdata));
        break;
}
