<?php
require('../model/clsStandard.php');
require('../model/clsConnection.php');

switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        $clsController = new clsController($col, 'department');
        echo json_encode($clsController->add());
        break;
    case 'delete':

        $data = explode(',', $_POST['data']);
        foreach ($data as $key => $value) {
            $xdata['dept_code'] = $value;
            $clsController = new clsController($xdata, 'department');
            $clsController->delete();
        }
        break;
    case 'update':
        break;

    case 'view':
        break;

    case 'table':
        $clsController = new clsController('', 'department');
        if ($clsController->viewlist()) {
            echo json_encode($clsController->viewlist());
        }

        break;
}
