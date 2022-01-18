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
    document.getElementsByClassName("laptops_container_table")[0].style.display="block";
           document.getElementsByClassName("laptops_container_table")[0].addEventListener("mouseleave", function() {
            document.getElementsByClassName("hamburger_container_dir_arrow1")[0].style.display="none";
            document.getElementsByClassName("laptops_container_table")[0].style.display="none";
        })
   } else {
    document.getElementsByClassName("hamburger_container_dir_arrow1")[0].style.display="none";
    document.getElementsByClassName("laptops_container_table")[0].style.display="none";
   }
   if(e.clientY > 215 || e.clientY < 195) {
    document.getElementsByClassName("hamburger_container_dir_arrow1")[0].style.display="none";
    document.getElementsByClassName("laptops_container_table")[0].style.display="none";
    
   }
});

document.getElementById("hamburger_container_dir_arrow_tiger2").addEventListener("mousemove", function(e) {
  
   if(e.clientX > 100) {
    document.getElementsByClassName("hamburger_container_dir_arrow2")[0].style.display="block";
    document.getElementsByClassName("electronic_container_table")[0].style.display="block";
           document.getElementsByClassName("electronic_container_table")[0].addEventListener("mouseleave", function() {
            document.getElementsByClassName("hamburger_container_dir_arrow2")[0].style.display="none";
            document.getElementsByClassName("electronic_container_table")[0].style.display="none";
        })
   } else {
    document.getElementsByClassName("hamburger_container_dir_arrow2")[0].style.display="none";
    document.getElementsByClassName("electronic_container_table")[0].style.display="none";
   }
   if(e.clientY > 275 || e.clientY < 258) {
    document.getElementsByClassName("hamburger_container_dir_arrow2")[0].style.display="none";
    document.getElementsByClassName("electronic_container_table")[0].style.display="none";
  
   }
});

document.getElementById("hamburger_container_dir_arrow_tiger3").addEventListener("mousemove", function(e) {
   
   if(e.clientX > 100) {
    document.getElementsByClassName("hamburger_container_dir_arrow3")[0].style.display="block";
    document.getElementsByClassName("audio_container_table")[0].style.display="block";
           document.getElementsByClassName("audio_container_table")[0].addEventListener("mouseleave", function() {
            document.getElementsByClassName("hamburger_container_dir_arrow3")[0].style.display="none";
            document.getElementsByClassName("audio_container_table")[0].style.display="none";
        })
   } else {
    document.getElementsByClassName("hamburger_container_dir_arrow3")[0].style.display="none";
    document.getElementsByClassName("audio_container_table")[0].style.display="none";
   }
   if(e.clientY > 340 || e.clientY < 320) {
    document.getElementsByClassName("hamburger_container_dir_arrow3")[0].style.display="none";
    document.getElementsByClassName("audio_container_table")[0].style.display="none";
 
   }
});

document.getElementById("hamburger_container_dir_arrow_tiger4").addEventListener("mousemove", function(e) {
  
   if(e.clientX > 100) {
    document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="block";
    document.getElementsByClassName("smartphone_container_table1")[0].style.display="block";
           document.getElementsByClassName("hamburger_sub_container")[0].addEventListener("mouseleave", function() {
            document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="none";
            document.getElementsByClassName("smartphone_container_table1")[0].style.display="none";
        })
   } else {
    document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="none";
    document.getElementsByClassName("smartphone_container_table1")[0].style.display="none";
   }
   if(e.clientY > 395 || e.clientY < 380) {
    document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="none";
    document.getElementsByClassName("smartphone_container_table1")[0].style.display="none";
    
   }
});

document.getElementById("hamburger_container_dir_arrow_tiger4").addEventListener("mousemove", function(e) {
    console.log(e.clientY);
   if(e.clientX > 100) {
    document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="block";
    document.getElementsByClassName("smartphone_container_table2")[0].style.display="block";
           document.getElementsByClassName("hamburger_sub_container")[0].addEventListener("mouseleave", function() {
            document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="none";
            document.getElementsByClassName("smartphone_container_table2")[0].style.display="none";
        })
   } else {
    document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="none";
    document.getElementsByClassName("smartphone_container_table2")[0].style.display="none";
   }
   if(e.clientY > 395 || e.clientY < 380) {
    document.getElementsByClassName("hamburger_container_dir_arrow4")[0].style.display="none";
    document.getElementsByClassName("smartphone_container_table2")[0].style.display="none";
   
   }
});


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
    
    let back_to_top_arrow_containerr = document.getElementsByClassName("back_to_top_arrow_container")[0];
window.onscroll = function(){
    scrollFunction();
}
function scrollFunction() {
    if(document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
        back_to_top_arrow_containerr.style.display="block";
    } else {
        back_to_top_arrow_containerr.style.display="none";
    }
}

document.getElementById("back_to_top_arrow").addEventListener("click",function(){
document.body.scrollTop=0;
document.documentElement.scrollTop=0;
});

function change_big_image(image_num) {
let big_image = document.getElementsByClassName("big_image_container_image")[0];
big_image.src=`./images/product_mobile1_image_${image_num}.jpg`;
document.getElementsByClassName(`small_images_container_images`)[0].style.border = "1px solid gainsboro";
document.getElementsByClassName(`small_images_container_images`)[1].style.border = "1px solid gainsboro";
document.getElementsByClassName(`small_images_container_images`)[2].style.border = "1px solid gainsboro";
document.getElementsByClassName(`small_images_container_images`)[3].style.border = "1px solid gainsboro";
document.getElementsByClassName(`small_images_container_images${image_num}`)[0].style.border = "1px solid #2D9AE8";

} 



document.getElementsByClassName("review_btn")[0].addEventListener("click", function() {
let review_form = document.getElementsByClassName("review_form_container")[0];

if(review_form.style.display=="none") {
    review_form.style.display="block";
} else {
    review_form.style.display="none";
}
});

