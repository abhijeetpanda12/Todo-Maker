<?php
    include_once ('classes/class.ManageTodo.php');
    include_once ('sessions.php');
    $init = new ManageTodo();

    if(isset($_POST['create_todo'])) {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $due_date = $_POST['due_date'];
        $label = $_POST['label_under'];

        if(empty($title) || empty($desc) || empty($due_date) || empty($label)) {
            $error = 'all fields are required';
        }
        else {
//            $title = strip_tags($title);
//            $desc = strip_tags($desc);
//            $title = mysqli_real_escape_string($title);
//            $desc = mysql_real_escape_string($desc);

            $username = $session_name;
            $created_on = date("Y-m-d");
            $create_todo = $init->createTodo($username,$title,$desc,$due_date,$created_on,$label);
            if($create_todo == 1){
                $message = 'Todo created successfully';
            }
            else {
                $error = 'Todo cannot be added';
            }
        }
    }
?>