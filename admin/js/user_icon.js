/* Profile and Logout Section Start */
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

/* Profile and Logout Section End */

/* Hamburger Section Start */

var navbar_section = document.getElementsByClassName("admin_panel_body_navbar_container")[0];
var content_section = document.getElementsByClassName("admin_panel_body_content_container")[0];
document.getElementsByClassName("admin_panel_header_icons")[0].addEventListener("click", function() {
if(navbar_section.style.display == "flex") {
    navbar_section.style.display = "none";
    content_section.style.flex = "100%";
    navbar_section.style.flex = "0%";
    content_section.style.width = "100%";
  
    document.getElementsByClassName("hamburger_open_icon")[0].style.display ="block";
    document.getElementsByClassName("hamburger_close_icon")[0].style.display ="none";
  
}else {
    navbar_section.style.display = "flex";
    content_section.style.flex = "84%";
    navbar_section.style.flex = "16%";
    content_section.style.width = "70%";
   
    document.getElementsByClassName("hamburger_open_icon")[0].style.display ="none";
    document.getElementsByClassName("hamburger_close_icon")[0].style.display ="block";
}
});



function func() {
if(1230 > window.innerWidth) {
content_section.style.flex = "81%";
navbar_section.style.flex = "19%";
} else {
    content_section.style.flex = "85%";
    navbar_section.style.flex = "15%";
}
}

/* Hamburger Section End */



