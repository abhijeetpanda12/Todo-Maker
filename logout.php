<?php
session_start();
if (isset($_SESSION['todo_name'])) {
    session_destroy();
    header("location: login.php");

}

?>