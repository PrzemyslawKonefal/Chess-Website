<?php
session_start();
  require_once"connectUsers.php";
  if ((!isset($_POST['email'])) || (!isset($_POST['password'])))
   {
    header('Location: ../index.php');
    exit();
   }

   $connection = @new mysqli($host, $db_user, $db_password, $db_name);
       if ($connection->connect_errno!=0) {
         echo "Error: ".$connection->connect_errno;
       }
       else{
         $email = $_POST['email'];
         $password = $_POST['password'];
         $email = htmlentities($email, ENT_QUOTES, "UTF-8");
         $password = htmlentities($password, ENT_QUOTES, "UTF-8");

         if($result = @$connection->query(
           sprintf("SELECT * FROM users WHERE email = '%s' AND password = '%s'",
           mysqli_real_escape_string($connection, $email),
           mysqli_real_escape_string($connection, $password)))){
             $users_number = $result->num_rows;
             if ($users_number > 0){
               $_SESSION['UserData'] = $result->fetch_assoc();
               header("Location: ../".$_SESSION['location']);
              }
              else
              {
                $_SESSION['Log_Err'] = "<h5 style='color:red; text-align:center'>Nieprawidłowy login lub hasło</h5>";
                header("Location: ../sign.php");
              }

           }
       }
 ?>
