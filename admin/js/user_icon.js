document.getElementsByClassName("user_db_container")[0].addEventListener("click", function() {
    let profile_and_logout_element = document.getElementsByClassName("profile_and_logout_container")[0];
    let profile_and_logout_element_arrow = document.getElementsByClassName("user_db_arrow_icon")[0];
    if(profile_and_logout_element.style.display == "block") {
        profile_and_logout_element.style.display = "none";
        profile_and_logout_element_arrow.className = "fa fa-caret-down user_db_arrow_icon";
    } else {
        profile_and_logout_element.style.display = "block";    
        profile_and_logout_element_arrow.className = "fa fa-caret-up user_db_arrow_icon";
    }

})