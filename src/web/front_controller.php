<?php
require '../../vendor/autoload.php';

require_once '../dispatcher.php';
require_once '../routing.php';

require_once '../controllers/view_controllers.php';
require_once '../controllers/images_controllers.php';
require_once '../controllers/users_controllers.php';

session_start();

$action_url = $_GET['action'];
dispatch($routing, $action_url);
