<?php
// require('../model/clsStandard.php');
// require('../model/clsConnection.php');
require('../static_components/AUTO_GEN.php');

switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        if ($settings['cat_auto'] == '1') {
            $clsController = new clsController('', 'category');
            $master = $clsController->getTop();
            $newCode = "CAT-" . strtoupper($col['description'][0]) . strtoupper($col['description'][1]) . "-" . $master['master_id'];
            $passed = false;
            while ($passed) {
                $clsController = new clsController(['cat_code' => $newCode], 'category');
                if ($clsController->check() != null) {
                    $master['master_id'] += 1;
                    $newCode = "CAT-" . $master['description'][0] . $master['description'][2] . "-" . $master['master_id'];
                } else {
                    $passed = true;
                }
            }
            $col['cat_code'] = $newCode;
        }
        $clsController = new clsController($col, 'category');
        echo json_encode($clsController->add());
        break;
    case 'delete':
        $data = explode(',', $_POST['data']);
        foreach ($data as $key => $value) {
            $xdata['cat_code'] = $value;
            $clsController = new clsController($xdata, 'category');
            $clsController->delete();
        }
        break;
    case 'update':
        break;
    case 'view':
        break;
    case 'table':
        $clsController = new clsController('', 'category');
        if ($clsController->viewlist()) {
            echo json_encode($clsController->viewlist());
        }

        break;
}
