<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
   header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT publisher_ref FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['publisher_ref'];
    $tmpinvno = "000000" . $row["publisher_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("PUB/") . substr($tmpinvno, $lenth - 7);


    $en_name = "Publisher";

    $objArray = Array();
    array_push($objArray,$no,$en_name);

    echo json_encode($objArray);

   
}




if ($_GET["Command"] == "save_item") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT publisher_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row["publisher_ref"];
        $tmpinvno = "000000" . $row["publisher_ref"];
        $lenth = strlen($tmpinvno);
        $no1 = trim("PUB/") . substr($tmpinvno, $lenth - 7);

      
        $REF_GET = $_GET['REF'];
        $name =$_GET['name'];
        $sql    = "SELECT  `REF` FROM `m_publisher`  WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $row    = $result->fetchall();

        if (isset($REF_GET) && count($row) >= 1) {


            $sql    = "UPDATE `m_publisher` SET `name`='" . $name . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $conn->commit();
            echo 'Updated Publisher successfully';
            
        }else{

            $sql = "Insert into m_publisher(REF, name, user)values
            ('" . $no1 . "' ,'" . $_GET['name'] . "','" . $_SESSION['UserName'] . "')";
            $result = $conn->query($sql);


            $no2 = $no + 1;
            $sql = "update sys_info set publisher_ref = $no2 where publisher_ref = $no";
            $result = $conn->query($sql);

            $sql = "Insert into sys_log(REF, entry, operation, user, ip)values
                        ('" . $no1 . "' ,'entry' ,'SAVE'  ,'" . $_SESSION['UserName'] . "' ,'ip')";
            $result = $conn->query($sql);



            $conn->commit();
            echo "Saved";
        }


       
    } catch (Exception $e) {
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

        $sql = "UPDATE `m_publisher` SET `cancel`='" . $cancel . "' WHERE REF = '" . $REF_GET . "'";
        echo $sql;
        $result = $conn->query($sql);
        $conn->commit();
        echo "Cancel successfully";

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
        $sql = "UPDATE `m_publisher` SET `approve`='" . $approve . "' WHERE REF = '" . $no1 . "'";
        echo $sql;
        $result = $conn->query($sql);

        $sql = "Insert into sys_log(REF, entry, operation, user, ip)values
                        ('" . $no1 . "' ,'entry' ,'Approved'  ,'" . $_SESSION['UserName'] . "' ,'ip')";
        $result = $conn->query($sql);



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

    $sql = "select * from m_publisher where REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

   $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
