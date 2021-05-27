// Allows, thanks to the position of the scrollbar, to change the position of the menu.
let menu = document.getElementById("menu");

if (menu) {
    window.addEventListener("scroll", function () {
        let currentScroll = document.body.scrollTop || document.documentElement.scrollTop;
        menu.className = (currentScroll >= menu.offsetHeight + 101) ? "menu flexCenter flexRow floatable" : "menu flexCenter flexRow";
    }, false);
}

// When we click on "logoMenu", we bring up the sub menu or disappear.
if (document.getElementById("logoMenu")) {
    display(document.getElementById("logoMenu"), document.getElementById("subMenu"), "flex")
}

// When we click on "filter", we bring up the categories on filter or disappear.
if (document.getElementById("filterCategories")) {
    display(document.getElementById("filterCategories"), document.getElementsByClassName("categories"), "block");
}

// When we click on "Mon compte", we bring up the sub menu or disappear.
if (document.getElementById("buttonAccount")) {
    display(document.getElementById("buttonAccount"), document.getElementById("menuAccountMobile"), "flex");
}

// If the modal window has the error ID then it appears and clicking on the cross makes it disappear.
if (document.getElementById("error")) {
    document.getElementById("closeModal").style.display = "block";
    closeModal("error");
}

// If the modal window has the ID success then it appears and clicking on the cross makes it disappear.
if (document.getElementById("success")) {
    document.getElementById("closeModal").style.display = "block";
    closeModal("success");
}

// When we click on "users", we make the list of users to which the user has spoken appear or disappear.
if (document.getElementById("buttonUser")) {
    display(document.getElementById("buttonUser"), document.getElementById("userList"), "block");
}

/**
 * Removes the modal window by clicking on the cross.
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