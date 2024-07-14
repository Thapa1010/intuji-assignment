<?php 
use App\Router;

/**
 * Main entry point for the Google Calendar Event Management application.
 * @package google calendar event managment (intuji-assigment)
 * @author shulab <shulabthapa@gmail.com>
 */


// Start a new session or resume the existing session
session_start();

// Autoload dependencies using Composer
require_once __DIR__.'/vendor/autoload.php';

// Load environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Load the web routes
$routes = require_once(__DIR__.'/routes/web.php');

// Initialize the router with the loaded routes and dispatch the request
(new Router($routes))->dispatch();