<?php
require('../model/clsStandard.php');
require('../model/clsConnection.php');

switch ($_POST['action']) {
    case 'update':
        $clsController = new clsController($_POST['data'], 'settings');
        echo json_encode($clsController->update('1', 'master_id'));
        break;

    case 'view':
        $clsController = new clsController('', 'settings');
        var_dump($clsController->viewlist());
        break;
}
