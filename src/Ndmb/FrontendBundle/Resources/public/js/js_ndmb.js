//Menú effect

$(document).on('click', '#top_action-menu', function () {
    if ($(this).hasClass('active')) {
        $("#main_menu").fadeOut();
        $(this).removeClass('active');
    } else {
        $("#main_menu").fadeIn();
        $(this).addClass('active');
    }
});