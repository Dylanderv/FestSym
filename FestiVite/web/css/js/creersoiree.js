var x = true;
$("#formule1>a>div").hover(function(){
  if(x){
    $("#formule1 h1").hide("drop",{direction: "up"},"slow");
    $("#formule1 p").show("drop",{direction: "down"},"slow");
  }
  x = false;
},function(){
  $("#formule1 p").hide("drop",{direction: 'down'},"slow");
  $("#formule1 h1").show("drop",{direction: 'up'},"slow");
  x = true;
});
var y = true;
$("#formule2>a>div").hover(function(){
  if(y){
    $("#formule2 h1").hide("drop",{direction: "up"},"slow");
    $("#formule2 p").show("drop",{direction: "down"},"slow");
  }
  y = false;
},function(){
  $("#formule2 p").hide("drop",{direction: 'down'},"slow");
  $("#formule2 h1").show("drop",{direction: 'up'},"slow");
  y = true;
});
