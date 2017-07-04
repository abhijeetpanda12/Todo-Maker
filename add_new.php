<?php
include_once ('static/header.php');
include_once ('libs/create_todo.php');
?>
<div id="mainContent" class="clearfix">
    <div id="head">
        <h2>Create Todo</h2>
    </div>
    <form method="post" action="add_new.php">
        <?php
        if(isset($error)){
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        if(isset($message)){
            echo '<div class="alert alert-success>">'.$message.'</div>';
        }
        ?>
        <div id="mainBody" >
            <div class="form_field">
              <label for="Title">Title</label>
                <input type="text" name="title">
            </div>
            <div class="form_field">
                <label for="Title">Description</label>
                <textarea name="desc" id="desc"></textarea>
            </div>
            <div class="form_field">
                <label for="Title">Due Date</label>
                <input type="text" name="due_date" id="due_date">
            </div>
            <div class="form_field">
                <label for="Title">Label Under</label>
                <select name="label_under" id="label_under">
                    <option value="none">Select</option>
                    <option value="Inbox">Inbox</option>
                    <option value="Read Later">Read Later</option>
                    <option value="Important">Important</option>
                </select>
            </div>
            <div class="form_field">
                <input type="submit" name="create_todo" value="create" id="create_todo" class="btn btn-info   ">
            </div>
        </div>
    </form>
</div>
