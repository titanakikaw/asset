<?php
require('../model/clsStandard.php');
require('../model/clsConnection.php');


switch($_POST['action']) {
    case 'new':
        $col = $_POST['data'];
        $clsController = new clsController($col,'location');
        json_encode($clsController->add());
        break;
    case 'delete':
        break;

    case 'update':
        break;

    case 'view':
        break;

    case 'table':
        $clsController = new clsController('','location');
        json_encode($clsController->viewlist());
        break;
}