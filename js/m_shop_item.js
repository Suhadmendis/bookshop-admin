var vue = new Vue({
  el: '#app',
  data: {
    en_name: '',
    REF: ''    
  },
    mounted () {
        // axios
        //   .get('m_shop_item_data.php?Command=generate')
        //   .then(response => {
        //     this.en_name = response.data[1];
        //     this.REF = response.data[0];
            
        //     var tableObj = response.data[2];
        //     var tableallo = response.data[3];
        //   console.log(response);
        //           var table = $('#example').DataTable({
        //                 "lengthChange": false,
        //                 "searching": false,
        //                 "bPaginate": false,
        //                 "ordering": false
        //             });
        //           $('#example tbody').on( 'click', 'tr', function () {
        //             var cells = table.row( this ).data();
        //             console.log(cells[2]);
        //             if (cells[2] == 0) {
        //                 alert("Full");
        //             }else{
        //                 $(this).toggleClass('selected');
        //             }
                    

        //         } );


        //     for (var i = 0;tableObj.length>i;i++) {

             
        //         var remaining_slots = tableObj[i].slots;
        //         for (var j = 0;tableallo.length>j;j++) {
        //                 if (tableObj[i].REF == tableallo[j].REF_SESS) {
        //                     remaining_slots = tableObj[i].slots - tableallo[j].allocated;
        //                     console.log(tableallo[j].allocated);
        //                 }
        //         }

        //         table.row.add( [
        //                 tableObj[i].REF,
        //                 tableObj[i].session_name,
        //                 remaining_slots
                      
                      
        //             ] ).draw();

         

        //     }
                
        // })
    }
});

// var table = $('#exampletable').DataTable({
//     "lengthChange": false,
//     "searching": false,
//     "bPaginate": false,
//     "ordering": false
// });


var counter = 1;

// $('#addRow').on('click', function () {
// table.row.add([
//     counter + '.1',
//     counter + '.2',
//     counter + '.3',
//     counter + '.4',
//     counter + '.5'
// ]).draw(false);

        //     counter++;
        // });

        // Automatically add a first row of data
        // $('#addRow').click();




$('#example tbody').on('click', 'tr', function () {
    var cells = table.row(this).data();
    console.log(cells[2]);
    // if (cells[2] == 0) {
    //     alert("Full");
    // } else {
    //     $(this).toggleClass('selected');
    // }
});
function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
// Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";
}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";
}



function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "m_session_allo_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assign_dt() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

      XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
      document.getElementById('REF').value = XMLAddress1[0].childNodes[0].nodeValue;

    }
}





