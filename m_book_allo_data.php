<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
    header('Content-Type: application/json');

   

    // $sql = "SELECT session_allo_ref FROM sys_info";
    // $result = $conn->query($sql);
    // $row = $result->fetch();
    // $no = $row['session_allo_ref'];

    // $tmpinvno = "000000" . $row["session_allo_ref"];
    // $lenth = strlen($tmpinvno);
    // $no = trim("SA/") . substr($tmpinvno, $lenth - 7);


    // $en_name = "Session Allocation";
    
    // $sql = "SELECT * from m_session";
    //     $result = $conn->query($sql);
    //     $row = $result->fetchAll();
    
    // $objArray = Array();
    // array_push($objArray,$no,$en_name,$row);

    // $sql = "SELECT REF_SESS,count(REF_SESS) as allocated from m_allo group by REF_SESS";
    // $result = $conn->query($sql);
    // $row1 = $result->fetchAll();
    
   
    // array_push($objArray,$row1);

    // echo json_encode($objArray);
}



if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        $no = $_GET['store_ref'];


         $items = json_decode($_GET['items'],true);

        for ($i=0; $i < sizeof($items); $i++) { 

            $sql = "SELECT * FROM store_item_allocation where STORE_REF = '" . $no . "' and ITEM_REF = '" . $items[$i]['Reference'] . "'";
            $result = $conn->query($sql);
            $row = $result->fetch();

            if ($row['STORE_REF'] == "") {
                $sql = "Insert into store_item_allocation(STORE_REF, ITEM_REF ,selling_price ,quantity)values
                                ('" . $no . "','" . $items[$i]['Reference'] . "', '" . $items[$i]['Selling Price'] . "', '" . $items[$i]['Quantity'] . "')";
                $result = $conn->query($sql);
            }else{
                $sql = "update store_item_allocation set selling_price = '" . $items[$i]['Selling Price'] . "' where STORE_REF = '" . $no . "' and ITEM_REF = '" . $items[$i]['Reference'] . "'";
                $result = $conn->query($sql);

                $sql = "update store_item_allocation set quantity = '" . $items[$i]['Quantity'] . "' where STORE_REF = '" . $no . "' and ITEM_REF = '" . $items[$i]['Reference'] . "'";
                $result = $conn->query($sql);
            }


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

    $sql = "select * from m_store where REF= '" . $REF . "'";
    echo $sql;

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }
//     $sql = "select * from m_item where store_ref = '" . $REF . "'";

//     $sql = $conn->query($sql);
//     if ($row = $sql->fetchAll()) {
//     }
//     $ResponseXML .= "<objSub><![CDATA[" . json_encode($row) . "]]></objSub>";

   $ResponseXML .= "<IDF><![CDATA[" . $sql . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
}














if ($_GET["Command"] == "CL_get_sess") {
    header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT m_session.mdate, m_session.from_time, m_session.to_time, m_session.REF, m_session.session_name, m_session.location, m_session.slots,count(m_allo.REF_SESS) as allocated
        from m_session 
        join m_allo
        on m_session.REF = m_allo.REF_SESS 
        GROUP BY m_session.REF";
    $result = $conn->query($sql);
    $row = $result->fetchAll();

    echo json_encode($row);
}



if ($_GET["Command"] == "approve") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

       $no1 = $_GET['REF'];
        $sql = "update m_store set approve = '1' where REF = '" . $no1 . "'";
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



if ($_GET["Command"] == "setapprove") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

       $no1 = $_GET['REF'];
       
       if($_GET['app'] == "yes"){
           $sql = "update m_item set approve = '1' where REF = '" . $no1 . "'";
           $result = $conn->query($sql);
       }else{
           $sql = "update m_item set approve = '0' where REF = '" . $no1 . "'";
           $result = $conn->query($sql);
       }

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