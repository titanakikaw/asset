<?php
// require('../model/clsStandard.php');
// require('../model/clsConnection.php');
require('../static_components/AUTO_GEN.php');
switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        if ($settings['stat_auto'] == '1') {
            $clsController = new clsController('', 'status');
            $master = $clsController->getTop();
            $newCode = "STA-" . strtoupper($col['description'][0]) . strtoupper($col['description'][1]) . "-" . $master['master_id'];
            $passed = false;
            while ($passed) {
                $clsController = new clsController(['status_code' => $newCode], 'status');
                if ($clsController->check() != null) {
                    $master['master_id'] += 1;
                    $newCode = "STA-" . $master['description'][0] . $master['description'][2] . "-" . $master['master_id'];
                } else {
                    $passed = true;
                }
            }
            $col['status_code'] = $newCode;
        }
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
