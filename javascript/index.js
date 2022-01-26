/* Main Navbar Functions Start */

document.getElementById("table_navbar_showing_container").addEventListener("click", function() {
    if(document.getElementsByClassName("hamburger_main_container_table")[0].style.display=="block") {
        document.getElementsByClassName("hamburger_main_container_table")[0].style.display="none";
        document.getElementById("hamburger's_arrow_icon").classList = "fas fa-chevron-circle-down";
        
    } else {
        document.getElementsByClassName("hamburger_main_container_table")[0].style.display="block";
        document.getElementById("hamburger's_arrow_icon").classList = "fas fa-chevron-circle-up";
    }
});



document.getElementById("hamburger_container_dir_arrow_tiger1").addEventListener("mousemove", function(e) {
   
   if(e.clientX > 100) {
    document.getElementsByClassName("hamburger_container_dir_arrow1")[0].style.display="block";
    document.getElementsByClassName("hamburger_sub_container_tables1")[0].style.display="flex";
    document.getElementsByClassName("hamburger_sub_container_tables1")[1].style.display="flex";
           document.getElementsByClassName("hamburger_sub_container")[0].addEventListener("mouseleave", function() {
            document.getElementsByClassName("hamburger_container_dir_arrow1")[0].style.display="none";
            document.getElementsByClassName("hamburger_sub_container_tables1")[0].style.display="none";
            document.getElementsByClassName("hamburger_sub_container_tables1")[1].style.display="none";
        })
   } else {
    document.getElementsByClassName("hamburger_container_dir_arrow1")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables1")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables1")[1].style.display="none";
   }
   if(e.clientY > 215 || e.clientY < 195) {
    document.getElementsByClassName("hamburger_container_dir_arrow1")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables1")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables1")[1].style.display="none";
   }
});

document.getElementById("hamburger_container_dir_arrow_tiger2").addEventListener("mousemove", function(e) {
  
   if(e.clientX > 100) {
    document.getElementsByClassName("hamburger_container_dir_arrow2")[0].style.display="block";
    document.getElementsByClassName("hamburger_sub_container_tables2")[0].style.display="flex";
    document.getElementsByClassName("hamburger_sub_container_tables2")[1].style.display="flex";
           document.getElementsByClassName("hamburger_sub_container")[0].addEventListener("mouseleave", function() {
            document.getElementsByClassName("hamburger_container_dir_arrow2")[0].style.display="none";
            document.getElementsByClassName("hamburger_sub_container_tables2")[0].style.display="none";
            document.getElementsByClassName("hamburger_sub_container_tables2")[1].style.display="none";
        })
   } else {
    document.getElementsByClassName("hamburger_container_dir_arrow2")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables2")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables2")[1].style.display="none";
   }
   if(e.clientY > 275 || e.clientY < 258) {
    document.getElementsByClassName("hamburger_container_dir_arrow2")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables2")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables2")[1].style.display="none";
   }
});

document.getElementById("hamburger_container_dir_arrow_tiger3").addEventListener("mousemove", function(e) {
   
   if(e.clientX > 100) {
    document.getElementsByClassName("hamburger_container_dir_arrow3")[0].style.display="block";
    document.getElementsByClassName("hamburger_sub_container_tables3")[0].style.display="flex";
    document.getElementsByClassName("hamburger_sub_container_tables3")[1].style.display="flex";
           document.getElementsByClassName("hamburger_sub_container")[0].addEventListener("mouseleave", function() {
            document.getElementsByClassName("hamburger_container_dir_arrow3")[0].style.display="none";
            document.getElementsByClassName("hamburger_sub_container_tables3")[0].style.display="none";
            document.getElementsByClassName("hamburger_sub_container_tables3")[1].style.display="none";
        })
   } else {
    document.getElementsByClassName("hamburger_container_dir_arrow3")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables3")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables3")[1].style.display="none";
   }
   if(e.clientY > 340 || e.clientY < 320) {
    document.getElementsByClassName("hamburger_container_dir_arrow3")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables3")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables3")[1].style.display="none";
   }
});

