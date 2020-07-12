<?php
session_start();
include_once './DB_connector.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


        <title>Search Shops</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



            <!-- <script language="JavaScript" src="js/search_joborder.js"></script> -->

            <script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script language="JavaScript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script language="JavaScript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

            <script language="JavaScript" src="js/m_uniform.js"></script>



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
                        <th>Category</th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>Approve</th>
                        <!-- not approve -->
                    </tr>
                </thead>

                <tbody>
                <?php

                
                $sql = "SELECT * from m_item where listtype = 'UN'";
              

              

                foreach ($conn->query($sql) as $row) {
                
                    $REF = $row['REF'];
                      
                    if($row['approve'] == "1"){
                        $app = "Approved";
                    }else{
                        $app = "Not Approved";
                    }


                    $category_name = "";

                if ($row['category_name'] == "UMAL") {
                    $category_name = "Male";
                }
                if ($row['category_name'] == "UFEM") {
                    $category_name = "Female";
                }
                if ($row['category_name'] == "UACC") {
                    $category_name = "Accessories";
                }


                if ($row['category_name'] == "CFOR") {
                    $category_name = "Formal Wear";
                }
                if ($row['category_name'] == "CTHE") {
                    $category_name = "Themed Costumes";
                }
                if ($row['category_name'] == "ACC") {
                    $category_name = "Accessories";
                }


                if ($row['category_name'] == "FMAL") {
                    $category_name = "Male";
                }
                if ($row['category_name'] == "FFEM") {
                    $category_name = "Female";
                }
                if ($row['category_name'] == "FACC") {
                    $category_name = "Accessories";
                }
               





                    echo "<tr>                
                              <td onclick=\"getForm('$REF','$IDF');\">" . $REF . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $category_name . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['item_name'] . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['selling_price'] . "</a></td>

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

