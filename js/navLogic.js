function hideNav(){
  if($(".navbar").css("left") != "-180px"){
    $(".navbar").animate({left: "-180px"}, 700);
    $("#hideNav").css("transform", "rotate(180deg)");
  }
  else{
      $(".navbar").animate({left: "0"}, 700);
      $("#hideNav").css("transform", "rotate(0deg)");
  }
}
