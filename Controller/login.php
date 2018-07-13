<?php

session_start();


if(isset($_POST['submit'])){
    
    include '../Model/connection.php';
    
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    //error handler
    //check if input is empty
    if(empty($uid) || empty($password)){
        header('Location: ../index.php?login=empty');
            exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck < 1){
            header('Location: ../index.php?login=error');
            exit();
        } else {
            if($row = mysqli_fetch_assoc($result));
            //de-hashing the password
            $hashpwdCheck = password_verify($password, $row['user_password']);
            if($hashpwdCheck == false){
                header('Location: ../index.php?login=error');
                exit();
            } elseif($hashpwdCheck == true){
                //Log in the user here
                $_SESSION['u_id'] = $row['user_id'];
                $_SESSION['u_first'] = $row['user_first'];
                $_SESSION['u_last'] = $row['user_last'];
                $_SESSION['u_email'] = $row['user_email'];
                $_SESSION['u_uid'] = $row['user_uid'];
                header('Location: ../index.php?login=success');
                exit();
            }
        }
        
    }
    
} else {
    header('Location: ../index.php?login=error');
    exit();
}

