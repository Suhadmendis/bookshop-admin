var vue = new Vue({
  el: '#app',
  data: {
    en_name: '',
    REF: ''    
  },
    mounted () {
        axios
          .get('m_school_data.php?Command=generate')
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

//     var url = "m_school_data.php";
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

    var url = "m_school_data.php";
    url = url + "?Command=" + "save_item";
    url = url + "&REF=" + document.getElementById("REF").value;
    url = url + "&name=" + document.getElementById("name").value;
    
    var table = $("#exampletable").tableToJSON();
    url = url + "&items=" + JSON.stringify(table);
  

    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function cancel_imb() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById("REF").value == "") {
        document.getElementById("REF").innerHTML =
            "<div class='alert alert-warning' role='alert'><span class='center-block'></span></div>";
        return false;
    }

    var url = "m_school_data.php";
    url = url + "?Command=" + "cancel_imb";
    url = url + "&REF=" + document.getElementById("REF").value;

    xmlHttp.onreadystatechange = cancelresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}


function cancelresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        if (xmlHttp.responseText == "Canceled!!!") {
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

    var url = "m_school_data.php";
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
    var url = "m_school_data.php";
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
            opener.document.getElementById('name').value = objSup.name;
            
        }
        if (IDF === "item") {
            opener.document.getElementById('school_ref').value = objSup.REF;
            opener.document.getElementById('school_name').value = objSup.name;
        }

        if (IDF === "ADD_SCHOOL") {
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

          
            var table = window.opener.document.getElementById("exampletable");

             var k = Math.floor(Math.random() * 1000000);

             var t_code = "code" + k;
             var t_name = "name" + k;


            var row = table.insertRow(table.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);


            var cell3 = row.insertCell(2);
            cell3.setAttribute("id", t_code);
            var cell4 = row.insertCell(3);
            cell4.setAttribute("id", t_name);

            var cell5 = row.insertCell(4);


            var cell10 = row.insertCell(5);

            cell1.innerHTML = objSup.REF;
            cell2.innerHTML = objSup.name;


            cell5.innerHTML = "<a class=\"btn btn-default\" onclick=\"window.open('search_m_level.php?IDF=ADD_LEVEL&code="+ t_code +"&name="+ t_name +"', 'mywin', 'width=800, height=700');\" class=\"btn btn-info btn-sm\">Add Level</a>"
            cell10.innerHTML = '<input type="button" value="-" onclick="deleteRow(this)">';
         

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



function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("exampletable").deleteRow(i);

  qtyTot();
}
