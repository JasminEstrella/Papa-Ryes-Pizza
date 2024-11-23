<?php

error_reporting(0);

$action_arr = ["home", "checkout", "settings", "products", "product-details", "registration", "login", "logout"];
$admin_tab_arr = ["dashboard","manage-orders","view-orders","products-settings","create-product","product-tags","customers","promos"];

// Setting default tab
if (in_array($_GET['action'], $action_arr) && isset($_GET['action'])) { // Getting url parameter // False
    $action = $_GET['action'];
} else {
    $action = "home"; // Default tab
}

if (in_array($_GET['tab'], $admin_tab_arr) && isset($_GET['tab'])) { // Getting url parameter // False
    $tab = $_GET['tab'];
} else {
    $tab = "dashboard";
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php?action=';

session_start();

include ('includes/header.php');

if ($action == "settings") { // Getting url parameter // False
    include ('includes/admin-settings/admin_navigation.php');    
    include('includes/admin-settings/'. $tab .'.php'); 
} else {
    include ('includes/'. $action . '.php');
}

include ('includes/footer.php');

?>