<?php
include_once ('libs/sessions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TODO maker</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
<!--    <script type="text/javascript" src="jquery/"></script>-->
</head>
<body>
<div id="mainWrapper">
    <div id="td_container" class="clearfix">
        <a href="index.php" class="brand">Todo Maker</a>
        <div id="sidebar">
            <ul class="nav nav-list">
                <li><a href="index.php"><i class="glyphicon-book"></i>All</a></li>
                <li><a href="index.php?label=Inbox"><i class="glyphicon-book"></i>Inbox</a></li>
                <li><a href="index.php?label=Read Later"><i class="glyphicon-book"></i>Read Later</a></li>
                <li><a href="index.php?label=Important"><i class="glyphicon-book"></i>Important</a></li>
                <li><a href="logout.php"><i class="glyphicon-book"></i>Logout</a></li>
            </ul>
        </div>