<?php 
  include_once 'header.php';
?>
        <section class="main_container">
            <div class="main_wrapper">
                <h2>SignUp</h2>
                <form class="signup_form" action="Controller/signupform.php" method="POST">
                    <input type="text" name="first" placeholder="Firstname">
                    <input type="text" name="last" placeholder="Lastname">
                    <input type="text" name="email" placeholder="email">
                    <input type="text" name="uid" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                    <button type="submit" name="submit" value="submit">Sign</button>
                </form>
            </div>
        </section>
 <?php
  include_once 'footer.php';
  ?>
