<?php
include '../controller/LoginController.php';
$message = (new LoginController())->logout();
