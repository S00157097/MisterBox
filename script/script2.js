$(document).ready(function() {
    $('.drop-trigger').click(function() {
        $(this).next().slideToggle();
    });
});