$(document).ready(function(){
var playerMove = false,
    positions,
    moves,
    move,
    startPosition,
    additional,
    cfg,
    board,
    clock,
    taskFinished,
    moveCounter,
    score=0,
    attempts=0;

// on board change

var onChange = function(oldPos, newPos) {
  if(!taskFinished){
      if(playerMove){
          $("#player").load(`${pathToMainFolder}ServerScripts/answer.php`, function(){ // loads answer
            //if correct move
              if(ChessBoard.objToFen(newPos) == document.getElementById("player").innerHTML){
                    cfg.position = ChessBoard.objToFen(newPos);
                    moveCounter++;
                    if(moveCounter/2 == additional[3]){ //double equal sign - additional[3] is a string
                        $("#success").css("border-color","#76bf2c");
                        $("#success").html("Success");
                        score++;
                        taskFinished = true;
                    }
                    else{
                          $("#move").load(`${pathToMainFolder}ServerScripts/computerMove.php`, function(){
                            move = document.getElementById("move").innerHTML;
                            board.position(move);
                        });
                   }
              }
              //incorrect move
              else{
                    $("#success").html("<span style = 'color:red'>Wrong!</span>")
                    $("#success").css("border-color","red");
                    board = ChessBoard('board', cfg);
                    taskFinished = true;
              }
                if(taskFinished){
                    cfg.draggable = false;
                    clearInterval(clock);
                    attempts++;
                    $("#success").css("opacity", "1");
                    $("#score").html(score);
                    $("#attempts").html(attempts);
                    $("#correct").html(Math.round(((score/attempts) *100) * 100) / 100);
                    $(".next").css("background", "#76bf2c");
                    $(".rotate").css("background", "#76bf2c");
                    loadAnswers();
                    $("#MoveSwitcher").slideDown();
                  }
            });
            playerMove = false;
          }
      else {
        playerMove = true;
         cfg.position = ChessBoard.objToFen(newPos);
         moveCounter++;}
  }
};
//Clock
function setClock(){
var mins = 0,
    secs = 0;
    clock = setInterval(function(){
      secs++;
      if(secs > 59){secs =0; mins++;}
      if(mins<10) $("#min").html("0" + mins);
      else $("#min").html(mins);
      if(secs<10) $("#sec").html("0" + secs);
      else $("#sec").html(secs);
    }, 1000)
}
    //load position

  function nextTask(){
         moveCounter = 0;
         positions = '';
         moves = '';
         taskFinished = false;

          $("#start").load(`${pathToMainFolder}ServerScripts/start.php`, function(){
            $("#move").load(`${pathToMainFolder}ServerScripts/computerMove.php`, function(){
              $("#additional").load(`${pathToMainFolder}ServerScripts/additional.php`, function(){

                startPosition = document.getElementById("start").innerHTML;
                move = document.getElementById("move").innerHTML;
                additional = document.getElementById("additional").innerHTML;
                startPosition = startPosition.trim(); //removes spaces before and after
                additional = additional.trim();
                //setting position
                cfg.position = startPosition;
                cfg.draggable = true;
                board = ChessBoard('board', cfg);
                //updating info castle/color/moves
                additional = additional.split(" ");
                if(additional[0] == 'w') {$("#who").css("background", "#fff"); board.orientation('white'); cfg.orientation = 'white'}
                else {$("#who").css("background", "#000");board.orientation('black'); cfg.orientation = 'black'}
                $("#whiteCast").html(additional[1]);
                $("#blackCast").html(additional[2]);
                // first move initiate, enable next task
                setTimeout(function(){
                   board.position(move);
                   $(".nextProb").css("pointer-events", "auto");
                 }, 300)
                $(".nextProb").css("pointer-events", "none");
                $("#success").css("opacity", "0");
                $(".next").css("background", "#d7b62b");
                $(".rotate").css("background", "#d7b62b");
                document.getElementById("MoveForward").disabled = true;
                document.getElementById("MoveBackward").disabled = true;
                clearInterval(clock);
                setClock();
                $("#MoveSwitcher").slideUp();

                });
              });
            });
      }

      function loadAnswers(){
        $("#player").load(`${pathToMainFolder}ServerScripts/playerMovesAll.php`, function(){
            $("#move").load(`${pathToMainFolder}ServerScripts/computerMovesAll.php`, function(){
            positions = document.getElementById("player").innerHTML;
            moves = document.getElementById("move").innerHTML;
            positions = positions.split(" ");
            positions.unshift(startPosition);
            moves = moves.split(" ");
            document.getElementById("MoveForward").disabled = false;
            document.getElementById("MoveBackward").disabled = false;
          });
        });
      }

        //Next Task click

        $(".next").click(function(){
          if($(".next").css("background-color")!= "rgb(118, 191, 44)"){
            var exitConfirm = confirm("You have not finished the task yet! Are you sure you want to abandon it?")
            if(!exitConfirm) return;
            else {
                playerMove = false;
                attempts++;
                $("#attempts").html(attempts);
                $("#correct").html(Math.round(((score/attempts) *100) * 100) / 100);}
          };
          setTimeout(function(){nextTask();},100);
        })

        // Notation on board

          $("#notation").click(function(){
            if(document.getElementById("notation").checked){
              cfg.showNotation = true;
            }
            else{
              cfg.showNotation = false;
            }
            board = ChessBoard('board', cfg); //refresing board
          });

          //see moves after task is done
      function moveBackward() {
        if (moveCounter >0){
        if ((moveCounter) % 2) board.position(positions[Math.floor(moveCounter/2)], false)
        else board.position(moves[(moveCounter/2)-1], false);
        cfg.position = board.position();
          moveCounter--;
          }
      }
      function moveForward() {
        if (moveCounter+1 <= additional[3]*2){
        if ((moveCounter) % 2) board.position(positions[Math.floor(moveCounter/2)+1], false);
        else board.position(moves[(moveCounter/2)], false);
        cfg.position = board.position();
          moveCounter++;
          }
      }
      document.addEventListener("keydown", function(event){
        if(event.which === 39)moveForward();
        else if(event.which === 37) moveBackward();
  });
      $("#MoveForward").click(function(){
        moveForward();
      });
      $("#MoveBackward").click(function(){
        moveBackward();
      });
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

      //execute when document is ready

      if (typeof path === 'undefined') {
          var pathToMainFolder = '../';
      }
      else{
          var pathToMainFolder = path;
      }

      cfg = {
            draggable: true,
            position: startPosition,
            moveSpeed: 'fast',
            showNotation: false,
            snapSpeed: 150,
            onChange: onChange
          };

          $("#MoveSwitcher").css("width", $("#board").css("width"));
          $("#size").load(`${pathToMainFolder}ServerScripts/rowCount.php`, function(){
          nextTask();
          });

      });
