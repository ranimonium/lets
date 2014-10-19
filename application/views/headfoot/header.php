<!DOCTYPE html>
<html>
<head>
    <title><?php echo 'LETS UP' ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css') ?>">
</head>
<body>
    <div id="main-container">
        <header>
            <div class="logo">
                <a href="<?php echo site_url('main/home') ?>">LETS UP</a>
            </div>
            <nav>
                <a href="<?php echo site_url('users') ?>">Community</a> |
                <a href="<?php echo site_url('favors/my') ?>">My Favors</a> |
                <a href="<?php echo site_url('favors') ?>">Browse Favors</a> |
                <a href="<?php echo site_url('users/edit') ?>">Account</a> |
                <a href="<?php echo site_url('main/logout') ?>">Logout</a>
            </nav>
        </header>