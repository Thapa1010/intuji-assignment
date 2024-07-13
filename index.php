<?php 
use App\Router;

session_start();

require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$routes = require_once(__DIR__.'/routes/web.php');
(new Router($routes))->dispatch();