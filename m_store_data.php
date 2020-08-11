<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
   header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT store_ref FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['store_ref'];
    $tmpinvno = "000000" . $row["store_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("ST/") . substr($tmpinvno, $lenth - 7);


    $en_name = "Store";


    // $_SESSION['store_logo'] = "";
    $objArray = Array();
    array_push($objArray,$no,$en_name);

    echo json_encode($objArray);

   
}




if ($_GET["Command"] == "save_item") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT store_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row["store_ref"];
        $tmpinvno = "000000" . $row["store_ref"];
        $lenth = strlen($tmpinvno);
        $no1 = trim("ST/") . substr($tmpinvno, $lenth - 7);


        $REF_GET = $_GET['REF'];

        $sql    = "SELECT  `REF` FROM `m_store`  WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $row    = $result->fetchall();

        if (isset($REF_GET) && count($row) >= 1) {


            $sql    = "UPDATE `m_store` SET `shop_name`='" . $_GET['shop_name'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $sql    = "UPDATE `m_store` SET `tagline`='" . $_GET['tagline'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $sql    = "UPDATE `m_store` SET `address`='" . $_GET['address'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $sql    = "UPDATE `m_store` SET `loctaion_point_lat`='" . $_GET['loctaion_point_lat'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $sql    = "UPDATE `m_store` SET `loctaion_point_lng`='" . $_GET['loctaion_point_lng'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $sql    = "UPDATE `m_store` SET `phone_number_1`='" . $_GET['phone_number_1'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $sql    = "UPDATE `m_store` SET `phone_number_2`='" . $_GET['phone_number_2'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $sql    = "UPDATE `m_store` SET `email_address`='" . $_GET['email_address'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $sql    = "UPDATE `m_store` SET `img_logo`='" . $_GET['img_logo'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $sql    = "UPDATE `m_store` SET `promotion_logo`='" . $_GET['promotion_logo'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            


            $conn->commit();
            echo 'Updated Store successfully';

        } else {

            $sql = "Insert into m_store(REF, shop_name, tagline, listing_type, sub_listing_type, vendor_ref, vendor_name, address, loctaion_point_lat, loctaion_point_lng, phone_number_1, phone_number_2, email_address, img_logo, approve, user, active,verify,promotion_logo)values
                            ('" . $no1 . "' ,'" . $_GET['shop_name'] . "' ,'" . $_GET['tagline'] . "' ,'" . $_GET['listing_type'] . "','" . $_GET['sub_listing_type'] . "' ,'" . $_GET['vendor_ref'] . "' ,'" . $_GET['vendor_name'] . "' ,'" . $_GET['address'] . "' ,'" . $_GET['loctaion_point_lat'] . "' ,'" . $_GET['loctaion_point_lng'] . "' ,'" . $_GET['phone_number_1'] . "' ,'" . $_GET['phone_number_2'] . "' ,'" . $_GET['email_address'] . "' ,'" . $_GET['img_logo'] . "' ,'" . $_GET['approve'] . "' ,'" . $_SESSION['UserName'] . "','" . $_GET['active'] . "','" . $_GET['verify']. "','" . $_GET['promotion_logo'] . "')";
            $result = $conn->query($sql);
            
        
            $no2 = $no + 1;
            $sql = "update sys_info set store_ref = $no2 where store_ref = $no";
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

        $sql = "UPDATE `m_store` SET `cancel`='" . $cancel . "' WHERE REF = '" . $REF_GET . "'";
        echo $sql;
        $result = $conn->query($sql);
        $conn->commit();
        echo "Cancel Store successfully";

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



if ($_GET["Command"] == "getForm") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $REF = $_GET["REF"];

    $sql = "select * from m_store where REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

    $sql = "select * from store_item_allocation where STORE_REF = '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetchAll()) {
        for ($i=0; $i < sizeof($row) ; $i++) { 
            $sqlSub = "SELECT item_name, des, approve FROM m_item where REF = '" . $row[$i]['ITEM_REF'] . "'";
            $resulSub = $conn->query($sqlSub);
            $rowSub = $resulSub->fetch();

            $row[$i]['item_name'] = $rowSub['item_name'];
            $row[$i]['des'] = $rowSub['des'];
            $row[$i]['approve'] =  $rowSub['approve'];
        }


        $ResponseXML .= "<objSub><![CDATA[" . json_encode($row) . "]]></objSub>";
    }
    

    $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "upload") {
    
    
    // print_r($_FILES);
    $target_dir = "uploads/store/logo/";
    $filename = explode(".",$_FILES["fileToUpload"]["name"]);
    
    $uniq = uniqid();
    
    $filename =  $uniq.'.'.$filename[1];
    // $_SESSION['store_logo'] = $filename;

    $target_file = $target_dir . $filename;
    // echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo $filename;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }



}

if ($_GET["Command"] == "upload_pro") {


    // print_r($_FILES);
    $target_dir = "uploads/store/promotion/";
    $filename = explode(".",$_FILES["fileToUploads"]["name"]);

    $uniq = uniqid();

    $filename =  $uniq.'.'.$filename[1];
    // $_SESSION['store_logo'] = $filename;

    $target_file = $target_dir . $filename;
    // echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUploads"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUploads"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUploads"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            echo $filename;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }



}