$("html").bind('scroll', function () {
    if ($("html").scrollTop() > 110) {
        $('.navbar-header img').height(50);
    } else {
        $('.navbar-header img').css({ 'height: 50 px' });
    }
});
