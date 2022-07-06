<?php
require('../model/clsStandard.php');
require('../model/clsConnection.php');
date_default_timezone_set("Asia/Manila");

switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        $col['date'] = date("m-d-Y h:i:s");;
        $clsController = new clsController($col, 'asset_physical_count');
        echo json_encode($clsController->add());
        break;
    case 'delete':
        $data = explode(',', $_POST['data']);
        foreach ($data as $key => $value) {
            $xdata['dept_code'] = $value;
            $clsController = new clsController($xdata, 'category');
            $clsController->delete();
        }
        break;
    case 'update':
        break;

    case 'view':
        break;

    case 'table':

        $clsController = new clsController('', 'asset_physical_count');
        if ($clsController->viewlist()) {
            echo json_encode($clsController->viewlist());
            // var_dump('test');
        }

        break;
}
