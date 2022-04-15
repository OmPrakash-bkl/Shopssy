/* PreLoader On and Off Section Start */

function display_preLoader() {
    document.getElementsByClassName("pre_loader_container")[0].style.display = "block";
}

function unDisplay_preLoader() {
    document.getElementsByClassName("pre_loader_container")[0].style.display = "none";
}
/* PreLoader On and Off Section End */

/* Display and Undisplay Container Section Start */
let display_blocked_array = new Set();
function display_blocked_containers(display_container_values)  {
    display_blocked_array.add(display_container_values);
}

function undisplay_displayed_blocked_containers() {
    display_blocked_array.forEach(function(item) {
        document.getElementsByClassName(`${item}`)[0].style.display = "none";
    })
}

function showStep1Form() {
undisplay_displayed_blocked_containers();
document.getElementsByClassName("add_user_step1_container")[0].style.display="block";
}
/* Display and Undisplay Container Section End */

/* Removing Unwanted Strings Section Start */
function remove_slashes(inp_data) {
    return inp_data.replace(/\/+$/g, '')
}
function remove_special_chars(inp_data) {
    return inp_data.replace(/[^a-zA-Z0-9@. ]/g, "");
}
function remove_special_chars_for_add(inp_data) {
    return inp_data.replace(/[^a-zA-Z0-9@./, ]/g, "");
}
function remove_special_chars_from_number(inp_data) {
return inp_data.replace(/[^0-9]+$/, "");
}
/* Removing Unwanted Strings Section End */

