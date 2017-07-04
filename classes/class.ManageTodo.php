<?php
    include_once('class.database.php');
    class ManageTodo {
        public $link;

        function __construct() {
            $db_connection = new dbConnection();
            $this->link = $db_connection->connect();
            return $this->link;
        }
        function createTodo($username,$title,$description,$due_date,$created_on,$label){
            $query = $this->link->prepare("insert into todo (username,title,description,due_date,created_date,label) values (?,?,?,?,?,?)");
            $values = array($username,$title,$description,$due_date,$created_on,$label);
            $query->execute($values);
            $counts = $query->rowCount();
            return $counts;
        }
        function ListTodo($username,$status=null){
            if(isset($status)){
                $query = $this->link->query("select * from todo where username ='$username' and label='$status' ORDER by id DESC ");
            }
            else {
                $query = $this->link->query("select * from todo where username ='$username' ORDER by id desc;");
            }
            $counts = $query->rowCount();
            if($counts>=1){
                $result=$query->fetchAll();
            } else{
                $result=$counts;
            }
            return $result;
        }
        function CountTodo($username,$status){
            $query = $this->link->query("select count(*) as total_todo from todo where username='$username' and status='$status'" );
            $query->setFetchMode(PDO::FETCH_OBJ);
            $counts = $query->fetchAll();
            return $counts;
        }
        function editTodo($username,$id,$title,$desc,$progress,$due_date,$label)
        {
            $query = $this->link->query("UPDATE todo set title = '$title',description = '$desc',due_date = '$due_date',progress = '$progress',label = '$label' WHERE username = '$username' and id='$id'");
            $counts = $query->rowCount();
            return $counts;
        }
        function deleteTodo($username,$id){
            $query = $this->link->query("delete from todo where username = '$username' and id='$id' limit 1 ");
            $counts = $query->rowCount();
            return $counts;
        }
        function listIndTodo($param,$username) {
            foreach ($param as $key => $value) {
                $query = $this->link->query("select * from todo where $key = '$value' and username = '$username' limit 1");
            }
            $counts = $query->rowCount();
            if($counts == 1){
                $result = $query->fetchAll();
            }
            else {
                $result = $counts;
            }
            return $result;
        }
    }
?>