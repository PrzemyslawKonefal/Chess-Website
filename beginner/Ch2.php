<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Krona+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/chessboard-0.3.0.min.css">
    <?php
    session_start();
    $_SESSION['ID'] = -1;
    $_SESSION['movesCounter'] = 0;
    $_SESSION['Table'] = "checkmates2"
     ?>
    <title>Checkmates in 1</title>
  </head>
  <body>
    <nav class="navbar">
      <i class="fas fa-arrow-circle-left nav-icon" id="hideNav" onclick="hideNav()"></i>
      <a href="../"> <img src="../img/logo.png"></a>
      <div class="dropdown">
          <a href="../combinatons.php"><i class="fas fa-gamepad nav-icon"></i> Combinations</a>
          <div class="dropdown-content">
            <a href="./">Beginner</a>
            <a href="../advanced">Advanced</a>
            <a href="../expert">Expert</a>
          </div>
      </div>
      <a href="../matches.php"> <i class="fas fa-chess-pawn nav-icon"></i> Matches</a>
      <a href="../rules.php"><i class="fas fa-book nav-icon"></i> Game rules</a>
              <div class="dropdown">
                <a href="../sign.php"><i class="fas fa-sign-in-alt nav-icon"></i> Sign in</a>
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
                  <a href="../forgot.php" id="forgot">Forgot password</a>
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
                <a href="../about.php"><i class="fab fa-delicious nav-icon"></i> About</a>
                <a href="../contact.php"><i class="fas fa-envelope nav-icon"></i> Contact</a>
    </nav>
    <div class="grid">
        <div class="box">
          <h2 style="text-align:center; color:#d7b62b; text-shadow: 2px 2px #000;">Daily Challenge!</h2>
          <div id="board" style="width:60%"></div>
          <div id="MoveSwitcher"><h3>See the answer</h3> <div style="display:flex;"><button id="MoveBackward"><</button> <button id="MoveForward">></button></div>  </div>
        </div>
        <div class="info-right">
          <div class="info-inside">
            <div class="score">
              <span>Score: <span id="score" >0</span> / <span id="attempts">0</span><br>
               Correct: <span id="correct" ></span>% </span>
            </div>
            <div class="clock">
              <span id="min">00</span>:<span id="sec">00</span>
              <img src="img/hourglass.png" alt="clock">
            </div>
            <div id="toPlay"><p>To Play:</p><div id="who"></div> </div>
            <div id="options">
              <p>White Castling: <span id="whiteCast"></span></p>
              <p>Black Castling: <span id="blackCast"></span></p>
              <div style="display:flex"><p>Notation:</p><input type="checkbox"  id="notation"></div>
            </div>
            <h1 id="success"></h1>
            <div class="nextProb"><span class="next" id="nextCheckmate1">Next Problem</span><div class="rotate"></div> </div>
          </div>
        </div>

    </div>

    <data id="start" style="display:none"></data>
    <data id="move" style="display:none"></data>
    <data id="player" style="display:none"></data>
    <data id="additional" style="display:none"></data>
    <data id="size" style="display:none"></data>

    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
    <script src="../js/chessboard-0.3.0.js"></script>
    <script src="../js/js.js"></script>
    <script src="../js/navLogic.js"></script>

    </script>
  </body>
</html>
