// allows, thanks to the position of the scrollbar, to change the position of the menu.
let positionMenu = $('#menu').offset().top;
$(window).scroll(
    function() {
        if ($(window).scrollTop() >= positionMenu) {
            // fixed
            $('#menu').addClass("floatable");
        }
        else {
            // relative
            $('#menu').removeClass("floatable");
        }
    }
);
