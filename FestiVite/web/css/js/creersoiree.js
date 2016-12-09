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

$("#formule2>a>div").hover(function(){
  $("#formule2 h1").hide("drop",{direction: 'up'},500);
  $("#formule2 p").show("drop",{direction: 'down'},500);
},function(){
  $("#formule2 p").hide("slide",{direction: 'down'},500);
  $("#formule2 h1").show("slide",{direction: 'up'},500);
});
