document.getElementsByClassName("add_new_add_btn")[0].addEventListener("click", function(){
    if(document.getElementsByClassName("address_details_table_container1")[0].style.display == "none"){
        document.getElementsByClassName("address_details_table_container1")[0].style.display = "block";
    } else {
        document.getElementsByClassName("address_details_table_container1")[0].style.display = "none";
    }
});

document.getElementsByClassName("cancel_btn_of_new_add")[0].addEventListener("click", function(){
    document.getElementsByClassName("address_details_table_container1")[0].style.display = "none";
})

document.getElementsByClassName("edit_btn_of_default")[0].addEventListener("click", function(){
    if(document.getElementsByClassName("address_details_table_container3")[0].style.display == "none"){
        document.getElementsByClassName("address_details_table_container3")[0].style.display = "block";
    } else {
        document.getElementsByClassName("address_details_table_container3")[0].style.display = "none";
    }
});

document.getElementsByClassName("cancel_btn_of_edit_add")[0].addEventListener("click", function(){
    document.getElementsByClassName("address_details_table_container3")[0].style.display = "none";
})