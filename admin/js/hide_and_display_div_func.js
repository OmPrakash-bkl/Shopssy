
function display_preLoader() {
    document.getElementsByClassName("pre_loader_container")[0].style.display = "block";
}

function unDisplay_preLoader() {
    document.getElementsByClassName("pre_loader_container")[0].style.display = "none";
}

function make_user_details(method, url) {

    let responseObj = new Promise((resolve, reject)=> {
        const req = new XMLHttpRequest();
        req.open(method, url, true);
        req.send();
        req.onload = function() {
        if(this.readyState == 4 && req.status == 200) {
        resolve(req.responseText);
        } else {
            reject("Not Found");
        }
    }

})
return responseObj;
}



function show_users() {
let responseObj = make_user_details("GET", "../Shopssy_api/Users/get_users.php");
display_preLoader();

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
    let resultData = JSON.parse(sucvalue);
    console.log(resultData);
    document.getElementsByClassName("admin_panel_details_table_container")[0].style.display = "block";
    document.getElementsByClassName("table_name_and_other_details_display_container")[0].style.display = "block";
    }).catch((rejvalue) => {
        console.log(rejvalue);
    }) 
}
