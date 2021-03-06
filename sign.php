<?php session_start();
if(isset($_SESSION['UserData'])) {header('Location: index.php'); exit();}
?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/chessboard-0.3.0.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/title-icon.ico" />
    <title>Chessyes.eu</title>
  </head>
  <body>

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

	<div class = "main">
    <?php if(isset($_SESSION['registration_complete']) && $_SESSION['registration_complete'] == true){
      echo "<h2 style='text-align: center; color: #47ff37;'>Registration complete! Sign in now!</h2>";
      unset($_SESSION['registration_complete']);
    }
    ?>
    <div id="login-container">
    		<form class="logging-box" action="ServerScripts/signIn.php" method="post">
            <div class="title">
                <i class="fas fa-sign-in-alt sign-icon"></i>
                <h3>Sign in</h3>
            </div>
          <p>Sign in if you have an account.</p>
           <input type="email" name="email" placeholder="Email" required>
           <input type="password" name="password" placeholder="Password" required>
           <?php if(isset($_SESSION['Log_Err'])) echo $_SESSION['Log_Err']; unset($_SESSION['Log_Err']);?>
           <a href="#" id="forgot">Forgot password</a>
           <button type="submit" name="button"><i class="fas fa-sign-in-alt"></i> Sign in</button>
        </form>
        <form class="logging-box" action="ServerScripts/signUp.php" method="post">
            <div class="title">
                <i class="fas fa-user-plus sign-icon"></i>
                <h3>I am new here</h3>
             </div>
          <p>Sign up! After a quick verification your account will be active.</p>
          <input type="text" name="nick" placeholder="Nick" required>
          <?php if(isset($_SESSION['Sign_Nick_Err'])) echo "<span>".$_SESSION['Sign_Nick_Err']."</span>"; unset($_SESSION['Sign_Nick_Err']);?>
          <input type="email" name="email" placeholder="Email" required>
          <?php if(isset($_SESSION['Sign_Email_Err'])) echo "<span>".$_SESSION['Sign_Email_Err']."</span>"; unset($_SESSION['Sign_Email_Err']);?>
          <input type="password" name="password" placeholder="Password" required>
          <?php if(isset($_SESSION['Sign_password_Err'])) echo "<span>".$_SESSION['Sign_password_Err']."</span>"; unset($_SESSION['Sign_password_Err']);?>
          <input type="password" name="password2" placeholder="Repeat password" required>
          <?php if(isset($_SESSION['Sign_password2_Err'])) echo "<span>".$_SESSION['Sign_password2_Err']."</span>"; unset($_SESSION['Sign_password2_Err']);?>
          <input type="checkbox" id="rules" name="rules" value="1" required>
          <label for="rules">I accept terms and conditions</label>
          <div style="padding-left:15px;"> <div class="g-recaptcha" data-sitekey="6LdReFcUAAAAALdI7JudRomp4WsFoqxenmKmCYyl"></div></div>
          <?php if(isset($_SESSION['Sign_Captcha_Err'])) echo "<span>".$_SESSION['Sign_Captcha_Err']."</span>"; unset($_SESSION['Sign_Captcha_Err']);?>
          <button type="submit" name="button"><i class="fas fa-user-plus"></i> Sign Up</button>
        </form>
    </div>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
    <script src="js/navLogic.js">

    </script>
  </body>
</html>
