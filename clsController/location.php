<?php
// require('../model/clsStandard.php');
// require('../model/clsConnection.php');
require('../static_components/AUTO_GEN.php');

switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        if ($settings['loc_auto'] == '1') {
            $clsController = new clsController('', 'location');
            $master = $clsController->getTop();
            $newCode = "LOC-" . strtoupper($col['description'][0]) . strtoupper($col['description'][1]) . "-" . $master['master_id'];
            $passed = false;
            while ($passed) {
                $clsController = new clsController(['loc_code' => $newCode], 'employee');
                if ($clsController->check() != null) {
                    $master['master_id'] += 1;
                    $newCode = "LOC-" . $master['description'][0] . $master['description'][2] . "-" . $master['master_id'];
                } else {
                    $passed = true;
                }
            }
            $col['loc_code'] = $newCode;
        }
        $clsController = new clsController($col, 'location');
        echo json_encode($clsController->add());
        break;
    case 'delete':

        $data = explode(',', $_POST['data']);
        foreach ($data as $key => $value) {
            $xdata['loc_code'] = $value;
            $clsController = new clsController($xdata, 'location');
            $clsController->delete();
        }
        break;
    case 'update':
        break;

    case 'view':
        break;

    case 'table':

        $clsController = new clsController('', 'location');
        echo json_encode($clsController->viewlist());
        // if($clsController->viewlist()){

        // }else{
        //     json_encode(false);
        // }

        // break;
}
