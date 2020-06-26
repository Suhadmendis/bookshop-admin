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


    $en_name = "Uniform";

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


        


        $sql = "Insert into m_item(REF, category_name, school_ref, school_name, item_name, des, user, listtype,img)values
                        ('" . $no1 . "' ,'" . $_GET['category_name'] . "' ,'" . $_GET['school_ref'] . "' ,'" . $_GET['school_name'] . "'  ,'" . $_GET['item_name'] . "' ,'" . $_GET['des'] . "', '" . $_SESSION['UserName'] . "','UN','" . $_GET['img_logo'] . "')";
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




if ($_GET["Command"] == "upload") {
    
    
    // print_r($_FILES);
    $target_dir = "uploads/item/uniforms/";
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