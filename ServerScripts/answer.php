<?php
    session_start();
    require_once"connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
      if ($connection->connect_errno!=0) {
        echo "Error: ".$connection->connect_errno;
      }
      else{
        $result = $connection->query("SELECT PlayerMoves FROM {$_SESSION['Table']} WHERE ID = {$_SESSION['ID']}");
        if ($result ->num_rows >0) {
          while ($row = $result->fetch_assoc()) {
            $_SESSION['player'] = explode(" ",$row['PlayerMoves']);
            echo $_SESSION['player'][$_SESSION['movesCounter']];
          }
          $_SESSION['movesCounter']++;
        }

      }
   ?>
