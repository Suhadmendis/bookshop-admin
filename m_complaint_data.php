<?php

session_start();


require_once("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
    header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql      = "SELECT complaint_ref FROM sys_info";
    $result   = $conn->query($sql);
    $row      = $result->fetch();
    $no       = $row['complaint_ref'];
    $tmpinvno = "000000" . $row["complaint_ref"];
    $lenth    = strlen($tmpinvno);
    $no       = trim("COM/") . substr($tmpinvno, $lenth - 7);


    $en_name = "Complaint";

    $objArray = Array();
    array_push($objArray, $no, $en_name);

    echo json_encode($objArray);


}




if ($_GET["Command"] == "save_item") {



    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql      = "SELECT complaint_ref FROM sys_info";
        $resul    = $conn->query($sql);
        $row      = $resul->fetch();
        $no       = $row["complaint_ref"];
        $tmpinvno = "000000" . $row["complaint_ref"];
        $lenth    = strlen($tmpinvno);
        $no1      = trim("COM/") . substr($tmpinvno, $lenth - 7);

        $REF_GET = $_GET['REF'];
        $order_ref =$_GET['order_ref'];
        $issue_ref =$_GET['issue_ref'];
        $issue_name =$_GET['issue_name'];
        $name =$_GET['name'];
        $tel =$_GET['tel'];
        $email =$_GET['email'];
        $issue =$_GET['issue'];
        $sql    = "SELECT  `REF` FROM `m_complaint`  WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $row    = $result->fetchall();


        if (isset($REF_GET) && count($row) >= 1) {


            $sql    = "UPDATE `m_complaint` SET `name`='" . $name . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $conn->commit();
            echo 'Updated Complaint successfully';

        } else {

            $sql    = "Insert into m_complaint(REF,order_ref,issue_ref,issue_name, name,tel,email,issue, user)values
    ('" . $no1 . "' ,'" . $_GET['order_ref'] . "','". $_GET['issue_ref'] . "','". $_GET['issue_name'] . "','". $_GET['name'] . "','". $_GET['tel'] . "','". $_GET['email'] . "','". $_GET['issue'] . "','" . $_SESSION['UserName'] . "')";
            $result = $conn->query($sql);


            $no2    = $no + 1;
            $sql    = "update sys_info set complaint_ref = $no2 where complaint_ref = $no";
            $result = $conn->query($sql);

            $sql    = "Insert into sys_log(REF, entry, operation, user, ip)values
    ('" . $no1 . "' ,'entry' ,'SAVE'  ,'" . $_SESSION['UserName'] . "' ,'ip')";
            $result = $conn->query($sql);



            $conn->commit();
            echo "Saved";
        }


    }
    catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "cancel_imb") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $REF_GET = $_GET["REF"];
        $cancel = 1;

        $sql = "UPDATE `m_complaint` SET `cancel`='" . $cancel . "' WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $conn->commit();
        echo "Cancel Complaint successfully";

    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }

}

if ($_GET["Command"] == "approve") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $no1 = $_GET['REF'];
        $approve =1;
        $sql = "UPDATE `m_complaint` SET `approve`='" . $approve . "' WHERE REF = '" . $no1 . "'";
        echo $sql;
        $result = $conn->query($sql);

//        $sql = "Insert into sys_log(REF, entry, operation, user, ip)values
//                        ('" . $no1 . "' ,'entry' ,'Approved'  ,'" . $_SESSION['UserName'] . "' ,'ip')";
//        $result = $conn->query($sql);



        $conn->commit();
        echo "Approved";
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

    $sql = "select * from m_complaint where REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

    $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}