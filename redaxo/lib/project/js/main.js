$(document).ready(function() {
    $('#headerCarousel .carousel-inner').children('.item').first().addClass('active');
    $('#headerCarousel .carousel-indicators').children('li').first().addClass('active');
    $('.focuspoint').focusPoint();
    $('.gmapsOverlay').click(function () {
        $(this).remove();
    });
});