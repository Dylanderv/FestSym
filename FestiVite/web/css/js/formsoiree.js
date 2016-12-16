$("#etapeSuivante").click(function() {
  var divform = ['#etape1','#etape2','#etape3','#etape4','#etape5'];
  var chevron = ['#chevron1','#chevron2','#chevron3','#chevron4','#chevron5'];
  var i = 0;
  var stop = 1;
  while( i < divform.length && Boolean(stop)) {
    if ($(divform[i]).is(':visible')) {
      $(divform[i]).hide('medium');
      $(chevron[i]).removeClass("chevronCurrent").addClass("chevron hidden-xs");
      $(divform[i+1]).show('medium');
      $(chevron[i+1]).removeClass("chevron hidden-xs").addClass("chevronCurrent");
      if (i == 0) {
        $( "#etapePrecedente").show('medium');
      } else if (i == 3) {
        $( "#etapeSuivante").hide('medium');
        $( "#Finaliser").show('medium');
      }
      stop = 0;
    }
    i++;
  }
});
$("#etapePrecedente").click(function() {
  var divform = ['#etape1','#etape2','#etape3','#etape4','#etape5'];
  var chevron = ['#chevron1','#chevron2','#chevron3','#chevron4','#chevron5'] ;
  var i = 1;
  var stop = 1;
  while( i < divform.length && Boolean(stop)) {
    if ($(divform[i]).is(':visible')) {
      $(divform[i]).hide('medium');
      $(chevron[i]).removeClass("chevronCurrent").addClass("chevron hidden-xs");
      $(divform[i-1]).show('medium');
      $(chevron[i-1]).removeClass("chevron hidden-xs").addClass("chevronCurrent");
      if (i == 4) {
        $( "#Finaliser").hide('medium');
        $( "#etapeSuivante").show('medium');
      } else if (i == 1) {
        $( "#etapePrecedente").hide('medium');
      }
      stop = 0;
    }
    i++;
  }

});
$('#etape2 > div > a > span').hover(function() {
      $(this).stop().animate({ fontSize : '60px' });
},
function() {
      $(this).stop().animate({ fontSize : '50px' });
});
