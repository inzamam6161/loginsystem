<?php 
session_start();
include_once 'header.php';
?>
        <section class="main_container">
            <div class="main_wrapper">
                <h2>Home</h2>
                <?php
                if(isset($_SESSION['u_id'])){
                    echo 'u are logged in';
                }
                ?>
            </div>
        </section>
 <?php
 
  include_once 'footer.php';

  ?>
