var x = true;
$("#formule1>a>div").hover(function(){
  if(x){
    $("#formule1 h1").hide("drop",{direction: "up"},"fast");
    $("#formule1 p").show("drop",{direction: "down"},"fast");
  }
  x = false;
},function(){
  $("#formule1 p").hide("drop",{direction: 'down'},"fast");
  $("#formule1 h1").show("drop",{direction: 'up'},"fast");
  x = true;
});
var y = true;
$("#formule2>a>div").hover(function(){
  if(y){
    $("#formule2 h1").hide("drop",{direction: "up"},"fast");
    $("#formule2 p").show("drop",{direction: "down"},"fast");
  }
  y = false;
},function(){
  $("#formule2 p").hide("drop",{direction: 'down'},"fast");
  $("#formule2 h1").show("drop",{direction: 'up'},"fast");
  y = true;
});
