$(document).ready(function(){
   var cfg,
       moveCounter,
       moves,
       board;

   cfg = {
        draggable: false,
        position: 'start',
        moveSpeed: 'fast',
        showNotation: false,
    }
    board = ChessBoard('board', cfg);
    $("#MoveSwitcher").css("width", $("#board").css("width"));
    $("#MoveSwitcher").slideDown();
    addMatches();

    function addMatches(){

        $("<li><img><div class='match-info'><h5></h5><h6></h6> Result: <span class='result'></span></div><img><data class='moves'></data><data class='pgn'></data></li>").appendTo(".matches");
        $(".matches li").eq(-1).find("h5").load('../ServerScripts/getMatchPlayers.php', function(){
          var opponents = $(".matches h5").eq(-1).html();
            if (opponents != ""){
              opponents = opponents.split(" ");
              $(".matches li").find("img").attr("onerror", "this.src='img/players/unknown.jpg'");
              $(".matches li").eq(-1).find("img").eq(0).attr('src', 'img/players/'+opponents[0]+'.jpg');
              $(".matches li").eq(-1).find("img").eq(1).attr('src', 'img/players/'+opponents[2]+'.jpg');
              $(".matches li").eq(-1).find("h6").load('../ServerScripts/getMatchTimeDate.php', function(){
                $(".matches li").eq(-1).find(".result").load('../ServerScripts/getMatchResult.php', function(){
                  $(".matches li").eq(-1).find(".moves").load('../ServerScripts/getMatchMoves.php', function(){
                    $(".matches li").eq(-1).find(".pgn").load('../ServerScripts/getMatchPgn.php', function(){
                        if ($(".matches li").length % 3 !=0) addMatches();
                    });
                  });
                });
              });
          }
        else{
          $(".matches li").eq(-1).remove();
          alert("There are no more matches of this category in a database yet :( We expand it day by day, so if you are hungry for more - come back soon. Wanna help us out? Click Contact on the navigation bar and become a member of a team!")
        }
        });

      }
    //loading all match info to board
    $(".matches").on('click', 'li', function(){
            moves = $(this).find(".moves").html();   //moves needed outside the function, global var
            moves = moves.split(" ");
            moves.unshift("start");

            var pgn = $(this).find(".pgn").html();
            pgn = pgn.split(" ");

            $("#white-moves").html("");
            $("#black-moves").html("");

            for(i = 0; i < pgn.length; i++){
              if(i%2 == 0) $("<li>"+pgn[i]+"</li>").appendTo("#white-moves");
              else $("<li>"+pgn[i]+"</li>").appendTo("#black-moves");
            }
            $(".match-data").find("h2").html($(this).find("h5").html());
            cfg.position = 'start';
            board = ChessBoard('board', cfg);
            moveCounter = 0;

            $("html, body").animate({ scrollTop: 0 }, "slow");
    });
    // Previous and Next moves

    $("#MoveForward").click(function(){
        moveForward()
    });

    $("#MoveBackward").click(function(){
        moveBackward()
    });
        document.addEventListener("keydown", function(event){
          if(event.which === 39)moveForward();
          else if(event.which === 37) moveBackward();
    });
    function moveForward(){
      if (moveCounter < moves.length-1)
      {
            moveCounter++;
            board.position(moves[moveCounter]);
            cfg.position = board.position();

            var index = $("li.active-move").index();
            if ($("li.active-move").closest("ol").length>0){
              $("#black-moves li").eq(index).addClass("active-move");
              $("#white-moves li").eq(index).removeClass("active-move");
            }
            else{
              $("#white-moves li").eq(index+1).addClass("active-move");
              $("#black-moves li").eq(index).removeClass("active-move");
            }
      }
    }

    function moveBackward(){
      if (moveCounter > 0)
      {
        moveCounter--;
        board.position(moves[moveCounter]);
        cfg.position = board.position();

        var index = $("li.active-move").index();
        if ($("li.active-move").closest("ol").length>0){
          if(index>0)$("#black-moves li").eq(index-1).addClass("active-move");
          $("#white-moves li").eq(index).removeClass("active-move");
        }
        else{
          $("#white-moves li").eq(index).addClass("active-move");
          $("#black-moves li").eq(index).removeClass("active-move");
        }
      }
    }

//////////
 $(".addMatches").click(function(){
   addMatches();
 });

 $(".match-data").find("ol, ul").on('click', 'li', function(){
    moveCounter = $(this).index()*2;
    $(this).closest("ol").index() === 0 ? moveCounter++: moveCounter+=2;
    board.position(moves[moveCounter]);
    cfg.position = board.position();
    $(".match-data li").removeClass("active-move");
    $(this).addClass("active-move");
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
});
