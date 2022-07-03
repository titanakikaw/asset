<?php
require('../model/clsStandard.php');
require('../model/clsConnection.php');

switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
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
        echo json_encode($clsController->get2('employee', $xdata ));
        break;
}
