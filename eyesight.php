<?php session_start();
$_SESSION['location'] = "eyesight.php";
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
    <style media="screen">
      .box{
        grid-column: 1/3;
      }
      #board{
        max-width: 800px;
      }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="img/title-icon.ico" />
    <title>Eyesight training</title>
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
    <div class="grid">
        <div class="box">
          <h2 style="text-align:center; color:#d7b62b; text-shadow: 2px 2px #000;">Train you eyesight on board!</h2>
          <p>This excercise ought to improve your seeing on the board. Over the board appear notations of a certain squares. Click pointed squares as soon as possible. The more you click in 30 seconds, the better. It is recommended to adjust the board size before you start(see navigation bar). Now - click big, shiny, green button under the board and let's go!</p>
          <div style="position:relative; text-align: center;">  <h2 id = "square-num"></h2> <div id="board"></div><button type="button" class="eyesight-start">Start</button><div class="time-manager">


          </div></div>
        </div>
    </div>
    <div class="time-counter">
      <h3 style="color: #fff;">Time left</h3>
      <p><span id = "time-left"></span> sec</p>
    </div>
    <i class="fas fa-volume-up" id = "mute"></i>

    <audio id="is-correct"></audio>
    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
    <script src="js/chessboard-0.3.0.js"></script>
    <script src="js/navLogic.js"></script>
    <script type="text/javascript">
      var   cfg = {
              showNotation: true
            },
      timeCount,
      tryDone,
      board = ChessBoard('board', cfg);
      $(".eyesight-start").click(function(){
        newGame();
      })
      function newGame(){
                  var gameStarted = true,
                      attempts = 0,
                      points = 0,
                      time = 30,
                      randomNotation;

                      newSquare();
                      clearTimeout(tryDone);
                      clearInterval(timeCount);
                      $("#time-left").html("30");
                      timeCount = setInterval(function(){
                        time--;
                        $("#time-left").html(time);
                      }, 1000);
                     tryDone = setTimeout(function(){
                            $("#square-num").html(points + "/" + attempts);
                            clearInterval(timeCount);
                            gameStarted = false;
                            return;
                      }, 30000);
                  function randomNotatiom(){
                        var letter, digit;
                        digit = Math.floor(Math.random() * 8)+1;
                        letter = Math.floor(Math.random() * 8)+1;
                        switch(letter){
                          case 1: {letter = 'a'; break;}
                          case 2: {letter = 'b'; break;}
                          case 3: {letter = 'c'; break;}
                          case 4: {letter = 'd'; break;}
                          case 5: {letter = 'e'; break;}
                          case 6: {letter = 'f'; break;}
                          case 7: {letter = 'g'; break;}
                          case 8: {letter = 'h'; break;}
                        }
                        return letter+digit;
                  }
                  function newSquare(){
                        randomNotation = randomNotatiom();
                        $("#square-num").html(randomNotation);
                    $()
                  }
                  $("#board").on("click", ".square-55d63", function(){
                      if(gameStarted){
                              var squareClass = "square-"+ randomNotation;
                              if($(this).hasClass(squareClass)) {points++; isCorrectSound(true);}
                              else{isCorrectSound(false);}
                              attempts++;
                              newSquare();
                            }
                    })

      }

      //resize board on demand
        $(".resize").find("span").click(function(){
          var boardSize = $(this).html();
          $(".resize").find("span").css("background", "inherit");
          $(this).css("background", "#76bf2c")
          $("#board").css("width", boardSize);
          $("#MoveSwitcher").css("width", boardSize);
          var board1 = ChessBoard('board', cfg);
          $(window).resize(board1.resize);
          board = ChessBoard('board', cfg);
        });

        //Resize board with window Resize
        $(window).on('resize', function(){
          var width = $("#board").css("width");
          var board1 = ChessBoard('board', cfg);
          $(window).resize(board1.resize);
          $("#MoveSwitcher").css("width", $("#board").css("width"));
          board = ChessBoard('board', cfg);
        });
      function isCorrectSound(correctBoolean){
        var sound = document.getElementById('is-correct');
        if(correctBoolean){sound.setAttribute('src', 'audio/correct.mp3' );}
        else {sound.setAttribute('src','audio/incorrect.wav' );}
        sound.play();
      }
      $("body").on('click', '#mute', function(){
        $("#mute").toggleClass("fa-volume-off");
        $("#mute").toggleClass("fa-volume-up");
        var sound = document.getElementById('is-correct');
        if($("#mute").hasClass("fa-volume-off")) sound.volume = 0;
        else sound.volume = 1;
      });
    </script>
  </body>
</html>
