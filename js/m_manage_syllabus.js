var vue = new Vue({
  el: "#app",
  data: {
    en_name: "",
    REF: "",
    DATA: "",
    syllabus: "",
    school_name: "",
    level: "",
    school_ref: "",
    level_ref: "",
  },
  mounted() {
    axios
      .get("m_manage_syllabus_data.php?Command=generate")
      .then((response) => {
        this.REF = response.data[0];
        this.en_name = response.data[1];
        this.syllabus = response.data[2];
      });
  },
  methods: {
    goto: function (school_ref, level_ref, school_name, level_name) {
      //  var url = "res_manage_syllabus.php";
      //  url = url + "?Command=" + "manage";
      //  url = url + "&school_ref=" + school_ref;
      //  url = url + "&level_ref=" + level_ref;
      this.school_ref = school_ref;
      this.level_ref = level_ref;

      this.school_name = school_name;
      this.level = level_name;
      //  window.open(url, "_blank");
      // window.scrollTo(0, document.body.scrollHeight);
      $("html, body").animate(
        { scrollTop: document.body.scrollHeight },
        "slow"
      );
      axios
        .get(
          "m_manage_syllabus_data.php?Command=getbooks&school_ref=" +
            this.school_ref +
            "&level_ref=" +
            this.level_ref
        )
        .then((response) => {

            var rowCount = document.getElementById("exampletable")
              .rows.length;

            var i;

            for (i = 0; i < rowCount - 1; i++) {
              document
                .getElementById("exampletable")
                .deleteRow(1);
            }


            // alert(response.data[0].length);
            var table = document.getElementById("exampletable");

            for (let index = 0; index < response.data[0].length; index++) {
              var row = table.insertRow(table.length);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              var cell5 = row.insertCell(4);


              cell1.innerHTML = response.data[0][index].item_ref;
              cell2.innerHTML = "";
              cell3.innerHTML = "";
              cell4.innerHTML = response.data[0][index].quantity;
              cell4.setAttribute("contentEditable", "true");
              cell4.setAttribute("style", "background-color: antiquewhite");

              //   cell4.setAttribute("onkeyup", "cal_discount(this,'SELL');");

              cell5.innerHTML =
                '<input type="button" value="-" onclick="deleteRow(this)">';
            }


          // this.REF = response.data[0];
          // this.en_name = response.data[1];
          // this.syllabus = response.data[2];
        });
    },
  },
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

//     var url = "m_manage_syllabus_data.php";
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





function save_info() {
  xmlHttp = GetXmlHttpObject();
  if (xmlHttp == null) {
    alert("Browser does not support HTTP Request");
    return;
  }
  //  if (document.getElementById('REF').value == "") {
  //     document.getElementById('REF').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'></span></div>";
  //     return false;
  // }

  var url = "m_manage_syllabus_data.php";
  url = url + "?Command=" + "item";
  url = url + "&school_ref=" + document.getElementById("school_ref").value;
  url = url + "&level_ref=" + document.getElementById("level_ref").value;

  var table = $("#exampletable").tableToJSON();

  console.log(url);

  xmlHttp.onreadystatechange = salessaveresult;
  xmlHttp.open("POST", url, true);
  xmlHttp.send(JSON.stringify(table));
}

function salessaveresult() {
  var XMLAddress1;

  if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
    if (xmlHttp.responseText == "Saved") {
      alert(xmlHttp.responseText);
      location.reload();
    } else {
      // document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
    }
  }
}


function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("exampletable").deleteRow(i);

  qtyTot();
}
