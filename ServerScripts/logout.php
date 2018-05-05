<?php
    session_start();
    if (isset($_SESSION['UserData'])) {
      unset($_SESSION['UserData']);
      header("Location: ../".$_SESSION['location']);
    }
    else{
      header('Location: ../index.php');
    }
 ?>
