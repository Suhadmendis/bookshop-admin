var vue = new Vue({
  el: '#app',
  data: {
    en_name: '',
    REF: ''    
  },
    mounted () {
        axios
          .get('m_uniform_data.php?Command=generate')
          .then(response => {
            this.en_name = response.data[1]
            this.REF = response.data[0]
        })
    }
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



// function getdt() {
    

//     xmlHttp = GetXmlHttpObject();
//     if (xmlHttp == null) {
//         alert("Browser does not support HTTP Request");
//         return;
//     }

//     var url = "m_uniform_data.php";
//     url = url + "?Command=" + "getdt";
//     url = url + "&ls=" + "new";

//     xmlHttp.onreadystatechange = assign_dt;
//     xmlHttp.open("GET", url, true);
//     xmlHttp.send(null);
// }

// function assign_dt() {
//     var XMLAddress1;

//     if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
//     {

//       XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
//       vue.REF = XMLAddress1[0].childNodes[0].nodeValue;

//       XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("en_name");
//       vue.en_name = XMLAddress1[0].childNodes[0].nodeValue;

//     }
// }





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

    var url = "m_uniform_data.php";
    url = url + "?Command=" + "save_item";
    url = url + "&REF=" + document.getElementById("REF").value;
    url = url + "&category_name=" + document.getElementById("category_name").value;
    url = url + "&school_ref=" + document.getElementById("school_ref").value;
    url = url + "&school_name=" + document.getElementById("school_name").value;
    url = url + "&item_name=" + document.getElementById("item_name").value;
    url = url + "&des=" + document.getElementById("des").value;
    
    // url = url + "&selling_price=" + document.getElementById("selling_price").value;
    // url = url + "&quantity=" + document.getElementById("quantity").value;
    
    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            alert(xmlHttp.responseText);
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

    var url = "m_uniform_data.php";
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
            alert(xmlHttp.responseText);
            // document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            // $("#msg_box").hide().slideDown(400).delay(2000);
            // $("#msg_box").slideUp(400);
        } else {
            alert(xmlHttp.responseText);
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
    var url = "m_uniform_data.php";
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
            opener.document.getElementById("category_name").value = objSup.category_name;
            opener.document.getElementById('school_ref').value = objSup.school_ref;
            opener.document.getElementById('school_name').value = objSup.school_name;
            opener.document.getElementById('item_name').value = objSup.item_name;
            opener.document.getElementById('des').value = objSup.des;
            // opener.document.getElementById('selling_price').value = objSup.selling_price;
            // opener.document.getElementById('quantity').value = objSup.quantity;

            if (objSup.approve == "1"){
                window.opener.document.getElementById('app_status').innerHTML = "Approved";
            }else{
                window. opener.document.getElementById('app_status').innerHTML = "Not Approved";
            }

            
        }


        if (IDF === "ADD_UNIFORM") {
          var rowCount = window.opener.document.getElementById("exampletable")
            .rows.length;

          var i;
          var condition = "0";
          for (i = 0; i < rowCount; i++) {
            if (
              window.opener.document.getElementById("exampletable").rows[i]
                .cells[0].innerHTML == objSup.REF
            ) {
              condition = "1";
            }
          }

          if (condition != 1) {
            var table = window.opener.document.getElementById("exampletable");

            var row = table.insertRow(table.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);

            cell1.innerHTML = objSup.REF;
            cell2.innerHTML = objSup.item_name;
            cell3.innerHTML = objSup.item_name;
            cell4.innerHTML = objSup.selling_price;
            cell4.setAttribute("contentEditable", "true");
            cell4.setAttribute("style", "background-color: antiquewhite");

            cell5.innerHTML = objSup.quantity;
            cell5.setAttribute("contentEditable", "true");
            cell5.setAttribute("style", "background-color: antiquewhite");

            if (objSup.approve == 1) {
              cell6.innerHTML = "Approved";
            } else {
              cell6.innerHTML = "Not Approved";
            }

            cell7.innerHTML =
              '<input type="button" value="-" onclick="deleteRow(this)">';
          } else {
            alert("Already Selected");
          }

          //   if (objSup.approve == "1") {
          //     window.opener.document.getElementById("app_status").innerHTML =
          //       "Approved";
          //   } else {
          //     window.opener.document.getElementById("app_status").innerHTML =
          //       "Not Approved";
          //   }
        }



     
        self.close();
    
    }
    
}
