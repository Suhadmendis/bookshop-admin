<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <style>
        #invoice{
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #ad1f23

        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #ad1f23
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }
    </style>

</head>
<body>
    
<?php

require_once ("DB_connector.php");




$sql = "SELECT * FROM m_order where REF= '" . $_GET['REF'] . "'";
$result = $conn->query($sql);
$order = $result->fetch();
//print_r($order);
//echo '<br>';
//echo $order['REF'];
//echo '<br>';
//echo '<br>';
$sql = "SELECT * FROM m_registration where REF= '" . $order['user_ref'] . "'";
$result = $conn->query($sql);
$registration = $result->fetch();
//print_r($registration);
//echo '<br>';
//echo $registration['REF'];
//echo '<br>';
//echo $registration['address_1'];
//echo '<br>';
$objArray = Array();
$sql = "SELECT * FROM m_order_detail where REF= '" .  $_GET['REF'] . "'";
$result = $conn->query($sql);
$order_detail = $result->fetchAll();

//print_r($order_detail);
//echo '<br>';
////echo $order_detail[0]['REF'];
//echo '<br>';
//echo '<br>';

//echo '<h1>Hello</h1>';
array_push($objArray, $order_detail);

//echo json_encode($objArray);



//for ($i=0; $i < sizeof($order_detail); $i++) {
//
//    $order_detail[$i]['REF'];
//    $order_detail[$i]['user_ref'];
//}

$sql = "SELECT * FROM sys_info";
$result = $conn->query($sql);
$company = $result->fetch();
//print_r($order);
//echo '<br>';
//echo $company['id'];
//echo '<br>';
//echo '<br>';





//$sql = "SELECT * FROM m_registration";
//$result = $conn->query($sql);
//$row = $result->fetch();
//
//$sql = "SELECT * FROM m_registration";
//$result = $conn->query($sql);
//$row = $result->fetchAll();
//
//$sql = "SELECT * FROM m_registration";
//$result = $conn->query($sql);
//$row = $result->fetchAll();
//
//    print_r($row);
//
//for ($i=0; $i < sizeof($row); $i++) {
//    $row[$i]['ugfy8u'];
//}



?>
    

 
    <div id="invoice">

        <div class="toolbar hidden-print">
            <div class="text-right">
                <!-- <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button> -->
                <!-- <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
            </div>
            <hr>
        </div>
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col">
                            
                                <img src="img/logo123.PNG" width="300" data-holder-rendered="true" />
                             
                        </div>
                        <div class="col company-details">
                            <h2 class="name">

                                <?php echo $company['COM_NAME']; ?>
                              
                            </h2>
                            <div><?php echo $company['COM_ADD1']; ?></div>
                            <div><?php echo $company['COM_TEL1']; ?></div>
                            <div><?php echo $company['COM_EMAIL']; ?></div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">INVOICE TO:</div>
                            <h2 class="to"><?php echo $registration['first_name'] . " " . $registration['middle_name'] . " " . $registration['last_name'];?></h2>
                            <div class="address"><?php echo $registration['address_1'];?></div>
                            <div class="email"><?php echo $registration['email'];?></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">INVOICE <?php echo $order['REF'];?></h1>
                            <div class="date">Date of Invoice: <?php echo $order['date'];?></div>
<!--                            <div class="date">Due Date: 30/10/2018</div>-->
                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th class="text-left">NO</th>
                                <th class="text-left">Name</th>
                                <th class="text-left">Store</th>
                                <th class="text-left">Unit Price</th>
                                <th class="text-left">Quantity</th>
                                <th class="text-left">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=0;
                        $total=0.00;
                       for ($i=0; $i < sizeof($order_detail); $i++) {
                           $no++;
                           $unit_price=$order_detail[$i]['price'];
                           $total+=$order_detail[$i]['price'] * $order_detail[$i]['quantity'];
                           $sql = "SELECT * FROM m_store where REF= '" . $order_detail[$i]['store_ref'] . "'";
//                           echo $sql;
                           $result = $conn->query($sql);
                           $store = $result->fetch();
//                           echo $store['REF'];
//                           echo $store['id'];
//                           print_r($registration);
                           ?>
                           <tr>
                               <td class="no text-right"><?php  echo $no ?></td>
                               <td class="text-left"><?php echo $order_detail[$i]['Item_name']; ?></td>
                               <td class="text-left"><?php echo $store['shop_name']; ?></td>
                               <td class="text-right"><?php echo number_format($unit_price,2); ?></td>
                               <td class="text-right"><?php echo $order_detail[$i]['quantity']; ?></td>
                               <td class="text-right"><?php echo number_format($order_detail[$i]['price'] * $order_detail[$i]['quantity'],2); ?></td>
                           </tr>
                           <?php
                        }?>

                        </tbody>
                        <tfoot>

                            <tr>
                                <td></td>

                                <td colspan="2"></td>
                                <td colspan="2">SUBTOTAL</td>
                                <td><?php echo $total?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"></td>
                                <td colspan="2">TAX</td>
                                <td>---------</td>
                            </tr>
                            <tr>
                               <td></td>
                                <td colspan="2"></td>
                                <td colspan="2">GRAND TOTAL</td>
                                <td><?php echo $total?></td>
                            </tr>
                        </tfoot>
                    </table>
<!--                    <div class="thanks">Thank you!</div>-->
<!--                    <div class="notices">-->
<!--                        <div>NOTICE:</div>-->
<!--                        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>-->
<!--                    </div>-->
                </main>
<!--                <footer>-->
<!--                    Invoice was created on a computer and is valid without the signature and seal.-->
<!--                </footer>-->
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>





    <script>
        $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
    </script>

</body>
</html>