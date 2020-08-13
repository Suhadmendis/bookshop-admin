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

        $book_REF = $_GET['REF'];
        $sql    = "SELECT  `REF`,`img` FROM `m_item`  WHERE REF = '" . $book_REF . "'";
        $result = $conn->query($sql);
        $row    = $result->fetchall();



        $schools = json_decode($_GET['schools']);
        $levels = json_decode($_GET['levels']);


        if (isset($book_REF) && count($row) >= 1) {

           
            if($_GET['img_logo']!==''){

                $img = $_GET['img_logo'];

                
            }else{
                $img= $row[0]['img'];
               
            }
            $sql    = "UPDATE `m_item` SET `category_name`='" .$_GET['category_name'] . "',`school_ref`='" . $_GET['school_ref'] . "',`school_name`='" . $_GET['school_name'] . "',`level_ref`='" . $_GET['level_ref'] . "',`level_name`='" . $_GET['level_name'] . "',`author_ref`='" . $_GET['author_ref'] . "',`author_name`='" . $_GET['author_name'] . "',`publisher_ref`='" . $_GET['publisher_ref'] . "',`publisher_name`='" . $_GET['publisher_name'] . "',`item_name`='" . $_GET['item_name'] . "',`des`='" . $_GET['des'] . "',`isbn`='" . $_GET['isbn'] . "',`user`='" . $_SESSION['UserName'] . "',`listtype`='BKS',`img`='" . $img . "' WHERE REF = '" . $book_REF . "'";
            $result = $conn->query($sql);



            $sqldel = "delete from m_item_school where ITEM_REF='" . $book_REF . "'";
            $result = $conn->query($sqldel);

            for ($i=0; $i < sizeof($schools); $i++) { 
                //    echo $items[$i]->Reference;
                $sql = "Insert into m_item_school(ITEM_REF, SCHOOL_REF, LEVEL_REF, user)values
                        ('" . $book_REF . "' ,'" . $schools[$i]->{'School Reference'} . "','" . $schools[$i]->{'Level Reference'} . "','" . $_SESSION['UserName'] . "')";
                $result = $conn->query($sql);

            }

            
            $conn->commit();
            echo 'Updated Item successfully';
        }else{

            $sql = "Insert into m_item(REF, category_name, school_ref, school_name,level_ref,level_name,author_ref, author_name,publisher_ref, publisher_name, item_name, des,isbn, user, listtype, img)values
            ('" . $no1 . "' ,'" . $_GET['category_name'] . "' ,'" . $_GET['school_ref'] . "' ,'" . $_GET['school_name'] . "' ,'" . $_GET['level_ref'] . "' ,'" . $_GET['level_name'] . "' ,'" . $_GET['author_ref'] . "' ,'" . $_GET['author_name'] . "' ,'" . $_GET['publisher_ref'] . "' ,'" . $_GET['publisher_name'] . "' ,'" . $_GET['item_name'] . "' ,'" . $_GET['des'] . "' ,'" . $_GET['isbn'] . "' ,'" . $_SESSION['UserName'] . "','BKS','" . $_GET['img_logo'] . "')";
            $result = $conn->query($sql);



            

            for ($i=0; $i < sizeof($schools); $i++) { 
                //    echo $items[$i]->Reference;
                $sql = "Insert into m_item_school(ITEM_REF, SCHOOL_REF, LEVEL_REF, user)values
                        ('" . $no1 . "' ,'" . $schools[$i]->{'School Reference'} . "','" . $schools[$i]->{'Level Reference'} . "','" . $_SESSION['UserName'] . "')";
                $result = $conn->query($sql);

            }

            // for ($i=0; $i < sizeof($levels); $i++) { 
            //     //    echo $items[$i]->Reference;
            //     $sql = "Insert into m_item_level(ITEM_REF, LEVEL_REF, user)values
            //             ('" . $no1 . "' ,'" . $levels[$i]->Reference . "','" . $_SESSION['UserName'] . "')";
            //     $result = $conn->query($sql);

            // }

            $no2 = $no + 1;
            $sql = "update sys_info set item_ref = $no2 where item_ref = $no";
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

        $sql = "UPDATE `m_item` SET `cancel`='" . $cancel . "' WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $conn->commit();
        echo 'Cancel successfully';

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

    $sql = "select * from m_item_school where ITEM_REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetchall()) {

        for ($i=0; $i < sizeof($row); $i++) { 
            $sqlss = "SELECT * FROM m_school where REF = '" . $row[$i]['SCHOOL_REF'] . "'";
            $results = $conn->query($sqlss);
            $rows = $results->fetch();

            $row[$i]['school_name'] = $rows['name'];


            $sqlss = "SELECT * FROM m_level where REF = '" . $row[$i]['LEVEL_REF'] . "'";
            $results = $conn->query($sqlss);
            $rows = $results->fetch();

            $row[$i]['level_name'] = $rows['name'];

        }


    }
    
    $ResponseXML .= "<objschool><![CDATA[" . json_encode($row) . "]]></objschool>";

    // $sql = "select * from m_item_level where ITEM_REF= '" . $REF . "'";

    // $sql = $conn->query($sql);
    // if ($row = $sql->fetchall()) {

    //     for ($i=0; $i < sizeof($row); $i++) { 
    //         $sqlss = "SELECT * FROM m_level where REF = '" . $row[$i]['LEVEL_REF'] . "'";
    //         $results = $conn->query($sqlss);
    //         $rows = $results->fetch();

    //         $row[$i]['level_name'] = $rows['name'];

    //     }


    // }
    // $ResponseXML .= "<objlevel><![CDATA[" . json_encode($row) . "]]></objlevel>";

   $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}




if ($_GET["Command"] == "upload") {
    
    
    // print_r($_FILES);
    $target_dir = "uploads/item/books/";
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