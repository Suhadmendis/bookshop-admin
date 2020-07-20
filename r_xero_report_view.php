<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">


</head>
<body>
    <br><br>

    <div class="container-fluid">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>

                <th>ContactName</th>
                <th>EmailAddress</th>
                <th>POAddressLine1</th>
                <th>POAddressLine2</th>
                <th>POAddressLine3</th>
                <th>POAddressLine4</th>
                <th>POCity</th>
                <th>PORegion</th>
                <th>POPostalCode</th>
                <th>POCountry</th>
                <th>InvoiceNumber</th>
                <th>Reference</th>
                <th>InvoiceDate</th>
                <th>DueDate</th>
                <th>Total</th>
                <th>InventoryItemCode</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>UnitAmount</th>
                <th>Discount</th>
                <th>AccountCode</th>
                <th>TaxType</th>
                <th>TaxAmount</th>
                <th>TrackingName1</th>
                <th>TrackingOption1</th>
                <th>TrackingName2</th>
                <th>TrackingOption2</th>
                <th>Currency</th>
                <th>BrandingTheme</th>

                
            </tr>
        </thead>
        <tbody>





           <?php 
                require_once ("DB_connector.php");
            
                $sql = "SELECT * FROM m_item";
                $result = $conn->query($sql);
                $row = $result->fetchAll();


                $total_qty = "";
                $total_value = "";
            ?>
            

            <?php for ($i=0; $i < sizeof($row); $i++) { ?>

                <?php

                    

                    $sql_qty = "select sum(quantity) as qty, max(selling_price) as max, min(selling_price) as min, sum(selling_price) as value, count(*) as count from store_item_allocation WHERE ITEM_REF = '" . $row[$i]['REF'] . "'";
                    $result = $conn->query($sql_qty);
                    $row_info = $result->fetch();
                    
                    // $sql_max = "select max(selling_price) as max from store_item_allocation WHERE ITEM_REF = '" . $row[$i]['REF'] . "'";
                    // $result = $conn->query($sql_max);
                    // $row_max = $result->fetch();
                    
                    // $sql_min = "select min(selling_price) as min from store_item_allocation WHERE ITEM_REF = '" . $row[$i]['REF'] . "'";
                    // $result = $conn->query($sql_min);
                    // $row_min = $result->fetch();
                    
                    // $sql_value = "select sum(selling_price) as value from store_item_allocation WHERE ITEM_REF = '" . $row[$i]['REF'] . "'";
                    // $result = $conn->query($sql_value);
                    // $row_value = $result->fetch();
                    
                    // $sql_count = "select count(*) as count from store_item_allocation WHERE ITEM_REF = '" . $row[$i]['REF'] . "'";
                    // $result = $conn->query($sql_count);
                    // $row_count = $result->fetch();

                    $total_qty = $total_qty + $row_info['qty'];
                    $total_value = $total_value + $row_info['value'];
                    
                ?>

                <tr>
                    <td><?php echo $row[$i]['REF']; ?></td>
                    <td><?php echo $row[$i]['listtype']; ?></td>
                    <td><?php echo $row[$i]['category_name']; ?></td>
                    <td><?php echo $row[$i]['item_name']; ?></td>
                    <td><?php echo $row[$i]['des']; ?></td>
                    <td><?php echo $row[$i]['school_name']; ?></td>
                    <td><?php echo $row[$i]['REF']; ?></td>
                    <td><?php echo $row[$i]['listtype']; ?></td>
                    <td><?php echo $row[$i]['category_name']; ?></td>
                    <td><?php echo $row[$i]['item_name']; ?></td>
                    <td><?php echo $row[$i]['des']; ?></td>
                    <td><?php echo $row[$i]['school_name']; ?></td>
                    <td><?php echo $row[$i]['REF']; ?></td>
                    <td><?php echo $row[$i]['listtype']; ?></td>
                    <td><?php echo $row[$i]['category_name']; ?></td>
                    <td><?php echo $row[$i]['item_name']; ?></td>
                    <td><?php echo $row[$i]['des']; ?></td>
                    <td><?php echo $row[$i]['school_name']; ?></td>
                    <td><?php echo $row[$i]['school_name']; ?></td>

                    <td><?php echo $row[$i]['level_name']; ?></td>
                    <td><?php echo $row[$i]['author_name']; ?></td>
                    <td><?php echo $row[$i]['publisher_name']; ?></td>

                    <td><?php echo $row[$i]['isbn']; ?></td>
                    <td><?php echo $row_info['count']; ?></td>


                    <td><?php echo $row_info['qty']; ?></td>






                    <td><?php echo $row_info['max'] . " - " . $row_info['min']; ?></td>
                    <td><?php echo $row_info['value']; ?></td>
                    <td><?php echo $row[$i]['sys_time']; ?></td>
                    <td><?php echo $row[$i]['user']; ?></td>
                </tr>
                
            <?php } ?>


            


            
           
            
        </tbody>
        <tfoot>
            <tr>
                <th>ContactName</th>
                <th>EmailAddress</th>
                <th>POAddressLine1</th>
                <th>POAddressLine2</th>
                <th>POAddressLine3</th>
                <th>POAddressLine4</th>
                <th>POCity</th>
                <th>PORegion</th>
                <th>POPostalCode</th>
                <th>POCountry</th>
                <th>InvoiceNumber</th>
                <th>Reference</th>
                <th>InvoiceDate</th>
                <th>DueDate</th>
                <th>Total</th>
                <th>InventoryItemCode</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>UnitAmount</th>
                <th>Discount</th>
                <th>AccountCode</th>
                <th>TaxType</th>
                <th>TaxAmount</th>
                <th>TrackingName1</th>
                <th>TrackingOption1</th>
                <th>TrackingName2</th>
                <th>TrackingOption2</th>
                <th>Currency</th>
                <th>BrandingTheme</th>
            </tr>
        </tfoot>
    </table>
    
    <br><br>
        <h5>Total Quantity : <?php echo number_format($total_qty,2); ?></h5>
        <h5>Total Value : <?php echo "Rs. " . number_format($total_value,2); ?></h5>


        
    </div>





            

    

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>


    
    <script>
        $(document).ready(function() {
        var table = $('#example').DataTable( {
            // buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
            buttons: [ 'excel', 'csv', 'colvis' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
    </script>



</body>
</html>