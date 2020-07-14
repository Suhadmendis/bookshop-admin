<?php

session_start();


require_once("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
    header('Content-Type: application/json');
    
    $ResponseXML = "";
    $ResponseXML .= "<new>";
    
    $sql      = "SELECT author_ref FROM sys_info";
    $result   = $conn->query($sql);
    $row      = $result->fetch();
    $no       = $row['author_ref'];
    $tmpinvno = "000000" . $row["author_ref"];
    $lenth    = strlen($tmpinvno);
    $no       = trim("AU/") . substr($tmpinvno, $lenth - 7);
    
    
    $en_name = "Author";
    
    $objArray = Array();
    array_push($objArray, $no, $en_name);
    
    echo json_encode($objArray);
    
    
}




if ($_GET["Command"] == "save_item") {
    
    
    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        $sql      = "SELECT author_ref FROM sys_info";
        $resul    = $conn->query($sql);
        $row      = $resul->fetch();
        $no       = $row["author_ref"];
        $tmpinvno = "000000" . $row["author_ref"];
        $lenth    = strlen($tmpinvno);
        $no1      = trim("AU/") . substr($tmpinvno, $lenth - 7);
        
        $REF_GET = $_GET['REF'];
        $name =$_GET['name'];
        $sql    = "SELECT  `REF` FROM `m_author`  WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $row    = $result->fetchall();

        
        if (isset($REF_GET) && count($row) >= 1) {


            $sql    = "UPDATE `m_author` SET `name`='" . $name . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $conn->commit();
            echo 'Updated Author successfully';
            
        } else {
            
            $sql    = "Insert into m_author(REF, name, user)values
    ('" . $no1 . "' ,'" . $_GET['name'] . "','" . $_SESSION['UserName'] . "')";
            $result = $conn->query($sql);
            
            
            $sql    = "Insert into m_author(REF, name, user)values
    ('" . $no1 . "' ,'" . $_GET['name'] . "','" . $_SESSION['UserName'] . "')";
            $result = $conn->query($sql);
            
            
            $no2    = $no + 1;
            $sql    = "update sys_info set author_ref = $no2 where author_ref = $no";
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

if ($_GET["Command"] == "getForm") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    
    $REF = $_GET["REF"];
    
    $sql = "select * from m_author where REF= '" . $REF . "'";
    
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }
    
    $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";
    
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}