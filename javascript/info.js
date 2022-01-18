/* information_inner_container2_of_mobile Functions Start */

document.getElementsByClassName("show_summary_btn")[0].addEventListener("click", function() {
    
    if(document.getElementsByClassName("information_inner_container2_of_mobile")[0].style.display=="none") {
        document.getElementsByClassName("information_inner_container2_of_mobile")[0].style.display="block";
        
        document.getElementsByClassName("show_summary_btn")[0].innerHTML = "<i class='fas fa-shopping-cart'></i> hide order summary <i class='fa fa-angle-up'></i>";
    } else {
        document.getElementsByClassName("information_inner_container2_of_mobile")[0].style.display="none";
        document.getElementsByClassName("show_summary_btn")[0].innerHTML = "<i class='fas fa-shopping-cart'></i> show order summary <i class='fa fa-angle-down'></i>";
    }
});

/* information_inner_container2_of_mobile Functions End */