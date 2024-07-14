<?php 
/**
 * Helper functions for the application.
 * 
 * These functions are autoloaded and can be used globally throughout the application.
 */
function env(string $key)
{
    return $_ENV[$key] ?? null;
}

function sessionExists(string $key)
{
    return (bool) ($_SESSION[$key] ?? null);
}

function putSession(string $key,string $value)
{
    $_SESSION[$key] = $value;
}

function getSession(string $key)
{
    return $_SESSION[$key];
}

function unsetSession(string $key)
{
    unset($_SESSION[$key]);
}