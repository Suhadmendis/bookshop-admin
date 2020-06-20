<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
   header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT item_ref FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['item_ref'];
    $tmpinvno = "000000" . $row["item_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("ITEM/") . substr($tmpinvno, $lenth - 7);


    $en_name = "Book";

    $objArray = Array();
    array_push($objArray,$no,$en_name);

    echo json_encode($objArray);

   
}




if ($_GET["Command"] == "save_item") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT item_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row["item_ref"];
        $tmpinvno = "000000" . $row["item_ref"];
        $lenth = strlen($tmpinvno);
        $no1 = trim("ITEM/") . substr($tmpinvno, $lenth - 7);

        $sql = "Insert into m_item(REF, category_name, school_ref, school_name,level_ref,level_name,author_ref, author_name,publisher_ref, publisher_name, item_name, des,isbn, user, listtype)values
                        ('" . $no1 . "' ,'" . $_GET['category_name'] . "' ,'" . $_GET['school_ref'] . "' ,'" . $_GET['school_name'] . "' ,'" . $_GET['level_ref'] . "' ,'" . $_GET['level_name'] . "' ,'" . $_GET['author_ref'] . "' ,'" . $_GET['author_name'] . "' ,'" . $_GET['publisher_ref'] . "' ,'" . $_GET['publisher_name'] . "' ,'" . $_GET['item_name'] . "' ,'" . $_GET['des'] . "' ,'" . $_GET['isbn'] . "' ,'" . $_SESSION['UserName'] . "','BKS')";
        $result = $conn->query($sql);
       
        $no2 = $no + 1;
        $sql = "update sys_info set item_ref = $no2 where item_ref = $no";
        $result = $conn->query($sql);

        $sql = "Insert into sys_log(REF, entry, operation, user, ip)values
                        ('" . $no1 . "' ,'entry' ,'SAVE'  ,'" . $_SESSION['UserName'] . "' ,'ip')";
        $result = $conn->query($sql);



        $conn->commit();
        echo "Saved";
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
        $sql = "update m_item set approve = '1' where REF = '" . $no1 . "'";
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

    $sql = "select * from m_item where REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

   $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}