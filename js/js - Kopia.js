var playerMove = false,
    move,
    position,
    cfg,
    board,
    clock,
    score=0,
    attempts=0;

// on board change

var onChange = function(oldPos, newPos) {
  if(playerMove){
      $("#player").load('data2.php');
      setTimeout(function() { //timeouts prevents from empty innerHTMLs. Let the data load first :)
    //if correct move
      if(ChessBoard.objToFen(newPos) == document.getElementById("player").innerHTML){
        $("#success").css("border-color","#76bf2c");
        $("#success").html("Success");
        score++;
        cfg.position = ChessBoard.objToFen(newPos);
      }
      else{
        $("#success").html("<span style = 'color:red'>Wrong!</span>")
        $("#success").css("border-color","red");
        cfg.position = ChessBoard.objToFen(oldPos);
        board = ChessBoard('board', cfg);
      }
        $("#success").css("opacity", "1");
        cfg.draggable = false;
        attempts++;
        $("#score").html(score);
        $("#attempts").html(attempts);
        $("#correct").html(Math.round(((score/attempts) *100) * 100) / 100);
        clearInterval(clock);
        setTimeout(function(){
          $(".next").css("background", "#76bf2c");
          $(".rotate").css("background", "#76bf2c");
        }, 300);
      },50);
      playerMove = false;
      }
  else {playerMove = true; cfg.position = ChessBoard.objToFen(newPos);}

};
$("#tip").click(function(){
  let visible = parseInt($(".drop").css("opacity"));
  if(!visible){
  $(".drop").css("opacity","1");
  $(".drop").css("height","150px");
  $("#sign").css("transform", "rotate(270deg)");
}
  else{
    $(".drop").css("opacity","0");
    $(".drop").css("height","0px");
    $("#sign").css("transform", "rotate(90deg)");
  }
  });

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

  // Load position

    $(document).ready(function(){
    cfg = {
          draggable: true,
          position: position,
          moveSpeed: 'slow',
          showNotation: false,
          snapSpeed: 50,
          onChange: onChange
        };
        nextTask();
    });

    //Next Task

    $(".next").click(function(){
      if($(".next").css("background-color")!= "rgb(118, 191, 44)"){
        var exitConfirm = confirm("You have not finished the task yet! Are you sure you want to abandon it?")
        if(!exitConfirm) return;
        else {
            $("#player").load('data2.php');
            playerMove = false;
            attempts++;
            $("#attempts").html(attempts);
            $("#correct").html(Math.round(((score/attempts) *100) * 100) / 100);}
      };
      setTimeout(function(){nextTask();},100);
    })
       function nextTask(){
        $("#start").load('data.php');
        $("#move").load('data1.php');
          setTimeout(function(){
          position = document.getElementById("start").innerHTML;
          position = position.replace(/\s/g,'');
          cfg.position = position;
          cfg.draggable = true;
          board = ChessBoard('board', cfg);
          move = document.getElementById("move").innerHTML;
          setTimeout(function(){
             board.move(move);
               }, 300)
          },250);
          $("#success").css("opacity", "0");
          $(".next").css("background", "#00b4c6");
          $(".rotate").css("background", "#00b4c6");
          clearInterval(clock);
          setClock();
      }
