var vue = new Vue({
  el: "#app",
  data: {
    en_name: "",
    REF: "",
    selectType: "",
    TYPES: [
      {
        value: "BKS",
        name: "Books and Stationeries Store",
        sub: [],
      },
      {
        value: "UC",
        name: "Uniforms and Costumes Store",
        sub: [
          {
            value: "UNI",
            name: "Uniforms",
          },
          {
            value: "COS",
            name: "Costumes",
          },
          {
            value: "FOO",
            name: "Footwear",
          },
        ],
      },
      {
        value: "AC",
        name: "Arts and Crafts Store",
        sub: [],
      },
      {
        value: "ES",
        name: "Events n Snacks",
        sub: [
          {
            value: "SNA",
            name: "Snacks",
          },
          {
            value: "DEC",
            name: "Decor",
          },
        ],
      },
      {
        value: "HS",
        name: "Health n Sports",
        sub: [
          {
            value: "HEA",
            name: "Health",
          },
          {
            value: "SPO",
            name: "Sports",
          },
        ],
      },
      {
        value: "TG",
        name: "Toys n Gifts",
        sub: [
          {
            value: "CAR",
            name: "Cards",
          },
          {
            value: "FLO",
            name: "Flowers",
          },
          {
            value: "TOY",
            name: "Toys",
          },
        ],
      },
    ],
    SUBTYPES: "",
  },
  mounted() {
    axios.get("m_store_data.php?Command=generate").then((response) => {
      this.en_name = response.data[1];
      this.REF = response.data[0];
    });
  },
  methods: {
    setSubTypes: function () {
      for (let index = 0; index < this.TYPES.length; index++) {
        if (this.TYPES[index].value == this.selectType) {
          this.SUBTYPES = this.TYPES[index].sub;
        }
      }
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

//     var url = "m_store_data.php";
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
  if (document.getElementById("REF").value == "") {
    document.getElementById("REF").innerHTML =
      "<div class='alert alert-warning' role='alert'><span class='center-block'></span></div>";
    return false;
  }

  var url = "m_store_data.php";
  url = url + "?Command=" + "save_item";
  url = url + "&REF=" + document.getElementById("REF").value;
  url = url + "&shop_name=" + document.getElementById("shop_name").value;
  url = url + "&tagline=" + document.getElementById("tagline").value;
  url = url + "&listing_type=" + document.getElementById("listing_type").value;
  url = url + "&sub_listing_type=" + document.getElementById("sub_listing_type").value;
  url = url + "&vendor_ref=" + document.getElementById("vendor_ref").value;
  url = url + "&vendor_name=" + document.getElementById("vendor_name").value;

  url = url + "&address=" + document.getElementById("address").value;
  url =
    url +
    "&loctaion_point_lat=" +
    document.getElementById("loctaion_point_lat").value;
  url =
    url +
    "&loctaion_point_lng=" +
    document.getElementById("loctaion_point_lng").value;
  url =
    url + "&phone_number_1=" + document.getElementById("phone_number_1").value;
  url =
    url + "&phone_number_2=" + document.getElementById("phone_number_2").value;
  url =
    url + "&email_address=" + document.getElementById("email_address").value;
  url = url + "&approve=" + document.getElementById("approve").value;
  url = url + "&active=" + document.getElementById("active").value;

  url = url + "&img_logo=" + document.getElementById("img_logo").value;


  if (document.getElementById("verify").checked) {
    url = url + "&verify=" + "1";
  } else {
    url = url + "&verify=" + "0";
  }
  if (document.getElementById("approve").checked) {
    url = url + "&approve=" + "1";
  } else {
    url = url + "&approve=" + "0";
  }
  if (document.getElementById("active").checked) {
    url = url + "&active=" + "1";
  } else {
    url = url + "&active=" + "0";
  }

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
  if (document.getElementById("REF").value == "") {
    document.getElementById("REF").innerHTML =
      "<div class='alert alert-warning' role='alert'><span class='center-block'></span></div>";
    return false;
  }

  var url = "m_store_data.php";
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

function getForm(REF, IDF) {
  xmlHttp = GetXmlHttpObject();
  if (xmlHttp == null) {
    alert("Browser does not support HTTP Request");
    return;
  }
  var url = "m_store_data.php";
  url = url + "?Command=" + "getForm";
  url = url + "&REF=" + REF;
  url = url + "&IDF=" + IDF;

  xmlHttp.onreadystatechange = getFromValues;
  xmlHttp.open("GET", url, true);
  xmlHttp.send(null);
}

function getFromValues() {
  var XMLAddress1;

  if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
    XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("IDF");
    var IDF = XMLAddress1[0].childNodes[0].nodeValue;

    XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("objSup");
    var objSup = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);

    if (IDF === "Master") {
      opener.document.getElementById("REF").value = objSup.REF;
      opener.document.getElementById("shop_name").value = objSup.shop_name;
      opener.document.getElementById("tagline").value = objSup.tagline;
      opener.document.getElementById("listing_type").value =
        objSup.listing_type;
      opener.document.getElementById("vendor_ref").value = objSup.vendor_ref;
      opener.document.getElementById("vendor_name").value = objSup.vendor_name;
      opener.document.getElementById("address").value = objSup.address;
      opener.document.getElementById("loctaion_point_lat").value =
        objSup.loctaion_point_lat;
      opener.document.getElementById("loctaion_point_lng").value =
        objSup.loctaion_point_lng;
      opener.document.getElementById("phone_number_1").value =
        objSup.phone_number_1;
      opener.document.getElementById("phone_number_2").value =
        objSup.phone_number_2;
      opener.document.getElementById("email_address").value =
        objSup.email_address;

      if (objSup.active == "1") {
        opener.document.getElementById("active").checked = true;
      } else {
        opener.document.getElementById("active").checked = false;
      }

      if (objSup.approve == "1") {
        opener.document.getElementById("approve").checked = true;
      } else {
        opener.document.getElementById("approve").checked = false;
      }


      if (objSup.verify == "1") {
        window.opener.document.getElementById("verify").checked = true;
      } else {
        window.opener.document.getElementById("verify").checked = false;
      }
      if (objSup.approve == "1") {
        window.opener.document.getElementById("app_status").innerHTML =
          "Approved";
      } else {
        window.opener.document.getElementById("app_status").innerHTML =
          "Not Approved";
      }

      opener.document.getElementById("img_path").innerHTML =
        '<img src="uploads/store/logo/' +
        objSup.img_logo +
        '" alt="" width="400" >';



    }

    if (IDF === "item") {
      opener.document.getElementById("store_ref").value = objSup.REF;
      opener.document.getElementById("store_name").value = objSup.shop_name;
      // opener.document.getElementById('tagline').value = objSup.tagline;
      // opener.document.getElementById('listing_type').value = objSup.listing_type;
      // opener.document.getElementById('vendor_ref').value = objSup.vendor_ref;
      // opener.document.getElementById('vendor_name').value = objSup.vendor_name;
      // opener.document.getElementById('address').value = objSup.address;
      // opener.document.getElementById('loctaion_point_lat').value = objSup.loctaion_point_lat;
      // opener.document.getElementById('loctaion_point_lng').value = objSup.loctaion_point_lng;
      // opener.document.getElementById('phone_number_1').value = objSup.phone_number_1;
      // opener.document.getElementById('phone_number_2').value = objSup.phone_number_2;
      // opener.document.getElementById('email_address').value = objSup.email_address;

      // if (objSup.active == "1") {
      //     opener.document.getElementById('active').checked = true;
      // } else {
      //     opener.document.getElementById('active').checked = false;
      // }

      // if (objSup.approve == "1") {
      //     opener.document.getElementById('approve').checked = true;
      // } else {
      //     opener.document.getElementById('approve').checked = false;
      // }
    }

    if (IDF === "book_allo") {
      
      opener.document.getElementById("store_ref").value = objSup.REF;
      opener.document.getElementById("store_name").value = objSup.shop_name;

      var rowCount = window.opener.document.getElementById("exampletable").rows
        .length;

      var i;

      for (i = 0; i < rowCount - 1; i++) {
        window.opener.document.getElementById("exampletable").deleteRow(1);
      }

      XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("objSub");
      if (XMLAddress1.length != 0) {
        var objSub = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
        console.log(objSub);

        var table = window.opener.document.getElementById("exampletable");

        var i;
        for (i = 0; i < objSub.length; i++) {
          // alert(objSub[i].listtype);
        
            var row = table.insertRow(table.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            var cell8 = row.insertCell(7);
            var cell9 = row.insertCell(8);
            var cell10 = row.insertCell(9);

            cell1.innerHTML = objSub[i].ITEM_REF;
            cell2.innerHTML = objSub[i].item_name;
            cell3.innerHTML = objSub[i].des;
            
            cell4.innerHTML = objSub[i].selling_price;
            cell4.setAttribute("contentEditable", "true");
            cell4.setAttribute("style", "background-color: antiquewhite");

            cell4.setAttribute("onkeyup", "cal_discount(this,'SELL');");




            cell5.innerHTML = objSub[i].discount;
            cell5.setAttribute("contentEditable", "true");
            cell5.setAttribute("style", "background-color: antiquewhite");
            
            cell5.setAttribute("onkeyup", "cal_discount(this,'DISRS');");


            var temp1 = objSub[i].selling_price / 100;
            var temp2 = objSub[i].discount / temp1;


            cell6.innerHTML = temp2.toFixed(2);
            cell6.setAttribute("contentEditable", "true");
            cell6.setAttribute("style", "background-color: antiquewhite");
            cell6.setAttribute("onkeyup", "cal_discount(this,'DISPER');");

            var sell_dis = objSub[i].selling_price - objSub[i].discount;
            cell7.innerHTML = sell_dis.toFixed(2);
            // cell7.setAttribute("contentEditable", "true");
            // cell7.setAttribute("style", "background-color: antiquewhite");




            cell8.innerHTML = objSub[i].quantity;
            cell8.setAttribute("contentEditable", "true");
            cell8.setAttribute("style", "background-color: antiquewhite");

            if (objSub[i].approve == "1") {
              cell9.innerHTML = "Approved";
            } else {
              cell9.innerHTML = "Not Approved";
            }

            cell10.innerHTML =
              '<input type="button" value="-" onclick="deleteRow(this)">';
          
        }
      }
    }

    if (IDF === "uniform_allo") {
      opener.document.getElementById("store_ref").value = objSup.REF;
      opener.document.getElementById("store_name").value = objSup.shop_name;

      var rowCount = window.opener.document.getElementById("exampletable").rows
        .length;

      var i;

      for (i = 0; i < rowCount - 1; i++) {
        window.opener.document.getElementById("exampletable").deleteRow(1);
      }

      XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("objSub");
      if (XMLAddress1.length != 0) {
        var objSub = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
        console.log(objSub);

        var table = window.opener.document.getElementById("exampletable");

        var i;
        for (i = 0; i < objSub.length; i++) {
          
            var row = table.insertRow(table.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);

            cell1.innerHTML = objSub[i].ITEM_REF;
            cell2.innerHTML = objSub[i].item_name;
            cell3.innerHTML = objSub[i].des;
            cell4.innerHTML = objSub[i].selling_price;
            cell4.setAttribute("contentEditable", "true");
            cell4.setAttribute("style", "background-color: antiquewhite");

            cell5.innerHTML = objSub[i].quantity;
            cell5.setAttribute("contentEditable", "true");
            cell5.setAttribute("style", "background-color: antiquewhite");

            if (objSub[i].approve == "1") {
              cell6.innerHTML = "Approved";
            } else {
              cell6.innerHTML = "Not Approved";
            }

            cell7.innerHTML =
              '<input type="button" value="-" onclick="deleteRow(this)">';
          
        }
      }
    }

    if (IDF === "arts_allo") {
      opener.document.getElementById("store_ref").value = objSup.REF;
      opener.document.getElementById("store_name").value = objSup.shop_name;

      var rowCount = window.opener.document.getElementById("exampletable").rows
        .length;

      var i;

      for (i = 0; i < rowCount - 1; i++) {
        window.opener.document.getElementById("exampletable").deleteRow(1);
      }

      XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("objSub");
      if (XMLAddress1.length != 0) {
        var objSub = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
        console.log(objSub);

        var table = window.opener.document.getElementById("exampletable");

        var i;
        for (i = 0; i < objSub.length; i++) {
          
            var row = table.insertRow(table.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            var cell8 = row.insertCell(7);
            var cell9 = row.insertCell(8);
            var cell10 = row.insertCell(9);

            cell1.innerHTML = objSub[i].ITEM_REF;
            cell2.innerHTML = objSub[i].item_name;
            cell3.innerHTML = objSub[i].des;

            cell4.innerHTML = objSub[i].selling_price;
            cell4.setAttribute("contentEditable", "true");
            cell4.setAttribute("style", "background-color: antiquewhite");

            cell4.setAttribute("onkeyup", "cal_discount(this,'SELL');");

            cell5.innerHTML = objSub[i].discount;
            cell5.setAttribute("contentEditable", "true");
            cell5.setAttribute("style", "background-color: antiquewhite");

            cell5.setAttribute("onkeyup", "cal_discount(this,'DISRS');");

            var temp1 = objSub[i].selling_price / 100;
            var temp2 = objSub[i].discount / temp1;

            cell6.innerHTML = temp2.toFixed(2);
            cell6.setAttribute("contentEditable", "true");
            cell6.setAttribute("style", "background-color: antiquewhite");
            cell6.setAttribute("onkeyup", "cal_discount(this,'DISPER');");

            var sell_dis = objSub[i].selling_price - objSub[i].discount;
            cell7.innerHTML = sell_dis.toFixed(2);
            // cell7.setAttribute("contentEditable", "true");
            // cell7.setAttribute("style", "background-color: antiquewhite");

            cell8.innerHTML = objSub[i].quantity;
            cell8.setAttribute("contentEditable", "true");
            cell8.setAttribute("style", "background-color: antiquewhite");

            if (objSub[i].approve == "1") {
              cell9.innerHTML = "Approved";
            } else {
              cell9.innerHTML = "Not Approved";
            }

            cell10.innerHTML =
              '<input type="button" value="-" onclick="deleteRow(this)">';

          
        }
      }
    }

    self.close();
  }
}

$("#img_file").on("change", function () {
  var file_data = $("#img_file").prop("files")[0];
  var form_data = new FormData();
  form_data.append("fileToUpload", file_data);

  $.ajax({
    url: "m_store_data.php?Command=upload",
    dataType: "script",
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: "post",
    success: function (res) {
      // alert(res);


      // <img src="uploads/store/logo/5ef4ee67d7328.PNG" alt="" width="400" >
      document.getElementById("img_path").innerHTML =
        '<img src="uploads/store/logo/' + res + '" alt="" width="400" >';
      document.getElementById("img_logo").value = res;
    },
  });
});
