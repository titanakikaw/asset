<?php
// require('../model/clsStandard.php');
require('../static_components/AUTO_GEN.php');
// require('../model/clsConnection.php');
date_default_timezone_set("Asia/Manila");
// var_dump($settings);
// die();
switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        $files = $_POST['file'];
        $col['cost'] = str_replace(" ", "", str_replace("PHP", "", $col['cost']));
        $col['totalcost'] = str_replace(" ", "", str_replace("PHP", "", $col['totalcost']));
        $col['salvalue'] = str_replace(" ", "", str_replace("PHP", "", $col['salvalue']));

        $totalcost =  $col['totalcost'] * $col['qty'];
        $deprecialbleCost =  $totalcost -  $col['salvalue'];
        $col['monthlydep'] =  $deprecialbleCost / $col['usefullife'];
        if ($col['usefullife'] < 12) {
            $col['annualdep'] = 0;
        } else {
            $col['annualdep'] = $col['monthlydep'] * 12;
        }
        foreach ($col as $key => $value) {
            if ($value == '') {
                echo json_encode(false);
                break;
            }
        }


        var_dump($_POST);
        die();

        foreach ($files as $key => $value) {
            $assetFile['assetno'] = $col['assetno'];
            $assetFile['directory'] = '../assetImages';
            $assetFile['filename'] = $assetFile['directory'] . '/' . $value;
            $clsController = new clsController($assetFile, 'asset_files');
            echo json_encode($clsController->add());
        }


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
        $col = $_POST['data'];
        $files = $_POST['file'];
        $col['cost'] = str_replace(" ", "", str_replace("PHP", "", $col['cost']));
        $col['totalcost'] = str_replace(" ", "", str_replace("PHP", "", $col['totalcost']));
        $col['salvalue'] = str_replace(" ", "", str_replace("PHP", "", $col['salvalue']));

        $totalcost =  $col['totalcost'] * $col['qty'];
        $deprecialbleCost =  $totalcost -  $col['salvalue'];
        $col['monthlydep'] =  $deprecialbleCost / $col['usefullife'];
        if ($col['usefullife'] < 12) {
            $col['annualdep'] = 0;
        } else {
            $col['annualdep'] = $col['monthlydep'] * 12;
        }
        foreach ($files as $key => $value) {
            $assetFile['assetno'] = $col['assetno'];
            $assetFile['directory'] = '../assetImages';
            $assetFile['filename'] = $assetFile['directory'] . '/' . $value;
            $clsController = new clsController($assetFile, 'asset_files');
            var_dump($clsController->add());
        }
        $clsController = new clsController($col, 'assets');
        echo json_encode($clsController->update($_POST['data']['assetno'], 'assetno'));
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
    case 'saveImages':
        $files = $_FILES['file'];
        foreach ($files['tmp_name'] as $key => $value) {
            try {
                move_uploaded_file($value, '../assetImages/' . $files['name'][$key]);
                echo json_encode(true);
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
        break;
    case 'assignemployee':
        $xdata = $_POST['data'];
        $xdata['date'] = date("m-d-Y h:i:s");
        $xdata['status'] = "Assigned";
        $clsController = new clsController($xdata, 'emp_asset_assigned');
        echo json_encode($clsController->add());
        break;
    case 'getAssignedEmployee':
        $query = "SELECT a.master_id,a.date,a.status,b.lname,b.fname,b.mi from emp_asset_assigned as a  INNER JOIN employee as b on a.empno = b.empno where a.assetno = ? ";
        $clsController = new clsController('', '');
        echo json_encode($clsController->list_custom($query, [$_POST['assetno']]));
        break;
    case 'getCustomTable':
        $query = "SELECT a.* , b.description as status from assets as a INNER JOIN status as b on a.status_code = b.status_code";
        $clsController = new clsController('', '');
        $assetData = $clsController->list_custom($query, []);
        foreach ($assetData as $key => $value) {

            $query = "SELECT CONCAT(b.lname,', ', b.fname,' ', b.mi) as name from emp_asset_assigned as a inner join employee as b where assetno=?";
            $assignedData = $clsController->list_custom($query, [$value['assetno']]);
            if (count($assignedData) > 0) {
                $assetData[$key]['name'] = $assignedData[0]['name'];
            }
        }
        echo json_encode($assetData);
        break;
    case 'getaddedcost':
        $clsController = new clsController('', '');
        $query = "SELECT * from asset_additional_cost where assetno = ?";
        echo json_encode($clsController->list_custom($query, [$_POST['assetno']]));
        break;
    case 'saveAddedCost':
        $col = $_POST['data'];
        $clsController = new clsController($col, 'asset_additional_cost');
        echo json_encode($clsController->add());
        break;
    case 'deleteCost':
        $xdata['master_id'] = $_POST['id'];
        $clsController = new clsController($xdata, 'asset_additional_cost');
        echo json_encode($clsController->delete());
        break;
    case 'unAssignEmployee':
        // var_dump($_POST);
        $xdata['status'] = "Unassigned";
        $clsController = new clsController($xdata, 'emp_asset_assigned');
        echo json_encode($clsController->update($_POST['data']['id'], 'master_id'));
        break;
    case 'deleteImages':
        $xdata['master_id'] = $_POST['data']['id'];
        $clsController = new clsController($xdata, 'asset_files');
        echo json_encode($clsController->delete());
        break;
}
