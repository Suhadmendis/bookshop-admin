<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
   header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT school_ref FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['school_ref'];
    $tmpinvno = "000000" . $row["school_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("SCL/") . substr($tmpinvno, $lenth - 7);


    $en_name = "School";

    $objArray = Array();
    array_push($objArray,$no,$en_name);

    echo json_encode($objArray);

   
}
