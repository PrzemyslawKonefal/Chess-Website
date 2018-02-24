<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/css.css">
    <link rel="stylesheet" href="../../css/chessboard-0.3.0.min.css">
    <?php
    session_start();
    $_SESSION['ID'] = -1;
    $_SESSION['movesCounter'] = 0;
    $_SESSION['Table'] = "checkmates2"
     ?>
    <title></title>
  </head>
  <body>
    <div class="navbar">
      <div class="dropdown">
          <a href="https://facebook.com">Combinations</a>
          <div class="dropdown-content" id="levels">
            <a href="../../beginner.html">Beginner</a>
            <a href="../../advanced.html">Advanced</a>
            <a href="../../expert.html">Expert</a>
             </div>
      </div>
      <a href="#">Game rules</a>
      <div class="dropdown">
          <a href="#">Sign in</a>
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
              <button type="button" class="btn btn-warning" name="button">Sign up</button>
            </div>
            <a href="#" id="forgot">Forgot password</a>
         </div>
      </div>
    </div>
    <div class="grid">
        <div class="box">
          <div id="board"></div>
        </div>
        <div class="info-right">
          <div class="info-inside">
            <div class="score">
              <span>Score: <span id="score" style="color:#5ab40b">0</span> / <span id="attempts" style="color: #5ab40b">0</span> <br>
               Correct: <span id="correct" style="color:#5ab40b"></span>% </span>
            </div>
            <div class="clock">
              <span id="min">00</span>:<span id="sec">00</span>
              <img src="img/hourglass.png" alt="clock">
            </div>
            <h1 id="success"></h1>
            <div id="options">
              <div id="toPlay"><p>To Play:</p><div id="who"></div> </div>
              <p>White Castling: <span id="whiteCast"></span></p>
              <p>Black Castling: <span id="blackCast"></span></p>
              <div style="display:flex"><p>Notation:</p><input type="checkbox"  id="notation"></div>
            </div>
            <div id="moves">PGN: <span id="pgn"></span></div>
            <div class="nextProb"><span class="next" id="nextCheckmate1">Next Problem</span><div class="rotate"></div> </div>
            <div id="tip">
              <span>Tip</span><span id="sign">></span>
              <div class="drop">
                <p>Queen is the only one
                 who can give a check.
                 Check all possibilities.</p>
              </div>
             </div>
          </div>
        </div>
    </div>

    <data id="start" style="display:none"></data>
    <data id="move" style="display:none"></data>
    <data id="player" style="display:none"></data>
    <data id="additional" style="display:none"></data>
    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
    <script src="../../js/chessboard-0.3.0.js"></script>
    <script src="../../js/js.js"></script>

    </script>
  </body>
</html>
