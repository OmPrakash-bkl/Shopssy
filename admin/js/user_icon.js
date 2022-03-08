document.getElementsByClassName("user_image_icon_container")[0].addEventListener("click", function() {
if(document.getElementsByClassName("user_image_icon_floating_container")[0].style.display == "block") {
    document.getElementsByClassName("user_image_icon_floating_container")[0].style.display = "none";
    document.getElementsByClassName("notification_icon_container_arrow_icon")[0].className = "fa fa-caret-down notification_icon_container_arrow_icon";
} else {
    document.getElementsByClassName("user_image_icon_floating_container")[0].style.display = "block";
    document.getElementsByClassName("notification_icon_container_arrow_icon")[0].className = "fa fa-caret-up notification_icon_container_arrow_icon";
}
});