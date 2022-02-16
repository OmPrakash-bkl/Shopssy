document.getElementsByClassName("brands_container")[0].addEventListener("click", function(){
if(document.getElementById("brand_list_container").style.display == "none") {
    
    document.getElementById("brand_list_container").style.display = "block";
    document.getElementById("arrow_of_product1").className = "fa fa-angle-up";
} else {
    document.getElementById("brand_list_container").style.display = "none";
    document.getElementById("arrow_of_product1").className = "fa fa-angle-down";
}
});

// document.getElementsByClassName("rating_container")[0].addEventListener("click", function(){
//     if(document.getElementById("rating_list_container").style.display == "none") {
//         document.getElementById("rating_list_container").style.display = "block";
//         document.getElementById("arrow_of_product2").className = "fa fa-angle-up";
//     } else {
//         document.getElementById("rating_list_container").style.display = "none";
//         document.getElementById("arrow_of_product2").className = "fa fa-angle-down";
//     }
//     });

   function show_and_hide(i) {
    if(document.getElementById(`rating_list_container${i}`).style.display == "none") {
        document.getElementById(`rating_list_container${i}`).style.display = "block";
        document.getElementById(`arrow_of_product${i}`).className = "fa fa-angle-up";
    } else {
        document.getElementById(`rating_list_container${i}`).style.display = "none";
        document.getElementById(`arrow_of_product${i}`).className = "fa fa-angle-down";
    }
   }
         

            document.getElementsByClassName("select_container")[0].addEventListener("click", function(){
               
                if(document.getElementsByClassName("select_inner_container")[0].style.display=="block") {
                    document.getElementsByClassName("select_inner_container")[0].style.display="none";
                    document.getElementsByClassName("arrow_of_product5")[0].className = "fa fa-angle-down arrow_of_product5";
                } else {
                    document.getElementsByClassName("select_inner_container")[0].style.display="block";
                    document.getElementsByClassName("arrow_of_product5")[0].className = "fa fa-angle-up arrow_of_product5";
                }
            });

            document.getElementsByClassName("filter_mobile_arrow")[0].addEventListener("click", function() {
                document.getElementsByClassName("filter_for_mobile_container")[0].style.display="none";
            })
            document.getElementsByClassName("filter_btn")[0].addEventListener("click", function(){
                document.getElementsByClassName("filter_for_mobile_container")[0].style.display="block";
            });

            let temp = 1;
            function show_checkboxes(p) {
                document.getElementsByClassName(`filter_for_mobile_container_body_container_inner_container2_div${temp}`)[0].style.display="none";
                document.getElementsByClassName(`filter_for_mobile_container_body_container_inner_container2_div${p}`)[0].style.display="block";
                temp = p;
                
            }

            document.getElementsByClassName("sort_btn")[0].addEventListener("click", function(){
                document.getElementsByClassName("sort_for_mobile_container")[0].style.display="block";
                document.body.style.overflow = "hidden";
            });

            document.getElementsByClassName("close_icon_container")[0].addEventListener("click", function(){
                document.getElementsByClassName("sort_for_mobile_container")[0].style.display="none";
                document.body.style.overflow = "";
            });

           function hide_extra_filter_box(total_count) {
          
                document.getElementsByClassName(`rating_list_container`)[total_count].style.display = "none";
            
           
           }


