<?php
require('../model/clsStandard.php');
require('../model/clsConnection.php');
date_default_timezone_set("Asia/Manila");


switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        $files = $_POST['file'];
        $col['cost'] = str_replace(" ", "", str_replace("PHP", "", $col['cost']));
        $col['salvalue'] = str_replace(" ", "",str_replace("PHP", "", $col['salvalue']));
        $deprecialbleCost =  $col['cost'] -  $col['salvalue'];
        $col['monthlydep'] =  $deprecialbleCost / $col['usefullife'];
        if($col['usefullife'] < 12){
            $col['annualdep'] = 0;
        }else{
            $col['annualdep'] = $col['monthlydep'] * 12;
        }
        foreach ($col as $key => $value) {
            if($value == ''){
                echo json_encode(false);
                break;
            }
        }

        foreach ($files as $key => $value) {
            $assetFile['assetno'] = $col['assetno'];
            $assetFile['directory'] = '../assetImages';
            $assetFile['filename'] = $assetFile['directory'].'/'.$value;
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
    case 'saveImages' :
        $files = $_FILES['file'];
        foreach ( $files['tmp_name'] as $key => $value) {
            try {
                move_uploaded_file($value, '../assetImages/'.$files['name'][$key]);
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
        $query = "SELECT a.date,a.status,b.lname,b.fname,b.mi from emp_asset_assigned as a  INNER JOIN employee as b on a.empno = b.empno where a.assetno = ?";
        $clsController = new clsController('', '');
        echo json_encode($clsController->list_custom($query,[12]));
        break;
}
