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
    <title>Chess Combinations</title>
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

    <div class="main" style="color:#fff;">

        <h1 class="main-header" style="margin: 0;">Combinations</h1>
        <div class="category-anchors">
          <a href="beginner">Beginner</a>
          <a href="advanced">Advanced</a>
          <a href="expert">Expert</a>
        </div>
        <div class="container rules-box" style="text-align: center;">
          <h2 style="margin: 30px 0;">"<i> Tactics involve calculations that can tax the human brain, but when you boil them down, they are actually the simplest part of chess and are almost trivial compared to strategy </i>" <br> <span style="float: right; font-size: 0.8em;">Garry Kasparov</span> </h2>
          <section>
          <h3>What is the Chess Combination?</h3>
          <img src="img/combinations.jpg" style="display:block; margin: auto; border-radius: 10px; width: 80%;">
          <p>In chess, a combination is a sequence of moves, often initiated by a sacrifice, which leaves the opponent few options and results in tangible gain. At most points in a chess game, each player has several reasonable options from which to choose, which makes it difficult to plan ahead except in strategic terms. Combinations, in contrast to the norm, are sufficiently forcing that one can calculate exactly how advantage will be achieved against any defense. Indeed, it is usually necessary to see several moves ahead in exact detail before launching a combination, or else the initial sacrifice would not be undertaken. While resolving combinations, you immediately become a better player. It lets you see certain patterns already on board.</p>
          </section>
          <section>
          <h3>Assumptions</h3>
          <p>All the combinations on this website are about checkmating or winning material advantage. By 'material advantage' it is meant at least 2 points from pieces hierarchy. Combination is solved correctly only if you make all the best moves, e.g If you win a bishop, but you could've won a rook - You receive no points.</p>
          </section>
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
