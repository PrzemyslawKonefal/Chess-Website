  <?php
      session_start();
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
