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




if ($_GET["Command"] == "save_item") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT school_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row["school_ref"];
        $tmpinvno = "000000" . $row["school_ref"];
        $lenth = strlen($tmpinvno);
        $no1 = trim("SCL/") . substr($tmpinvno, $lenth - 7);

        $REF_GET = $_GET['REF'];
        $name =$_GET['name'];
        $sql    = "SELECT  `REF` FROM `m_school`  WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $row    = $result->fetchall();


        if (isset($REF_GET) && count($row) >= 1) {


            $sql    = "UPDATE `m_school` SET `name`='" . $name . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $conn->commit();
            echo 'Updated School successfully';
            
        }else{
                    
        $sql = "Insert into m_school(REF, name, user)values
                ('" . $no1 . "' ,'" . $_GET['name'] . "','" . $_SESSION['UserName'] . "')";
        $result = $conn->query($sql);


        // print_r(json_decode($_GET['items']));
        $items = json_decode($_GET['items']);

        for ($i=0; $i < sizeof($items); $i++) { 
        //    echo $items[$i]->Reference;
           $sql = "Insert into m_school_level(SCHOOL_REF, LEVEL_REF, user)values
                ('" . $no1 . "' ,'" . $items[$i]->Reference . "','" . $_SESSION['UserName'] . "')";
        $result = $conn->query($sql);

        // echo $sql;
        }


        $no2 = $no + 1;
        $sql = "update sys_info set school_ref = $no2 where school_ref = $no";
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

        $sql = "UPDATE `m_school` SET `cancel`='" . $cancel . "' WHERE REF = '" . $REF_GET . "'";
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
        $sql = "UPDATE `m_school` SET `approve`='" . $approve . "' WHERE REF = '" . $no1 . "'";
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

    $sql = "select * from m_school where REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

   $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
