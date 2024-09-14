<?php
if (!session_id()) session_start();
require_once '../app/init.php';
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';

$app = new App();
