<?php
require('../model/clsStandard.php');
require('../model/clsConnection.php');

switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        $clsController = new clsController($col, 'status');
        echo json_encode($clsController->add());
        break;
    case 'delete':
        $data = explode(',', $_POST['data']);
        foreach ($data as $key => $value) {
            $xdata['status_code'] = $value;
            $clsController = new clsController($xdata, 'status');
            $clsController->delete();
        }
        break;
    case 'update':
        break;

    case 'view':
        break;

    case 'table':
        $clsController = new clsController('', 'status');
        if ($clsController->viewlist()) {
            echo json_encode($clsController->viewlist());
        }

        break;
}
