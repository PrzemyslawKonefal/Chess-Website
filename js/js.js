var playerMove = false;
var onChange = function(oldPos, newPos) {
  console.log(ChessBoard.objToFen(newPos));
  console.log(ChessBoard.objToFen(oldPos));
  if(playerMove){
      if(ChessBoard.objToFen(newPos) === $("#cor").attr("value")){
        $("#success").css("border-color","#76bf2c");
        $("#success").html("Success");
      }
      else{
        $("#success").html("<span style = 'color:red'>Wrong!</span>")
        $("#success").css("border-color","red");
        board = ChessBoard('board', cfg);
      }
        $("#success").css("opacity", "1");
        cfg.draggable = false;
        clearInterval(clock)
        setTimeout(function(){
          $(".next").css("background", "#76bf2c");
          $(".rotate").css("background", "#76bf2c");
        }, 300);
      }
  else playerMove = true;
  cfg.position = ChessBoard.objToFen(newPos);
};
var position = $("#position").attr("value");
var cfg = {
  draggable: true,
  position: position,
  moveSpeed: 'slow',
  showNotation: false,
  snapSpeed: 50,
  onChange: onChange
};
board = ChessBoard('board', cfg);
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
var mins = parseInt($("#min").html()),
    secs = parseInt($("#sec").html()),
    clock = setInterval(function(){
      secs++;
      if(secs > 59){secs =0; mins++;}
      if(mins<10) $("#min").html("0" + mins);
      else $("#min").html(mins);
      if(secs<10) $("#sec").html("0" + secs);
      else $("#sec").html(secs);
    }, 1000)

  $("#notation").click(function(){
    if(document.getElementById("notation").checked){
      cfg.showNotation = true;
    }
    else{
      cfg.showNotation = false;
    }
    board = ChessBoard('board', cfg); //refresing board
  })
  var move = $("#mov").attr("value");
  setTimeout(function(){
    board.move(move);
  }, 300)
