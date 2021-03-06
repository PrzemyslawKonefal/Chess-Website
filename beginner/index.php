<?php session_start();
$_SESSION['location'] = "beginner/index.php";
?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/chessboard-0.3.0.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/title-icon.ico" />
    <title>Chessyes beginner</title>
  </head>
  <body>
    <nav class="navbar">
      <i class="fas fa-arrow-circle-left nav-icon" id="hideNav" onclick="hideNav()"></i>
      <a href="../"> <img src="../img/logo.png"></a>
      <div class="dropdown">
          <a href="../combinations.php"><i class="fas fa-gamepad nav-icon"></i> Combinations</a>
          <div class="dropdown-content">
            <a href="./">Beginner</a>
            <a href="../advanced">Advanced</a>
            <a href="../expert">Expert</a>
          </div>
      </div>
      <a href="../matches"> <i class="fas fa-chess-pawn nav-icon"></i> Matches</a>
      <a href="../eyesight.php"><i class="fas fa-eye nav-icon"></i> Eyesight</a>
      <a href="../rules.php"><i class="fas fa-book nav-icon"></i> Game rules</a>
                <div class="resize">
                  <i class="fas fa-window-maximize nav-icon"></i> <span style="text-decoration: underline;">Resize board</span>
                  <div class="nav-row">
                    <span>250px</span>
                    <span>300px</span>
                  </div>
                  <div class="nav-row">
                    <span>400px</span>
                    <span>500px</span>
                  </div>
                  <div class="nav-row">
                    <span>600px</span>
                    <span>700px</span>
                  </div>
                  <div class="nav-row">
                    <span>800px</span>
                    <span>900px</span>
                  </div>
                </div>
                <a href="../about.php"><i class="fab fa-delicious nav-icon"></i> About</a>
                <a href="../contact.php"><i class="fas fa-envelope nav-icon"></i> Contact</a>
                <?php if(isset($_SESSION['UserData'])){
                  echo "<a href='../ServerScripts/myAccount.php' style = 'margin-top:20px;'><i class='fas fa-user nav-icon'></i> ".$_SESSION['UserData']['nick']."</a>";
                  echo "<a href='../ServerScripts/logout.php'><i class='fas fa-sign-in-alt nav-icon'></i> Log out</a>";
                }
                else echo "<a href='../sign.php' style = 'margin-top:20px;'><i class='fas fa-sign-in-alt nav-icon'></i> Sign in</a>"
                ?>
    </nav>
    <div class="container description">
      <img src="../img/begin.jpg" alt="">
      <h2>Beginner</h2>
      <p>This section is aimed at new players. Easy combinations will help You memorize the rules of the game and teach you to seek for the basic chekmates.
        <strong>Be careful though!</strong> Some of the problems are significantly harder than the others, so don't be so hard on yourself. :) <br>
        Here are some tips that may help you with your play: <br>
        <strong style="text-decoration:underline;">Before you move:</strong><br>
        <strong >Check</strong> which of your pieces are under attack <br>
        <strong>Find</strong> out which enemy's pieces protects the king and try to get rid out of them.  <br>
        <strong>Analyse</strong> all kinds of checks you can give. Checks forces enemy to defend and prevents from counter-attack. Also, at the very end checkmate is just a special kind of check. </p>
    </div>
    <div class="categories">
        <div class="category beginner">
          <a  style="color:inherit;">Checkmates <br> in 1</a>
          <a class="color beginner" href="Ch1.php"></a>
        </div>
        <div class="category beginner">
          <a  style="color:inherit;">Checkmates <br> in 2</a>
          <a class="color beginner" href="Ch2.php"></a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="../js/navLogic.js"></script>
  </body>
</html>
