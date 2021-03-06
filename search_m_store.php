<?php
session_start();
include_once './DB_connector.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


        <title>Search Payments</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



            <!-- <script language="JavaScript" src="js/search_joborder.js"></script> -->

            <script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script language="JavaScript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script language="JavaScript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

            <script language="JavaScript" src="js/m_store.js"></script>



    </head>

    <body>

        <?php if (isset($_GET['cur'])) { ?>
            <input type="hidden" value="<?php echo $_GET['cur']; ?>" id="cur" />
            <?php
        } else {
            ?>
            <input type="hidden" value="" id="cur" />
            <?php
        }
        ?>
        <table width="735"   class="table table-bordered">

            <tr>
                <?php
                $IDF = "";
                if (isset($_GET['IDF'])) {
                    $IDF = $_GET["IDF"];
                }
                ?>
             
        </table>    
          <div id="filt_table" class="CSSTableGenerator container"> 
           <table id='example'  class='table table-bordered'>
               <thead>

                    <tr>
                        <th>Reference</th>
                        <th>Shop Name</th>
                        <th>Listing Type</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Approve</th>
                    </tr>
                </thead>

                <tbody>
                <?php

                if ($IDF == "book_allo") {
                    $sql = "SELECT * from m_store where listing_type = 'BKS'";
                }else if($IDF == "uniform_allo"){
                    $sql = "SELECT * from m_store where listing_type = 'UC'";
                }else if($IDF == "arts_allo"){
                    $sql = "SELECT * from m_store where listing_type = 'AC'";
                }else if($IDF == "health_allo"){
                    $sql = "SELECT * from m_store where listing_type = 'HS'";
                }else if($IDF == "snacks_allo"){
                    $sql = "SELECT * from m_store where listing_type = 'ES'";
                }else if($IDF == "toys_allo"){
                    $sql = "SELECT * from m_store where listing_type = 'TG'";
                }else if($IDF == "card_allo"){
                    $sql = "SELECT * from m_store where listing_type = 'CF'";
                }else{
                    $sql = "SELECT * from m_store";
                }
              

                foreach ($conn->query($sql) as $row) {
                
                    $REF = $row['REF'];

                    if($row['approve'] == "1"){
                        $app = "Approved";
                    }else{
                        $app = "Not Approved";
                    }
                    
                    $listing_type = "";
                    if ($row['listing_type'] == "BKS") {
                        $listing_type = "Books and Stationeries";
                    }

                    if ($row['listing_type'] == "UC") {
                        $listing_type = "Uniforms and Costumes";
                    }

                    if ($row['listing_type'] == "AC") {
                        $listing_type = "Arts and Crafts";
                    }

                    if ($row['listing_type'] == "HS") {
                        $listing_type = "Health and Sports";
                    }

                    if ($row['listing_type'] == "ES") {
                        $listing_type = "Snacks and Deco";
                    }

                    if ($row['listing_type'] == "TG") {
                        $listing_type = "Toys and Gifts";
                    }





                    echo "<tr>                
                              <td onclick=\"getForm('$REF','$IDF');\">" . $REF . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['shop_name'] . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $listing_type . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['address'] . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['phone_number_1'] . "</a></td>
                               <td onclick=\"getForm('$REF','$IDF');\">" . $app . "</a></td>
                             </tr>";
                }
                ?>
            </table>
        </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').dataTable();
    } );

</script>
    </body>
</html>

