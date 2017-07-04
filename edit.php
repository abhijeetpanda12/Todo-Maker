<?php
include_once ('libs/edit_todo.php');
include_once ('static/header.php');
include_once ('libs/list_todo.php');

?>
<div id="mainContent" class="clearfix">
    <div id="head">
        <h2>Edit Todo</h2>
    </div>
    <form method="post" action="edit.php?id=<?php echo $_GET['id'];?>">
        <?php
        if(isset($error)){
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        if(isset($message)){
            echo '<div class="alert alert-success>">'.$message.'</div>';
        }
        ?>

        <?php foreach ($list_todo as $td) {
            $given_array = array("Inbox","Read Later","Important");
            $selected_array = array($td['label']);
            $array_remaining = array_diff($given_array,$selected_array);
        ?>

        <div id="mainBody" >
            <div class="form_field">
                <label for="Title">Title</label>
                <input type="text" name="title" id="title" value="<?php echo $td['title']; ?>">
            </div>
            <div class="form_field">
                <label for="Title">Description</label>
                <textarea name="desc" id="desc"><?php echo $td['description']; ?></textarea>
            </div>
            <div class="form_field">
                <label for="Title">Due Date</label>
                <input type="text" name="due_date" id="due_date" value="<?php echo $td['due_date']; ?>">
            </div>
            <div class="form_field">
                <label for="Title">Label Under</label>
                <select name="label_under" id="label_under">
                    <?php
                        echo '<option value="'.$td['label'].'">'.$td['label'].'</option>';
                        foreach ($array_remaining as $ar) {
                            echo '<option value="'.$ar.'">'.$ar.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form_field">
                <div id="seekbar"></div>
                <div id="progress"><?php echo $td['progress'];?>%</div>
                <input type="hidden" name="progress_value" value="<?php echo $td['progress']; ?>" id="progress_value">
            </div>

            <div class="form_field">
                <input type="submit" name="edit_todo" value="Edit" id="edit_todo" class="btn btn-info   ">
            </div>
            <?php }?>
        </div>
    </form>
</div>
