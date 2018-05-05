<?php session_start();
$_SESSION['location'] = "rules.php";
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
    <link rel="shortcut icon" type="image/x-icon" href="img/title-icon.ico" />
    <title>Chess Rules</title>
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

    <div class="main" style="color:#fff;">
        <h1 style="background:#d7b62b; font-size: 4em; text-align: center;">Rules</h1>
        <div class="container rules-box">
          <p style="padding: 20px 0 0 0; font-size:1.3em; text-align: center;">Chess is a two-player board game utilizing a chessboard and sixteen pieces of six types for each player. Each type of piece moves in a distinct way. The goal of the game is to checkmate (threaten with unescapable capture) the opponent's king. Games do not necessarily end with checkmate; players often resign if they believe they will lose. A game can also end in a draw in several ways.</p>
          <section>
          <h3>Step 1. How to Setup the Chessboard</h3>
          <img src="img/rules/start.jpg">
          <p>At the beginning of the game the chessboard is laid out so that each player has the white color square in the bottom right-hand side. The chess pieces are then arranged the same way each time. The second row (or rank) is filled with pawns. The rooks go in the corners, then the knights next to them, followed by the bishops, and finally the queen, who always goes on her own matching color, and the king on the remaining square. <br><strong>NOTE:</strong>White pieces always start at first and second line, black - seventh and eighth. <br> Queens are placed on 'D' squares, Kings on 'E'. Whites always have the very first move.</p>
        </section>
        <section>
            <h3>Step 2. How the Chess Pieces Moves</h3>
            <p>Each of the 6 different kinds of pieces moves differently. Pieces cannot move through other pieces (though the knight can jump over other pieces), and can never move onto a square with one of their own pieces. However, they can be moved to take the place of an opponent's piece which is then captured. Pieces are generally moved into positions where they can capture other pieces (by landing on their square and then replacing them), defend their own pieces in case of capture, or control important squares in the game.</p>
            <h4>The Queen</h4>
            <img src="img/rules/Q.jpg">
            <p>The Queen is the most powerful piece. She can move in any one straight direction - forward, backward, sideways, or diagonally - as far as possible as long as she does not move through any of her own pieces.</p>
            <h4>The King</h4>
            <img src="img/rules/K1.jpg" style="margin-bottom:15px;">
            <img src="img/rules/K2.jpg">
            <p>The king is the most important piece, but is one of the weakest. The king can only move one square in any direction - up, down, to the sides, and diagonally. The king may never move himself into check (where he could be captured). When the king is attacked by another piece this is called "check".</p>
            <h4>The Rook</h4>
            <img src="img/rules/R.jpg">
            <p>The Rook may move as far as it wants, but only forward, backward, and to the sides. The rooks are particularly powerful pieces when they are protecting each other and working together!</p>
            <h4>The Bishop</h4>
            <img src="img/rules/B.jpg">
            <p>The bishop may move as far as it wants, but only diagonally. Each bishop starts on one color (light or dark) and must always stay on that color. Bishops work well together because they cover up each other's weaknesses.</p>
            <h4>The Knight</h4>
            <img src="img/rules/N.jpg">
            <p>Knights move in a very different way from the other pieces – going two squares in one direction, and then one more move at a 90 degree angle, just like the shape of an “L”. Knights are also the only pieces that can move over other pieces.</p>
            <h4>The Pawn</h4>
            <img src="img/rules/P1.jpg" style="margin-bottom:15px;">
            <img src="img/rules/P2.jpg">
            <p>Pawns are unusual because they move and capture in different ways: they move forward, but capture diagonally. Pawns can only move forward one square at a time, except for their very first move where they can move forward two squares. Pawns can only capture one square diagonally in front of them. They can never move or capture backwards. If there is another piece directly in front of a pawn he cannot move past or capture that piece.</p>
        </section>
        <section>
        <h3>Step 3. Special moves</h3>
        <p style="text-align:center;">There are a few special rules in chess that may not seem logical at first. They were created to make the game more fun and interesting.</p>
        <h4>Promoting a Pawn</h4>
        <img src="img/rules/promotion.gif">
        <p>Pawns have another special ability and that is that if a pawn reaches the other side of the board it can become any other chess piece (called promotion). A pawn may be promoted to any piece. A common misconception is that pawns may only be exchanged for a piece that has been captured. That is NOT true. A pawn is usually promoted to a queen. Only pawns may be promoted.</p>

        <h4>Castling</h4>
        <img src="img/rules/castle.jpg">
        <p>One other special chess rule is called castling. This move allows you to do two important things all in one move: get your king to safety, and get your rook out of the corner and into the game. On a player's turn he may move his king two squares over to one side and then move the rook from that side's corner to right next to the king on the opposite side. However, in order to castle, the following conditions must be met:</p>
        <ul>
          <li>it must be king's very first move</li>
          <li>it must be that rook's very first move</li>
          <li>there cannot be any pieces between the king and rook to move</li>
          <li>the king may not be in check or pass through check</li>
        </ul>

        <h4>En Passant</h4>
        <img src="img/rules/passant.gif">
        <p>If a pawn moves out two squares on its first move, and by doing so lands to the side of an opponent's pawn (effectively jumping past the other pawn's ability to capture it), that other pawn has the option of capturing the first pawn as it passes by. This special move must be done immediately after the first pawn has moved past, otherwise the option to capture it is no longer available.</p>

      </section>
      <section>
      <h3>How to Win</h3>
      <img src="img/rules/checkmate.jpg">
      <p>The purpose of the game is to checkmate the opponent's king. This happens when the king is put into check and cannot get out of check. There are only three ways a king can get out of check: move out of the way, block the check with another piece, or capture the piece threatening the king. If a king cannot escape checkmate then the game is over. Customarily the king is not captured or removed from the board, the game is simply declared over.</p>

      <h3>How to Draw</h3>
      <img src="img/rules/draw.jpg">
      <p>Occasionally chess games do not end with a winner, but with a draw. There are 5 reasons why a chess game may end in a draw:</p>
      <ul>
        <li>The position reaches a stalemate where it is one player's turn to move, but his king is NOT in check and yet he does not have another legal move</li>
        <li>The players may simply agree to a draw and stop playing</li>
        <li>There are not enough pieces on the board to force a checkmate (example: a king and a bishop vs.a king)</li>
        <li>A player declares a draw if the same exact position is repeated three times (not necessarily three times in a row)</li>
        <li>Fifty consecutive moves have been played where neither player has moved a pawn or captured a piece</li>
      </ul>
      </section>
      <section>
      <h3>Chess pieces hierarchy</h3>
      <p>Don't carelessly lose your pieces! Each piece is valuable and you can't win a game without pieces to checkmate. There is an easy system that most players use to keep track of the relative value of each chess piece. How much are the chess pieces worth?</p>
      <ul>
        <li>A pawn is worth 1</li>
        <li>A knight is worth 3</li>
        <li>A bishop is worth 3</li>
        <li>A rook is worth 5</li>
        <li>A queen is worth 9</li>
        <li>The king is infinitely valuable</li>
      </ul>
        <p>At the end of the game these points don't mean anything – it is simply a system you can use to make decisions while playing, helping you know when to capture, exchange, or make other moves.</p>
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
