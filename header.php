<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="Style/style.css" type="text/css">
    </head>
    <body>
        <header>
           <nav>
                <div class="main_wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>
                <div class="nav_login">
                    <?php
                    if(isset($_SESSION['u_id'])){
                        echo ' <form action="Controller/logout.php" method="POST">
                        <button type="submit" name="submit">Logout</button>
                         </form>';
                    } else {
                        echo ' <form action="Controller/login.php" method="POST">
                        <input type="text" name="uid" placeholder="username/e-mail">
                        <input type="password" name="password" placeholder="password">
                        <button type="submit" name="submit">Login</button>
                        </form>
                        <a href="signup.php">SignUp</a>';
                    }
                    ?>
                </div>
            </div>
           </nav>
        </header>