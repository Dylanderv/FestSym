$("#etapeSuivante").click(function() {
  var divform = ['#etape1','#etape2','#etape3'];
  var chevron = ['#chevron1','#chevron2','#chevron3'];
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
      } else if (i == 1) {
        $( "#etapeSuivante").hide('medium');
        $( "#suivantajout").show('medium');
      }
      stop = 0;
    }
    i++;
  }
});
$("#etapePrecedente").click(function() {
  var divform = ['#etape1','#etape2','#etape3'];
  var chevron = ['#chevron1','#chevron2','#chevron3'] ;
  var i = 1;
  var stop = 1;
  while( i < divform.length && Boolean(stop)) {
    if ($(divform[i]).is(':visible')) {
      $(divform[i]).hide('medium');
      $(chevron[i]).removeClass("chevronCurrent").addClass("chevron hidden-xs");
      $(divform[i-1]).show('medium');
      $(chevron[i-1]).removeClass("chevron hidden-xs").addClass("chevronCurrent");
      if (i == 2) {
        $( "#suivantajout").hide('medium');
        $( "#etapeSuivante").show('medium');
      } else if (i == 1) {
        $( "#etapePrecedente").hide('medium');
      }
      stop = 0;
    }
    i++;
  }

});
$('#etape4 > div > a > span').hover(function() {
      $(this).stop().animate({ fontSize : '60px' });
},
function() {
      $(this).stop().animate({ fontSize : '50px' });
});
