<?php
include_once ('libs/login_users.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TODO maker</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function(){
            $('#show_register').click(function () {
                $('.login_form').hide();
                $('.register_form').show();
                return false;
            });
            $('#show_login').click(function () {
                $('.login_form').show();
                $('.register_form').hide();
                return false;
            });
        });
    </script>
</head>
<body id="login">
    <div id="mainWrapper">
        <div id = "content">
            <a class="brand" href="#">
                Todo Maker
            </a>
            <?php
                if(isset($error)){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            <div class="login_form">
                <h2>Login here</h2>
                <div id="form">
                    <form method="post" name="login" action="login.php">
                        <div class="form_elements">
                            <label for="Username">Username</label>
                            <input type="text" name="login_username" id="username">
                        </div>
                        <div class="form_elements">
                            <label for="Username">Password</label>
                            <input type="password" name="login_password" id="password">
                        </div>
                        <div class="form_elements">
                            <input type="submit" name="login" id="login" value="login" class="btn btn-success">
                        </div>
                        <br>
                        <a href="#" id="show_register"> Don't have an account?</a>
                    </form>
                </div>
            </div>
            <div class="register_form">
                <h2>Register here</h2>
                <div id="form">
                    <form method="post" name = "register" action="login.php">
                        <div class="form_elements">
                            <label for="Username">Username</label>
                            <input type="text" name="username" id="username">
                        </div>
                        <div class="form_elements">
                            <label for="Username">Email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="form_elements">
                            <label for="Username">Password</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="form_elements">
                            <label for="Username">re-enter Password</label>
                            <input type="password" name="repassword" id="repassword">
                        </div>
                        <div class="form_elements">
                            <input type="submit" name="register" id="register" value="register" class="btn btn-success">
                        </div>
                        <br>
                        <a href="#" id="show_login"> Already have an account?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>