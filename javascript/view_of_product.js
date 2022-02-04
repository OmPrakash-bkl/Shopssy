/* Image and Review Button Functions Start */

function change_big_image(image_name, image_num) {
  
let big_image = document.getElementsByClassName("big_image_container_image")[0];
big_image.src=`./images/${image_name}`;
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


/* Image and Review Button Functions End */