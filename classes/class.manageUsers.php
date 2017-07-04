<?php
    include_once('class.database.php');
    class ManageUsers {
        public $link;
        function __construct() {
            $db_connection = new dbConnection();
            $this->link = $db_connection->connect();
            return $this->link;
        }
        function registerUsers($username,$email,$password,$ip_address,$time,$date) {
            $query = $this->link->prepare("INSERT INTO users (username,email,password,ip_address,date, time)VALUES (?,?,?,?,?,?)");
            $values = array($username,$email,$password,$ip_address,$date,$time);
            $query->execute($values);
            $counts = $query->rowCount();
            return $counts;
        }
        function LoginUsers($username,$password) {
            $query = $this->link->query("select * from users where username = '$username' and password = '$password'");
            $rowcount = $query->rowCount();
            return $rowcount;
        }
        function GetUserInfo($username) {
            $query = $this->link->query("select * from users where username = '$username'");
            $rowcount = $query->rowCount();
            if($rowcount==1){
                $result = $query->fetchAll();
                return $result;
            }
            else{
                return $rowcount;
            }
        }
    }
    $users = new ManageUsers();
//    echo $users->registerUsers('bob','bob','127.0.0.1','19:00','02-07-2017');
?>