document.getElementById("hamburger_container_dir_arrow_tiger4").addEventListener("mousemove", function(e) {
  
   if(e.clientX > 100) {
    document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="block";
    document.getElementsByClassName("hamburger_sub_container_tables4")[0].style.display="flex";
    document.getElementsByClassName("hamburger_sub_container_tables4")[1].style.display="flex";
           document.getElementsByClassName("hamburger_sub_container")[0].addEventListener("mouseleave", function() {
            document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="none";
            document.getElementsByClassName("hamburger_sub_container_tables4")[0].style.display="none";
            document.getElementsByClassName("hamburger_sub_container_tables4")[1].style.display="none";
        })
   } else {
    document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables4")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables4")[1].style.display="none";
   }
   if(e.clientY > 395 || e.clientY < 380) {
    document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables4")[0].style.display="none";
    document.getElementsByClassName("hamburger_sub_container_tables4")[1].style.display="none";
    
   }
});



/* Main Navbar Functions End */

/* Navbar for Mobiles Start */


document.getElementsByClassName("mob_hamburger_btn")[0].addEventListener("click", function(){
document.getElementsByClassName("mob_hamburger_btn")[0].style.transform = "rotate(45deg)";
document.getElementsByClassName("nav_hamburger_content_division")[0].style.display="block";
document.getElementsByClassName("nav_hamburger_division")[0].style.display="block";
document.getElementsByClassName("nav_hamburger_content_division")[0].style.left="0px";
});

document.getElementsByClassName("nav_hamburger_division")[0].addEventListener("click", function() {
document.getElementsByClassName("nav_hamburger_content_division")[0].style.left="-200px";
document.getElementsByClassName("nav_hamburger_division")[0].style.display="none";
document.getElementsByClassName("mob_hamburger_btn")[0].style.transition = "transform 0.5s";
document.getElementsByClassName("mob_hamburger_btn")[0].style.transform = "rotate(0deg)";
});

document.getElementsByClassName("nav_hamburger_content_division")[0].addEventListener("click", function() {
document.getElementsByClassName("nav_hamburger_content_division")[0].style.left="0px";
});

window.addEventListener("resize", function() {
    if(window.innerWidth > 800) {
        document.getElementsByClassName("nav_hamburger_content_division")[0].style.display="none";
document.getElementsByClassName("nav_hamburger_division")[0].style.display="none";
document.getElementsByClassName("mob_hamburger_btn")[0].style.transform = "rotate(0deg)";
    }
})

/* Navbar for Mobiles End */

/* Back To Top Arrow Button Functions Start */

let back_to_top_arrow_container = document.getElementsByClassName("back_to_top_arrow_container")[0];
window.onscroll = function(){
    scrollFunction();
}
function scrollFunction() {
    if(document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
        back_to_top_arrow_container.style.display="block";
    } else {
        back_to_top_arrow_container.style.display="none";
    }
}

document.getElementById("back_to_top_arrow").addEventListener("click",function(){
document.body.scrollTop=0;
document.documentElement.scrollTop=0;
});

/* Back To Top Arrow Functions End */

/* Wishlist Functions Start */

document.getElementsByClassName("wishlist_btn")[0].addEventListener("click", function() {
        document.getElementsByClassName("wishlist_container")[0].style.display="block";
});

document.getElementsByClassName("close_btn_of_wishlist")[0].addEventListener("click", function() {
    document.getElementsByClassName("wishlist_container")[0].style.display="none";
});

