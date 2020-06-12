<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
    header('Content-Type: application/json');

    $sql = "SELECT registration_ref FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['registration_ref'];

    $tmpinvno = "000000" . $row["registration_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("REG/") . substr($tmpinvno, $lenth - 7);

    $en_name = "Registration";

    $objArray = Array();
    array_push($objArray,$no,$en_name);

    echo json_encode($objArray);
}



if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT registration_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $tmpinvno = "000000" . $row["registration_ref"];
        $no = $row["registration_ref"];
        
        $lenth = strlen($tmpinvno);
        $no1 = trim("REG/") . substr($tmpinvno, $lenth - 7);

        $sql = "Insert into m_registration(REF ,first_name ,last_name ,guardian_name ,guardian_tel ,address_1 ,address_2 ,tel_1 ,tel_2 ,sex ,dob ,email ,remark ,joineddate ,active,black_list)values
                        ('" . $no1 . "' ,'" . $_GET['first_name'] . "' ,'" . $_GET['last_name'] . "' ,'" . $_GET['guardian_name'] . "' ,'" . $_GET['guardian_tel'] . "' ,'" . $_GET['address_1'] . "' ,'" . $_GET['address_2'] . "' ,'" . $_GET['tel_1'] . "' ,'" . $_GET['tel_2'] . "' ,'" . $_GET['sex'] . "' ,'" . $_GET['dob'] . "' ,'" . $_GET['email'] . "' ,'" . $_GET['remark'] . "' ,'" . $_GET['joineddate'] . "' ,'" . $_GET['active'] . "','" . $_GET['black_list'] . "')";
        $result = $conn->query($sql);
        
        
        $no2 = $no + 1;
        $sql = "update sys_info set registration_ref = $no2 where registration_ref = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "getForm") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $REF = $_GET["REF"];

    $sql = "select * from m_registration where REF = '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

    

    $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}



















if ($_GET["Command"] == "CL_save_reg") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT registration_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row["registration_ref"];
        $tmpinvno = "000000" . $no;
        $lenth = strlen($tmpinvno);
        $genno = trim("REG/") . substr($tmpinvno, $lenth - 7);

        $sql = "Insert into m_registration(REF ,first_name ,last_name ,guardian_name ,guardian_tel ,address_1 ,address_2 ,tel_1 ,tel_2 ,sex ,dob ,email ,remark ,joineddate ,active,black_list,platform)values
                        ('" . $genno . "' ,'" . $_GET['first_name'] . "' ,'" . $_GET['last_name'] . "' ,'" . $_GET['guardian_name'] . "' ,'" . $_GET['guardian_tel'] . "' ,'" . $_GET['address_1'] . "' ,'" . $_GET['address_2'] . "' ,'" . $_GET['tel_1'] . "' ,'" . $_GET['tel_2'] . "' ,'" . $_GET['sex'] . "' ,'" . $_GET['dob'] . "' ,'" . $_GET['email'] . "' ,'" . $_GET['remark'] . "' ,'" . $_GET['joineddate'] . "' ,'" . $_GET['active'] . "','" . $_GET['black_list'] . "','WEB')";
        $result = $conn->query($sql);

        $no2 = $no + 1;
        $sql = "update sys_info set registration_ref = $no2 where registration_ref = $no";
        $result = $conn->query($sql);

        

        $sql = "SELECT session_allo_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no1 = $row['session_allo_ref'];
        $tmpinvno = "000000" . $row["session_allo_ref"];
        $lenth = strlen($tmpinvno);
        $no = trim("SA/") . substr($tmpinvno, $lenth - 7);


        $allo_tm = array(json_decode($_GET['allo']));
        $allo = $allo_tm[0];
        for ($i=0; $i < sizeof($allo); $i++) { 
            $sql = "Insert into m_allo(REF, REF_REG ,REF_SESS)values
                        ('" . $no . "' ,'" . $genno . "' ,'" . $allo[$i] . "')";
            $result = $conn->query($sql);
        }
        
        $no2 = $no1 + 1;
        $sql = "update sys_info set session_allo_ref = $no2";
        $result = $conn->query($sql);


        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

