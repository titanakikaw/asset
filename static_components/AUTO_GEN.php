<?php
require('../model/clsConnection.php');
require '../model/clsStandard.php';
$clsController = new clsController('', 'settings');
$settings = $clsController->viewlist();
$settings  = $settings[0];
