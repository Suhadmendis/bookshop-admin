<?php
session_start();
include_once './DB_connector.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- <link href="style.css" rel="stylesheet" type="text/css" media="screen" /> -->


        <title>Search Registrations</title>
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



            <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



            <!-- <script language="JavaScript" src="js/search_joborder.js"></script> -->

            <script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script language="JavaScript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script language="JavaScript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


            <script language="JavaScript" src="js/m_registration.js"></script>



    </head>

    <body>

        
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Guadian's Name</th>
                        <th>Address</th>
                        <th>Tel</th>
                        <th>Email</th>
                        <th>Joined Date</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $sql = "SELECT * from m_registration";

                foreach ($conn->query($sql) as $row) {
                  
                    $REF = $row['REF'];

                    echo "<tr>                
                              <td onclick=\"getForm('$REF','$IDF');\">" . $REF . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['first_name'] . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['last_name'] . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['guardian_name'] . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['address_1'] . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['tel_1'] . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['email'] . "</a></td>
                              <td onclick=\"getForm('$REF','$IDF');\">" . $row['joineddate'] . "</a></td>
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

