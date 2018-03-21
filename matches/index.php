<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/css.css">
    <title></title>
    <?php
    session_start();
    $_SESSION['ID'] = -1;
    $_SESSION['movesCounter'] = 0;
    $_SESSION['Table'] = "checkmates3"
     ?>
  </head>
  <body>

    <nav class="navbar">
      <i class="fas fa-arrow-circle-left nav-icon" id="hideNav" onclick="hideNav()"></i>
      <a href="index.php"> <img src="../img/logo.png"></a>
      <div class="dropdown">
          <a href="combinatons.php"><i class="fas fa-gamepad nav-icon"></i> Combinations</a>
          <div class="dropdown-content">
              <a href="beginner.html">Beginner</a>
              <a href="advanced.html">Advanced</a>
              <a href="expert.html">Expert</a>
          </div>
      </div>
      <a href="matches.php"> <i class="fas fa-chess-pawn nav-icon"></i> Matches</a>
      <a href="rules.php"><i class="fas fa-book nav-icon"></i> Game rules</a>
              <div class="dropdown">
                <a href="sign.php"><i class="fas fa-sign-in-alt nav-icon"></i> Sign in</a>
                <div class="dropdown-content">
                  <div class="container">
                    <p>User:</p>
                    <input type="text" name="" value="">
                  </div>
                  <div class="container">
                    <p>Password:</p>
                    <input type="password" name="" value="">
                  </div>
                  <div class="container">
                    <button type="button" class="btn btn-success" name="button">Sign in</button>
                    <button type="button" class="btn btn-warning" name="button"><a href="sign.php" style="color: #000;">Sign up</a></button>
                  </div>
                  <a href="#" id="forgot">Forgot password</a>
               </div>
             </div>
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
    </nav>

    <div class="main">
      <div style=" text-align:center; color: #fff;">
        <h1 style="background:#d7b62b; font-size: 4em;">Matches</h1>
        <p class="container" style="font-size:1.3em;">Analysing matches may improve your skills exponentially. Watching the best plays around the world may let you notice ideas you've never thought of and use it to destroy your future opponents</p>
        <div class="match-categories">
              <div>
                  <a class="match-category" href="legendary.php">
                    <img src="../img/legendary.jpg" >
                    <h3>Legendary matches</h3>
                  </a>
                  <a class="match-category" href="by-players.php">
                    <img src="../img/players.jpg" >
                    <h3>Matches by players</h3>
                  </a>
              </div>
              <div>
                  <a class="match-category" href="by-opening.php">
                    <img src="../img/opening.jpg" >
                    <h3>Matches by opening</h3>
                  </a>
                  <a class="match-category" href="saved.php">
                    <img src="../img/opening.jpg" >
                    <h3>Saved matches</h3>
                  </a>
            </div>
        </div>
      </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
  </body>
</html>
