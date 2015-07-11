<?php
require 'Core/Autoload.php';
use Core\FrontController;
use Core\Classes\User\User;
use App\News\NewsDB;
header('Content-Type: text/html; charset=utf-8');
FrontController::loadApp();
?>