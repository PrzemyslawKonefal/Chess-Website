<?php
session_start();
$_SESSION['movesCounter'] = 0;
$_SESSION['ID'] = mt_rand(0,$_SESSION["TableSize"]-1);
echo sizeof($_SESSION['IdUsed']);

// $repeated = false;
// while (!repeated) {
//  $_SESSION['ID'] = mt_rand(0,$_SESSION["TableSize"]-1);
//   for ($i=0; $i < sizeof($_SESSION['IdUsed']); $i++) {
//       if ($_SESSION['ID'] == $_SESSION['IdUsed'].[i]) {$repeated = true; break;}
//   }
// }
// array_push($_SESSION['IdUsed'],$_SESSION['ID']);
 ?>