/* Request Sending and Response Getting Section Start */
function make_user_details(method, url, sendingData) {

    let responseObj = new Promise((resolve, reject)=> {
        const req = new XMLHttpRequest();
        req.open(method, url, true);
        if(method == "POST") {
            req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            req.send(sendingData);
        } else {
            req.send();
        }
      
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
/* Request Sending and Response Getting Section End */

/* Showing User List Table Container Section Start */
function show_users() {
let responseObj = make_user_details("GET", "../Shopssy_api/Users/get_users.php", "");
display_preLoader();

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr><th>S.NO</th>
    <th>USER ID</th>
    <th>F.NAME</th>
    <th>L.NAME</th>
    <th>EMAIL</th>
    <th>FULLNAME</th>
    <th>STREET</th>
    <th>CITY</th>
    <th>STATE</th>
    <th>ZIP</th>
    <th>PH.NUMBER</th>
    <th>COUNTRY</th>
    <th>VERIFIED USER?</th>
    <th>ACTION</th></tr>`;
    for(let i = 0; i < resultData.length; i++) {
        var isVerifiedUser = "";

        if(resultData[i].r_status == 0) {
            isVerifiedUser = "No";
        } else {
            isVerifiedUser = "Yes";
        }
        table_datas+=`<tr>
        <td>${i+1}.</td>
        <td>${resultData[i].user_id}</td>
        <td>${resultData[i].f_name}</td>
        <td>${resultData[i].l_name}</td>
        <td>${resultData[i].email}</td>
        <td>${resultData[i].my_name}</td>
        <td>${resultData[i].street}</td>
        <td>${resultData[i].city}</td>
        <td>${resultData[i].state}</td>
        <td>${resultData[i].zip}</td>
        <td>${resultData[i].phone}</td>
        <td>${resultData[i].country}</td>
        <td>${isVerifiedUser}</td>
        <td><button title="Edit" class="edit_button_of_table"><i class="fa fa-edit"></i></button> <button title="Delete" class="delete_button_of_table"><i class="fa fa-trash-o"></i></button></td>
        </tr>`
    }
    document.getElementsByClassName("admin_panel_details_table")[0].innerHTML = table_datas;

    undisplay_displayed_blocked_containers(); 
    document.getElementsByClassName("admin_panel_details_table_container")[0].style.display = "block";
    display_blocked_containers("admin_panel_details_table_container"); 
    document.getElementsByClassName("table_name_and_other_details_display_container")[0].style.display = "block";
    display_blocked_containers("table_name_and_other_details_display_container"); 
    }).catch((rejvalue) => {
        console.log(rejvalue);
    }) 
}
/* Showing User List Table Container Section End */

/* Add User Form Section Start */
function add_users() {
    undisplay_displayed_blocked_containers(); 
    document.getElementsByClassName("add_user_step1_container")[0].style.display = "block";
    display_blocked_containers("add_user_step1_container"); 
}
/* Add User Form Section End */

/* Adding User Step1 Section Start */
let user_reg_id = 0;
let first_name_of_account = "";
let last_name_of_account = "";
document.getElementsByClassName("add_user_next_btn")[0].addEventListener("click", function(event) {
    event.preventDefault();
    email_type = "invalid_email";
    let first_name = document.getElementById("fir_name1").value;
    let last_name = document.getElementById("las_name1").value;
    let user_mail = document.getElementById("user_email1").value;
    let user_password = document.getElementById("user_pass1").value;
    
    first_name = remove_slashes(first_name);
    last_name = remove_slashes(last_name);
    user_mail = remove_slashes(user_mail);
    user_password = remove_slashes(user_password);
    first_name = remove_special_chars(first_name);
    last_name = remove_special_chars(last_name);
    user_mail = remove_special_chars(user_mail);
    user_password = remove_special_chars(user_password);

    let yes_radio_btn = document.querySelector('input[name="verified_user"]:checked').value;
    if(first_name == "") {
        document.getElementsByClassName("add_user_fname_error_message_place")[0].innerText = "FirstName is required!";
    } else if(first_name.length <= 2) {
        document.getElementsByClassName("add_user_fname_error_message_place")[0].innerText = "FirstName length must be minimum 3 characters!";
    } else {
        first_name_of_account = first_name;
        document.getElementsByClassName("add_user_fname_error_message_place")[0].innerText = "";
    }
     if(last_name == "") {
        document.getElementsByClassName("add_user_lname_error_message_place")[0].innerText = "LastName is required!";
    } else if(last_name.length <= 3) {
        document.getElementsByClassName("add_user_lname_error_message_place")[0].innerText = "LastName length must be minimum 4 characters!";
    } else {
        last_name_of_account = last_name;
        document.getElementsByClassName("add_user_lname_error_message_place")[0].innerText = "";
    }
    if(user_mail == "") {
        document.getElementsByClassName("add_user_email_error_message_place")[0].innerText = "Email is required!";
    } else {
        document.getElementsByClassName("add_user_email_error_message_place")[0].innerText = "";
    }
    if(user_password == "") {
        document.getElementsByClassName("add_user_password_error_message_place")[0].innerText = "Password is required!";
    }  else if(user_password.length <= 5) {
        document.getElementsByClassName("add_user_password_error_message_place")[0].innerText = "Password length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("add_user_password_error_message_place")[0].innerText = "";
    }
    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(user_mail)) && !(user_mail =="")){
        document.getElementsByClassName("add_user_email_error_message_place")[0].innerText = "Invalid Email Address!";
    } else {
        email_type = "valid_email";
    }
   

    if((document.getElementsByClassName("add_user_fname_error_message_place")[0].innerText == "") && (document.getElementsByClassName("add_user_lname_error_message_place")[0].innerText == "") && (document.getElementsByClassName("add_user_password_error_message_place")[0].innerText == "") && (document.getElementsByClassName("add_user_email_error_message_place")[0].innerText == "") && email_type == "valid_email") {

        let emailCheckingRes = make_user_details("POST", "../Shopssy_api/Users/check_email_and_insert.php", `user_email=${user_mail}&command=checking`);
        display_preLoader();
        emailCheckingRes.then((resultData)=> {
           
            unDisplay_preLoader();
            if(resultData >= 1) {
                document.getElementsByClassName("add_user_email_error_message_place")[0].innerText = "Email already exists!";
            } else {
                display_preLoader();
                let userInsertDatasRes = make_user_details("POST", "../Shopssy_api/Users/check_email_and_insert.php", `fname=${first_name}&lname=${last_name}&user_mail=${user_mail}&user_pass=${user_password}&valid_user=${yes_radio_btn}&command=insert`);
               
                userInsertDatasRes.then((goodResponse)=> {
                    unDisplay_preLoader();
                    setUserId(goodResponse);
                    undisplay_displayed_blocked_containers();
                    document.getElementsByClassName("add_user_step2_container")[0].style.display="block";
                    display_blocked_containers("add_user_step2_container"); 
                  document.getElementById("fir_name1").value = document.getElementById("las_name1").value = document.getElementById("user_email1").value = document.getElementById("user_pass1").value = "";

                }).catch((badResponse)=> {
                    console.log(badResponse);
                })
            }
        }).catch((errorData)=> {
            console.log(errorData);
        })
        
    }
    
})

/* Adding User Step1 Section End */

/* Adding User Step2 Section Start */

function setUserId(user_id) {
    user_reg_id = user_id;
localStorage.setItem("U345R47IX", user_reg_id);
user_reg_id = localStorage.getItem("U345R47IX");
}

function insertAccountOfForm() {
    let full_name = first_name_of_account+" "+last_name_of_account;
    let street = document.getElementById("street").value;
    let city = document.getElementById("city").value;
    let state = document.getElementById("state").value;
    let country = document.getElementById("country").value;
    let zip = document.getElementById("zip").value;
    let phone = document.getElementById("phone").value;
    let dump_zip = document.getElementById("zip").value;
    let dump_phone = document.getElementById("phone").value;
    let add_type = document.querySelector('input[name="add_type"]:checked').value;
    

    city = remove_slashes(city);
    state = remove_slashes(state);
    country = remove_slashes(country);
    city = remove_special_chars(city);
    state = remove_special_chars(state);
    country = remove_special_chars(country);
    street = remove_special_chars_for_add(street);
    zip = remove_special_chars_from_number(zip);
    phone = remove_special_chars_from_number(phone);
   
    if(street == "") {
        document.getElementsByClassName("add_street_error_message_place")[0].innerText = "Street is required!";
    } else {
        document.getElementsByClassName("add_street_error_message_place")[0].innerText = "";
    }
    if(state == "") {
        document.getElementsByClassName("add_state_error_message_place")[0].innerText = "State is required!";
    } else {
        document.getElementsByClassName("add_state_error_message_place")[0].innerText = "";
    }
    if(city == "") {
        document.getElementsByClassName("add_city_error_message_place")[0].innerText = "City is required!";
    } else {
        document.getElementsByClassName("add_city_error_message_place")[0].innerText = "";
    }
    if(country == "") {
        document.getElementsByClassName("add_country_error_message_place")[0].innerText = "Country is required!";
    } else {
        document.getElementsByClassName("add_country_error_message_place")[0].innerText = "";
    }
    if(isNaN(dump_zip)) {
        document.getElementsByClassName("add_zip_error_message_place")[0].innerText = "Give number as input!";
    } else if(zip == "") {
        document.getElementsByClassName("add_zip_error_message_place")[0].innerText = "Zip is required!";
    } else {
        document.getElementsByClassName("add_zip_error_message_place")[0].innerText = "";
    }
    
    if(isNaN(dump_phone)) {
        document.getElementsByClassName("add_phone_error_message_place")[0].innerText = "Give number as input!";
    } else if(phone == "") {
        document.getElementsByClassName("add_phone_error_message_place")[0].innerText = "Phone Number is required!";
    } else {
        document.getElementsByClassName("add_phone_error_message_place")[0].innerText = "";
    }
    if((document.getElementsByClassName("add_street_error_message_place")[0].innerText == "") && (document.getElementsByClassName("add_state_error_message_place")[0].innerText == "") && (document.getElementsByClassName("add_city_error_message_place")[0].innerText == "") && (document.getElementsByClassName("add_country_error_message_place")[0].innerText == "") && (document.getElementsByClassName("add_zip_error_message_place")[0].innerText == "") && (document.getElementsByClassName("add_phone_error_message_place")[0].innerText == "")) {
        display_preLoader();
        let insertAccountDataRes = make_user_details("POST", "../Shopssy_api/Users/check_email_and_insert.php", `fname=${first_name_of_account}&lname=${last_name_of_account}&full_name=${full_name}&street=${street}&city=${city}&state=${state}&country=${country}&zip=${zip}&phone=${phone}&add_type=${add_type}&user_id=${user_reg_id}&command=insertIntoAccount`);
        insertAccountDataRes.then((goodMsg)=> {
            unDisplay_preLoader();
           
            document.getElementById("street").value = document.getElementById("city").value = document.getElementById("state").value = document.getElementById("country").value = document.getElementById("zip").value = document.getElementById("phone").value = "";
            undisplay_displayed_blocked_containers();
            alert("Form Submitted Successfully!")
           
        }).catch((badMsg)=> {
            console.log(badMsg);
        })
    }
}


/* Adding User Step2 Section End */
