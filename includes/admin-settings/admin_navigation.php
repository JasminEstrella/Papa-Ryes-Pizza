<?php
session_start();
include('includes/config.php');

if ($_SESSION['login'] && $_SESSION['user_id'] != 9) {
    header("Location: http://$host$uri/$extra". "home");
}

$string = file_get_contents("assets/json/settings_config.json");
$settings_config = json_decode($string, true);


?>
    <div class="settings-content container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-sm-4 col-md-4 col-lg-3 col-xl-2 px-sm-4 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="?action=home" target="_blank" class="logo">Papa Rye's <em> Pizza</em></a>
                <a href="javascript:void(0);" class="greeting-text d-flex align-items-center pb-4 mb-md-0 me-md-auto">
                    <span class="fs-5 d-none d-sm-inline">Hi, <?=$_SESSION['username'];?>!</span>
                </a>
                <div class="nav-active" data-active-tab="<?=$tab;?>"></div>
                
    <h3></h3>

                <?php foreach($settings_config['navigation'] as $nav_tab => $nav_value): ?>
                    <a data-tab="<?=$nav_tab;?>" href="<?=$_SERVER['PHP_SELF']."?action=". $action. "&tab=" . $nav_tab;?>" 
                    class="settings-nav nav-<?=$nav_tab;?> d-flex align-items-center pb-3 mb-md-0 me-md-auto">
                        <span class="fs-5 d-none d-sm-inline"><?=$nav_value;?></span>
                    </a>
                <?php endforeach;?>
                
                <a  href="?action=logout" class="settings-nav settings-log-out d-flex align-items-center pb-3 mb-md-0 me-md-auto">
                    <span class="fs-5 d-none d-sm-inline">Log Out</span>
                </a>
                
            </div>
        </div>
        
        <div class="col py-3 mt-3">
        