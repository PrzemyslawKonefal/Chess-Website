<?php session_start();
$_SESSION['location'] = "contact.php";
?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/chessboard-0.3.0.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/title-icon.ico" />
    <title>Contact us</title>
  </head>
  <body class="contact-body">
    <div style="position: absolute; top: 0; left: 0; height: 100vh; width: 100vw; background:rgba(0, 0, 0, 0.5);">

    </div>
    <nav class="navbar">
      <i class="fas fa-arrow-circle-left nav-icon" id="hideNav" onclick="hideNav()"></i>
      <a href="index.php"> <img src="img/logo.png"></a>
      <div class="dropdown">
          <a href="combinations.php"><i class="fas fa-gamepad nav-icon"></i> Combinations</a>
          <div class="dropdown-content">
              <a href="beginner">Beginner</a>
              <a href="advanced">Advanced</a>
              <a href="expert">Expert</a>
          </div>
      </div>
      <a href="matches"> <i class="fas fa-chess-pawn nav-icon"></i> Matches</a>
      <a href="eyesight.php"><i class="fas fa-eye nav-icon"></i> Eyesight</a>
      <a href="rules.php"><i class="fas fa-book nav-icon"></i> Game rules</a>
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
                <a href="about.php"><i class="fab fa-delicious nav-icon"></i> About</a>
                <a href="contact.php"><i class="fas fa-envelope nav-icon"></i> Contact</a>
                <?php if(isset($_SESSION['UserData'])){
                  echo "<a href='ServerScripts/myAccount.php' style = 'margin-top:20px;'><i class='fas fa-user nav-icon'></i> ".$_SESSION['UserData']['nick']."</a>";
                  echo "<a href='ServerScripts/logout.php'><i class='fas fa-sign-in-alt nav-icon'></i> Log out</a>";
                }
                else echo "<a href='sign.php' style = 'margin-top:20px;'><i class='fas fa-sign-in-alt nav-icon'></i> Sign in</a>"
                ?>
    </nav>

    <div class="main" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="contact-wrap">
           <form class="contact-form" action="ServerScripts/message.php" method="post">
             <h1 style="text-align: center; margin-bottom: 70px; font-weight: 700;">Contact Us</h1>
             <input type="text" name="name" placeholder="Name" required autocomplete="off">
             <input type="email" name="email" placeholder="E-mail" required autocomplete="off">
             <textarea type="text" name="message" placeholder="Message" required></textarea>
             <p style="color: #a5f200"><?php if (isset($_SESSION['MailSent']) and $_SESSION['MailSent'] == true) {
               $_SESSION['MailSent'] = false;
               echo "You've sent the message successively";
             } ?></p>
             <button type="submit" name="button">Send Your Message</button>
           </form>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
    <script src="js/navLogic.js"></script>


  </body>
</html>
