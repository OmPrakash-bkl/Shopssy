/* PreLoader On and Off Section Start */

function display_preLoader() {
    document.getElementsByClassName("pre_loader_container")[0].style.display = "block";
}

function unDisplay_preLoader() {
    document.getElementsByClassName("pre_loader_container")[0].style.display = "none";
}
/* PreLoader On and Off Section End */

/* Request Sending and Response Getting Section Start */
function order_details_retriever(method, url, sendingData) {

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

let ordered_datas = order_details_retriever("POST", "../ordered_user_details/details_of_ordered_user/", "");
ordered_datas.then((result) => {
    show_ordered_user_details(result);
}).catch((errorobj) => {
    console.log(errorobj);
})


/* Request Sending and Response Getting Section End */

/* Order Data Of Table Shower Section Start */

function show_ordered_user_details(searchData) {
  
    function UI_Fun_1(datas) {
      
        let totalC = 0;
        unDisplay_preLoader();
        let resultData = JSON.parse(datas);
        let table_datas = `<tr><th>S.NO</th>
        <th>ORDER ID</th>
        <th>ORDER DATE</th>
        <th>USER ID</th>
        <th>PROD ID</th>
        <th>QTY</th>
        <th>TOTAL AMT</th>
        <th>ACTION</th></tr>`;
        if(resultData.length == 0) {
            table_datas = `<center>
                <h2>No Results</h2>
                </center>`
                totalC = -1;
        }
        for(let i = 0; i < resultData[0].length; i++) {
            let pro_id = "";
            let qty = "";
            for(let j = 0; j < resultData[1].length; j++) {
                if(resultData[0][i].order_id == resultData[1][j].order_id) {
                    pro_id +=  resultData[1][j].product_id + ",";
                    qty += resultData[1][j].quantity + ",";
                }
            }

        let lastchar = pro_id[pro_id.length - 1];
        while(lastchar == ",") {
        pro_id = pro_id.slice(0, -1);
        lastchar = pro_id.substr(pro_id.length - 1);
        }
        lastchar = qty[qty.length - 1];
        while(lastchar == ",") {
            qty = qty.slice(0, -1);
        lastchar = qty.substr(qty.length - 1);
        }
            
            table_datas+=`<tr>
            <td>${i+1}.</td>
            <td>${resultData[0][i].order_id}</td>
            <td>${resultData[0][i].order_date}</td>
            <td>${resultData[0][i].user_id}</td>
            <td>${pro_id}</td>
            <td>${qty}</td>
            <td>${resultData[0][i].pro_tot_amount}</td>
            <td><button title="Edit"  onclick="makeOrderProcess(${resultData[0][i].order_id})" class="edit_button_of_table"><i class="fa fa-edit"></i></button></td>
            </tr>`
            totalC = i;
        }
        document.getElementsByClassName("shopssy_hub_details_table")[0].innerHTML = table_datas;
    }
    
    if(searchData == '') {
        let responseObj = order_details_retriever("POST", "../ordered_user_details/details_of_ordered_user/", "");
        display_preLoader();
        responseObj.then((sucvalue) => {
            unDisplay_preLoader();
            UI_Fun_1(sucvalue);
            }).catch((rejvalue) => {
                console.log(rejvalue);
            }) 
    } else {
            unDisplay_preLoader();
            UI_Fun_1(searchData);
    }
        search_place_name = "edit_and_delete_users";
    }


/* Order Data Of Table Shower Section End */