
function click() {
    var elements2 = document.getElementsByClassName("sub_catagories");
    for (var i = 0; i < elements2.length; i++) {
        if (elements2[i].style.display === "none") {
            elements2[i].style.display = "block";
        } else {
            elements2[i].style.display = "none";
        }
    }
}
