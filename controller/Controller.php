<?php
session_start();

class User{

    private $db;

    function __construct($db_conn){
        $this->db = $db_conn;
    }

    public function Register($username, $email, $password){

        try {
            // Hash password
            $hash = password_hash($password,PASSWORD_DEFAULT);
            
            // insert value
            $sql = "INSERT INTO info (name,email,password) VALUES (:name, :email, :password)";

            // Perpare the statement
            $stmt = $this->db->prepare($sql);

            // Bind Parameters
            $stmt->bindParam(":name", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hash);

            // Execute the query
            $stmt->execute();

        } catch (PDOException $e) {
            echo "error". $e->getMessage();       
        }
    }


    public function Login($email,$password){


        try {

            $query = "SELECT * FROM info WHERE email=:email";

            //prepare statement
            $stmt = $this->db->prepare($query);
            
            //Bind parameters
            $stmt->bindParam(":email",$email);
            
            $stmt->execute();
            
            $check = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($stmt->rowCount() > 0) {
                
                if (password_verify($password, $check['password'])) {
                    
                    $_SESSION['suc'] = "You have been Logged In";
                    header("location:../index.php");

                } else {
                    $_SESSION['err'] = "Incorrect password! Please check it.";
                    header("location:../index.php");
                }
            }else {
                $_SESSION['err'] = "Invalid email or password";
                header("location:../index.php");
            }
            
        } catch (PDOException $e) {
           echo $e;
        }
    }

}


?>