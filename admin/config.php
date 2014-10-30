<?php
/**
 * Database configuration
 */
require_once 'dbHandler.php';
ob_start();
session_start();

class config {
    
    const HOST = "localhost";
    const USERNAME = "root";
    const PASSWORD = "root";
    const DB_NAME = "webo_cms";
    const DIR = "http://localhost/webo_cms/";
    const DIRADMIN = "http://localhost/webo_cms/admin/";  //url to the admin page
    const INCLUDED = 1;

	
}

include('functions.php');
?>