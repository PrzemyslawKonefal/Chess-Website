<?php
session_start();

if(isset($_GET['email']) && isset($_GET['hash'])){
    require_once"connectUsers.php";
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
      if ($connection->connect_errno!=0) {
        echo "Error: ".$connection->connect_errno;
      }

      else {
        $email = $_GET['email'];
        $hash = $_GET['hash'];
        $search = $connection->query("SELECT verification_code FROM users WHERE email = '$email' and verification_code = '$hash'");
          if ($search ->num_rows >0) {
            $connection->query("UPDATE users SET is_verified = 1 WHERE email = '$email'");
            $_SESSION['registration_complete'] = true;
      }
  }
  $connection->close();
}
  header('Location: ../sign.php');
 ?>
