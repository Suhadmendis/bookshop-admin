<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
   header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT author_ref FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['author_ref'];
    $tmpinvno = "000000" . $row["author_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("AU/") . substr($tmpinvno, $lenth - 7);


    $en_name = "Student Verification";

    $objArray = Array();
    array_push($objArray,$no,$en_name);

// first_name1
// second_name1
// school1
// std_id1
// s1_approve
// first_name2
// second_name2
// school2
// std_id2
// s2_approve
// first_name3
// second_name3
// school3
// std_id3
// s3_approve

    $sql = "SELECT * FROM m_registration";
    $result = $conn->query($sql);
    $row = $result->fetchAll();
    $students = Array();

    for ($i=0; $i < sizeof($row); $i++) { 
        
        if ($row[$i]['std_id1'] != "" & $row[$i]['s1_approve'] == 0) {
            $std_detail = Array();
            array_push($std_detail, $row[$i]['first_name1']);
            array_push($std_detail, $row[$i]['second_name1']);
            
            $sql = "SELECT * FROM m_school where REF = '" . $row[$i]['school1'] . "'";
            $result = $conn->query($sql);
            $row_school = $result->fetch();
            array_push($std_detail, $row_school['name']);
            array_push($std_detail, $row[$i]['std_id1']);
            array_push($std_detail, $row[$i]['s1_approve']);
            array_push($std_detail, "1");

            array_push($students, $std_detail);
        }

        if ($row[$i]['std_id2'] != "" & $row[$i]['s2_approve'] == 0) {
            $std_detail = Array();
            array_push($std_detail, $row[$i]['first_name2']);
            array_push($std_detail, $row[$i]['second_name2']);
            
            $sql = "SELECT * FROM m_school where REF = '" . $row[$i]['school2'] . "'";
            $result = $conn->query($sql);
            $row_school = $result->fetch();
            array_push($std_detail, $row_school['name']);
            array_push($std_detail, $row[$i]['std_id2']);
            array_push($std_detail, $row[$i]['s2_approve']);
            array_push($std_detail, "2");

            array_push($students, $std_detail);
        }

        if ($row[$i]['std_id3'] != "" & $row[$i]['s3_approve'] == 0) {
            $std_detail = Array();
            array_push($std_detail, $row[$i]['first_name3']);
            array_push($std_detail, $row[$i]['second_name3']);
            
            $sql = "SELECT * FROM m_school where REF = '" . $row[$i]['school3'] . "'";
            $result = $conn->query($sql);
            $row_school = $result->fetch();
            array_push($std_detail, $row_school['name']);
            array_push($std_detail, $row[$i]['std_id3']);
            array_push($std_detail, $row[$i]['s3_approve']);
            array_push($std_detail, "3");

            array_push($students, $std_detail);
        }
    }




    array_push($objArray,$students);

    echo json_encode($objArray);

   
}




if ($_GET["Command"] == "save_item") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT author_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row["author_ref"];
        $tmpinvno = "000000" . $row["author_ref"];
        $lenth = strlen($tmpinvno);
        $no1 = trim("AU/") . substr($tmpinvno, $lenth - 7);

        $sql = "Insert into m_author(REF, name, user)values
                        ('" . $no1 . "' ,'" . $_GET['name'] . "','" . $_SESSION['UserName'] . "')";
        $result = $conn->query($sql);
        
        
        $no2 = $no + 1;
        $sql = "update sys_info set author_ref = $no2 where author_ref = $no";
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





if ($_GET["Command"] == "approve") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

 
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];
        $agepoint = $_GET['agepoint'];

        if ($agepoint == 1) {
            $sql = "update m_registration set s1_approve = '1' where first_name1 = '" . $fname . "' and second_name1 = '" . $lname . "'";
            $result = $conn->query($sql);    
        }

        if ($agepoint == 2) {
            $sql = "update m_registration set s2_approve = '1' where first_name2 = '" . $fname . "' and second_name2 = '" . $lname . "'";
            $result = $conn->query($sql);    
        }

        if ($agepoint == 3) {
            $sql = "update m_registration set s3_approve = '1' where first_name3 = '" . $fname . "' and second_name3 = '" . $lname . "'";
            $result = $conn->query($sql);    
        }
        
        

        $sql = "Insert into sys_log(REF, entry, operation, user, ip)values
                        ('" . uniqid() . "' ,'entry' ,'Student approve'  ,'" . $_SESSION['UserName'] . "' ,'ip')";
        $result = $conn->query($sql);



        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}