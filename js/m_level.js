var vue = new Vue({
  el: '#app',
  data: {
    en_name: '',
    REF: ''    
  },
    mounted () {
        axios
          .get('m_level_data.php?Command=generate')
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

//     var url = "m_level_data.php";
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

    var url = "m_level_data.php";
    url = url + "?Command=" + "save_item";
    url = url + "&REF=" + document.getElementById("REF").value;
    url = url + "&name=" + document.getElementById("name").value;
    
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

    var url = "m_level_data.php";
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

    var url = "m_level_data.php";
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
    var url = "m_level_data.php";
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
            opener.document.getElementById('level_ref').value = objSup.REF;
            opener.document.getElementById('level_name').value = objSup.name;
        }

      
        self.close();
    
    }
    
}
