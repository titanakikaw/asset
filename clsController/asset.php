<?php
require('../model/clsStandard.php');
require('../model/clsConnection.php');

switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        $clsController = new clsController($col, 'assets');
        echo json_encode($clsController->add());
        break;
    case 'delete':
        $data = explode(',', $_POST['data']);
        foreach ($data as $key => $value) {
            $xdata['assetno'] = $value;
            $clsController = new clsController($xdata, 'assets');
            $clsController->delete();
        }
        break;
    case 'update':
        break;

    case 'view':
        break;

    case 'table':
        $clsController = new clsController('', 'assets');
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
}
