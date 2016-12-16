var x = true;
$(document).on('scroll', function () {
    if ($(document).scrollTop() > 110 && x) {
        $('#cpabo').show();
        $('#topnavbar').hide();
        $('#topnavbar').addClass('fixedtop');
        $('#topnavbar').show('blind','fast');
        x = false;
    } else if($(document).scrollTop() == 0){
        $('#cpabo').hide();
        $('#topnavbar').removeClass('fixedtop');
        x = true;
    }
});
