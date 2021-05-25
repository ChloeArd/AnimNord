// allows, thanks to the position of the scrollbar, to change the position of the menu.
let menu = document.getElementById("menu");

if (menu) {
    window.addEventListener("scroll", function () {
        let windowHeight = document.body.clientHeight;
        let currentScroll = document.body.scrollTop || document.documentElement.scrollTop;

        menu.className = (currentScroll >= menu.offsetHeight + 101) ? "menu flexCenter flexRow floatable" : "menu flexCenter flexRow";
    }, false);
}

//When we click on "logoMenu" we unfold or replicate the drop-down sub menu.
if (document.getElementById("logoMenu")) {
    display(document.getElementById("logoMenu"), document.getElementById("subMenu"), "flex")
}

if (document.getElementById("filterCategories")) {
    display(document.getElementById("filterCategories"), document.getElementsByClassName("categories"), "block");
}

display(document.getElementById("buttonAccount"), document.getElementById("menuAccountMobile"), "flex");

if (document.getElementById("error")) {
    document.getElementById("closeModal").style.display = "block";
    closeModal("error");
}

if (document.getElementById("success")) {
    document.getElementById("closeModal").style.display = "block";
    closeModal("success");
}

display(document.getElementById("buttonUser"), document.getElementById("userList"), "block");

/**
 * Gradually folds up the modal window.
 * @param idModal
 */
function closeModal (idModal) {
    document.getElementById("closeModal").addEventListener("click", function () {
        document.getElementById(idModal).style.display = "none";
    });
}

// Allows you to make what you want to appear or disappear
function display (idClick, id, display) {
    let nbClick = 0;
    $(idClick).click(function () {
        if (nbClick === 0) {
            $(id).css("display", display);
            nbClick++;
        }
        else {
            $(id).css("display", "none");
            nbClick = 0;
        }
    });
}