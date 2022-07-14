<?php
// require('../model/clsStandard.php');
// require('../model/clsConnection.php');
require('../static_components/AUTO_GEN.php');

switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];

        if ($settings['dept_auto'] == '1') {
            $clsController = new clsController('', 'department');
            $master = $clsController->getTop();
            $newCode = "DEPT-" . strtoupper($col['description'][0]) . strtoupper($col['description'][1]) . "-" . $master['master_id'];
            $passed = false;
            while ($passed) {
                $clsController = new clsController(['dept_code' => $newCode], 'department');
                if ($clsController->check() != null) {
                    $master['master_id'] += 1;
                    $newCode = "DEPT-" . $master['description'][0] . $master['description'][2] . "-" . $master['master_id'];
                } else {
                    $passed = true;
                }
            }
            $col['dept_code'] = $newCode;
        }
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
