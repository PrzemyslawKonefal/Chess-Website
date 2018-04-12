<?php session_start(); ?>
<?php
    require_once"connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
      if ($connection->connect_errno!=0) {
        echo "Error: ".$connection->connect_errno;
      }
      else{
        $_SESSION['Filter'] = "'".$_SESSION['Filter']."'";
        $_SESSION['IDsArray'] = array();
        $result = $connection->query("SELECT * FROM {$_SESSION['Table']} WHERE {$_SESSION['FilterType']} LIKE {$_SESSION['Filter']}");
        if ($result ->num_rows >0) {
          while($row = mysqli_fetch_assoc($result)){
            array_push($_SESSION['IDsArray'],$row['ID']);
            }
        }

      }
   ?>
