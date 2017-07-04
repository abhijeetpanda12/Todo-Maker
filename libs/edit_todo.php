<?php
    if(isset($_POST['edit_todo'])) {
        include_once ('classes/class.ManageTodo.php');
        include_once ('sessions.php');
        $init = new ManageTodo();

        $username = $session_name;
        $id = $_GET['id'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $progress = $_POST['progress_value'];
        $due_date = $_POST['due_date'];
        $label = $_POST['label_under'];

        $edit = $init->editTodo($username,$id,$title,$desc,$progress,$due_date,$label);
        if($edit == 1) {
                header("location: edit.php?id=".$id."");
        } else {
                $error = "Error";
        }
    }

?>