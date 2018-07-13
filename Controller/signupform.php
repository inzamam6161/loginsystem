<?php

if(isset($_POST['submit'])){
    
    include '../Model/connection.php';
    
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    //error handler
    //check for empty field
    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($password)){
        header('Location: ../signup.php?signup=empty');
        exit();
    } else {
        //check if input characater are valid
        if(!preg_match("/^[a-zA-Z]*$/", $first)||!preg_match("/^[a-zA-Z]*$/", $last)){
            header('Location: ../signup.php?signup=invalid');
            exit();
        }else{
            //check if email is valid
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                header('Location: ../signup.php?signup=email');
                exit();
            }else{
                $sql="SELECT * FROM users WHERE user_uid='$uid'";
                $result= mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0){
                    header('Location: ../signup.php?signup=usertaken');
                    exit();
                }else{
                    //hashing the  password
                    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                    //INSERT THE USER INTO A DATABASE
                    $sql = "INSERT INTO users(user_first, user_last, user_email, user_uid, user_password) VALUES('$first','$last','$email','$uid','$hashpassword');";
                    mysqli_query($conn, $sql);
                    header('Location: ../signup.php?signup=success');
                    exit();
                            
                }
                
            }
        }
    }
}else{
    header('Location: ../signup.php');
    exit();
}