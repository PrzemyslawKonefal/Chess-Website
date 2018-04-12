<?php session_start(); ?>
  <?php
      $_SESSION['movesCounter'] = 0;
      $_SESSION['ID'] = mt_rand(0,$_SESSION["TableSize"]-1);

      // do {
      //   $repeated = false;
      //   $_SESSION['ID'] = mt_rand(0,$_SESSION["TableSize"]-1);
      //    for ($i=0; $i < sizeof($_SESSION['IdUsed']); $i++) {
      //      if ($_SESSION['ID'] == $_SESSION['IdUsed'].[$i]) {$repeated = true; break;}
      //    }
      // } while ($repeated);
      //  array_push($_SESSION['IdUsed'],$_SESSION['ID']);
      require_once"connect.php";

      $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0) {
          echo "Error: ".$connection->connect_errno;
        }
        else{
          $result = $connection->query("SELECT Start FROM {$_SESSION['Table']} WHERE ID = {$_SESSION['ID']}");
          if ($result ->num_rows >0) {
            while ($row = $result->fetch_assoc()) {
              $_SESSION['start'] = $row['Start'];
              echo $_SESSION['start'];
            }
          }
        }
     ?>
