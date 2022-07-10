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
    case  'getAllData':
        $assets = [];
        $phc = [];
        $col['phc_code'] = $_POST['phc_code'];
        $clsController = new clsController($col,'asset_physical_count');
        $phc = $clsController->get();
        echo json_encode($phc);
        break;
    case 'getPhcAssets': 
        $col['phc_code'] = $_POST['phc_code'];
        $query = "SELECT a.*, b.description, b.cat_code from phc_assets as a INNER JOIN assets as b on a.assetno = b.assetno where phc_code = ?";
        $clsController = new clsController('','');
        echo json_encode($clsController->list_custom($query,[$col['phc_code']]));
        break;
    case 'availableAsset':
        $assets = '';
        if($_POST['assets'] != ''){
            if(str_contains($_POST['assets'], ',')){
                $rawassets = explode(",",$_POST['assets']);
                foreach ($rawassets as $key => $value) {
                    if($assets != ''){
                        $assets .= ",";
                    }
                    $assets .= '"'.$value.'"';
                }
            }else{
                $assets = '"'.$_POST['assets'].'"';
            }
        }else{
            $assets = '""';
        }
        $query = "SELECT assetno, description, qty, cat_code from assets where assetno  NOT IN ($assets)";
        $clsController = new clsController('','');
        echo json_encode($clsController->fullcustom($query));
        break;
}
