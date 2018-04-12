<?php session_start(); ?>
<?php
    require_once"connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
      if ($connection->connect_errno!=0) {
        echo "Error: ".$connection->connect_errno;
      }
      else{
        $result = $connection->query("SELECT * FROM {$_SESSION['Table']}");
        if ($result ->num_rows >0) {
          $rowcount = mysqli_num_rows($result);
            $_SESSION["TableSize"] = $rowcount;
            $_SESSION['IdUsed'] = array();
        }
      }
   ?>