function save_info()
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
     if (document.getElementById('REF').value == "") {
        document.getElementById('REF').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'></span></div>";
        return false;
    }
            
    var url = "m_session_allo_data.php";
    url = url + "?Command=" + "save_item";
    url = url + "&REF=" + document.getElementById("REF").value;
    url = url + "&player_ref=" + document.getElementById("player_ref").value;
    url = url + "&player_Name=" + document.getElementById("player_Name").value;
    url = url + "&remark=" + document.getElementById("remark").value;
   
    

    var table = $('#example').DataTable();
 
    $('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
   
    var rowObj = table.rows('.selected').data();
    
    var sessions = [];
    

    if (rowObj.length === 0) {
        alert("Wrong Entry");
        return false;
    }

    for (var i = 0; i < rowObj.length; i++) {
        sessions.push(rowObj[i]);
    }
        
    url = url + "&sessions=" + JSON.stringify(sessions);


    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            // document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            // $("#msg_box").hide().slideDown(400).delay(2000);
            // $("#msg_box").slideUp(400);
        } else {
            // document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}


function getForm(REF, IDF)
{
   
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "m_shop_item_data.php";
    url = url + "?Command=" + "getForm";
    url = url + "&REF=" + REF;
    url = url + "&IDF=" + IDF;

    xmlHttp.onreadystatechange = getFromValues;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function getFromValues()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("IDF");
        var IDF = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("objSup");
        var objSup = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);

        
        if (IDF === "Master") {
            
            opener.document.getElementById('REF').value = objSup.REF;
            opener.document.getElementById('shop_name').value = objSup.shop_name;
            opener.document.getElementById('tagline').value = objSup.tagline;
            
            if (objSup.listing_type == "IT") {
                window.opener.document.getElementById('listing_type').value = "Item";
            } else {
                window.opener.document.getElementById('listing_type').value = "Package";
            }
            opener.document.getElementById('address').value = objSup.address;
            // opener.document.getElementById('city').value = objSup.city;
            opener.document.getElementById('vendor_ref').value = objSup.vendor_ref;
            opener.document.getElementById('vendor_name').value = objSup.vendor_name;
            opener.document.getElementById('loctaion_point_lat').value = objSup.loctaion_point_lat;
            opener.document.getElementById('loctaion_point_lng').value = objSup.loctaion_point_lng;
            opener.document.getElementById('phone_number_1').value = objSup.phone_number_1;
            opener.document.getElementById('phone_number_2').value = objSup.phone_number_2;
            opener.document.getElementById('email_address').value = objSup.email_address;
            // opener.document.getElementById('img_logo').value = objSup.img_logo;
            // opener.document.getElementById('img_cover').value = objSup.img_cover;
            if (objSup.approve == "1") {
                window.opener.document.getElementById('app_status').innerHTML = "Approved";
            } else {
                window.opener.document.getElementById('app_status').innerHTML = "Not Approved";
            }
            
            // opener.document.getElementById('user').value = objSup.user;
            // opener.document.getElementById('active').value = objSup.active;
            // opener.document.getElementById('sys_time').value = objSup.sys_time;
            // opener.document.getElementById('min_order_value').value = objSup.min_order_value;
            
        }
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("objSub");
        var objSub = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
        
        

        var rowCount = window.opener.document.getElementById('exampletable').rows.length;

        var i;

        for (i = 0; i < rowCount - 1; i++) {
            window.opener.document.getElementById("exampletable").deleteRow(1);
        }

        for (i = 0; i < objSub.length; i++) { 
            var table = window.opener.document.getElementById('exampletable');

            var row = table.insertRow(table.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);

            cell1.innerHTML = objSub[i].REF;
            cell2.innerHTML = objSub[i].category_name;
            cell3.innerHTML = objSub[i].item_name;
            cell4.innerHTML = objSub[i].selling_price;
            cell5.innerHTML = objSub[i].quantity;
            if (objSub[i].approve == 1){
                cell6.innerHTML = '<input checked="" onchange="setApprove(\'' + objSub[i].REF + '\',this)" type="checkbox">';
            }else{
                cell6.innerHTML = '<input onchange="setApprove(\'' + objSub[i].REF +'\',this)" type="checkbox">';
            }
        }
        // id
        // REF
        // category_ref
        // category_name
        // store_ref
        // store_name
        // item_name
        // des
        // selling_price
        // img
        // cancel
        // user
        // sys_time
        // quantity
        // approve
        // inc
        // dec
        // listtype
        // tempqty


        // $('#addRow').on('click', function () {
            // t.row.add([
            //     counter + '.1',
            //     counter + '.2',
            //     counter + '.3',
            //     counter + '.4',
            //     counter + '.5'
            // ]).draw(false);

        //     counter++;
        // });

        // Automatically add a first row of data
        // $('#addRow').click();

       


        self.close();
    
    }
    
}


function setApprove(ref, ele){
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('REF').value == "") {
        document.getElementById('REF').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'></span></div>";
        return false;
    }

    var url = "m_shop_item_data.php";
    url = url + "?Command=" + "setapprove";
    url = url + "&REF=" + ref;
    if (ele.checked){
        url = url + "&app=" + "yes";
    }else{
        url = url + "&app=" + "no";
    }


    xmlHttp.onreadystatechange = setedapp;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}
function setedapp() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Approved") {
            // alert(xmlHttp.responseText);
            // document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            // $("#msg_box").hide().slideDown(400).delay(2000);
            // $("#msg_box").slideUp(400);
        } else {
            alert(xmlHttp.responseText);
            // document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}




function approve() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('REF').value == "") {
        document.getElementById('REF').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'></span></div>";
        return false;
    }

    var url = "m_shop_item_data.php";
    url = url + "?Command=" + "approve";
    url = url + "&REF=" + document.getElementById("REF").value;


    xmlHttp.onreadystatechange = approvesaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function approvesaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Approved") {
            // alert(xmlHttp.responseText);
            document.getElementById('app_status').innerHTML = xmlHttp.responseText;
            // document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            // $("#msg_box").hide().slideDown(400).delay(2000);
            // $("#msg_box").slideUp(400);
        } else {
            alert(xmlHttp.responseText);
            // document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}