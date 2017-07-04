<?php
    if(isset($_POST['register'])) {
        include_once ('classes/class.ManageUsers.php');
        $users = new ManageUsers();
        session_start();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $repassword = md5($_POST['repassword']);
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $date = date("Y-m-d");
        $time = date("H:i:s");
        if (empty($username) || empty($email) || empty($_POST['password']) || empty($_POST['repassword'])) {
            $error = 'Please enter all the fields';
        } elseif ($password != $repassword) {
            $error = 'Password do not match';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Email not valid';
        } else {
            $check_availability = $users->GetUserInfo($username);
            if ($check_availability == 0) {
                $register_user = $users->registerUsers($username, $email, $password, $ip_address, $time, $date);
                if ($register_user == 1) {
                    $make_sessions = $users->GetUserInfo($username);
                    foreach ($make_sessions as $userSessions) {
                        $_SESSION['todo_name'] = $userSessions['username'];
                        if (isset($_SESSION['todo_name'])) {
                            header("location:index.php");
                        }
                    }
                    print_r($make_sessions);
                }
            } else {
                $error = 'username already exists';
            }
        }
    }
    if(isset($_POST['login'])){
        include_once ('classes/class.ManageUsers.php');
        $users = new ManageUsers();
        session_start();
        $username = $_POST['login_username'];
        $password = md5($_POST['login_password']);
        if(empty($username) || empty($_POST['login_password']) ){
            $error = 'Please enter all the fields';
        } else{
            $login_user = $users->LoginUsers($username,$password);
            if($login_user == 1){
                $make_sessions = $users->GetUserInfo($username);
                foreach ($make_sessions as $userSessions) {
                    $_SESSION['todo_name'] = $userSessions['username'];
                    if (isset($_SESSION['todo_name'])) {
                        header("location:index.php");
                    }
                }
                print_r($make_sessions);
            } else {
                $error='Invalid Credentials';
            }
        }

    }
?>