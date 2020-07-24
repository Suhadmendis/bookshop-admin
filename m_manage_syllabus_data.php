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
    
    
    $en_name = "Manage Syllabus";
    
    $objArray = Array();
    array_push($objArray, $no, $en_name);





    $sql = "SELECT * FROM m_school";
    $result = $conn->query($sql);
    $row = $result->fetchall();


    $syllabus = Array();

    for ($i=0; $i < sizeof($row); $i++) { 
        $sql = "SELECT * FROM m_level";
        $result = $conn->query($sql);
        $level = $result->fetchall();

        for ($j=0; $j < sizeof($level); $j++) { 
            $sub_syllabus = Array();
            array_push($sub_syllabus, $row[$i]);
            array_push($sub_syllabus, $level[$j]);

            array_push($syllabus, $sub_syllabus);
        }


    }
    array_push($objArray, $syllabus);
    
    echo json_encode($objArray);
    
    
}


if ($_GET["Command"] == "getbooks") {
    header('Content-Type: application/json');
    
  
    
    $objArray = Array();

    $sql = "SELECT * FROM m_syllabus where school_ref = '" . $_GET['school_ref'] . "' and level_ref = '" . $_GET['level_ref'] . "'";
    $result = $conn->query($sql);
    $row = $result->fetchall();


    array_push($objArray, $row);
    
    echo json_encode($objArray);
    
    
}






if ($_GET["Command"] == "item") {
    $request_body = file_get_contents('php://input');
    
    $items = json_decode($request_body);
    
    // print_r($data);


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        $school_ref = $_GET['school_ref'];
        $level_ref = $_GET['level_ref'];


        // $sqldel = "delete from store_item_allocation where STORE_REF='" . $no . "'";
        // $result = $conn->query($sqldel);

        for ($i=0; $i < sizeof($items); $i++) { 

            // $sql = "SELECT * FROM store_item_allocation where STORE_REF = '" . $no . "' and ITEM_REF = '" . $items[$i]->Reference . "'";
            // $result = $conn->query($sql);
            // $row = $result->fetch();




            $sql = "Insert into m_syllabus(school_ref,level_ref,item_ref,quantity)values
                                ('" . $school_ref . "','" . $level_ref . "','" . $items[$i]->Reference . "','" . $items[$i]->{'Quantity'} . "')";
            $result = $conn->query($sql);

            
        }

       

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
    
    $sql = "select * from m_author where REF= '" . $REF . "'";
    
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }
    
    $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";
    
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}