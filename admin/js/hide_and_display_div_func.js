
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

responseObj.then((sucvalue) => {
    console.log(sucvalue);
    }).catch((rejvalue) => {
        console.log(rejvalue);
    }) 
}
