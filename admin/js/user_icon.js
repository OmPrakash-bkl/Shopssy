document.getElementsByClassName("user_image_icon_container")[0].addEventListener("click", function() {
if(document.getElementsByClassName("user_image_icon_floating_container")[0].style.display == "block") {
    document.getElementsByClassName("user_image_icon_floating_container")[0].style.display = "none";
} else {
    document.getElementsByClassName("user_image_icon_floating_container")[0].style.display = "block";
}
});