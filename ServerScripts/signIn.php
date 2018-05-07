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

         if($result = @$connection->query(
           sprintf("SELECT * FROM users WHERE email = '%s' AND is_verified = 1",
           mysqli_real_escape_string($connection, $email)))) {
             $users_number = $result->num_rows;
             if ($users_number > 0){
               $_SESSION['UserData'] = $result->fetch_assoc();

               if (password_verify($password, $_SESSION['UserData']['password'])){
                 header("Location: ../".$_SESSION['location']);
               }
               else{
                 unset($_SESSION['UserData']);
                 $_SESSION['Log_Err'] = "<h5 style='color:red; text-align:center'>Incorrect login or password</h5>";
                 header("Location: ../sign.php");
               }
              }
              else
              {
                $_SESSION['Log_Err'] = "<h5 style='color:red; text-align:center'>Incorrect login or password</h5>";
                header("Location: ../sign.php");
              }
              $connection->close();
           }
       }
 ?>
