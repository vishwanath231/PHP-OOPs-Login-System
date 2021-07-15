<?php

session_start();
include '../database/config.php';



if (isset($_POST['register'])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    try {
        
        $sql = "SELECT * FROM info WHERE (email= :email)";
        $stmt = $db_conn->prepare($sql);
        $stmt->bindParam('email', $email);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row['email'] == $email) {
            $_SESSION['err'] = "Email already taken";
            header("location:../view/register.php?username=$username");
            
        }else {
            if ($password != $cpassword) {
                $_SESSION['err'] = "Password doesn't match! pleace check it";
                header("location:../view/register.php?username=$username&email=$email");
                
            } else {
                $user->Register($username, $email, $password);
                $_SESSION['suc'] = "Registration Successfull! Please Login Here";
                header("location:../index.php");
            }

        }
        
    } catch (PDOException $e) {
        echo "err";
    }    

}



?>