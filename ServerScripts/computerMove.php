<?php session_start(); ?>
<?php
    require_once"connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
      if ($connection->connect_errno!=0) {
        echo "Error: ".$connection->connect_errno;
      }
      else{
        $result = $connection->query("SELECT ComputerMoves FROM {$_SESSION['Table']} WHERE ID = {$_SESSION['ID']}");
        if ($result ->num_rows >0) {
          while ($row = $result->fetch_assoc()) {
            $_SESSION['moves'] = explode(" ",$row['ComputerMoves']);
            echo $_SESSION['moves'][$_SESSION['movesCounter']];
          }
        }
      }
   ?>
