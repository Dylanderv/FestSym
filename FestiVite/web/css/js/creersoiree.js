$("#formule1>a>div").hover(function(){
  $("#formule1 h1").hide("slide",{direction: 'up'},500);
  $("#formule1 p").show("slide",{direction: 'down'},500);
},function(){
  $("#formule1 p").hide("slide",{direction: 'down'},500);
  $("#formule1 h1").show("slide",{direction: 'up'},500);
});

$("#formule2>a>div").hover(function(){
  $("#formule2 h1").hide("slide",{direction: 'up'},500);
  $("#formule2 p").show("slide",{direction: 'down'},500);
},function(){
  $("#formule2 p").hide("slide",{direction: 'down'},500);
  $("#formule2 h1").show("slide",{direction: 'up'},500);
});
