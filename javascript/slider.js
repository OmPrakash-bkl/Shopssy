/* Home Page Image Slider Functions Start*/

let i = 1;

document.getElementById(`img_slider_image_container_${3}`).style.display = "block";
document.getElementById(`chage_slide_btn_${3}`).style.backgroundColor="#45b2ff";
document.getElementById(`chage_slide_btn_${3}`).style.color="white";

setInterval(function() {
   
    if(i===1) {
        document.getElementById(`img_slider_image_container_${3}`).style.display = "none";
        document.getElementById(`img_slider_image_container_${1}`).style.display = "block";
        document.getElementById(`chage_slide_btn_${3}`).style.color="black";
        document.getElementById(`chage_slide_btn_${1}`).style.color="white";
        document.getElementById(`chage_slide_btn_${3}`).style.backgroundColor="transparent";
        document.getElementById(`chage_slide_btn_${1}`).style.backgroundColor="#45b2ff";
        document.getElementById("image_slider_words_container_one_text1").style.transform = "translate(-400px, 0px)";
        document.getElementById("image_slider_words_container_one_text2").style.transform = "translate(-400px, 0px) rotate(90deg)";
        document.getElementById("image_slider_words_container_two_text1").style.transform = "translate(-450px, 0px)";
        document.getElementById("image_slider_words_container_two_text2").style.transform = "scaleX(0)";
        document.getElementById("image_slider_words_container_three_text1").style.transform = "translate(-400px, 0px)";
        document.getElementById("image_slider_words_container_three_text2").style.transform = "translate(-400px, 0px) rotate(90deg)";
        document.getElementById("image_slider_words_container_three_text3").style.transform = "translate(-350px, 0px)";
    }
    if(i===2) {
        document.getElementById(`img_slider_image_container_${1}`).style.display = "none";
        document.getElementById(`img_slider_image_container_${2}`).style.display = "block";
        document.getElementById(`chage_slide_btn_${1}`).style.color="black";
        document.getElementById(`chage_slide_btn_${2}`).style.color="white";
        document.getElementById(`chage_slide_btn_${1}`).style.backgroundColor="transparent";
        document.getElementById(`chage_slide_btn_${2}`).style.backgroundColor="#45b2ff";
        document.getElementById("image_slider_words_container_one_text1").style.transform = "translate(-400px, 0px)";
        document.getElementById("image_slider_words_container_one_text2").style.transform = "translate(-400px, 0px) rotate(90deg)";
        document.getElementById("image_slider_words_container_two_text1").style.transform = "translate(-450px, 0px)";
        document.getElementById("image_slider_words_container_two_text2").style.transform = "scaleX(0)";
        document.getElementById("image_slider_words_container_three_text1").style.transform = "translate(-400px, 0px)";
        document.getElementById("image_slider_words_container_three_text2").style.transform = "translate(-400px, 0px) rotate(90deg)";
        document.getElementById("image_slider_words_container_three_text3").style.transform = "translate(-350px, 0px)";
    }
    if(i===3) {
        document.getElementById(`img_slider_image_container_${2}`).style.display = "none";
        document.getElementById(`img_slider_image_container_${3}`).style.display = "block";
        document.getElementById(`chage_slide_btn_${2}`).style.color="black";
        document.getElementById(`chage_slide_btn_${3}`).style.color="white";
        document.getElementById(`chage_slide_btn_${2}`).style.backgroundColor="transparent";
        document.getElementById(`chage_slide_btn_${3}`).style.backgroundColor="#45b2ff";
        document.getElementById("image_slider_words_container_one_text1").style.transform = "translate(-400px, 0px)";
        document.getElementById("image_slider_words_container_one_text2").style.transform = "translate(-400px, 0px) rotate(90deg)";
        document.getElementById("image_slider_words_container_two_text1").style.transform = "translate(-450px, 0px)";
        document.getElementById("image_slider_words_container_two_text2").style.transform = "scaleX(0)";
        document.getElementById("image_slider_words_container_three_text1").style.transform = "translate(-400px, 0px)";
        document.getElementById("image_slider_words_container_three_text2").style.transform = "translate(-400px, 0px) rotate(90deg)";
        document.getElementById("image_slider_words_container_three_text3").style.transform = "translate(-350px, 0px)";
    }
    i++;
    if(i > 3) {
        i = 1;
    }
}, 3000);

setInterval(function() {
    document.getElementById("image_slider_words_container_one_text1").style.transform="translate(0px, 0px)";
    document.getElementById("image_slider_words_container_one_text2").style.transform = "translate(0px, 0px) rotate(0deg)";
    document.getElementById("image_slider_words_container_two_text1").style.transform = "translate(0px, 0px)";
    document.getElementById("image_slider_words_container_two_text2").style.transform = "scaleX(1)";
    document.getElementById("image_slider_words_container_three_text1").style.transform = "translate(0px, 0px)";
    document.getElementById("image_slider_words_container_three_text2").style.transform = "translate(0px, 0px) rotate(0deg)";
    document.getElementById("image_slider_words_container_three_text3").style.transform = "translate(0px, 0px)";
}, 3000);

/* Home Page Image Slider Functions End */