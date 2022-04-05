function display_and_undisplay(t) {
let hamburger_sec_ele = document.getElementsByClassName(`hamburger_link_section_inner_hidden_container${t}`)[0];
let hamburger_sec_arr = document.getElementsByClassName(`hamburger_down_arrow${t}`)[0];
if(hamburger_sec_ele.style.display == "block") {
    hamburger_sec_ele.style.display = "none";
    hamburger_sec_arr.className = `fa fa-chevron-down hamburger_down_arrow${t}`;
} else {
    hamburger_sec_ele.style.display = "block";
    hamburger_sec_arr.className = `fa fa-chevron-up hamburger_down_arrow${t}`;
}
}