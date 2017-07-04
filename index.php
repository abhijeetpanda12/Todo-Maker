<?php   include_once ('libs/delete.php');
        include_once ('static/header.php');
        include_once ('libs/list_todo.php');

?>
            <div id="mainContent" class="clearfix">
                <div id="head">
                    <h2>Manage Todo</h2>
                    <div id="add_more">
                        <a href="add_new.php" class="btn btn-success">+ Add new</a>
                    </div>
                </div>
                <div id="mainBody">

                    <?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger">'.$error.'</div>';
                    }
                    if(isset($message)){
                        echo '<div class="alert alert-success>">'.$message.'</div>';
                    }
                    ?>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td> Title </td>
                                <td> Snippet </td>
                                <td> Due Date </td>
                                <td> Time Left </td>
                                <td> Progress </td>
                                <td> Actions </td>
                            </tr>
                        </thead>
                        <tbody>

                                <?php
                                    if($list_todo != 0)
                                    {
                                    foreach ($list_todo as $key => $value)
                                    {
                                        $today = strtotime("now");
                                        $due_date = strtotime($value['due_date']);
                                        if ($due_date >$today) {
                                            $hours = $due_date - $today;
                                            $hours /= 3600;
                                            $time_left = $hours / 24;
                                            if ($time_left < 1) {
                                                $time_left = 'Less than 1 hour';
                                            }
                                            else {
                                                $time_left =round($time_left)." days remaining";
                                            }
                                        } else {
                                            $time_left ='Due date crossed';
                                        }

                                    ?>
                                <tr>
                                    <td><?php echo $value ['title'];?></td>
                                    <td><?php echo $value ['description'];?></td>
                                    <td><?php echo $value ['due_date'];?></td>
                                    <td><?php echo $time_left;?></td>
                                    <td>
                                         <div class="progress progress-bar-striped active">
                                             <div class="progress-bar" style="width: <?php echo $value['progress'];?>%"></div>
                                         </div>
                                    </td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $value['id'];?>" title="<?php echo $value['title'];?>">edit</a> |
                                        <a href="index.php?delete=<?php echo $value['id'];?>" title="<?php echo $value['title'];?>">delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    }
                                    else {
                                        echo '<td><td></td></td><td>Sorry you don\'t have any todos left</td><td></td><td></td><td></td>';
                                    }
                                ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
