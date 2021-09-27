
window.onscroll = function () { stickyHeader() };

var header = document.getElementById("header");
var infoHeader = document.getElementById("infoHeader");
var sticky = infoHeader.offsetHeight;


function stickyHeader() {

    if (window.pageYOffset > sticky) {
        header.classList.add("stickyNavbar");
        header.classList.add("scroll-on");
        infoHeader.style.marginBottom = header.offsetHeight + "px"


    } else {
        header.classList.remove("stickyNavbar");
        header.classList.remove("scroll-on");
        infoHeader.style.marginBottom = "0px"
    }


}
