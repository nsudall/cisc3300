<?php
require_once "../app/controller/ErrorController.php";

use app\controllers\ErrorController;

$errorController = new ErrorController();
$errorController->viewErrors();