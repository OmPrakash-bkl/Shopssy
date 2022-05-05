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

/* Reset Section Start */

document.getElementsByClassName("add_user_back_btn")[0].style.display = "inline-block";
document.getElementsByClassName("add_user_back_btn2")[0].style.display = "none";
document.getElementsByClassName("add_user_next_btn")[0].style.display = "inline-block";
document.getElementsByClassName("add_user_next_btn2")[0].style.display = "none";
document.getElementsByClassName("add_user_submit_btn")[0].style.display = "inline-block";
document.getElementsByClassName("add_user_submit_btn2")[0].style.display = "none";
document.getElementById("user_email1").disabled = false;
document.getElementsByClassName("addresses_sections")[0].style.display = "none";
document.getElementsByClassName("addresses_sections")[1].style.display = "none";
document.getElementsByClassName("add_category_submition_btn")[0].style.display = "inline-block";
document.getElementsByClassName("add_category_submition_btn2")[0].style.display = "none";


/* Reset Section End */

/* User Start */
function showStep1Form(mode) {
undisplay_displayed_blocked_containers();
document.getElementsByClassName("add_user_step1_container")[0].style.display="block";
display_blocked_containers("add_user_step1_container"); 
if(mode == "insert") {
    document.getElementById("fir_name1").value = document.getElementById("las_name1").value = document.getElementById("user_email1").value = document.getElementById("user_pass1").value = "";
    document.getElementsByClassName("add_user_next_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_user_next_btn2")[0].style.display = "none";
}
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

/* Showing Register User List Table Container Start */

function show_registered_users() {
    let responseObj = make_user_details("GET", "../user/user_reg_details/", "");
display_preLoader();
let totalC = 0;

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
   
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr><th>S.NO</th>
    <th>USER ID</th>
    <th>F.NAME</th>
    <th>L.NAME</th>
    <th>EMAIL</th>
    <th>PASSWORD</th>
    <th>VERIFIED USER?</th>
    <th>ACTION</th></tr>`;
    for(let i = 0; i < resultData.length; i++) {
        var isVerifiedUser = "";

        if(resultData[i].status == 0) {
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
        <td>${resultData[i].password}</td>
        <td>${isVerifiedUser}</td>
        <td><button title="Edit" class="edit_button_of_table" onclick="editOfRegisteredUser(${resultData[i].user_id})"><i class="fa fa-edit"></i></button> <button title="Delete" class="delete_button_of_table" onclick="deleteOfRegisteredUser(${resultData[i].user_id})"><i class="fa fa-trash-o"></i></button></td>
        </tr>`;
        totalC = i;
    }
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Registered Users";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

/* Showing Register User List Table Container End */

/* Showing User List Table Container Section Start */
function show_users() {
let responseObj = make_user_details("GET", "../user/user_account_details/", "");
display_preLoader();
let totalC = 0;
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
    <th>VERIFIED USER?</th></tr>`;
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
        </tr>`
        totalC = i;
    }
    document.getElementsByClassName("admin_panel_details_table")[0].innerHTML = table_datas;
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Customer Details";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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
    document.getElementsByClassName("form_title")[0].innerHTML = "User Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementById("fir_name1").value = document.getElementById("las_name1").value = document.getElementById("user_email1").value = document.getElementById("user_pass1").value = "";
    document.getElementsByClassName("add_user_next_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_user_submition_btn")[0].style.display = "none";
    document.getElementsByClassName("add_user_next_btn2")[0].style.display = "none";
    document.getElementsByClassName("add_user_back_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_user_back_btn2")[0].style.display = "none";
    document.getElementsByClassName("add_user_submit_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_user_submit_btn2")[0].style.display = "none";
    document.getElementsByClassName("addresses_sections")[0].style.display = "none";
    document.getElementsByClassName("addresses_sections")[1].style.display = "none";
    document.getElementById("user_email1").disabled = false;
    document.getElementsByClassName("add_user_step1_container")[0].style.display = "block";
    display_blocked_containers("add_user_step1_container"); 
}
/* Add User Form Section End */

/* Adding User Step1 Section Start */
let user_reg_id = 0;
let first_name_of_account = "";
let last_name_of_account = "";
function check_insert_update_user_details(event, decisionPara) {

    event.preventDefault();
    email_type = "invalid_email";
    let first_name = document.getElementById("fir_name1").value;
    let last_name = document.getElementById("las_name1").value;
    let user_mail = document.getElementById("user_email1").value;
    let user_password = document.getElementById("user_pass1").value;
    let users_id = document.getElementById("user_id").value;
    
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
    if(decisionPara == "insert") {
        if(user_mail == "") {
            document.getElementsByClassName("add_user_email_error_message_place")[0].innerText = "Email is required!";
        } else {
            document.getElementsByClassName("add_user_email_error_message_place")[0].innerText = "";
        }
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

        let emailCheckingRes = make_user_details("POST", "../user/user_checker/", `user_email=${user_mail}`);
        display_preLoader();
        emailCheckingRes.then((resultData)=> {
           
            unDisplay_preLoader();
            if(decisionPara == "update" || decisionPara == "registeredDataUpdate") {
                document.getElementsByClassName("add_user_email_error_message_place")[0].innerText = "";
            }
            if(resultData >= 1 && decisionPara == "insert") {
                document.getElementsByClassName("add_user_email_error_message_place")[0].innerText = "Email already exists!";
            } else if(decisionPara == "registeredDataUpdate") {
                updateRegisteredUserDetails();
            } else {
                
               
                display_preLoader();
                if(decisionPara == "insert") {
                    let userInsertDatasRes = make_user_details("POST", "../user/user_regdata_insertion/", `fname=${first_name}&lname=${last_name}&user_mail=${user_mail}&user_pass=${user_password}&valid_user=${yes_radio_btn}`);

                    userInsertDatasRes.then((goodResponse)=> {
                        unDisplay_preLoader();
                        setUserId(goodResponse);
                        undisplay_displayed_blocked_containers();
                        document.getElementsByClassName("add_user_step2_container")[0].style.display="block";
                        display_blocked_containers("add_user_step2_container"); 
    
                    }).catch((badResponse)=> {
                        console.log(badResponse);
                    })
                } else {
                    unDisplay_preLoader();
                        undisplay_displayed_blocked_containers();
                        document.getElementsByClassName("add_user_step2_container")[0].style.display="block";
                        display_blocked_containers("add_user_step2_container"); 
                    setForm1Details(users_id, first_name, last_name, user_mail, user_password, yes_radio_btn);
                }
               
                
            }
        }).catch((errorData)=> {
            console.log(errorData);
        })
        
    }
    
}
document.getElementsByClassName("add_user_next_btn")[0].addEventListener("click", function(event) {
    check_insert_update_user_details(event, "insert");
})

/* Adding User Step1 Section End */

/* Adding User Step2 Section Start */

function setUserId(user_id) {
    user_reg_id = user_id;
localStorage.setItem("U345R47IX", user_reg_id);
user_reg_id = localStorage.getItem("U345R47IX");
}

let updatedFName = "";
let updatedLName = "";
let updatedEmail = "";
let updatedPass = "";
let updatedUserType = "";
let users_id = "";
function setForm1Details(users_id, first_name, last_name, user_mail, user_password, yes_radio_btn) {
customer_id = users_id;
updatedFName = first_name;
updatedLName = last_name;
updatedEmail = user_mail;
updatedPass = user_password;
updatedUserType = yes_radio_btn;
}

function insertAccountOfForm(mode) {
    let accounts_id =  document.getElementById("account_id").value;
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
        let insertAccountDataRes = "";
        if(mode == "insert") {
           let insertAccountDataRes = make_user_details("POST", "../user/user_accountdata_insertion/", `fname=${first_name_of_account}&lname=${last_name_of_account}&full_name=${full_name}&street=${street}&city=${city}&state=${state}&country=${country}&zip=${zip}&phone=${phone}&add_type=${add_type}&user_id=${user_reg_id}`);

            insertAccountDataRes.then((goodMsg)=> {
                unDisplay_preLoader();
               
                document.getElementById("street").value = document.getElementById("city").value = document.getElementById("state").value = document.getElementById("country").value = document.getElementById("zip").value = document.getElementById("phone").value = "";
                undisplay_displayed_blocked_containers();
                alert("Form Submitted Successfully!")
               
            }).catch((badMsg)=> {
                console.log(badMsg);
            })
        } else {
            display_preLoader();

            let update_register_data_object = {
                users_id: customer_id,
                fname: updatedFName,
                lname: updatedLName,
                user_mail: updatedEmail,
                user_pass: updatedPass,
                valid_user: updatedUserType
            }

            let update_register_data = JSON.stringify(update_register_data_object);

            let updateRegisterDatasRes = make_user_details("POST", `../user/registration_data_edit_request/`, `${update_register_data}`);

             updateRegisterDatasRes.then((regiterResObj) => {
                //console.log(regiterResObj);
            }).catch((registerRejObj) => {
                console.log(registerRejObj);
            })

            let update_account_data_object = {
                fname: first_name_of_account,
                lname: last_name_of_account,
                full_name: full_name,
                street: street,
                city: city,
                state: state,
                country: country,
                zip: zip,
                phone: phone,
                add_type: add_type,
                accounts_id: accounts_id
            }

           let update_account_data = JSON.stringify(update_account_data_object);
        
           let updateAccountDataRes = make_user_details("POST", `../user/account_data_edit_request/`, `${update_account_data}`);
            
            updateAccountDataRes.then((accountResObj) => {
                alert(accountResObj);
               
        document.getElementById("fir_name1").value = "";
        document.getElementById("las_name1").value = "";
        document.getElementById("user_email1").value = "";
        document.getElementById("user_email1").disabled = false;
        document.getElementById("user_pass1").value = "";
        document.getElementById("street").value = "";
        document.getElementById("city").value = "";
        document.getElementById("state").value = "";
        document.getElementById("country").value = "";
        document.getElementById("zip").value = "";
        document.getElementById("phone").value = "";
        document.getElementsByClassName("addresses_sections")[0].style.display = "none";
        document.getElementsByClassName("addresses_sections")[1].style.display = "none";

            }).catch((accountRejObj) => {
                console.log(accountRejObj);
            })

            unDisplay_preLoader();


        }
       

       
    }
}


/* Adding User Step2 Section End */

/* Edit and Delete User Section Start */