document.getElementsByClassName("three_dot_btn")[0].addEventListener("click", function() {
    if(document.getElementsByClassName("share_and_clear_container")[0].style.display=="none") {
        document.getElementsByClassName("share_and_clear_container")[0].style.display="block";
       document.getElementsByClassName("wishlist_heading_and_product_parent_container")[0].style.overflowY = "hidden";
    } else {
        document.getElementsByClassName("share_and_clear_container")[0].style.display="none";
        document.getElementsByClassName("wishlist_heading_and_product_parent_container")[0].style.overflowY = "scroll";
    }
})


document.getElementsByClassName("share_email_button")[0].addEventListener("click", function() {
    document.getElementsByClassName("share_email_container")[0].style.display="block";
    document.getElementsByClassName("share_and_clear_container")[0].style.display="none";
});

document.getElementsByClassName("email_close_btn_of_wishlist")[0].addEventListener("click", function() {
    document.getElementsByClassName("share_email_container")[0].style.display="none";
});

document.getElementsByClassName("delete_email_button")[0].addEventListener("click", function() {
document.getElementsByClassName("clear_list_container")[0].style.display = "block";
document.getElementsByClassName("share_and_clear_container")[0].style.display="none";
});

document.getElementsByClassName("clearlist_close_btn_of_wishlist")[0].addEventListener("click", function() {
    document.getElementsByClassName("clear_list_container")[0].style.display = "none";
    });

document.getElementsByClassName("user_id_and_cancel_btn_container_btn1")[0].addEventListener("click", function() {
        document.getElementsByClassName("save_your_list_container")[0].style.display = "block";
});

document.getElementsByClassName("savelist_close_btn_of_wishlist")[0].addEventListener("click", function() {
    document.getElementsByClassName("save_your_list_container")[0].style.display = "none";
});

document.getElementsByClassName("user_id_and_cancel_btn_container_btn2")[0].addEventListener("click", function() {
    document.getElementsByClassName("save_your_list_container1")[0].style.display = "block";
});

document.getElementsByClassName("savelist_close_btn_of_wishlist1")[0].addEventListener("click", function() {
document.getElementsByClassName("save_your_list_container1")[0].style.display = "none";
});

document.getElementsByClassName("savelist_close_btn_of_wishlist1_savelist_btn")[0].addEventListener("click", function() {
    document.getElementsByClassName("enter_email_address_container")[0].style.display = "block";
});

document.getElementsByClassName("email_close_btn_of_wishlist2")[0].addEventListener("click", function() {
document.getElementsByClassName("enter_email_address_container")[0].style.display = "none";
});

/* Wishlist Functions End */

/* User Icon Container Functions Start */


document.getElementsByClassName("user_icon_of_homepage")[0].addEventListener("click", function() {
    if(document.getElementsByClassName("shortcut_link_for_user_container")[0].style.display=="none") {
        document.getElementsByClassName("shortcut_link_for_user_container")[0].style.display="block";
    } else {
        document.getElementsByClassName("shortcut_link_for_user_container")[0].style.display="none";
    }
})

/* User Icon Container Functions End */

/* Wishlist Functions Start */


document.getElementsByClassName("wishlist_btn_of_homepage")[0].addEventListener("click", function() {
    document.getElementsByClassName("wishlist_container")[0].style.display="block";
    document.getElementsByClassName("shortcut_link_for_user_container")[0].style.display="none";
});

/* Wishlist Functions End */

/* Mini Shopping Cart of Homepage Functions Start */


document.getElementsByClassName("cart_icon_of_homepage")[0].addEventListener("mousemove", function(e) {
    if(e.clientY > 100 && e.clientY < 133) {
        document.getElementsByClassName("mini_cart_container")[0].style.display="block";
    } else {
        document.getElementsByClassName("mini_cart_container")[0].style.display="none";
    }
    if(e.clientY > 134) {
        document.getElementsByClassName("mini_cart_container")[0].style.display="block";
    } 
});

document.getElementsByClassName("mini_cart_container")[0].addEventListener("mouseleave", function() {
    document.getElementsByClassName("mini_cart_container")[0].style.display="none";
});

/* Mini Shopping Cart of Homepage Functions End */