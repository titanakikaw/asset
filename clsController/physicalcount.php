<?php
// require('../model/clsStandard.php');
// require('../model/clsConnection.php');
require('../static_components/AUTO_GEN.php');
date_default_timezone_set("Asia/Manila");


switch ($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        if ($settings['phc_auto'] == '1') {
            $clsController = new clsController('', 'asset_physical_count');
            $master = $clsController->getTop();
            $newCode = "PHC-" . strtoupper($col['loc_code'][0]) . strtoupper($col['dept_code'][0]) . strtoupper($col['countedBy'][0]) . "-" . $master['master_id'];
            $passed = false;
            while ($passed) {
                $clsController = new clsController(['phc_code' => $newCode], 'employee');
                if ($clsController->check() != null) {
                    $master['master_id'] += 1;
                    $newCode = "PHC-" . strtoupper($col['loc_code'][0]) . strtoupper($col['dept_code'][0]) . strtoupper($col['countedBy'][0]) . "-" . $master['master_id'];
                } else {
                    $passed = true;
                }
            }
            $col['phc_code'] = $newCode;
        }
        $col['date'] = date("m-d-Y h:i:s");;
        $clsController = new clsController($col, 'asset_physical_count');
        echo json_encode($clsController->add());
        break;
    case 'delete':
        $data = explode(',', $_POST['data']);
        foreach ($data as $key => $value) {
            $xdata['phc_code'] = $value;
            $clsController = new clsController($xdata, 'asset_physical_count');
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
    case  'getAllData':
        $assets = [];
        $phc = [];
        $col['phc_code'] = $_POST['phc_code'];
        $clsController = new clsController($col, 'asset_physical_count');
        $phc = $clsController->get();
        echo json_encode($phc);
        break;
    case 'getPhcAssets':
        $col['phc_code'] = $_POST['phc_code'];
        $query = "SELECT a.*, b.description, b.cat_code from phc_assets as a INNER JOIN assets as b on a.assetno = b.assetno where phc_code = ?";
        $clsController = new clsController('', '');
        echo json_encode($clsController->list_custom($query, [$col['phc_code']]));
        break;
    case 'availableAsset':
        $assets = '';
        if ($_POST['assets'] != '') {
            if (strpos($_POST['assets'], ',')) {

                $rawassets = explode(",", $_POST['assets']);
                foreach ($rawassets as $key => $value) {
                    if ($assets != '') {
                        $assets .= ",";
                    }
                    $assets .= '"' . $value . '"';
                }
            } else {
                $assets = '"' . $_POST['assets'] . '"';
            }
        } else {
            $assets = '""';
        }


        try {
            $query = "SELECT assetno, description, qty, cat_code from assets where assetno  NOT IN ($assets)";
            $clsController = new clsController('', '');
            echo json_encode($clsController->fullcustom($query));
        } catch (Throwable $th) {
            var_dump($th);
            die();
        }

        break;

    case 'saveAssets':
        $col['phc_code'] = $_POST['phc_code'];
        $assets = $_POST['data'];
        $status = true;
        foreach ($assets as $key => $value) {
            $col['assetno'] = $value['no'];
            $col['qty'] = $value['qty'];
            $clsController = new clsController($col, 'phc_assets');
            if (!$clsController->add()) {
                $status = false;
            };
        }
        echo json_encode($status);
        break;
    case 'deleteAssets':
        // $col['phc_code'] = $_POST['phc_code'];
        $assets = $_POST['data'];
        $status = true;
        foreach ($assets as $key => $value) {
            $col['master_id'] = $value['master_id'];
            $clsController = new clsController($col, 'phc_assets');
            if (!$clsController->delete()) {
                $status = false;
            };
        }
        echo json_encode($status);
        break;
}
