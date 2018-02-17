const Ch1Quantit = 10;
const advancedCombinations = [];
const expertCombinations = [];
$(".beginner").eq(0).click(function(){
  var random = Math.floor(Math.random() * Ch1Quantity);
  var url = "./beginner/Checkmate1/Ch1p"+random+".html";
  window.location.href = url;
})
$(".next").click(function(){
  if($(".next").css("background-color")!= "rgb(118, 191, 44)"){
    var exitConfirm = confirm("You have not finished the task yet! Are you sure you want to abandon it?")
    if(!exitConfirm) return;
  };
  nextCh1();
})

function nextCh1(){
  var random = Math.floor(Math.random() * Ch1Quantit);
  var url = "Ch1p"+random+".html";
  window.location.href = url;
}