function edit_and_delete_users() {
    let responseObj = make_user_details("GET", "../user/user_account_details/", "");
display_preLoader();

responseObj.then((sucvalue) => {
    let totalC = 0;
    unDisplay_preLoader();
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr><th>S.NO</th>
    <th>USER ID</th>
    <th>FULLNAME</th>
    <th>EMAIL</th>
    <th>CITY</th>
    <th>PH.NUMBER</th>
    <th>ACTION</th></tr>`;
    for(let i = 0; i < resultData.length; i++) {
        table_datas+=`<tr>
        <td>${i+1}.</td>
        <td>${resultData[i].user_id}</td>
        <td>${resultData[i].my_name}</td>
        <td>${resultData[i].email}</td>
        <td>${resultData[i].city}</td>
        <td>${resultData[i].phone}</td>
        <td><button title="Edit"  onclick="editUserRegistrationAndAccData(${resultData[i].user_id})" class="edit_button_of_table"><i class="fa fa-edit"></i></button> <button title="Delete" onclick="deleteUserRegistrationAndAccData(${resultData[i].user_id}, '')" class="delete_button_of_table"><i class="fa fa-trash-o"></i></button></td>
        </tr>`
        totalC = i;
    }
    document.getElementsByClassName("admin_panel_details_table")[0].innerHTML = table_datas;
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Customer Details";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
    undisplay_displayed_blocked_containers(); 
    document.getElementsByClassName("admin_panel_details_table_container")[0].style.display = "block";
    display_blocked_containers("admin_panel_details_table_container"); 
    document.getElementsByClassName("table_name_and_other_details_display_container")[0].style.display = "block";
    display_blocked_containers("table_name_and_other_details_display_container"); 
    }).catch((rejvalue) => {
        console.log(rejvalue);
    }) 
}

function editUserRegistrationAndAccData(user_id) {
    document.getElementsByClassName("form_title")[0].innerHTML = "User Edit Form";
    document.getElementsByClassName("add_user_back_btn")[0].style.display = "none";
    document.getElementsByClassName("add_user_back_btn2")[0].style.display = "inline-block";
    document.getElementsByClassName("add_user_next_btn")[0].style.display = "none";
    document.getElementsByClassName("add_user_submition_btn")[0].style.display = "none";
    document.getElementsByClassName("add_user_next_btn2")[0].style.display = "inline-block";
    document.getElementsByClassName("add_user_submit_btn")[0].style.display = "none";
    document.getElementsByClassName("add_user_submit_btn2")[0].style.display = "inline-block";
    display_preLoader();
    let responseObj = make_user_details("GET", `../user/specific_user_reg_detail/user_id/${user_id}`, "");
    
    responseObj.then((sucvalue) => {
        
        unDisplay_preLoader();
        undisplay_displayed_blocked_containers();
        let registeredUserData = JSON.parse(sucvalue);
        document.getElementsByClassName("add_user_step1_container")[0].style.display = "block";
        display_blocked_containers("add_user_step1_container"); 

        display_preLoader();
        let userDataAddCountObj = make_user_details("GET", `../user/give_user_acc_count/user_id/${user_id}`, "");
        unDisplay_preLoader();
        document.getElementsByClassName("addresses_sections")[0].style.display = "block";
        document.getElementsByClassName("addresses_sections")[1].style.display = "block";
        userDataAddCountObj.then((resobj) => {
            let addCount = JSON.parse(resobj);
            
            address_dropdown_section_option = `<option value="0">Select Address</option>`;
            for(let i = 1; i <= addCount.length; i++) {
                address_dropdown_section_option += `<option value="${addCount[i-1].acc_id}">Address ${i}</option>`;
            }
            document.getElementById("addresses_tag").innerHTML = address_dropdown_section_option;
            
        }).catch((rejObj) => {
            console.log("Not Found!");
        })
    
        if(registeredUserData.status == 1) {
            document.getElementById("yes_verified_user").checked = true;
        } else {
            document.getElementById("no_not_verified_user").checked = true;
        }
       
        document.getElementById("user_id").value = registeredUserData.user_id;
        document.getElementById("fir_name1").value = registeredUserData.f_name;
        document.getElementById("las_name1").value = registeredUserData.l_name;
        document.getElementById("user_email1").value = registeredUserData.email;
        document.getElementById("user_email1").disabled = true;
        document.getElementById("user_pass1").value = registeredUserData.password;
        
        
        document.getElementsByClassName("add_user_next_btn2")[0].addEventListener("click", function(event) {
            check_insert_update_user_details(event, "update");
        })
       
        document.getElementsByClassName("add_user_back_btn2")[0].addEventListener("click", showStep1Form("update"));

        }).catch((rejvalue) => {
            console.log(rejvalue);
        }) 
}

document.getElementById("addresses_tag").addEventListener("change", function() {
    display_preLoader();
    let account_id = this.value;
    let userDataOfAddDataObj = make_user_details("POST", `../user/give_user_account_data/`, `acc_id=${account_id}`);
    unDisplay_preLoader();

    userDataOfAddDataObj.then((resobj) => {
        userDataOfAddDataResult = JSON.parse(resobj);
    document.getElementById("account_id").value = userDataOfAddDataResult.acc_id;
    document.getElementById("street").value = userDataOfAddDataResult.street;
    document.getElementById("city").value = userDataOfAddDataResult.city;
    document.getElementById("state").value = userDataOfAddDataResult.state;
    document.getElementById("country").value = userDataOfAddDataResult.country;
    document.getElementById("zip").value = userDataOfAddDataResult.zip;
    document.getElementById("phone").value = userDataOfAddDataResult.phone;
    if(userDataOfAddDataResult.status == "default") {
        document.getElementById("default_add").checked = true;
    } else {
        document.getElementById("secondary_add").checked = true;
    }
    }).catch((rejObj) => {
        console.log("Not Found!");
    })
});


function deleteUserRegistrationAndAccData(user_id, descision_val) {
    let permission = confirm("Are you sure?");
    if(permission) {
        display_preLoader();
        let userDeleteReqObj = make_user_details("DELETE", `../user/user_deletion/user_id/${user_id}`, ``);
        userDeleteReqObj.then((deleteRes) => {
            unDisplay_preLoader();
            alert(deleteRes);
            if(descision_val == "registerDataEditionWork") {
                show_registered_users();
            } else {
                edit_and_delete_users();
            }
        }).catch((deleteErrRes) => {
            console.log(deleteErrRes);
        })
    }
}

/* Edit and Delete User Section End */

/* Registered Users Edit and Delete Section Start */

function editOfRegisteredUser(users_id) {
    display_preLoader();
    let responseObj = make_user_details("GET", `../user/specific_user_reg_detail/user_id/${users_id}`, "");

    document.getElementsByClassName("add_user_submition_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_user_next_btn")[0].style.display = "none";
    document.getElementsByClassName("add_user_next_btn2")[0].style.display = "none";

    responseObj.then((resObj) => {
        unDisplay_preLoader();
        registeredUsersData = JSON.parse(resObj);
        if(registeredUsersData.status == 1) {
            document.getElementById("yes_verified_user").checked = true;
        } else {
            document.getElementById("no_not_verified_user").checked = true;
        }
       
        document.getElementById("user_id").value = registeredUsersData.user_id;
        document.getElementById("fir_name1").value = registeredUsersData.f_name;
        document.getElementById("las_name1").value = registeredUsersData.l_name;
        document.getElementById("user_email1").value = registeredUsersData.email;
        document.getElementById("user_email1").disabled = true;
        document.getElementById("user_pass1").value = registeredUsersData.password;

    })
    document.getElementsByClassName("form_title")[0].innerHTML = "User Registration Edit Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementById("user_email1").disabled = true;
    document.getElementsByClassName("add_user_step1_container")[0].style.display = "block";
    display_blocked_containers("add_user_step1_container"); 
}

document.getElementsByClassName("add_user_submition_btn")[0].addEventListener("click", function(event) {
    check_insert_update_user_details(event, "registeredDataUpdate");
});

function updateRegisteredUserDetails() {
    let yes_radio_btn = document.querySelector('input[name="verified_user"]:checked').value;
        let useres_id = document.getElementById("user_id").value;
        let fir_name = document.getElementById("fir_name1").value;
        let las_name = document.getElementById("las_name1").value;
        let email_id = document.getElementById("user_email1").value;
        let user_pass = document.getElementById("user_pass1").value;

        let update_register_data_object = {
            users_id: useres_id,
            fname: fir_name,
            lname: las_name,
            user_mail: email_id,
            user_pass: user_pass,
            valid_user: yes_radio_btn
        }

        let update_register_data = JSON.stringify(update_register_data_object);

        let updateRegisterDatasRes = make_user_details("POST", "../user/registration_data_edit_request/", `${update_register_data}`);

            updateRegisterDatasRes.then((regiterResObj) => {
              
                    alert("Updated Successfully!");
              
            }).catch((registerRejObj) => {
                console.log(registerRejObj);
            })

}

function deleteOfRegisteredUser(user_id) {
    deleteUserRegistrationAndAccData(user_id, 'registerDataEditionWork');
}
function deleteDetailOfForm() {
    undisplay_displayed_blocked_containers();
}

/* Registered Users Edit and Delete Section End */

/* User End */

/* Category Start */

/* Category View Section Start */

function show_cat() {
    let responseObj = make_user_details("GET", "../category/category_details/", "");
display_preLoader();
let totalC = 0;

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
  
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr><th>S.NO</th>
    <th>CAT ID</th>
    <th>CAT TITLE</th>
    <th>CAT IMG NAME</th>
    <th>CAT ICON NAME</th>
    <th>CAT DESCRIPTION</th></tr>`;
    for(let i = 0; i < resultData.length; i++) {
        
        table_datas+=`<tr>
        <td>${i+1}.</td>
        <td>${resultData[i].cat_id}</td>
        <td>${resultData[i].cat_title}</td>
        <td>${resultData[i].cat_image_name}</td>
        <td>${resultData[i].cat_icon_name}</td>
        <td>${resultData[i].cat_name_description}</td>
        </tr>`;
        totalC = i;
    }
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Category Details";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

/* Category View Section End */

/* Category Add & Edit Section Start */

function add_cat() {
    document.getElementsByClassName("form_title1")[0].innerHTML = "Category Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementById("cat_title").value = document.getElementById("cat_image_name").value = document.getElementById("cat_icon_name").value = document.getElementById("cat_name_desc").value = "";
    document.getElementsByClassName("add_category_submition_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_category_step1_container")[0].style.display = "block";
    display_blocked_containers("add_category_step1_container"); 
    document.getElementsByClassName("add_category_submition_btn2")[0].style.display = "none";
    document.getElementsByClassName("add_category_submition_btn")[0].style.display = "inline-block";
}

document.getElementsByClassName("add_category_submition_btn")[0].addEventListener("click", function(event) {
category_submission_form(event, "insert");
});

function category_submission_form(event, decisionPara) {
event.preventDefault();

let cat_id = document.getElementById("cat_id").value;
let cat_title = document.getElementById("cat_title").value;
let cat_image_name = document.getElementById("cat_image_name").value;
let cat_icon_name = document.getElementById("cat_icon_name").value;
let cat_desc = document.getElementById("cat_name_desc").value;

cat_title = cat_title.replace(/\/+$/g, '');
cat_image_name = cat_image_name.replace(/\/+$/g, '');
cat_icon_name = cat_icon_name.replace(/\/+$/g, '');
cat_desc = cat_desc.replace(/\/+$/g, '');
cat_title = cat_title.replace(/[^a-zA-Z0-9@.& ]/g, "");
cat_image_name = cat_image_name.replace(/[^a-zA-Z0-9@. ]/g, "");
cat_icon_name = cat_icon_name.replace(/[^a-zA-Z0-9- ]/g, "");
cat_desc = cat_desc.replace(/[^a-zA-Z0-9@.,  ]/g, "");

if(cat_title == "") {
    document.getElementsByClassName("cat_name_error_message_place")[0].innerText = "Category Name is required!";
} else if(cat_title.length <= 5) {
    document.getElementsByClassName("cat_name_error_message_place")[0].innerText = "Category Name length must be minimum 6 characters!";
} else {
    document.getElementsByClassName("cat_name_error_message_place")[0].innerText = "";
}
if(cat_image_name == "") {
    document.getElementsByClassName("category_image_name_error_message_place")[0].innerText = "Category Image Name is required!";
} else if(cat_image_name.length <= 5) {
    document.getElementsByClassName("category_image_name_error_message_place")[0].innerText = "Category Image Name length must be minimum 6 characters!";
} else {
    document.getElementsByClassName("category_image_name_error_message_place")[0].innerText = "";
}
if(cat_icon_name == "") {
    document.getElementsByClassName("cat_icon_name_error_message_place")[0].innerText = "Category Icon Name is required!";
} else if(cat_icon_name.length <= 6) {
    document.getElementsByClassName("cat_icon_name_error_message_place")[0].innerText = "Category Icon Name length must be minimum 7 characters!";
} else {
    document.getElementsByClassName("cat_icon_name_error_message_place")[0].innerText = "";
}
if(cat_desc == "") {
    document.getElementsByClassName("cat_name_desc_error_message_place")[0].innerText = "Category Description is required!";
} else if(cat_desc.length <= 6) {
    document.getElementsByClassName("cat_name_desc_error_message_place")[0].innerText = "Category Description length must be minimum 7 characters!";
} else {
    document.getElementsByClassName("cat_name_desc_error_message_place")[0].innerText = "";
}

if((document.getElementsByClassName("cat_name_error_message_place")[0].innerText == "") && (document.getElementsByClassName("category_image_name_error_message_place")[0].innerText == "") && (document.getElementsByClassName("cat_icon_name_error_message_place")[0].innerText == "") && (document.getElementsByClassName("cat_name_desc_error_message_place")[0].innerText == "")) {

    let categoryDataObj = {
        cat_title: cat_title,
    }
    categoryDataObj = JSON.stringify(categoryDataObj);
    display_preLoader();
    let categoryTitleCheckerRes = make_user_details("POST", "../category/check_cat_title/", `${categoryDataObj}`);

    
    categoryTitleCheckerRes.then((response) => {
        unDisplay_preLoader();
        let avail_count = response;
        categoryDataObj = {
            cat_id: cat_id,
            cat_title: cat_title,
            cat_image_name: cat_image_name,
            cat_icon_name: cat_icon_name,
            cat_desc: cat_desc
        }
      
        categoryDataObj = JSON.stringify(categoryDataObj);

        
    if(avail_count == 0 && decisionPara == "insert") {
        document.getElementsByClassName("cat_name_error_message_place")[0].innerText = "";
        display_preLoader();
        if(decisionPara == "insert") {
            let categoryInsertDatasRes = make_user_details("POST", "../category/insert_cat_data/", `${categoryDataObj}`);
    
            categoryInsertDatasRes.then((goodResponse) => {
                unDisplay_preLoader();
                alert(goodResponse);
           document.getElementById("cat_title").value = document.getElementById("cat_image_name").value = document.getElementById("cat_icon_name").value = document.getElementById("cat_name_desc").value = "";
            }).catch((badResponse) => {
                console.log(badResponse);
            })
       
        }
    } else {
        document.getElementsByClassName("cat_name_error_message_place")[0].innerText = "Category Name already exits!";
    }
   
    if(decisionPara == "update") {
        if(avail_count >= 1) {
            document.getElementsByClassName("cat_name_error_message_place")[0].innerText = "Category Name already exits!";
        } else {
            document.getElementsByClassName("cat_name_error_message_place")[0].innerText = "";
           
            let categoryUpdateDatasRes = make_user_details("POST", "../category/update_category/", `${categoryDataObj}`);
    
            categoryUpdateDatasRes.then((goodResponse) => {
                unDisplay_preLoader();
                alert(goodResponse);
           document.getElementById("cat_title").value = document.getElementById("cat_image_name").value = document.getElementById("cat_icon_name").value = document.getElementById("cat_name_desc").value = "";
            }).catch((badResponse) => {
                console.log(badResponse);
            })
        }
        
    }

    })
  }
}


function edit_and_delete_category() {
    let responseObj = make_user_details("GET", "../category/category_details/", "");
display_preLoader();
let totalC = 0;

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
  
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr><th>S.NO</th>
    <th>CAT ID</th>
    <th>CAT TITLE</th>
    <th>ACTION</th></tr>`;
    for(let i = 0; i < resultData.length; i++) {
        
        table_datas+=`<tr>
        <td>${i+1}.</td>
        <td>${resultData[i].cat_id}</td>
        <td>${resultData[i].cat_title}</td>
        <td><button title="Edit" class="edit_button_of_table" onclick="editOfSpecCategory(${resultData[i].cat_id})"><i class="fa fa-edit"></i></button> <button title="Delete" class="delete_button_of_table" onclick="deleteOfSpecCategory(${resultData[i].cat_id})"><i class="fa fa-trash-o"></i></button></td></tr>`;
        totalC = i;
    }
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Category Details";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

function editOfSpecCategory(cat_id) {
    display_preLoader();
    let responseObj = make_user_details("GET", `../category/specific_cat_detail/cat_id/${cat_id}`, "");

    document.getElementsByClassName("add_category_submition_btn2")[0].style.display = "inline-block";
    document.getElementsByClassName("add_category_submition_btn")[0].style.display = "none";

   

    responseObj.then((resObj) => {
        unDisplay_preLoader();
        categoryData = JSON.parse(resObj);
        
        document.getElementById("cat_id").value = categoryData.cat_id;
        document.getElementById("cat_title").value = categoryData.cat_title;
        document.getElementById("cat_image_name").value = categoryData.cat_image_name;
        document.getElementById("cat_icon_name").value = categoryData.cat_icon_name;
        document.getElementById("cat_name_desc").value = categoryData.cat_name_description;
       
    })
    document.getElementsByClassName("form_title1")[0].innerHTML = "Category Edit Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementsByClassName("add_category_step1_container")[0].style.display = "block";
    display_blocked_containers("add_category_step1_container"); 
}

document.getElementsByClassName("add_category_submition_btn2")[0].addEventListener("click", function(event) {
    category_submission_form(event, "update");
    });

/* Category Add & Edit Section End */

/* Category Delete Section Start */

function deleteOfSpecCategory(cat_id) {
    let permission = confirm("Are you sure?");
    if(permission) {
        display_preLoader();
        let categoryDeleteReqObj = make_user_details("DELETE", `../category/category_deletion/cat_id/${cat_id}`, ``);
        categoryDeleteReqObj.then((deleteRes) => {
            unDisplay_preLoader();
            alert(deleteRes);
            show_cat();
        }).catch((deleteErrRes) => {
            console.log(deleteErrRes);
        })
    }
}

/* Category Delete Section End */

/* Category End */

/* Sub Category Start */

/* Sub Category View Section Start */

function view_sub_cat() {
   
        let responseObj = make_user_details("GET", "../sub_category/sub_cat_details/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);
        let table_datas = `<tr><th>S.NO</th>
        <th>SUB.CAT ID</th>
        <th>CAT ID</th>
        <th>SUB.CAT ID - 1</th>
        <th>SUB.CAT ID - 2</th>
        <th>TITLE</th>
        <th>IMG NAME</th></tr>`;
        for(let i = 0; i < resultData.length; i++) {
            
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].sub_cat_id}</td>
            <td>${resultData[i].cats_id}</td>
            <td>${resultData[i].sub_cat_identification_id}</td>
            <td>${resultData[i].sub_cat_identification_id_two}</td>
            <td>${resultData[i].subs_cat_title}</td>
            <td>${resultData[i].sub_cat_image_name}</td>
            </tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Sub Category Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

/* Sub Category View Section End */

/* Sub Category Insert Section Start */

function add_subcat() {
    document.getElementById("cats_id").style.display = "inline-block";
    document.getElementsByClassName("sub_cat_id_error_message_place")[0].style.display = "inline-block";
    display_preLoader();
    let retrieveAllCatDetails = make_user_details("GET", "../category/category_details/", "");

    retrieveAllCatDetails.then((resData) => {
        unDisplay_preLoader();
     
        let resultData = JSON.parse(resData);
        let appendedResultData = `<option value="0">Select Category</option>`;
        for(let i = 0; i < resultData.length; i++) {
            appendedResultData+=`<option value=${resultData[i].cat_id}>${resultData[i].cat_title}</option>`;
        }
        appendedResultData+=`<option value="add_cat">Add New Category</option>`;
    document.getElementById("cats_id").innerHTML = appendedResultData;
    
    document.getElementsByClassName("form_title2")[0].innerHTML = "Sub Category Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementById("sub_cat_identification_id").value = document.getElementById("sub_cat_identification_id_two").value = document.getElementById("sub_cat_title").value = document.getElementById("sub_cat_image_name").value = "";
    document.getElementsByClassName("add_sub_category_submition_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_sub_category_step1_container")[0].style.display = "block";
    display_blocked_containers("add_sub_category_step1_container"); 
    document.getElementsByClassName("add_sub_category_submition_btn2")[0].style.display = "none";
    document.getElementsByClassName("add_sub_category_submition_btn")[0].style.display = "inline-block";
    }).catch((errData) => {
        console.log(errData);
    })
       
}

let sub_cats_id = 0;

document.getElementById("cats_id").addEventListener("change" , function() {
    
    if(this.value == 0) {
        document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText = "Select Category!";
    } else if(this.value == "add_cat") {
        document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText = "";
        add_cat();
      
    } else {
        document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText = "";
        sub_cats_id = this.value;
        input_id = {
            cats_id: sub_cats_id
        }
     
        input_id = JSON.stringify(input_id);
        display_preLoader();
        let subCategoryTitleCheckerRes = make_user_details("POST", "../sub_category/get_sciidandsciidit/", `${input_id}`);
    
        
        subCategoryTitleCheckerRes.then((response) => {
       
            let sub_cat_identification_id_and_sub_cat_identification_id_two_array = JSON.parse(response);
         
            if(sub_cat_identification_id_and_sub_cat_identification_id_two_array[0] == `${Math.trunc(sub_cat_identification_id_and_sub_cat_identification_id_two_array[0])}.9`) {
            final_sub_cat_identification_id = Number(Math.trunc(sub_cat_identification_id_and_sub_cat_identification_id_two_array[0])) + 1 + '.0';
            } else if(sub_cat_identification_id_and_sub_cat_identification_id_two_array[0] == 0 || sub_cat_identification_id_and_sub_cat_identification_id_two_array[0] == null) {
                final_sub_cat_identification_id = 1.1;
            } else {
                final_sub_cat_identification_id = Number(sub_cat_identification_id_and_sub_cat_identification_id_two_array[0]) + 0.1;
            }
            
            document.getElementById("sub_cat_identification_id").value = final_sub_cat_identification_id;
            document.getElementById("sub_cat_identification_id_two").value  = Number(sub_cat_identification_id_and_sub_cat_identification_id_two_array[1].last_sub_cat_identification_id_two) + 1;
           
            unDisplay_preLoader();
        }).catch((errData) => {
            console.log(errData);
        });
    }
   
});

document.getElementsByClassName("add_sub_category_submition_btn")[0].addEventListener("click", function(event) {
    sub_category_submission_form(event, "insert");    
});
    
    function sub_category_submission_form(event, decisionPara) {
    event.preventDefault();
 
    let cats_id = sub_cats_id;
    if(decisionPara == "update") {
     
        cats_id = document.getElementById("cats_id").value;
    }
    let sub_cat_identification_id = document.getElementById("sub_cat_identification_id").value;
    let sub_cat_identification_id_two = document.getElementById("sub_cat_identification_id_two").value;
    let sub_cat_title = document.getElementById("sub_cat_title").value;
    let sub_cat_image_name = document.getElementById("sub_cat_image_name").value;
    
    sub_cat_title = sub_cat_title.replace(/\/+$/g, '');
    sub_cat_image_name = sub_cat_image_name.replace(/\/+$/g, '');
    sub_cat_title = sub_cat_title.replace(/[^a-zA-Z0-9@.& ]/g, "");
    sub_cat_image_name = sub_cat_image_name.replace(/[^a-zA-Z0-9@. ]/g, "");
    
    if(cats_id == 0) {
        document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText = "Select Category!";
    } else {
        document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText = "";
    }
    if(sub_cat_title == "") {
        document.getElementsByClassName("sub_cat_name_error_message_place")[0].innerText = "Sub Category Name is required!";
    } else if(sub_cat_title.length <= 5) {
        document.getElementsByClassName("sub_cat_name_error_message_place")[0].innerText = "Sub Category Name length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("sub_cat_name_error_message_place")[0].innerText = "";
    }
    if(sub_cat_image_name == "") {
        document.getElementsByClassName("sub_category_image_name_error_message_place")[0].innerText = "Sub Category Image Name is required!";
    } else if(sub_cat_image_name.length <= 5) {
        document.getElementsByClassName("sub_category_image_name_error_message_place")[0].innerText = "Sub Category Image Name length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("sub_category_image_name_error_message_place")[0].innerText = "";
    }
   
    if((document.getElementsByClassName("sub_cat_name_error_message_place")[0].innerText == "") && (document.getElementsByClassName("sub_category_image_name_error_message_place")[0].innerText == "") && (document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText == "")) {
    
        let subCategoryDataObj = {
            sub_cat_title: sub_cat_title
        }
        subCategoryDataObj = JSON.stringify(subCategoryDataObj);
        display_preLoader();
        let subCategoryTitleCheckerRes = make_user_details("POST", "../sub_category/check_subcat_title/", `${subCategoryDataObj}`);
    
        
        subCategoryTitleCheckerRes.then((response) => {
            unDisplay_preLoader();
            let avail_count = response;
            subCategoryDataObj = {
                cats_id: cats_id,
                sub_cat_identification_id: sub_cat_identification_id,
                sub_cat_identification_id_two: sub_cat_identification_id_two,
                sub_cat_title: sub_cat_title,
                sub_cat_image_name: sub_cat_image_name
            }
           
            subCategoryDataObj = JSON.stringify(subCategoryDataObj);
            
        if(avail_count == 0 && decisionPara == "insert") {
            document.getElementsByClassName("sub_cat_name_error_message_place")[0].innerText = "";
            display_preLoader();
            if(decisionPara == "insert") {
                let subCategoryInsertDatasRes = make_user_details("POST", "../sub_category/insert_subcat_data/", `${subCategoryDataObj}`);
        
                subCategoryInsertDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);
                    document.getElementById("sub_cat_identification_id").value = document.getElementById("sub_cat_identification_id_two").value = document.getElementById("sub_cat_title").value = document.getElementById("sub_cat_image_name").value = "";
                }).catch((badResponse) => {
                    console.log(badResponse);
                })
           
            }
        } else {
            document.getElementsByClassName("sub_cat_name_error_message_place")[0].innerText = "Sub Category Name already exits!";
        }
       
        if(decisionPara == "update") {
            if(avail_count >= 1) {
                document.getElementsByClassName("sub_cat_name_error_message_place")[0].innerText = "Sub Category Name already exits!";
            } else {
              
                document.getElementsByClassName("sub_cat_name_error_message_place")[0].innerText = "";
                display_preLoader();
                let subCategoryUpdateDatasRes = make_user_details("POST", "../sub_category/update_subcategory/", `${subCategoryDataObj}`);
        
                subCategoryUpdateDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);
                    document.getElementById("sub_cat_identification_id").value = document.getElementById("sub_cat_identification_id_two").value = document.getElementById("sub_cat_title").value = document.getElementById("sub_cat_image_name").value = "";
                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
            
        }
    
        })
      }
    }

/* Sub Category Insert Section End */

/* Sub Category Edit And Delete Section Start */

function edit_and_delete_of_subcat() {
   
        let responseObj = make_user_details("GET", "../sub_category/sub_cat_details/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);
        let table_datas = `<tr><th>S.NO</th>
        <th>SUB.CAT ID</th>
        <th>CAT ID</th>
        <th>TITLE</th>
        <th>ACTION</th></tr>`;
        for(let i = 0; i < resultData.length; i++) {
            
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].sub_cat_id}</td>
            <td>${resultData[i].cats_id}</td>
            <td>${resultData[i].subs_cat_title}</td>
            <td><button title="Edit" class="edit_button_of_table" onclick="editOfSpecSubCategory(${resultData[i].sub_cat_id})"><i class="fa fa-edit"></i></button> <button title="Delete" class="delete_button_of_table" onclick="deleteOfSpecSubCategory(${resultData[i].sub_cat_id})"><i class="fa fa-trash-o"></i></button></td></tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Sub Category Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

function editOfSpecSubCategory(sub_cat_id) {
    display_preLoader();
    let responseObj = make_user_details("GET", `../sub_category/specific_subcat_detail/subcat_id/${sub_cat_id}`, "");

    document.getElementsByClassName("add_sub_category_submition_btn2")[0].style.display = "inline-block";
    document.getElementsByClassName("add_sub_category_submition_btn")[0].style.display = "none";

   

    responseObj.then((resObj) => {
        unDisplay_preLoader();
       let SubcategoryData = JSON.parse(resObj);
        
       document.getElementById("cats_id").style.display = "none";
       document.getElementsByClassName("sub_cat_id_error_message_place")[0].style.display = "none";

        let appendedResultData = ``;
            appendedResultData+=`<option value=${SubcategoryData.sub_cat_id}>Db Value</option>`;
        document.getElementById("cats_id").innerHTML = appendedResultData;

        document.getElementById("sub_cat_title").value = SubcategoryData.subs_cat_title;
        document.getElementById("sub_cat_image_name").value = SubcategoryData.sub_cat_image_name; 
       
    })
    document.getElementsByClassName("form_title2")[0].innerHTML = "Sub Category Edit Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementsByClassName("add_sub_category_step1_container")[0].style.display = "block";
    display_blocked_containers("add_sub_category_step1_container"); 
}

document.getElementsByClassName("add_sub_category_submition_btn2")[0].addEventListener("click", function(event) {
   
    sub_category_submission_form(event, "update");
    });


function deleteOfSpecSubCategory(sub_cat_id) {
 
    let permission = confirm("Are you sure?");
    if(permission) {
        display_preLoader();
        let subCategoryDeleteReqObj = make_user_details("DELETE", `../sub_category/sub_category_deletion/subcat_id/${sub_cat_id}`, ``);
        subCategoryDeleteReqObj.then((deleteRes) => {
            unDisplay_preLoader();
            alert(deleteRes);
            view_sub_cat();
        }).catch((deleteErrRes) => {
            console.log(deleteErrRes);
        })
    }
}

/* Sub Category Edit And Delete Section End */

/* Sub Category End */

/* Brand And Item Section Start */

/* Brand And Item View Section Start */

function show_BandI() {
    let responseObj = make_user_details("GET", "../brand_and_items/b_and_i_details/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);
        let table_datas = `<tr><th>S.NO</th>
        <th>BRAND ID</th>
        <th>CAT ID</th>
        <th>SUB.CAT ID-1</th>
        <th>SUB.CAT ID-2</th>
        <th>SUB BRAND ID</th>
        <th>TITLE</th>
        <th>SUB TITLE-1</th>
        <th>SUB TITLE-2</th></tr>`;
        for(let i = 0; i < resultData.length; i++) {
            
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].brand_id}</td>
            <td>${resultData[i].cats_id}</td>
            <td>${resultData[i].subs_cat_identification_id}</td>
            <td>${resultData[i].subs_cat_identification_id_two}</td>
            <td>${resultData[i].b_and_i_identification_id}</td>
            <td>${resultData[i].b_title}</td>
            <td>${resultData[i].b_sub_title}</td>
            <td>${resultData[i].b_sub_title_two}</td>
            </tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Brand & Item Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

/* Brand And Item View Section End */

/* Brand And Item Insert Section Start */

function add_BandI() {
    document.getElementById("category_id").style.display = "inline-block";
   document.getElementsByClassName("category_id_error_message_place")[0].style.display = "inline-block";
   
    document.getElementById("sub_category_id").style.display = "none";
    document.getElementsByClassName("sub_category_id_error_message_place")[0].style.display = "none";
    display_preLoader();
    let retrieveAllCatDetails1 = make_user_details("GET", "../category/category_details/", "");

    retrieveAllCatDetails1.then((resData) => {
        unDisplay_preLoader();
     
        let resultData = JSON.parse(resData);
        let appendedResultData = `<option value="0">Select Category</option>`;
        for(let i = 0; i < resultData.length; i++) {
            appendedResultData+=`<option value=${resultData[i].cat_id}>${resultData[i].cat_title}</option>`;
        }
        appendedResultData+=`<option value="add_cat">Add New Category</option>`;
    document.getElementById("category_id").innerHTML = appendedResultData;

    
    document.getElementsByClassName("form_title3")[0].innerHTML = "Brand And Item Add Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementById("sub_cat_identification_id_2").value = document.getElementById("sub_cat_identification_id_two_2").value = document.getElementById("b_and_i_identification_id").value = document.getElementById("brand_name").value = document.getElementById("brand_sub_name1").value = document.getElementById("brand_sub_name2").value = "";
   
    document.getElementsByClassName("add_bandi_step1_container")[0].style.display = "block";
    display_blocked_containers("add_bandi_step1_container"); 
    document.getElementsByClassName("brand_and_item_submition_btn2")[0].style.display = "none";
    document.getElementsByClassName("brand_and_item_submition_btn")[0].style.display = "inline-block";

    
    }).catch((errData) => {
        console.log(errData);
    })
       
}

let sub_cats_id2 = 0;
let sub_cat_i_id_two = 0;

document.getElementById("sub_category_id").addEventListener("change", function() {

    if(this.value == 0) {
        document.getElementsByClassName("sub_category_id_error_message_place")[0].innerText = "Select Sub Category!";
        
    } else if(this.value == "add_subcat") {
        document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText = "";
        add_subcat();
      
    } else {

        sub_cat_identification_id = this.value;
        let input_id = {
            sub_cat_identification_id: sub_cat_identification_id
        }
     
        input_id = JSON.stringify(input_id);
      
        display_preLoader();
        let bAndICheckerRes = make_user_details("POST", "../brand_and_items/get_bandi_id/", `${input_id}`);
    
        
        bAndICheckerRes.then((response) => {
      
            let bAndIId = JSON.parse(response);
            let givenb_and_i_identification_id = bAndIId.b_and_i_identification_id;
            givenb_and_i_identification_id = (givenb_and_i_identification_id + "").split(".");
           let sendingb_and_i_identification_id = givenb_and_i_identification_id[0] + "." +(Number(givenb_and_i_identification_id[1])+1);
            
          if(bAndIId.b_and_i_identification_id) {
            document.getElementById("sub_cat_identification_id_2").value = sub_cat_identification_id;
            document.getElementById("sub_cat_identification_id_two_2").value = bAndIId.subs_cat_identification_id_two;
            document.getElementById("b_and_i_identification_id").value = sendingb_and_i_identification_id;
           
          } else {
              
            document.getElementById("sub_cat_identification_id_2").value = sub_cat_identification_id;
            document.getElementById("sub_cat_identification_id_two_2").value = Number(sub_cat_i_id_two) + 1;
            document.getElementById("b_and_i_identification_id").value = Number(sub_cat_i_id_two) + 0.1;
          
          }
       
           
            unDisplay_preLoader();
        }).catch((errData) => {
            console.log(errData);
        });

     
       
    }

})

document.getElementById("category_id").addEventListener("change" , function() {
    
    if(this.value == 0) {
        document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText = "Select Category!";
        document.getElementById("sub_category_id").style.display = "none";
        document.getElementsByClassName("sub_category_id_error_message_place")[0].style.display = "none";
        
    } else if(this.value == "add_cat") {
        document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText = "";
        add_cat();
      
    } else {

        let retrieveAllCatDetails2 = make_user_details("GET", `../sub_category/set_of_details/cats_id/${this.value}`, "");

    retrieveAllCatDetails2.then((resData) => {
        unDisplay_preLoader();
        let resultData = JSON.parse(resData);
        
        let appendedResultData = `<option value="0">Select Sub Category</option>`;
        for(let i = 0; i < resultData.length; i++) {
          
                appendedResultData+=`<option value=${resultData[i].sub_cat_identification_id}>${resultData[i].subs_cat_title}</option>`;
                sub_cat_i_id_two = resultData[i].sub_cat_identification_id_two;
           
        }
        appendedResultData+=`<option value="add_subcat">Add New Sub Category</option>`;
    document.getElementById("sub_category_id").innerHTML = appendedResultData;
    
    document.getElementById("sub_category_id").style.display = "inline-block";
    document.getElementsByClassName("sub_category_id_error_message_place")[0].style.display = "inline-block";
   

    }).catch((errData) => {
        console.log(errData);
    })
    document.getElementsByClassName("sub_cat_id_error_message_place")[0].innerText = "";
    }
   
});

document.getElementsByClassName("brand_and_item_submition_btn")[0].addEventListener("click", function(event) {
    brand_and_item_submission_form(event, "insert");    
});


function brand_and_item_submission_form(event, decisionPara) {
   
    event.preventDefault();
 
    let brand_id = 0;
   
    let cats_ids = document.getElementById("category_id").value;
    let sub_cat_identy_ids = document.getElementById("sub_cat_identification_id_2").value;
    if(decisionPara == "update") {
        brand_id = document.getElementById("brands_id").value;
        sub_cat_identy_ids = document.getElementById("sub_cat_identification_id_2").value;
    }
    let sub_cat_identy_ids_two = document.getElementById("sub_cat_identification_id_two_2").value;
    let b_and_i_ids = document.getElementById("b_and_i_identification_id").value;
    let b_titles = document.getElementById("brand_name").value;
    let b_sub_titles = document.getElementById("brand_sub_name1").value;
    let b_sub_title_two = document.getElementById("brand_sub_name2").value;
    
    b_titles = b_titles.replace(/\/+$/g, '');
    b_sub_titles = b_sub_titles.replace(/\/+$/g, '');
    b_sub_title_two = b_sub_title_two.replace(/\/+$/g, '');
    b_titles = b_titles.replace(/[^a-zA-Z0-9@.& ]/g, "");
    b_sub_titles = b_sub_titles.replace(/[^a-zA-Z0-9@. ]/g, "");
    b_sub_title_two = b_sub_title_two.replace(/[^a-zA-Z0-9@. ]/g, "");
    
    if(cats_ids == 0) {
        document.getElementsByClassName("category_id_error_message_place")[0].innerText = "Select Category!";
    } else {
        document.getElementsByClassName("category_id_error_message_place")[0].innerText = "";
    }
     if(decisionPara == "insert") {
        if(sub_cat_identy_ids == 0) {
            document.getElementsByClassName("sub_category_id_error_message_place")[0].innerText = "Select Sub Category!";
        } else {
            document.getElementsByClassName("sub_category_id_error_message_place")[0].innerText = "";
        }
     }
   
    if(b_titles == "") {
        document.getElementsByClassName("brand_name_error_message_place")[0].innerText = "Brand Name is required!";
    } else if(b_titles.length <= 5) {
        document.getElementsByClassName("brand_name_error_message_place")[0].innerText = "Brand Name length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("brand_name_error_message_place")[0].innerText = "";
    }
    if(b_sub_titles == "") {
        document.getElementsByClassName("brand_sub_name1_error_message_place")[0].innerText = "Brand Sub Name - 1 is required!";
    } else if(sub_cat_image_name.length <= 5) {
        document.getElementsByClassName("brand_sub_name1_error_message_place")[0].innerText = "Brand Sub Name - 1 length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("brand_sub_name1_error_message_place")[0].innerText = "";
    }
    if(b_sub_title_two == "") {
        document.getElementsByClassName("brand_sub_name2_error_message_place")[0].innerText = "Brand Sub Name - 2 is required!";
    } else if(sub_cat_image_name.length <= 5) {
        document.getElementsByClassName("brand_sub_name2_error_message_place")[0].innerText = "Brand Sub Name - 2 length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("brand_sub_name2_error_message_place")[0].innerText = "";
    }
   
    if((document.getElementsByClassName("category_id_error_message_place")[0].innerText == "") && (document.getElementsByClassName("sub_category_id_error_message_place")[0].innerText == "") && (document.getElementsByClassName("brand_name_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("brand_sub_name1_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("brand_sub_name2_error_message_place")[0].innerText == "")) {
    
        let b_and_i_DataObj = {
            b_titles: b_titles
        }
        b_and_i_DataObj = JSON.stringify(b_and_i_DataObj);
        display_preLoader();
        let bandiTitleCheckerRes = make_user_details("POST", "../brand_and_items/check_bandi_title/", `${b_and_i_DataObj}`);
    
        
        bandiTitleCheckerRes.then((response) => {
            unDisplay_preLoader();
            let avail_count = response;


            bandiDataObj = {
                brand_id: brand_id,
                cats_ids: cats_ids,
                sub_cat_identy_ids: sub_cat_identy_ids,
                sub_cat_identy_ids_two: sub_cat_identy_ids_two,
                b_and_i_ids: b_and_i_ids,
                b_titles: b_titles,
                b_sub_titles: b_sub_titles,
                b_sub_title_two: b_sub_title_two
            }
           
            bandiDataObj = JSON.stringify(bandiDataObj);
            
            
        if(avail_count == 0 && decisionPara == "insert") {
            document.getElementsByClassName("brand_name_error_message_place")[0].innerText = "";
            display_preLoader();
            if(decisionPara == "insert") {
                let bandiInsertDatasRes = make_user_details("POST", "../brand_and_items/insert_bandi_data/", `${bandiDataObj}`);
        
                bandiInsertDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);

                    document.getElementById("category_id").value = document.getElementById("sub_cat_identification_id_2").value = document.getElementById("sub_cat_identification_id_two_2").value = document.getElementById("b_and_i_identification_id").value = document.getElementById("brand_name").value = document.getElementById("brand_sub_name1").value = document.getElementById("brand_sub_name2").value= "";

                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
        } else {
            document.getElementsByClassName("brand_name_error_message_place")[0].innerText = "Brand Name already exits!";
        }
       
        if(decisionPara == "update") {
            if(avail_count > 1) {
                document.getElementsByClassName("brand_name_error_message_place")[0].innerText = "Brand Name already exits!";
            } else {
              
                document.getElementsByClassName("brand_name_error_message_place")[0].innerText = "";
                display_preLoader();
                let bAndIUpdateDatasRes = make_user_details("POST", "../brand_and_items/update_bandi/", `${bandiDataObj}`);
        
                bAndIUpdateDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);
                    document.getElementById("category_id").value = document.getElementById("sub_cat_identification_id_2").value = document.getElementById("sub_cat_identification_id_two_2").value = document.getElementById("b_and_i_identification_id").value = document.getElementById("brand_name").value = document.getElementById("brand_sub_name1").value = document.getElementById("brand_sub_name2").value= "";
                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
            
        }
    
        })
      }
    }


/* Brand And Item Insert Section End */

/* Brand And Item Update and Delete Section Start */

function edit_and_delete_of_bandi() {
   
    let responseObj = make_user_details("GET", "../brand_and_items/b_and_i_details/", "");
display_preLoader();
let totalC = 0;

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
  
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr><th>S.NO</th>
    <th>B&I ID</th>
    <th>B&I SUB ID</th>
    <th>TITLE</th>
    <th>SUB TITLE - 1</th>
    <th>SUB TITLE - 2</th>
    <th>ACTION</th></tr>`;
    for(let i = 0; i < resultData.length; i++) {
        
        table_datas+=`<tr>
        <td>${i+1}.</td>
        <td>${resultData[i].brand_id}</td>
        <td>${resultData[i].b_and_i_identification_id}</td>
        <td>${resultData[i].b_title}</td>
        <td>${resultData[i].b_sub_title}</td>
        <td>${resultData[i].b_sub_title_two}</td>
        <td><button title="Edit" class="edit_button_of_table" onclick="editOfSpecBAndI(${resultData[i].brand_id})"><i class="fa fa-edit"></i></button> <button title="Delete" class="delete_button_of_table" onclick="deleteOfSpecBAndI(${resultData[i].brand_id})"><i class="fa fa-trash-o"></i></button></td></tr>`;
        totalC = i;
    }
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Brand And Item Details";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

function editOfSpecBAndI(bandi_id) {
display_preLoader();
let responseObj = make_user_details("GET", `../brand_and_items/specific_bandi_detail/bandi_id/${bandi_id}`, "");

document.getElementsByClassName("brand_and_item_submition_btn2")[0].style.display = "inline-block";
document.getElementsByClassName("brand_and_item_submition_btn")[0].style.display = "none";



responseObj.then((resObj) => {
    unDisplay_preLoader();
   let bAndIData = JSON.parse(resObj);
    
   document.getElementById("category_id").style.display = "none";
   document.getElementsByClassName("category_id_error_message_place")[0].style.display = "none";
   document.getElementById("sub_category_id").style.display = "none";
   document.getElementsByClassName("sub_category_id_error_message_place")[0].style.display = "none";

let brandIdData = ``;
brandIdData+=`<option value=${bAndIData.brand_id}>Db Value</option>`;
document.getElementById("brands_id").innerHTML = brandIdData;
   
    let categoryData = ``;
    categoryData+=`<option value=${bAndIData.cats_id}>Db Value</option>`;
document.getElementById("category_id").innerHTML = categoryData;
let subCategoryData = ``;
subCategoryData+=`<option value=${bAndIData.subs_cat_identification_id}>Db Value</option>`;
document.getElementById("sub_category_id").innerHTML = subCategoryData;

    document.getElementById("b_and_i_identification_id").value = bAndIData.b_and_i_identification_id;
    document.getElementById("brand_name").value = bAndIData.b_title;
    document.getElementById("brand_sub_name1").value = bAndIData.b_sub_title;
    document.getElementById("brand_sub_name2").value = bAndIData.b_sub_title_two;
    
   
})
document.getElementsByClassName("form_title3")[0].innerHTML = "Brand & Items Edit Form";
undisplay_displayed_blocked_containers(); 
document.getElementsByClassName("add_bandi_step1_container")[0].style.display = "block";
display_blocked_containers("add_bandi_step1_container"); 
}

document.getElementsByClassName("brand_and_item_submition_btn2")[0].addEventListener("click", function(event) {

    brand_and_item_submission_form(event, "update");
});


function deleteOfSpecBAndI(brand_id) {

let permission = confirm("Are you sure?");
if(permission) {
    display_preLoader();
    let bAndIDeleteReqObj = make_user_details("DELETE", `../brand_and_items/bandi_deletion/brand_id/${brand_id}`, ``);
    bAndIDeleteReqObj.then((deleteRes) => {
        unDisplay_preLoader();
        alert(deleteRes);
        show_BandI();
    }).catch((deleteErrRes) => {
        console.log(deleteErrRes);
    })
}
}

/* Brand And Item Update and Delete Section End */

/* Brand And Item Section End */

/* Products Section Start */

/* Products View Section Start */

function show_products() {
    let responseObj = make_user_details("GET", "../products/product_details/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);
        let table_datas = `<tr><th>S.NO</th>
        <th>PRODUCT ID</th>
        <th>CAT ID</th>
        <th>SUB.CAT ID</th>
        <th>B & I ID</th>
        <th>PROD TITLE</th>
        <th>PROD IMAGE</th>
        <th>RATING</th>
        <th>ORIGINAL PRICE</th>
        <th>OFFER PRICE</th>
        <th>IS HOT DEAL PROD?</th></tr>`;
        for(let i = 0; i < resultData.length; i++) {
            let isHotDealProd = "";
            if(resultData[i].hot_deal_type == null) {
                isHotDealProd = "No";
            } else {
                isHotDealProd = "Yes";
            }
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].p_id}</td>
            <td>${resultData[i].cats_id}</td>
            <td>${resultData[i].subs_cat_identification_id}</td>
            <td>${resultData[i].b_and_i_identification_id}</td>
            <td>${resultData[i].p_title}</td>
            <td>${resultData[i].p_image}</td>
            <td>${resultData[i].p_star_rat}</td>
            <td>${resultData[i].p_o_price}</td>
            <td>${resultData[i].p_a_price}</td>
            <td>${isHotDealProd}</td>
            
            </tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Product Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

/* Products View Section End */

/* Product Add Section Start */
function add_product() {
    document.getElementById("categories_id").style.display = "inline-block";
    document.getElementsByClassName("categories_id_error_message_place")[0].style.display = "inline-block";
    
     document.getElementById("sub_categories_id").style.display = "none";
     document.getElementsByClassName("sub_categories_id_error_message_place")[0].style.display = "none";

     document.getElementById("bandi_id").style.display = "none";
     document.getElementsByClassName("bandi_id_error_message_place")[0].style.display = "none";
     display_preLoader();
     let retrieveAllCatDetails1 = make_user_details("GET", "../category/category_details/", "");
 
     retrieveAllCatDetails1.then((resData) => {
         unDisplay_preLoader();
      
         let resultData = JSON.parse(resData);
         let appendedResultData = `<option value="0">Select Category</option>`;
         for(let i = 0; i < resultData.length; i++) {
             appendedResultData+=`<option value=${resultData[i].cat_id}>${resultData[i].cat_title}</option>`;
            
         }
         appendedResultData+=`<option value="add_cat">Add New Category</option>`;
     document.getElementById("categories_id").innerHTML = appendedResultData;
 
     
     document.getElementsByClassName("form_title4")[0].innerHTML = "Product Add Form";
     undisplay_displayed_blocked_containers(); 
     document.getElementById("sub_cat_identification_id_3").value = document.getElementById("b_and_i_identification_id_3").value = document.getElementById("item_id").value = document.getElementById("prod_title").value = document.getElementById("prod_imagename").value = document.getElementById("rate_of_prod").value = document.getElementById("original_price").value = document.getElementById("offer_price").value = "";
    
     document.getElementsByClassName("add_product_step1_container")[0].style.display = "block";
     display_blocked_containers("add_product_step1_container"); 
     document.getElementsByClassName("product_submition_btn2")[0].style.display = "none";
     document.getElementsByClassName("product_submition_btn")[0].style.display = "inline-block";
 
     
     }).catch((errData) => {
         console.log(errData);
     })
}

let sub_cats_id3 = 0;
let sub_cat_i_id_two2 = 0;
let sub_cat_i_id_two3 = 0;


document.getElementById("sub_categories_id").addEventListener("change", function() {

    if(this.value == 0) {
        document.getElementsByClassName("sub_categories_id_error_message_place")[0].innerText = "Select Sub Category!";
        
    } else if(this.value == "add_subcat") {
        document.getElementsByClassName("sub_categories_id_error_message_place")[0].innerText = "";
        add_subcat();
      
    } else {

        let retrieveAllBandIDetails1 = make_user_details("GET", `../brand_and_items/set_of_details/sub_c_i_id_two/${this.value}`, "");

        retrieveAllBandIDetails1.then((resData) => {
            unDisplay_preLoader();
            let resultData = JSON.parse(resData);
            
            let appendedResultData = `<option value="0">Select Brand (OR) Item</option>`;
            for(let i = 0; i < resultData.length; i++) {
              
                    appendedResultData+=`<option value=${resultData[i].b_and_i_identification_id}>${resultData[i].b_title}</option>`;
                    sub_cat_i_id_two3 = resultData[i].subs_cat_identification_id_two;
                    sub_cats_id3 = resultData[i].subs_cat_identification_id;
                   
            }
            appendedResultData+=`<option value="add_BandI">Add New Brand (OR) Item</option>`;
        document.getElementById("bandi_id").innerHTML = appendedResultData;
        
        document.getElementById("bandi_id").style.display = "inline-block";
        document.getElementsByClassName("bandi_id_error_message_place")[0].style.display = "inline-block";
       
    
        }).catch((errData) => {
            console.log(errData);
        })
        document.getElementsByClassName("bandi_id_error_message_place")[0].innerText = "";

    }

})

document.getElementById("bandi_id").addEventListener("change", function() {
   
    if(this.value == 0) {
        document.getElementsByClassName("bandi_id_error_message_place")[0].innerText = "Select Brand (OR) Item!";
        
    } else if(this.value == "add_BandI") {
        document.getElementsByClassName("bandi_id_error_message_place")[0].innerText = "";
        add_BandI();
      
    } else {
      
        let brand_and_item_id = this.value;
        let input_id = {
            b_and_i_identification_id: brand_and_item_id,
            subs_cat_identification_id: sub_cats_id3
        }
        document.getElementById("b_and_i_identification_id_3").value = brand_and_item_id;
        input_id = JSON.stringify(input_id);
      
        display_preLoader();
        let bAndICheckerRes = make_user_details("POST", "../products/get_bandi_id/", `${input_id}`);
    
        
        bAndICheckerRes.then((response) => {
    //   console.log(response);
            let bAndIId = JSON.parse(response);
            let given_item_id = bAndIId.item_id;
            given_item_id = (given_item_id + "").split(".");
           let sending_item_id = given_item_id[0] + "." +(Number(given_item_id[1])+1);
           
            let new_item_id = bAndIId.max_val_of_item_id.items_id_count_val;
            new_item_id = (new_item_id + "").split(".");
            new_item_id = Number(new_item_id[0]);
           let newsending_item_id = (new_item_id+1) + ".1";
           
           document.getElementById("sub_cat_identification_id_3").value = bAndIId.subs_cat_identification_id;
           document.getElementById("item_id").value = sending_item_id;
          if(Number(bAndIId.subs_cat_identification_id)) {
            // console.log(document.getElementById("sub_cat_identification_id_3").value);
            // console.log(document.getElementById("b_and_i_identification_id_3").value);
            // console.log(document.getElementById("item_id").value);
            // console.log(sub_cats_id3);
          } else {
            sending_item_id = newsending_item_id;
            document.getElementById("sub_cat_identification_id_3").value = sub_cats_id3;
            console.log(sub_cats_id3);
            document.getElementById("item_id").value = sending_item_id;
          
            // console.log(document.getElementById("sub_cat_identification_id_3").value);
            // console.log(document.getElementById("b_and_i_identification_id_3").value);
            // console.log(document.getElementById("item_id").value);
          }
          document.getElementById("item_id").value = sending_item_id;
        
           
            unDisplay_preLoader();
        }).catch((errData) => {
            console.log(errData);
        });

     
       
    }

})

document.getElementById("categories_id").addEventListener("change" , function() {
    
    if(this.value == 0) {
        document.getElementsByClassName("categories_id_error_message_place")[0].innerText = "Select Category!";
        document.getElementById("sub_categories_id").style.display = "none";
        document.getElementsByClassName("sub_categories_id_error_message_place")[0].style.display = "none";
        
    } else if(this.value == "add_cat") {
        document.getElementsByClassName("categories_id_error_message_place")[0].innerText = "";
        add_cat();
      
    } else {

        let retrieveAllCatDetails2 = make_user_details("GET", `../sub_category/set_of_details/cats_id/${this.value}`, "");

    retrieveAllCatDetails2.then((resData) => {
        unDisplay_preLoader();
        let resultData = JSON.parse(resData);
        
        let appendedResultData = `<option value="0">Select Sub Category</option>`;
        for(let i = 0; i < resultData.length; i++) {
          
                appendedResultData+=`<option value=${resultData[i].sub_cat_identification_id_two}>${resultData[i].subs_cat_title}</option>`;
                sub_cat_i_id_two2 = resultData[i].sub_cat_identification_id_two;
                
           
        }
        appendedResultData+=`<option value="add_subcat">Add New Sub Category</option>`;
    document.getElementById("sub_categories_id").innerHTML = appendedResultData;
    
    document.getElementById("sub_categories_id").style.display = "inline-block";
    document.getElementsByClassName("sub_categories_id_error_message_place")[0].style.display = "inline-block";
   

    }).catch((errData) => {
        console.log(errData);
    })
    document.getElementsByClassName("sub_categories_id_error_message_place")[0].innerText = "";
    }
   
});

document.getElementsByClassName("product_submition_btn")[0].addEventListener("click", function(event) {
    product_submission_form(event, "insert");    
});


function product_submission_form(event, decisionPara) {
   
    event.preventDefault();
 
    let prod_id = 0;
   
    let categories_id = document.getElementById("categories_id").value;
    let sub_categories_id = document.getElementById("sub_cat_identification_id_3").value;
    if(decisionPara == "update") {
        prod_id = document.getElementById("prod_id").value;
    }
    
    let b_and_i_ids = document.getElementById("b_and_i_identification_id_3").value;
    let item_id = document.getElementById("item_id").value;
    let prod_title = document.getElementById("prod_title").value;
    let prod_imagename = document.getElementById("prod_imagename").value;
    let rate_of_prod = document.getElementById("rate_of_prod").value;
    let original_price = document.getElementById("original_price").value;
    let offer_price = document.getElementById("offer_price").value;
    let hot_deal_radio_btn = document.querySelector('input[name="hot_deal_pro"]:checked').value;
    
    prod_title = prod_title.replace(/\/+$/g, '');
    prod_imagename = prod_imagename.replace(/\/+$/g, '');
    rate_of_prod = rate_of_prod.replace(/\/+$/g, '');
    original_price = original_price.replace(/\/+$/g, '');
    offer_price = offer_price.replace(/\/+$/g, '');
    hot_deal_radio_btn = hot_deal_radio_btn.replace(/\/+$/g, '');
   // console.log(prod_title);
    // prod_title = prod_title.replace(/[^a-zA-Z0-9@).-,|+"'(& ]/g, "");
    prod_imagename = prod_imagename.replace(/[^a-zA-Z0-9@. ]/g, "");
    rate_of_prod = rate_of_prod.replace(/[^a-zA-Z0-9@. ]/g, "");
    original_price = original_price.replace(/[^a-zA-Z0-9@.& ]/g, "");
    offer_price = offer_price.replace(/[^a-zA-Z0-9@. ]/g, "");
    hot_deal_radio_btn = hot_deal_radio_btn.replace(/[^a-zA-Z0-9@. ]/g, "");
    //console.log(prod_title);

    
    
     if(decisionPara == "insert") {
        if(categories_id == 0) {
            document.getElementsByClassName("categories_id_error_message_place")[0].innerText = "Select Category!";
        } else {
            document.getElementsByClassName("categories_id_error_message_place")[0].innerText = "";
        }
        if(sub_categories_id == 0) {
            document.getElementsByClassName("sub_categories_id_error_message_place")[0].innerText = "Select Sub Category!";
        } else {
            document.getElementsByClassName("sub_categories_id_error_message_place")[0].innerText = "";
        }
        if(bandi_id == 0) {
            document.getElementsByClassName("bandi_id_error_message_place")[0].innerText = "Select Brand (OR) Item!";
        } else {
            document.getElementsByClassName("bandi_id_error_message_place")[0].innerText = "";
        }
     }
     
   
    if(prod_title == "") {
        document.getElementsByClassName("prod_title_error_message_place")[0].innerText = "Product title is required!";
    } else if(prod_title.length <= 5) {
        document.getElementsByClassName("prod_title_error_message_place")[0].innerText = "Product title length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("prod_title_error_message_place")[0].innerText = "";
    }
    if(prod_imagename == "") {
        document.getElementsByClassName("prod_imagename_error_message_place")[0].innerText = "Product imagename is required!";
    } else if(prod_imagename.length <= 5) {
        document.getElementsByClassName("prod_imagename_error_message_place")[0].innerText = "Product imagename length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("prod_imagename_error_message_place")[0].innerText = "";
    }
    if(rate_of_prod == "") {
        document.getElementsByClassName("rate_of_prod_error_message_place")[0].innerText = "Rating of product is required!";
    } else if(rate_of_prod.length < 1) {
        document.getElementsByClassName("rate_of_prod_error_message_place")[0].innerText = "Rating of product length must be equal 1 characters!";
    } else {
        document.getElementsByClassName("rate_of_prod_error_message_place")[0].innerText = "";
    }
    if(original_price == "") {
        document.getElementsByClassName("original_price_error_message_place")[0].innerText = "Product original price is required!";
    } else if(original_price.length <= 2) {
        document.getElementsByClassName("original_price_error_message_place")[0].innerText = "Product original price length must be minimum 2 characters!";
    } else {
        document.getElementsByClassName("original_price_error_message_place")[0].innerText = "";
    }
    if(offer_price == "") {
        document.getElementsByClassName("offer_price_error_message_place")[0].innerText = "Product offer price is required!";
    } else if(offer_price.length <= 2) {
        document.getElementsByClassName("offer_price_error_message_place")[0].innerText = "Product offer price length must be minimum 2 characters!";
    } else {
        document.getElementsByClassName("offer_price_error_message_place")[0].innerText = "";
    }
   
    if((document.getElementsByClassName("categories_id_error_message_place")[0].innerText == "") && (document.getElementsByClassName("sub_categories_id_error_message_place")[0].innerText == "") && (document.getElementsByClassName("bandi_id_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("prod_title_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("prod_imagename_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("rate_of_prod_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("original_price_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("offer_price_error_message_place")[0].innerText == "")) {
    
        let prodTitleDataObj = {
            prod_title: prod_title
        }
        prodTitleDataObj = JSON.stringify(prodTitleDataObj);
        display_preLoader();
        let prodTitleCheckerRes = make_user_details("POST", "../products/check_prod_title/", `${prodTitleDataObj}`);
    
        
        prodTitleCheckerRes.then((response) => {
            unDisplay_preLoader();
            let avail_count = response;
          
            prodDataObj = {
                prod_id: prod_id,
                categories_id: categories_id,
                sub_categories_id: sub_categories_id,
                b_and_i_ids: b_and_i_ids,
                item_id: item_id,
                prod_title: prod_title,
                prod_imagename: prod_imagename,
                rate_of_prod: rate_of_prod,
                original_price: original_price,
                offer_price: offer_price,
                hot_deal_radio_btn: hot_deal_radio_btn
            }
           
            prodDataObj = JSON.stringify(prodDataObj);
          
            
        if(avail_count == 0 && decisionPara == "insert") {
            document.getElementsByClassName("prod_title_error_message_place")[0].innerText = "";
            display_preLoader();
            if(decisionPara == "insert") {
                let bandiInsertDatasRes = make_user_details("POST", "../products/insert_prod_data/", `${prodDataObj}`);
        
                bandiInsertDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);

                    document.getElementById("categories_id").value = document.getElementById("sub_cat_identification_id_3").value = document.getElementById("b_and_i_identification_id_3").value = document.getElementById("item_id").value = document.getElementById("prod_title").value = document.getElementById("prod_imagename").value = document.getElementById("rate_of_prod").value = document.getElementById("original_price").value = document.getElementById("offer_price").value= "";

                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
        } else {
            document.getElementsByClassName("prod_title_error_message_place")[0].innerText = "Product title already exits!";
        }
       
        if(decisionPara == "update") {
            if(avail_count > 1) {
                document.getElementsByClassName("prod_title_error_message_place")[0].innerText = "Product already exits!";
            } else {
              
                document.getElementsByClassName("prod_title_error_message_place")[0].innerText = "";
                display_preLoader();
                let prodUpdateDatasRes = make_user_details("POST", "../products/update_product/", `${prodDataObj}`);
        
                prodUpdateDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);
                    document.getElementById("prod_id").value = document.getElementById("prod_title").value = document.getElementById("prod_imagename").value = document.getElementById("rate_of_prod").value = document.getElementById("original_price").value = document.getElementById("offer_price").value =  "";
                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
            
        }
    
        })
      }
    }



/* Product Add Section End */

/* Product Update And Delete Section Start */

function edit_and_delete_of_product() {
   
    let responseObj = make_user_details("GET", "../products/product_details/", "");
display_preLoader();
let totalC = 0;

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
  
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr>
    <th>S.NO</th>
    <th>PRODUCT ID</th>
    <th>PROD TITLE</th>
    <th>PROD IMAGE</th>
    <th>OFFER PRICE</th>
    <th>IS HOT DEAL PROD?</th>
    <th>ACTION</th>
    </tr>`;
    for(let i = 0; i < resultData.length; i++) {
        let isHotDealProd = "";
            if(resultData[i].hot_deal_type == null) {
                isHotDealProd = "No";
            } else {
                isHotDealProd = "Yes";
            }
        table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].p_id}</td>
            <td>${resultData[i].p_title}</td>
            <td>${resultData[i].p_image}</td>
            <td>${resultData[i].p_a_price}</td>
            <td>${isHotDealProd}</td>
        <td><button title="Edit" class="edit_button_of_table" onclick="editOfSpecProd(${resultData[i].p_id})"><i class="fa fa-edit"></i></button> <button title="Delete" class="delete_button_of_table" onclick="deleteOfSpecProd(${resultData[i].p_id})"><i class="fa fa-trash-o"></i></button></td></tr>`;
        totalC = i;
    }
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Product Details";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

function editOfSpecProd(p_id) {
display_preLoader();
let responseObj = make_user_details("GET", `../products/specific_product_detail/p_id/${p_id}`, "");

document.getElementsByClassName("product_submition_btn2")[0].style.display = "inline-block";
document.getElementsByClassName("product_submition_btn")[0].style.display = "none";



responseObj.then((resObj) => {
    unDisplay_preLoader();
   let prodData = JSON.parse(resObj);
    
   document.getElementById("categories_id").style.display = "none";
   document.getElementsByClassName("categories_id_error_message_place")[0].style.display = "none";
   document.getElementById("sub_categories_id").style.display = "none";
   document.getElementsByClassName("sub_categories_id_error_message_place")[0].style.display = "none";
   document.getElementById("bandi_id").style.display = "none";
   document.getElementsByClassName("bandi_id_error_message_place")[0].style.display = "none";

let prodsData = ``;
prodsData+=`<option value=${prodData.p_id}>Db Value</option>`;
document.getElementById("prod_id").innerHTML = prodsData;
   
    document.getElementById("prod_title").value = prodData.p_title;
    document.getElementById("prod_imagename").value = prodData.p_image;
    document.getElementById("rate_of_prod").value = prodData.p_star_rat;
    document.getElementById("original_price").value = prodData.p_a_price;
    document.getElementById("offer_price").value = prodData.p_o_price;
    if(prodData.hot_deal_type == "yes") {
        document.getElementById("hot_deal_prod_yes").checked = true;
    } else {
        document.getElementById("hot_deal_prod_no").checked = true;
    }
    
})
document.getElementsByClassName("form_title4")[0].innerHTML = "Products Edit Form";
undisplay_displayed_blocked_containers(); 
document.getElementsByClassName("add_product_step1_container")[0].style.display = "block";
display_blocked_containers("add_product_step1_container"); 
}

document.getElementsByClassName("product_submition_btn2")[0].addEventListener("click", function(event) {

    product_submission_form(event, "update");
});


function deleteOfSpecProd(p_id) {

let permission = confirm("Are you sure?");
if(permission) {
    display_preLoader();
    let prodDeleteReqObj = make_user_details("DELETE", `../products/product_deletion/p_id/${p_id}`, ``);
    prodDeleteReqObj.then((deleteRes) => {
        unDisplay_preLoader();
        alert(deleteRes);
        show_products();
    }).catch((deleteErrRes) => {
        console.log(deleteErrRes);
    })
}
}

/* Product Update And Delete Section Start */

/* Products Section End */

/* Sub Products Section Start */

/* Sub Products View Section Start */

function show_sub_prods() {
    let responseObj = make_user_details("GET", "../sub_products/show_subprods/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);
        let table_datas = `<tr><th>S.NO</th>
        <th>PROD.SUB ID</th>
        <th>PROD ID</th>
        <th>MAIN IMAGE NAME</th>
        <th>SUB IMAGE NAME - 1</th>
        <th>SUB IMAGE NAME - 2</th>
        <th>SUB IMAGE NAME - 3</th>
        <th>AVAILABILITY</th>
        <th>PROD TAG 1</th>
        <th>PROD TAG 2</th>
        <th>PROD TAG 3</th>
        <th>PROD DESCRIPTION</th></tr>`;
        for(let i = 0; i < resultData.length; i++) {
            
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].products_sub_id}</td>
            <td>${resultData[i].p_id}</td>
            <td>${resultData[i].p_image}</td>
            <td>${resultData[i].p_s_image1}</td>
            <td>${resultData[i].p_s_image2}</td>
            <td>${resultData[i].p_s_image3}</td>
            <td>${resultData[i].p_avail}</td>
            <td>${resultData[i].p_tags1}</td>
            <td>${resultData[i].p_tags2}</td>
            <td>${resultData[i].p_tags3}</td>
            <td>${resultData[i].p_desc}</td>
            </tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Sub Product Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

/* Sub Products View Section End */

/* Sub Products Add Section Start */

function add_sub_prods() {
    document.getElementById("pro_id").style.display = "inline-block";
    document.getElementsByClassName("pro_id_error_message_place")[0].style.display = "inline-block";
    display_preLoader();
    let retrieveAllSubProdDetails = make_user_details("GET", "../products/product_details/", "");

    retrieveAllSubProdDetails.then((resData) => {
        unDisplay_preLoader();
     
        let resultData = JSON.parse(resData);
        let appendedResultData = `<option value="0">Select Product</option>`;
        for(let i = 0; i < resultData.length; i++) {
            appendedResultData+=`<option value=${resultData[i].p_id}>${resultData[i].p_id} - ${resultData[i].p_title}</option>`;
        }
        appendedResultData+=`<option value="add_prod">Add New Product</option>`;
    document.getElementById("pro_id").innerHTML = appendedResultData;
    
    document.getElementsByClassName("form_title5")[0].innerHTML = "Sub Product Add Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementById("sub_pro_id").value = document.getElementById("main_image_name").value = document.getElementById("sub_image_name1").value = document.getElementById("sub_image_name2").value = document.getElementById("sub_image_name3").value = document.getElementById("availability").value = document.getElementById("prod_tag1").value = document.getElementById("prod_tag2").value = document.getElementById("prod_tag3").value = document.getElementById("prod_tag3").value = document.getElementById("prod_desc").value = "";
    document.getElementsByClassName("add_sub_prod_submition_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_sub_prod_step1_container")[0].style.display = "block";
    display_blocked_containers("add_sub_prod_step1_container"); 
    document.getElementsByClassName("add_sub_prod_submition_btn2")[0].style.display = "none";

     }).catch((errData) => {
        console.log(errData);
    })
       
}

let prod_id = 0;

document.getElementById("pro_id").addEventListener("change" , function() {
    
    if(this.value == 0) {
        document.getElementsByClassName("pro_id_error_message_place")[0].innerText = "Select Product!";
    } else if(this.value == "add_prod") {
        document.getElementsByClassName("pro_id_error_message_place")[0].innerText = "";
        add_product();
      
    } else {
        document.getElementsByClassName("pro_id_error_message_place")[0].innerText = "";
        prod_id = this.value;
        input_id = {
            prods_id: prod_id
        }
     
        input_id = JSON.stringify(input_id);
        display_preLoader();
        let subProdImageCheckerRes = make_user_details("POST", "../sub_products/get_sub_prod_id/", `${input_id}`);
    
        
        subProdImageCheckerRes.then((response) => {
       
            let subProdImageCheckRes = JSON.parse(response);
         if(subProdImageCheckRes >=1) {
            document.getElementsByClassName("pro_id_error_message_place")[0].innerText = "Product's sub details already exits!";
         } else {
            document.getElementsByClassName("pro_id_error_message_place")[0].innerText = "";
         }
            
            unDisplay_preLoader();
        }).catch((errData) => {
            console.log(errData);
        });
    }
   
});

document.getElementsByClassName("add_sub_prod_submition_btn")[0].addEventListener("click", function(event) {
    sub_product_submission_form(event, "insert");    
});

function sub_product_submission_form(event, decisionPara) {
   
    event.preventDefault();
 
    let sub_pro_id = 0;
   
    let products_id = document.getElementById("pro_id").value;
   
    if(decisionPara == "update") {
        sub_pro_id = document.getElementById("sub_pro_id").value;
    }
    
    let main_image_name = document.getElementById("main_image_name").value;
    let sub_image_name1 = document.getElementById("sub_image_name1").value;
    let sub_image_name2 = document.getElementById("sub_image_name2").value;
    let sub_image_name3 = document.getElementById("sub_image_name3").value;
    let availability = document.getElementById("availability").value;
    let prod_tag1 = document.getElementById("prod_tag1").value;
    let prod_tag2 = document.getElementById("prod_tag2").value;
    let prod_tag3 = document.getElementById("prod_tag3").value;
    let prod_desc = document.getElementById("prod_desc").value;

    main_image_name = main_image_name.replace(/\/+$/g, '');
    sub_image_name1 = sub_image_name1.replace(/\/+$/g, '');
    sub_image_name2 = sub_image_name2.replace(/\/+$/g, '');
    sub_image_name3 = sub_image_name3.replace(/\/+$/g, '');
    availability = availability.replace(/\/+$/g, '');
    prod_tag1 = prod_tag1.replace(/\/+$/g, '');
    prod_tag2 = prod_tag2.replace(/\/+$/g, '');
    prod_tag3 = prod_tag3.replace(/\/+$/g, '');
    prod_desc = prod_desc.replace(/\/+$/g, '');
   // console.log(prod_title);
    // prod_title = prod_title.replace(/[^a-zA-Z0-9@).-,|+"'(& ]/g, "");
    main_image_name = main_image_name.replace(/[^a-zA-Z0-9@. ]/g, "");
    sub_image_name1 = sub_image_name1.replace(/[^a-zA-Z0-9@. ]/g, "");
    sub_image_name2 = sub_image_name2.replace(/[^a-zA-Z0-9@. ]/g, "");
    sub_image_name3 = sub_image_name3.replace(/[^a-zA-Z0-9@. ]/g, "");
    availability = availability.replace(/[^a-zA-Z0-9@. ]/g, "");
    prod_tag1 = prod_tag1.replace(/[^a-zA-Z0-9@. ]/g, "");
    prod_tag2 = prod_tag2.replace(/[^a-zA-Z0-9@. ]/g, "");
    prod_tag3 = prod_tag3.replace(/[^a-zA-Z0-9@. ]/g, "");
    prod_desc = prod_desc.replace(/[^a-zA-Z0-9@. ]/g, "");
    //console.log(prod_title);

    
    
     if(decisionPara == "insert") {
        if(products_id == 0) {
            document.getElementsByClassName("pro_id_error_message_place")[0].innerText = "Select Product!";
        } else {
            if(document.getElementsByClassName("pro_id_error_message_place")[0].value == "") {
                document.getElementsByClassName("pro_id_error_message_place")[0].innerText = "";
            }
            
        }
     }
     
   
    if(main_image_name == "") {
        document.getElementsByClassName("main_image_name_error_message_place")[0].innerText = "Main image name is required!";
    } else if(main_image_name.length <= 5) {
        document.getElementsByClassName("main_image_name_error_message_place")[0].innerText = "Main image name length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("main_image_name_error_message_place")[0].innerText = "";
    }
    if(sub_image_name1 == "") {
        document.getElementsByClassName("sub_image_name1_error_message_place")[0].innerText = "Sub image name 1 is required!";
    } else if(sub_image_name1.length <= 5) {
        document.getElementsByClassName("sub_image_name1_error_message_place")[0].innerText = "Sub image name 1 length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("sub_image_name1_error_message_place")[0].innerText = "";
    }
    if(sub_image_name2 == "") {
        document.getElementsByClassName("sub_image_name2_error_message_place")[0].innerText = "Sub image name 2 is required!";
    } else if(sub_image_name2.length <= 5) {
        document.getElementsByClassName("sub_image_name2_error_message_place")[0].innerText = "Sub image name 2 length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("sub_image_name2_error_message_place")[0].innerText = "";
    }
    if(sub_image_name3 == "") {
        document.getElementsByClassName("sub_image_name3_error_message_place")[0].innerText = "Sub image name 3 is required!";
    } else if(sub_image_name3.length <= 5) {
        document.getElementsByClassName("sub_image_name3_error_message_place")[0].innerText = "Sub image name 3 length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("sub_image_name3_error_message_place")[0].innerText = "";
    }
    if(availability == "") {
        document.getElementsByClassName("availability_error_message_place")[0].innerText = "Product availability detail is required!";
    } else if(availability.length <= 5) {
        document.getElementsByClassName("availability_error_message_place")[0].innerText = "Product availability detail length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("availability_error_message_place")[0].innerText = "";
    }
    if(prod_tag1 == "") {
        document.getElementsByClassName("prod_tag1_error_message_place")[0].innerText = "Product tag 1 is required!";
    } else if(prod_tag1.length <= 5) {
        document.getElementsByClassName("prod_tag1_error_message_place")[0].innerText = "Product tag 1 length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("prod_tag1_error_message_place")[0].innerText = "";
    }
    if(prod_tag2 == "") {
        document.getElementsByClassName("prod_tag2_error_message_place")[0].innerText = "Product tag 2 is required!";
    } else if(prod_tag2.length <= 5) {
        document.getElementsByClassName("prod_tag2_error_message_place")[0].innerText = "Product tag 2 length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("prod_tag2_error_message_place")[0].innerText = "";
    }
    if(prod_tag3 == "") {
        document.getElementsByClassName("prod_tag3_error_message_place")[0].innerText = "Product tag 3 is required!";
    } else if(prod_tag3.length <= 5) {
        document.getElementsByClassName("prod_tag3_error_message_place")[0].innerText = "Product tag 3 length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("prod_tag3_error_message_place")[0].innerText = "";
    }
    if(prod_desc == "") {
        document.getElementsByClassName("prod_desc_error_message_place")[0].innerText = "Product Description is required!";
    } else if(prod_desc.length <= 24) {
        document.getElementsByClassName("prod_desc_error_message_place")[0].innerText = "Product Description length must be minimum 25 characters!";
    } else {
        document.getElementsByClassName("prod_desc_error_message_place")[0].innerText = "";
    }
   
    if((document.getElementsByClassName("pro_id_error_message_place")[0].innerText == "") && (document.getElementsByClassName("main_image_name_error_message_place")[0].innerText == "") && (document.getElementsByClassName("sub_image_name1_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("sub_image_name2_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("sub_image_name3_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("availability_error_message_place")[0].innerText == "")  && (document.getElementsByClassName("prod_tag1_error_message_place")[0].innerText == "") && (document.getElementsByClassName("prod_tag2_error_message_place")[0].innerText == "") && (document.getElementsByClassName("prod_tag3_error_message_place")[0].innerText == "") && (document.getElementsByClassName("prod_desc_error_message_place")[0].innerText == "")) {
    
        let prodMainImageNameDataObj = {
            main_image_name: main_image_name
        }
        prodMainImageNameDataObj = JSON.stringify(prodMainImageNameDataObj);
        display_preLoader();
        let prodMainImageNameCheckerRes = make_user_details("POST", "../sub_products/check_prod_main_name/", `${prodMainImageNameDataObj}`);
    
        
        prodMainImageNameCheckerRes.then((response) => {
            unDisplay_preLoader();
            let avail_count = response;

            subProdDataObj = {
                sub_pro_id: sub_pro_id,
                products_id: products_id,
                main_image_name: main_image_name,
                sub_image_name1: sub_image_name1,
                sub_image_name2: sub_image_name2,
                sub_image_name3: sub_image_name3,
                availability: availability,
                prod_tag1: prod_tag1,
                prod_tag2: prod_tag2,
                prod_tag3: prod_tag3,
                prod_desc: prod_desc
            }
           
            subProdDataObj = JSON.stringify(subProdDataObj);
          
            
        if(avail_count == 0 && decisionPara == "insert") {
           
            document.getElementsByClassName("main_image_name_error_message_place")[0].innerText = "";
            display_preLoader();
            if(decisionPara == "insert") {
                let prodSubInsertDatasRes = make_user_details("POST", "../sub_products/insert_subprod_data/", `${subProdDataObj}`);
        
                prodSubInsertDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);

                    document.getElementById("pro_id").value = document.getElementById("main_image_name").value = document.getElementById("sub_image_name1").value = document.getElementById("sub_image_name2").value = document.getElementById("sub_image_name3").value = document.getElementById("availability").value = document.getElementById("prod_tag1").value = document.getElementById("prod_tag2").value = document.getElementById("prod_tag3").value  = document.getElementById("prod_desc").value = "";

                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
        } else {
            document.getElementsByClassName("main_image_name_error_message_place")[0].innerText = "Main image name already exits!";
        }
       
        if(decisionPara == "update") {
            if(avail_count > 1) {
                document.getElementsByClassName("main_image_name_error_message_place")[0].innerText = "Main image name already exits!";
            } else {
              
                document.getElementsByClassName("main_image_name_error_message_place")[0].innerText = "";
                display_preLoader();
                let subProdUpdateDatasRes = make_user_details("POST", "../sub_products/update_sub_product/", `${subProdDataObj}`);
        
                subProdUpdateDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);
                    document.getElementById("sub_pro_id").value = document.getElementById("main_image_name").value = document.getElementById("sub_image_name1").value = document.getElementById("sub_image_name2").value = document.getElementById("sub_image_name3").value = document.getElementById("availability").value = document.getElementById("prod_tag1").value = document.getElementById("prod_tag2").value = document.getElementById("prod_tag3").value  = document.getElementById("prod_desc").value = "";

                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
            
        }
    
        })
      }
    }

    

/* Sub Products Add Section End */

/* Sub Products Edit And Delete Section Start */

function edit_and_delete_of_sub_product() {
   
    let responseObj = make_user_details("GET", "../sub_products/show_subprods/", "");
display_preLoader();
let totalC = 0;

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
  
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr>
        <th>S.NO</th>
        <th>PROD.SUB ID</th>
        <th>MAIN IMAGE NAME</th>
        <th>AVAILABILITY</th>
        <th>PROD TAG 1</th>
        <th>PROD TAG 2</th>
        <th>PROD TAG 3</th>
        <th>ACTION</th>
    </tr>`;
    for(let i = 0; i < resultData.length; i++) {
       
        table_datas+=`<tr>
        <td>${i+1}.</td>
        <td>${resultData[i].products_sub_id}</td>
        <td>${resultData[i].p_image}</td>
        <td>${resultData[i].p_avail}</td>
        <td>${resultData[i].p_tags1}</td>
        <td>${resultData[i].p_tags2}</td>
        <td>${resultData[i].p_tags3}</td>
        <td><button title="Edit" class="edit_button_of_table" onclick="editOfSpecSubProd(${resultData[i].products_sub_id})"><i class="fa fa-edit"></i></button> <button title="Delete" class="delete_button_of_table" onclick="deleteOfSpecSubProd(${resultData[i].products_sub_id})"><i class="fa fa-trash-o"></i></button></td></tr>`;
        totalC = i;
    }
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Sub Product Details";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

function editOfSpecSubProd(products_sub_id) {
display_preLoader();
let responseObj = make_user_details("GET", `../sub_products/specific_subproduct_detail/sub_pro_id/${products_sub_id}`, "");

document.getElementsByClassName("add_sub_prod_submition_btn2")[0].style.display = "inline-block";
document.getElementsByClassName("add_sub_prod_submition_btn")[0].style.display = "none";



responseObj.then((resObj) => {
    unDisplay_preLoader();
   let subProdData = JSON.parse(resObj);
    
   document.getElementById("pro_id").style.display = "none";
   document.getElementsByClassName("pro_id_error_message_place")[0].style.display = "none";
   document.getElementsByClassName("pro_id_error_message_place")[0].innerText = "";

let subProdsDatas = ``;
subProdsDatas+=`<option value=${subProdData.products_sub_id}>Db Value</option>`;
document.getElementById("sub_pro_id").innerHTML = subProdsDatas;
   
    document.getElementById("main_image_name").value = subProdData.p_image;
    document.getElementById("sub_image_name1").value = subProdData.p_s_image1;
    document.getElementById("sub_image_name2").value = subProdData.p_s_image2;
    document.getElementById("sub_image_name3").value = subProdData.p_s_image3;
    document.getElementById("availability").value = subProdData.p_avail;
    document.getElementById("prod_tag1").value = subProdData.p_tags1;
    document.getElementById("prod_tag2").value = subProdData.p_tags2;
    document.getElementById("prod_tag3").value = subProdData.p_tags3;
    document.getElementById("prod_desc").value = subProdData.p_desc;
   
    
})
document.getElementsByClassName("form_title5")[0].innerHTML = "Sub Products Edit Form";
undisplay_displayed_blocked_containers(); 
document.getElementsByClassName("add_sub_prod_step1_container")[0].style.display = "block";
display_blocked_containers("add_sub_prod_step1_container"); 
}

document.getElementsByClassName("add_sub_prod_submition_btn2")[0].addEventListener("click", function(event) {

    sub_product_submission_form(event, "update");
});


function deleteOfSpecSubProd(products_sub_id) {

let permission = confirm("Are you sure?");
if(permission) {
    display_preLoader();
    let prodDeleteReqObj = make_user_details("DELETE", `../sub_products/sub_product_deletion/sub_pro_id/${products_sub_id}`, ``);
    prodDeleteReqObj.then((deleteRes) => {
        unDisplay_preLoader();
        alert(deleteRes);
        show_sub_prods();
    }).catch((deleteErrRes) => {
        console.log(deleteErrRes);
    })
}
}


/* Sub Products Edit And Delete Section End*/

/* Sub Products Section End */

/* Product Specification Start */

/* Product Specification View Section Start */

function show_prod_specs() {
    let responseObj = make_user_details("GET", "../prods_specification/show_prod_spec/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);
        let table_datas = `<tr><th>S.NO</th>
        <th>PROD.SPEC ID</th>
        <th>PROD ID</th>
        <th>SPEC NAME</th>
        <th>SPEC VALUE</th></tr>`;
        for(let i = 0; i < resultData.length; i++) {
            
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].p_spec_id}</td>
            <td>${resultData[i].p_id}</td>
            <td>${resultData[i].p_spec_title} <h3 style='display: inline-block'>:</h3></td>
            <td>${resultData[i].p_spec_details}</td>
            </tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Product Specification Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

/* Product Specification View Section End */

/* Product Specification Add Section Start */

function add_prod_specs() {
    document.getElementById("produc_id").style.display = "inline-block";
    document.getElementsByClassName("produc_id_error_message_place")[0].style.display = "inline-block";
    display_preLoader();
    let retrieveAllProdDetails = make_user_details("GET", "../products/product_details/", "");

    retrieveAllProdDetails.then((resData) => {
        unDisplay_preLoader();
     
        let resultData = JSON.parse(resData);
        let appendedResultData = `<option value="0">Select Product</option>`;
        for(let i = 0; i < resultData.length; i++) {
            appendedResultData+=`<option value=${resultData[i].p_id}>${resultData[i].p_id} - ${resultData[i].p_title}</option>`;
        }
        appendedResultData+=`<option value="add_prod">Add New Product</option>`;
    document.getElementById("produc_id").innerHTML = appendedResultData;
    
    document.getElementsByClassName("form_title6")[0].innerHTML = "Product Specification Add Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementById("produc_id").value = document.getElementById("spec_name").value = document.getElementById("spec_value").value = "";
    document.getElementsByClassName("prod_spec_submition_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_prod_spec_step1_container")[0].style.display = "block";
    display_blocked_containers("add_prod_spec_step1_container"); 
    document.getElementsByClassName("prod_spec_submition_btn2")[0].style.display = "none";

     }).catch((errData) => {
        console.log(errData);
    })
       
}

let produc_id = 0;

document.getElementById("produc_id").addEventListener("change" , function() {
    
    if(this.value == 0) {
        document.getElementsByClassName("produc_id_error_message_place")[0].innerText = "Select Product!";
    } else if(this.value == "add_prod") {
        document.getElementsByClassName("produc_id_error_message_place")[0].innerText = "";
        add_product();
      
    } else {
        document.getElementsByClassName("produc_id_error_message_place")[0].innerText = "";
        produc_id = this.value;
        input_id = {
            prods_id: produc_id
        }
     
        input_id = JSON.stringify(input_id);
        display_preLoader();
        let prod_id_CheckerRes = make_user_details("POST", "../prods_specification/get_prod_id/", `${input_id}`);
    
        
        prod_id_CheckerRes.then((response) => {
       
            let prod_id_CheckerRes = JSON.parse(response);
         if(prod_id_CheckerRes >= 20) {
            document.getElementsByClassName("produc_id_error_message_place")[0].innerText = "Can't add more than 20 specification details!";
         } else {
            document.getElementsByClassName("produc_id_error_message_place")[0].innerText = "";
         }
            
            unDisplay_preLoader();
        }).catch((errData) => {
            console.log(errData);
        });
    }
   
});

document.getElementsByClassName("prod_spec_submition_btn")[0].addEventListener("click", function(event) {
    prod_specification_submission_form(event, "insert");    
});

function prod_specification_submission_form(event, decisionPara) {
   
    event.preventDefault();
 
    let p_spec_id = 0;
   
    let products_id = document.getElementById("produc_id").value;
   
    if(decisionPara == "update") {
        p_spec_id = document.getElementById("p_spec_id").value;
    }
    
    let spec_name = document.getElementById("spec_name").value;
    let spec_value = document.getElementById("spec_value").value;

    spec_name = spec_name.replace(/\/+$/g, '');
    spec_value = spec_value.replace(/\/+$/g, '');
  
    spec_name = spec_name.replace(/[^a-zA-Z0-9@. ]/g, "");
    spec_value = spec_value.replace(/[^a-zA-Z0-9@. ]/g, "");
 
    
     if(decisionPara == "insert") {
        if(products_id == 0) {
            document.getElementsByClassName("produc_id_error_message_place")[0].innerText = "Select Product!";
        } else {
            if(document.getElementsByClassName("produc_id_error_message_place")[0].value == "") {
            document.getElementsByClassName("produc_id_error_message_place")[0].innerText = "";
            }
            
        }
     }
     
   
    if(spec_name == "") {
        document.getElementsByClassName("spec_name_error_message_place")[0].innerText = "Specification name is required!";
    } else if(spec_name.length <= 5) {
        document.getElementsByClassName("spec_name_error_message_place")[0].innerText = "Specification name length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("spec_name_error_message_place")[0].innerText = "";
    }
    if(spec_value == "") {
        document.getElementsByClassName("spec_value_error_message_place")[0].innerText = "Specification value is required!";
    } else if(spec_value.length <= 5) {
        document.getElementsByClassName("spec_value_error_message_place")[0].innerText = "Specification value length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("spec_value_error_message_place")[0].innerText = "";
    }
   
   
    if((document.getElementsByClassName("produc_id_error_message_place")[0].innerText == "") && (document.getElementsByClassName("spec_name_error_message_place")[0].innerText == "") && (document.getElementsByClassName("spec_value_error_message_place")[0].innerText == "")) {
    
        let prodSpecNameDataObj = {
            spec_name: spec_name
        }
        prodSpecNameDataObj = JSON.stringify(prodSpecNameDataObj);
        display_preLoader();
        let prodSpecNameCheckerRes = make_user_details("POST", "../prods_specification/check_prod_spec_name/", `${prodSpecNameDataObj}`);
    
        
        prodSpecNameCheckerRes.then((response) => {
            unDisplay_preLoader();
            let avail_count = response;

            prodSpecDataObj = {
                p_spec_id: p_spec_id,
                products_id: products_id,
                spec_name: spec_name,
                spec_value: spec_value,
            }
           
            prodSpecDataObj = JSON.stringify(prodSpecDataObj);
          
            
        if(avail_count == 0 && decisionPara == "insert") {
           
            document.getElementsByClassName("spec_name_error_message_place")[0].innerText = "";
            display_preLoader();
            if(decisionPara == "insert") {
                let prodSpecInsertDatasRes = make_user_details("POST", "../prods_specification/insert_p_spec_data/", `${prodSpecDataObj}`);
        
                prodSpecInsertDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);

                    document.getElementById("produc_id").value = document.getElementById("spec_name").value = document.getElementById("spec_value").value = "";

                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
        } else {
            document.getElementsByClassName("spec_name_error_message_place")[0].innerText = "Specification name already exits!";
        }
       
        if(decisionPara == "update") {
            if(avail_count > 1) {
                document.getElementsByClassName("spec_name_error_message_place")[0].innerText = "Specification name already exits!";
            } else {
              
                document.getElementsByClassName("spec_name_error_message_place")[0].innerText = "";
                display_preLoader();
                let prodSpecUpdateDatasRes = make_user_details("POST", "../prods_specification/update_prod_spec/", `${prodSpecDataObj}`);
        
                prodSpecUpdateDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);
                    document.getElementById("p_spec_id").value = document.getElementById("spec_name").value = document.getElementById("spec_value").value = "";

                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
            
        }
    
        })
      }
    }


/* Product Specificatioin Add Section End */

/* Product Specification Edit And Delete Section Start */

function edit_and_delete_of_prod_spec() {
   
    let responseObj = make_user_details("GET", "../prods_specification/show_prod_spec/", "");
display_preLoader();
let totalC = 0;

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
  
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr>
        <th>S.NO</th>
        <th>PROD.SPEC ID</th>
        <th>PROD ID</th>
        <th>SPEC NAME</th>
        <th>SPEC VALUE</th>
        <th>ACTION</th>
    </tr>`;
    for(let i = 0; i < resultData.length; i++) {
       
        table_datas+=`<tr>
        <td>${i+1}.</td>
        <td>${resultData[i].p_spec_id}</td>
        <td>${resultData[i].p_id}</td>
        <td>${resultData[i].p_spec_title}</td>
        <td>${resultData[i].p_spec_details}</td>
        <td><button title="Edit" class="edit_button_of_table" onclick="editOfSpecProdSpecs(${resultData[i].p_spec_id})"><i class="fa fa-edit"></i></button> <button title="Delete" class="delete_button_of_table" onclick="deleteOfSpecProdSpecs(${resultData[i].p_spec_id})"><i class="fa fa-trash-o"></i></button></td></tr>`;
        totalC = i;
    }
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Product Specification Details";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

function editOfSpecProdSpecs(products_spec_id) {
display_preLoader();
let responseObj = make_user_details("GET", `../prods_specification/specific_prod_spec_detail/products_spec_id/${products_spec_id}`, "");

document.getElementsByClassName("prod_spec_submition_btn2")[0].style.display = "inline-block";
document.getElementsByClassName("prod_spec_submition_btn")[0].style.display = "none";



responseObj.then((resObj) => {
    unDisplay_preLoader();
   let prod_spec_data = JSON.parse(resObj);
    
   document.getElementById("produc_id").style.display = "none";
   document.getElementsByClassName("produc_id_error_message_place")[0].style.display = "none";
   document.getElementsByClassName("produc_id_error_message_place")[0].innerText = "";

let prodSpecDatas = ``;
prodSpecDatas+=`<option value=${prod_spec_data.p_spec_id}>Db Value</option>`;
document.getElementById("p_spec_id").innerHTML = prodSpecDatas;
   
    document.getElementById("spec_name").value = prod_spec_data.p_spec_title;
    document.getElementById("spec_value").value = prod_spec_data.p_spec_details;
    
})
document.getElementsByClassName("form_title6")[0].innerHTML = "Product Specification Edit Form";
undisplay_displayed_blocked_containers(); 
document.getElementsByClassName("add_prod_spec_step1_container")[0].style.display = "block";
display_blocked_containers("add_prod_spec_step1_container"); 
}

document.getElementsByClassName("prod_spec_submition_btn2")[0].addEventListener("click", function(event) {

    prod_specification_submission_form(event, "update");
});


function deleteOfSpecProdSpecs(products_spec_id) {

let permission = confirm("Are you sure?");
if(permission) {
    display_preLoader();
    let prodDeleteReqObj = make_user_details("DELETE", `../prods_specification/prod_spec_deletion/products_spec_id/${products_spec_id}`, ``);
    prodDeleteReqObj.then((deleteRes) => {
        unDisplay_preLoader();
        alert(deleteRes);
        show_prod_specs();
    }).catch((deleteErrRes) => {
        console.log(deleteErrRes);
    })
}
}

/* Product Specification Edit And Delete Section End */

/* Product Specification End */

/* Products FAQ Start */

/* Products FAQ View Section Start */

function view_faq() {
    let responseObj = make_user_details("GET", "../prods_faq/show_prod_faq/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);

        let question_and_ans_id_array = [];
        for(let j = 0; j < resultData.length; j++) {
            question_and_ans_id_array[j] = resultData[j].p_q_and_a_id;
        }
        
        question_and_ans_id_array = JSON.stringify(question_and_ans_id_array);
        let likeAndDislickResponseObj = make_user_details("POST", "../prods_faq/like_and_dislike_count/", `${question_and_ans_id_array}`);
    display_preLoader();
    likeAndDislickResponseObj.then((countres) => {
        let countResultData = JSON.parse(countres);
        
        unDisplay_preLoader();

        let table_datas = `<tr><th>S.NO</th>
        <th>PROD.FAQ ID</th>
        <th>PROD ID</th>
        <th>USER ID</th>
        <th>USER NAME</th>
        <th>QUESTIONS</th>
        <th>ANSWERS</th>
        <th>STATUS</th>
        <th>LIKES</th>
        <th>DISLIKES</th></tr>`;
        for(let i = 0; i < resultData.length; i++) {
            
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].p_q_and_a_id}</td>
            <td>${resultData[i].p_id}</td>
            <td>${resultData[i].user_id}</td>
            <td>${resultData[i].ques_person_name}</td>
            <td>${resultData[i].p_ques}</td>
            <td>${resultData[i].p_ans}</td>
            <td>${resultData[i].status}</td>
            <td>${countResultData[0][i]}</td>
            <td>${countResultData[1][i]}</td>
            </tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Product FAQ Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
        document.getElementsByClassName("admin_panel_details_table")[0].innerHTML = table_datas;
    
        undisplay_displayed_blocked_containers(); 
        document.getElementsByClassName("admin_panel_details_table_container")[0].style.display = "block";
        display_blocked_containers("admin_panel_details_table_container"); 
        document.getElementsByClassName("table_name_and_other_details_display_container")[0].style.display = "block";
        display_blocked_containers("table_name_and_other_details_display_container"); 

    }).catch((rejvalue) => {
            console.log(rejvalue);
    }) 

       
        }).catch((rejvalue) => {
            console.log(rejvalue);
        }) 
}

/* Products FAQ View Section End */

/* Products FAQ Adding Answers Section Start */

function add_prod_faq_ans() {
   
    display_preLoader();
    let retrieveAllProdFaqDetails = make_user_details("GET", "../prods_faq/show_prod_faq/", "");

    retrieveAllProdFaqDetails.then((resData) => {
        unDisplay_preLoader();
     
        let resultData = JSON.parse(resData);
        let appendedResultData = `<option value="0">Select Question</option>`;
        for(let i = 0; i < resultData.length; i++) {
            appendedResultData+=`<option value=${resultData[i].p_q_and_a_id}>${resultData[i].p_q_and_a_id} - ${resultData[i].p_ques}</option>`;
        }
        
    document.getElementById("p_and_q_id").innerHTML = appendedResultData;
    
    document.getElementsByClassName("form_title7")[0].innerHTML = "Product FAQ Answering Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementById("prod_faq_ques").value = document.getElementById("prod_faq_ans").value = "";
    document.getElementById("prod_faq_ques_status").value = 0;
    document.getElementsByClassName("p_q_and_a_submition_btn2")[0].style.display = "inline-block";
    document.getElementsByClassName("add_prod_faq_ans_step1_container")[0].style.display = "block";
    display_blocked_containers("add_prod_faq_ans_step1_container"); 
    

     }).catch((errData) => {
        console.log(errData);
    })
}

let p_and_q_id = 0;
document.getElementById("prod_faq_ques").disabled = true;

document.getElementById("p_and_q_id").addEventListener("change" , function() {
    
    if(this.value == 0) {
        document.getElementsByClassName("p_and_q_id_error_message_place")[0].innerText = "Select Question!";
        document.getElementById("prod_faq_ques").value = "";
        document.getElementById("prod_faq_ans").value = "";
        document.getElementById("prod_faq_ques_status").value = "0";
       
    } else {
        document.getElementsByClassName("prod_faq_ques_error_message_place")[0].innerText = "";
        document.getElementsByClassName("prod_faq_ans_error_message_place")[0].innerText = "";
        document.getElementsByClassName("prod_faq_ques_status_error_message_place")[0].innerText = "";
        document.getElementsByClassName("p_and_q_id_error_message_place")[0].innerText = "";
        p_and_q_id = this.value;

        display_preLoader();
    let retrieveSpecProdFaqDetails = make_user_details("GET", `../prods_faq/spec_prod_faq_ques/prod_faq_id/${p_and_q_id}`, "");

    retrieveSpecProdFaqDetails.then((specRes) => {
        unDisplay_preLoader();

        responseData = JSON.parse(specRes);
        document.getElementById("prod_faq_ques").value = responseData.p_ques;
        document.getElementById("prod_faq_ans").value = responseData.p_ans;
        document.getElementById("prod_faq_ques_status").value = responseData.status;

    }).catch((errorData) => {
        console.log(errorData);
    })
        
    }
   
});

document.getElementsByClassName("p_q_and_a_submition_btn2")[0].addEventListener("click", function(event) {
    prod_faq_answer_submission_form(event, "insert");    
});

function prod_faq_answer_submission_form(event, decisionPara) {
    
    event.preventDefault();
 
 
    let p_and_q_id = document.getElementById("p_and_q_id").value;
   
    let prod_faq_ques = document.getElementById("prod_faq_ques").value;
    let prod_faq_ans = document.getElementById("prod_faq_ans").value;
    let prod_faq_ques_status = document.getElementById("prod_faq_ques_status").value;

    prod_faq_ques = prod_faq_ques.replace(/\/+$/g, '');
    prod_faq_ans = prod_faq_ans.replace(/\/+$/g, '');
    prod_faq_ques_status = prod_faq_ques_status.replace(/\/+$/g, '');

    prod_faq_ques = prod_faq_ques.replace(/[^a-zA-Z0-9@. ]/g, "");
    prod_faq_ans = prod_faq_ans.replace(/[^a-zA-Z0-9@. ]/g, "");
    prod_faq_ques_status = prod_faq_ques_status.replace(/[^a-zA-Z0-9@. ]/g, "");

        if(p_and_q_id == 0) {
            document.getElementsByClassName("p_and_q_id_error_message_place")[0].innerText = "Select Question!";
        } 
    
    if(prod_faq_ques == "") {
        document.getElementsByClassName("prod_faq_ques_error_message_place")[0].innerText = "Question is required!";
    } else if(prod_faq_ques.length <= 5) {
        document.getElementsByClassName("prod_faq_ques_error_message_place")[0].innerText = "Question length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("prod_faq_ques_error_message_place")[0].innerText = "";
    }
    if(prod_faq_ans == "") {
        document.getElementsByClassName("prod_faq_ans_error_message_place")[0].innerText = "|Answer is required!";
    } else if(prod_faq_ans.length <= 5) {
        document.getElementsByClassName("prod_faq_ans_error_message_place")[0].innerText = "Answer length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("prod_faq_ans_error_message_place")[0].innerText = "";
    }
    if(prod_faq_ques_status == "0") {
        document.getElementsByClassName("prod_faq_ques_status_error_message_place")[0].innerText = "Question status is required!";
    } else if(prod_faq_ques_status.length <= 4) {
        document.getElementsByClassName("prod_faq_ques_status_error_message_place")[0].innerText = "Question status must be minimum 5 characters!";
    } else {
        document.getElementsByClassName("prod_faq_ques_status_error_message_place")[0].innerText = "";
    }
   
   
    if((document.getElementsByClassName("p_and_q_id_error_message_place")[0].innerText == "") && (document.getElementsByClassName("prod_faq_ques_error_message_place")[0].innerText == "") && (document.getElementsByClassName("prod_faq_ans_error_message_place")[0].innerText == "") && (document.getElementsByClassName("prod_faq_ques_status_error_message_place")[0].innerText == "")) {
    
     
            prodFaqDataObj = {
                p_and_q_id: p_and_q_id,
                prod_faq_ques: prod_faq_ques,
                prod_faq_ans: prod_faq_ans,
                prod_faq_ques_status: prod_faq_ques_status,
            }
           
            prodFaqDataObj = JSON.stringify(prodFaqDataObj);
            display_preLoader();
            if(decisionPara == "insert") {
                let prodFaqInsertDatasRes = make_user_details("POST", "../prods_faq/insert_prod_faq_data/", `${prodFaqDataObj}`);
        
                prodFaqInsertDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);

                    document.getElementById("p_and_q_id").value = document.getElementById("prod_faq_ques").value = document.getElementById("prod_faq_ans").value = document.getElementById("prod_faq_ques_status").value = "";

                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
            unDisplay_preLoader();
      }
    }


/* Products FAQ Adding Answers Section End */

/* Products Delete FAQ Section Start */

function delete_prod_faq() {
    let responseObj = make_user_details("GET", "../prods_faq/show_prod_faq/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);
        let table_datas = `<tr>
        <th>S.NO</th>
        <th>PROD.FAQ ID</th>
        <th>PROD ID</th>
        <th>QUESTIONS</th>
        <th>ANSWERS</th>
        <th>STATUS</th>
        <th>ACTION</th>
        </tr>`;
        for(let i = 0; i < resultData.length; i++) {
           
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].p_q_and_a_id}</td>
            <td>${resultData[i].p_id}</td>
            <td>${resultData[i].p_ques}</td>
            <td>${resultData[i].p_ans}</td>
            <td>${resultData[i].status}</td>
           
            <td><button title="Delete" class="delete_button_of_table" onclick="deleteOfSpecProdFaq(${resultData[i].p_q_and_a_id})"><i class="fa fa-trash-o"></i></button></td></tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Product FAQ Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

function deleteOfSpecProdFaq(p_q_and_a_id) {
    let permission = confirm("Are you sure?");
    if(permission) {
        display_preLoader();
        let prodDeleteReqObj = make_user_details("DELETE", `../prods_faq/prod_faq_deletion/products_faq_id/${p_q_and_a_id}`, ``);
        prodDeleteReqObj.then((deleteRes) => {
            unDisplay_preLoader();
            alert(deleteRes);
            view_faq();
        }).catch((deleteErrRes) => {
            console.log(deleteErrRes);
        })
    }
}

/* Products Delete FAQ Section End */

/* Products FAQ End */

/* Reviews Start */

/* Show Reviews Section Start */

function show_reviews() {
    let responseObj = make_user_details("GET", "../reviews/show_prod_reviews/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);

        let reviews_id_array = [];
        for(let j = 0; j < resultData.length; j++) {
            reviews_id_array[j] = resultData[j].review_id;
        }
        
        reviews_id_array = JSON.stringify(reviews_id_array);
        let likeAndDislickResponseObj = make_user_details("POST", "../reviews/like_and_dislike_count/", `${reviews_id_array}`);
    display_preLoader();
    likeAndDislickResponseObj.then((countres) => {
        let countResultData = JSON.parse(countres);
        
        unDisplay_preLoader();

        let table_datas = `<tr><th>S.NO</th>
        <th>PROD.REVIEW ID</th>
        <th>USER ID</th>
        <th>PROD ID</th>
        <th>USER NAME</th>
        <th>RATINGS</th>
        <th>DESCRIPTION</th>
        <th>LIKES</th>
        <th>DISLIKES</th></tr>`;
        for(let i = 0; i < resultData.length; i++) {
            
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].review_id}</td>
            <td>${resultData[i].known_user_id}</td>
            <td>${resultData[i].p_id}</td>
            <td>${resultData[i].p_customer_name}</td>
            <td>${resultData[i].p_rating}</td>
            <td>${resultData[i].p_desc}</td>
            <td>${countResultData[0][i]}</td>
            <td>${countResultData[1][i]}</td>
            </tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Product Review Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
        document.getElementsByClassName("admin_panel_details_table")[0].innerHTML = table_datas;
    
        undisplay_displayed_blocked_containers(); 
        document.getElementsByClassName("admin_panel_details_table_container")[0].style.display = "block";
        display_blocked_containers("admin_panel_details_table_container"); 
        document.getElementsByClassName("table_name_and_other_details_display_container")[0].style.display = "block";
        display_blocked_containers("table_name_and_other_details_display_container"); 

    }).catch((rejvalue) => {
            console.log(rejvalue);
    }) 

       
        }).catch((rejvalue) => {
            console.log(rejvalue);
        }) 
}

/* Show Reviews Section End */

/* Review Delete Section Start */

function delete_prod_review() {
    let responseObj = make_user_details("GET", "../reviews/show_prod_reviews/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);
        let table_datas = `<tr>
        <th>S.NO</th>
        <th>PROD.REVIEW ID</th>
        <th>USER ID</th>
        <th>PROD ID</th>
        <th>RATINGS</th>
        <th>DESCRIPTION</th>
        <th>ACTION</th>
        </tr>`;
        for(let i = 0; i < resultData.length; i++) {
           
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].review_id}</td>
            <td>${resultData[i].known_user_id}</td>
            <td>${resultData[i].p_id}</td>
            <td>${resultData[i].p_rating}</td>
            <td>${resultData[i].p_desc}</td>
           
            <td><button title="Delete" class="delete_button_of_table" onclick="deleteOfSpecProdReview(${resultData[i].review_id})"><i class="fa fa-trash-o"></i></button></td></tr>`;
            totalC = i;
        }
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Product Review Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

function deleteOfSpecProdReview(review_id) {
    let permission = confirm("Are you sure?");
    if(permission) {
        display_preLoader();
        let prodDeleteReqObj = make_user_details("DELETE", `../reviews/prod_review_deletion/products_review_id/${review_id}`, ``);
        prodDeleteReqObj.then((deleteRes) => {
            unDisplay_preLoader();
            alert(deleteRes);
            show_reviews();
        }).catch((deleteErrRes) => {
            console.log(deleteErrRes);
        })
    }
}

/* Review Delete Section End */

/* Review End */

/* Filter Start */

/* Filter View Section Start */



function view_filter_data() {
    
    let responseObj = make_user_details("GET", "../filter/filter_details/", "");
    display_preLoader();
    let totalC = 0;
    
    responseObj.then((sucvalue) => {
        unDisplay_preLoader();
      
        let resultData = JSON.parse(sucvalue);
        let table_datas = `<tr><th>S.NO</th>
        <th>FILTER ID</th>
        <th>CAT ID</th>
        <th>TITLE</th>
        <th>DETAILS FOR WHICH PRODUCT?</th></tr>`;
        for(let i = 0; i < resultData.length; i++) {
            
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[i].filter_id}</td>
            <td>${resultData[i].subs_cat_identification_id}</td>
            <td>${resultData[i].filter_title}</td>
            <td>${resultData[i].filter_details_category}</td>
            </tr>`;

            totalC = i;
        }

        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Product Filter Details";
        document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

/* Filter View Section End */

/* Filter Add Section Start */

function add_filter_data() {
    document.getElementsByClassName("filter_data_submition_btn")[0].style.display = "inline-block";
document.getElementsByClassName("filter_data_submition_btn2")[0].style.display = "none";
    display_preLoader();
    let retrieveAllSubCatDetails = make_user_details("GET", "../sub_category/sub_cat_details/", "");
   
    retrieveAllSubCatDetails.then((resData) => {
       
        unDisplay_preLoader();
     
        let resultData = JSON.parse(resData);
        let appendedResultData = `<option value="0">Select Category</option>`;
        for(let i = 0; i < resultData.length; i++) {
            appendedResultData+=`<option value=${resultData[i].sub_cat_identification_id_two}>${resultData[i].sub_cat_identification_id_two} - ${resultData[i].subs_cat_title}</option>`;
        }
        appendedResultData += `<option value="add_cat">Add New Category</option>`;
        document.getElementById("subes_cats_id").innerHTML = appendedResultData;
       

        let responseObj = make_user_details("GET", "../filter/fetch_details_category/", "");
        display_preLoader();
       
        
        responseObj.then((sucvalue) => {
            let filter_data_category = `<option value="0">
            Select Details</option>`;
            unDisplay_preLoader();
            let resultData = JSON.parse(sucvalue);
          
            for(let i = 0; i < resultData.length; i++) {
               
                filter_data_category+=`<option value="${resultData[i].filter_details_category}">
                ${resultData[i].filter_details_category}</option>`; 
            }
            filter_data_category+=`<option value="new_fil_data_cat">Add New Details Section</option>`;
            document.getElementById("details_for_which_prod").innerHTML = filter_data_category;
           

            }).catch((rejvalue) => {
                console.log(rejvalue);
            }) 
     
    
    document.getElementsByClassName("form_title8")[0].innerHTML = "Filter Form";
    undisplay_displayed_blocked_containers(); 
    document.getElementById("filter_title").value = document.getElementById("filter_sub_title").value = "";

   
    document.getElementsByClassName("filter_data_submition_btn")[0].style.display = "inline-block";
    document.getElementsByClassName("add_filter_step1_container")[0].style.display = "block";
    display_blocked_containers("add_filter_step1_container"); 
    

     }).catch((errData) => {
        console.log(errData);
    })
}

let subs_cats_id = 0;
let filters_id = 0;

document.getElementById("subes_cats_id").addEventListener("change" , function() {
    
    if(this.value == 0) {
        document.getElementsByClassName("sub_cats_id_error_message_place")[0].innerText = "Select Category!";
    } else if(this.value == "add_cat") {
        document.getElementsByClassName("sub_cats_id_error_message_place")[0].innerText = "";
        add_cat();
      
    } else {
        document.getElementsByClassName("sub_cats_id_error_message_place")[0].innerText = "";
    }
   
});

document.getElementsByClassName("filter_data_submition_btn")[0].addEventListener("click", function(event) {
    filter_data_submission_form(event, "insert");    
});
    
    function filter_data_submission_form(event, decisionPara) {
       
    event.preventDefault();
 
    subs_cats_id = document.getElementById("subes_cats_id").value;
    if(decisionPara == "update") {
        filters_id = document.getElementById("filter_id").value;
    }
    let filteres_title = document.getElementById("filter_title").value;
    let filter_sub_title = filteres_title;
    let details_for_which_prod = document.getElementById("details_for_which_prod").value;
   
    
    filteres_title = filteres_title.replace(/\/+$/g, '');
    subs_cats_id = subs_cats_id.replace(/\/+$/g, '');
    filter_sub_title = filter_sub_title.replace(/\/+$/g, '');
    filteres_title = filteres_title.replace(/[^a-zA-Z0-9@.& ]/g, "");
    subs_cats_id = subs_cats_id.replace(/[^a-zA-Z0-9@.& ]/g, "");
    filter_sub_title = filter_sub_title.replace(/[^a-zA-Z0-9@. ]/g, "");
    filteres_title = filteres_title.toUpperCase();
    filter_sub_title = filter_sub_title.toUpperCase();
    filter_sub_title = filter_sub_title.replaceAll(" ", "_");

    
    if(subs_cats_id == 0) {
        document.getElementsByClassName("sub_cats_id_error_message_place")[0].innerText = "Select Category!";
    } else {
        document.getElementsByClassName("sub_cats_id_error_message_place")[0].innerText = "";
    }
    if(filteres_title == "") {
        document.getElementsByClassName("filter_title_error_message_place")[0].innerText = "Filter Title is required!";
    } else if(filteres_title.length <= 5) {
        document.getElementsByClassName("filter_title_error_message_place")[0].innerText = "Filter Title length must be minimum 6 characters!";
    } else {
        document.getElementsByClassName("filter_title_error_message_place")[0].innerText = "";
    }
    if(details_for_which_prod == 0) {
        document.getElementsByClassName("details_for_which_prod_status_error_message_place")[0].innerText = "Details Section is required!";
    } else {
        document.getElementsByClassName("details_for_which_prod_status_error_message_place")[0].innerText = "";
    }
   
    if((document.getElementsByClassName("sub_cats_id_error_message_place")[0].innerText == "") && (document.getElementsByClassName("filter_title_error_message_place")[0].innerText == "") && (document.getElementsByClassName("details_for_which_prod_status_error_message_place")[0].innerText == "")) {
    
        let filterTitleDataObj = {
            subs_cats_id: subs_cats_id,
            filteres_title: filteres_title
        }
        filterTitleDataObj = JSON.stringify(filterTitleDataObj);
        display_preLoader();
        let filterTitleCheckerRes = make_user_details("POST", "../filter/check_filter_title/", `${filterTitleDataObj}`);
    
        
        filterTitleCheckerRes.then((response) => {
            unDisplay_preLoader();
            let avail_count = response;
            filterDataObj = {
                filters_id: filters_id,
                subs_cats_id: subs_cats_id,
                filteres_title: filteres_title,
                filter_sub_title: filter_sub_title,
                details_for_which_prod: details_for_which_prod
            }
           
            filterDataObj = JSON.stringify(filterDataObj);
            
        if(avail_count == 0 && decisionPara == "insert") {
            document.getElementsByClassName("filter_title_error_message_place")[0].innerText = "";
            display_preLoader();
            if(decisionPara == "insert") {
                let subCategoryInsertDatasRes = make_user_details("POST", "../filter/insert_filter_data/", `${filterDataObj}`);
        
                subCategoryInsertDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);
                    document.getElementById("subes_cats_id").value = document.getElementById("filter_title").value = document.getElementById("details_for_which_prod").value = "";
                }).catch((badResponse) => {
                    console.log(badResponse);
                })
           
            }
        } else {
            document.getElementsByClassName("filter_title_error_message_place")[0].innerText = "Filter Title already exits!";
        }
       
        if(decisionPara == "update") {
            if(avail_count >= 1) {
                document.getElementsByClassName("filter_title_error_message_place")[0].innerText = "Filter title already exits!";
            } else {
              
                document.getElementsByClassName("filter_title_error_message_place")[0].innerText = "";
                display_preLoader();
                let filterUpdateDatasRes = make_user_details("POST", "../filter/update_filter/", `${filterDataObj}`);
        
                filterUpdateDatasRes.then((goodResponse) => {
                    unDisplay_preLoader();
                    alert(goodResponse);
                    document.getElementById("filter_id").value = document.getElementById("filter_title").value = document.getElementById("filter_sub_title").value = document.getElementById("details_for_which_prod").value = "";
                }).catch((badResponse) => {
                    console.log(badResponse);
                })
            }
            
         }
    
        })
      }
    }

/* Filter Add Section End */

/* Filter Edit And Delete Section Start */

function edit_and_delete_of_filter_data() {
   
    let responseObj = make_user_details("GET", "../filter/filter_details/", "");
display_preLoader();
let totalC = 0;

responseObj.then((sucvalue) => {
    unDisplay_preLoader();
  
    let resultData = JSON.parse(sucvalue);
    let table_datas = `<tr><th>S.NO</th>
    <th>FILTER ID</th>
    <th>CAT ID</th>
    <th>TITLE</th>
    <th>DETAILS FOR WHICH PRODUCT?</th>
    <th>ACTION</th></tr>`;
    for(let i = 0; i < resultData.length; i++) {
        
        table_datas+=`<tr>
        <td>${i+1}.</td>
        <td>${resultData[i].filter_id}</td>
        <td>${resultData[i].subs_cat_identification_id}</td>
        <td>${resultData[i].filter_title}</td>
        <td>${resultData[i].filter_details_category}</td>
        <td><button title="Edit" class="edit_button_of_table" onclick="editOfSpecFilter(${resultData[i].filter_id})"><i class="fa fa-edit"></i></button> <button title="Delete" class="delete_button_of_table" onclick="deleteOfSpecFilter(${resultData[i].filter_id})"><i class="fa fa-trash-o"></i></button></td></tr>`;
        totalC = i;
    }

    let retrieveAllSubCatDetails = make_user_details("GET", "../sub_category/sub_cat_details/", "");
   
    retrieveAllSubCatDetails.then((resData) => {
       
        unDisplay_preLoader();
     
        let resultData = JSON.parse(resData);
        let appendedResultData = `<option value="0">Select Category</option>`;
        for(let i = 0; i < resultData.length; i++) {
            appendedResultData+=`<option value=${resultData[i].sub_cat_identification_id_two}>${resultData[i].sub_cat_identification_id_two} - ${resultData[i].subs_cat_title}</option>`;
        }
        appendedResultData += `<option value="add_cat">Add New Category</option>`;
        document.getElementById("subes_cats_id").innerHTML = appendedResultData;
       
    })

    let responseObj = make_user_details("GET", "../filter/fetch_details_category/", "");
    display_preLoader();
   
    
    responseObj.then((sucvalue) => {
        let filter_data_category = `<option value="0">
        Select Details</option>`;
        unDisplay_preLoader();
        let resultData = JSON.parse(sucvalue);
      
        for(let i = 0; i < resultData.length; i++) {
           
            filter_data_category+=`<option value="${resultData[i].filter_details_category}">
            ${resultData[i].filter_details_category}</option>`; 
        }
        filter_data_category+=`<option value="new_fil_data_cat">Add New Details Section</option>`;
        document.getElementById("details_for_which_prod").innerHTML = filter_data_category;
       

        }).catch((rejvalue) => {
            console.log(rejvalue);
        }) 

    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_table_name")[0].innerHTML = "Filter Details";
    document.getElementsByClassName("table_name_and_other_details_display_containers_inner_left_containers_count")[0].innerHTML = `${totalC+1} details found`;
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

function editOfSpecFilter(filter_id) {
display_preLoader();
let responseObj = make_user_details("GET", `../filter/specific_filter_detail/filter_id/${filter_id}`, "");

document.getElementsByClassName("filter_data_submition_btn2")[0].style.display = "inline-block";
document.getElementsByClassName("filter_data_submition_btn")[0].style.display = "none";



responseObj.then((resObj) => {
    unDisplay_preLoader();
   let filterData = JSON.parse(resObj);
    
//    document.getElementById("subes_cats_id").style.display = "none";
//    document.getElementsByClassName("sub_cats_id_error_message_place")[0].style.display = "none";

    let appendedResultData = ``;
        appendedResultData+=`<option value=${filterData.filter_id}>Db Value</option>`;
    document.getElementById("filter_id").innerHTML = appendedResultData;

    document.getElementById("filter_title").value = filterData.filter_title;
    document.getElementById("filter_sub_title").value = filterData.filter_sub_title; 
   
})
document.getElementsByClassName("form_title8")[0].innerHTML = "Filter Edit Form";
undisplay_displayed_blocked_containers(); 
document.getElementsByClassName("add_filter_step1_container")[0].style.display = "block";
display_blocked_containers("add_filter_step1_container"); 
}

document.getElementsByClassName("filter_data_submition_btn2")[0].addEventListener("click", function(event) {

    filter_data_submission_form(event, "update");
});


function deleteOfSpecFilter(filter_id) {

let permission = confirm("Are you sure?");
if(permission) {
    display_preLoader();
    let subCategoryDeleteReqObj = make_user_details("DELETE", `../filter/filter_deletion/filter_id/${filter_id}`, ``);
    subCategoryDeleteReqObj.then((deleteRes) => {
        unDisplay_preLoader();
        alert(deleteRes);
        view_filter_data();
    }).catch((deleteErrRes) => {
        console.log(deleteErrRes);
    })
}
}

/* Filter Edit And Delete Section End */

/* Filter End */

