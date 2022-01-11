document.getElementsByClassName("brands_container")[0].addEventListener("click", function(){
if(document.getElementsByClassName("brand_list_container")[0].style.display == "none") {
    document.getElementsByClassName("brand_list_container")[0].style.display = "block";
    document.getElementById("arrow_of_product1").className = "fa fa-angle-up";
} else {
    document.getElementsByClassName("brand_list_container")[0].style.display = "none";
    document.getElementById("arrow_of_product1").className = "fa fa-angle-down";
}
});

document.getElementsByClassName("rating_container")[0].addEventListener("click", function(){
    if(document.getElementsByClassName("rating_list_container")[0].style.display == "none") {
        document.getElementsByClassName("rating_list_container")[0].style.display = "block";
        document.getElementById("arrow_of_product2").className = "fa fa-angle-up";
    } else {
        document.getElementsByClassName("rating_list_container")[0].style.display = "none";
        document.getElementById("arrow_of_product2").className = "fa fa-angle-down";
    }
    });

    document.getElementsByClassName("colors_container")[0].addEventListener("click", function(){
        if(document.getElementsByClassName("color_list_container")[0].style.display == "none") {
            document.getElementsByClassName("color_list_container")[0].style.display = "block";
            document.getElementById("arrow_of_product3").className = "fa fa-angle-up";
        } else {
            document.getElementsByClassName("color_list_container")[0].style.display = "none";
            document.getElementById("arrow_of_product3").className = "fa fa-angle-down";
        }
        });

        document.getElementsByClassName("price_container")[0].addEventListener("click", function(){
            if(document.getElementsByClassName("price_bar_container")[0].style.display == "none") {
                document.getElementsByClassName("price_bar_container")[0].style.display = "block";
                document.getElementById("arrow_of_product4").className = "fa fa-angle-up";
            } else {
                document.getElementsByClassName("price_bar_container")[0].style.display = "none";
                document.getElementById("arrow_of_product4").className = "fa fa-angle-down";
            }
            });

            document.getElementsByClassName("size_container")[0].addEventListener("click", function(){
                if(document.getElementsByClassName("size_list_container")[0].style.display == "none") {
                    document.getElementsByClassName("size_list_container")[0].style.display = "block";
                    document.getElementById("arrow_of_product6").className = "fa fa-angle-up";
                } else {
                    document.getElementsByClassName("size_list_container")[0].style.display = "none";
                    document.getElementById("arrow_of_product6").className = "fa fa-angle-down";
                }
                });

            document.getElementsByClassName("select_container")[0].addEventListener("click", function(){
                if(document.getElementsByClassName("select_inner_container")[0].style.display=="none") {
                    document.getElementsByClassName("select_inner_container")[0].style.display="block";
                    document.getElementById("arrow_of_product5").className = "fa fa-angle-up";
                } else {
                    document.getElementsByClassName("select_inner_container")[0].style.display="none";
                    document.getElementById("arrow_of_product5").className = "fa fa-angle-down";
                }
            });