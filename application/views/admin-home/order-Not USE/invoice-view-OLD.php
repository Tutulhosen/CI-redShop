<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        <title>Invoice</title>


        <style>
            /*
                 CSS-Tricks Example
                 by Chris Coyier
                 http://css-tricks.com
            */

            * { margin: 0; padding: 0; }
            body { font: 14px/1.4 Georgia, serif; }
            #page-wrap { width: 850px; margin: 0 auto; }

            textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
            table { border-collapse: collapse; }
            table td, table th { border: 1px solid black; padding: 5px; }

            #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }

            #address { width: 250px; height: 150px; float: left; }
            #customer { overflow: hidden; }

            #logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
            /*#logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }*/
            #logoctr { display: none; }
            #logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
            #logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
            #logohelp input { margin-bottom: 5px; }
            .edit #logohelp { display: block; }
            .edit #save-logo, .edit #cancel-logo { display: inline; }
            .edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
            #customer-title { font-size: 20px; font-weight: bold; float: left; }

            #meta { margin-top: 1px; width: 300px; float: right; }
            #meta td { text-align: right;  }
            #meta td.meta-head { text-align: left; background: #eee; }
            #meta td textarea { width: 100%; height: 20px; text-align: right; }

            #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
            #items th { background: #eee; }
            #items textarea { width: 80px; height: 50px; }
            #items tr.item-row td { border: 0; vertical-align: top; }
            #items td.description { width: 300px; }
            #items td.item-name { width: 175px; }
            #items td.description textarea, #items td.item-name textarea { width: 100%; }
            #items td.total-line { border-right: 0; text-align: right; }
            #items td.total-value { border-left: 0; padding: 10px; }
            #items td.total-value textarea { height: 20px; background: none; }
            #items td.balance { background: #eee; }
            #items td.blank { border: 0; }

            #terms { text-align: center; margin: 20px 0 0 0; }
            #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
            #terms textarea { width: 100%; text-align: center;}

            textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }

            .delete-wpr { position: relative; }
            .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
        </style>
        <style>
            #hiderow,
            .delete {
                display: none;
            }
        </style>
        <style type="text/css" media="print">
            @page {
                size: auto;   /* auto is the initial value */
                margin: 10;  /* this affects the margin in the printer settings */
            }
        </style>
    </head>

    <body>
        <?php
        include_once(APPPATH . '/libraries/Bangla_converter.php');
        include_once(APPPATH . '/libraries/Numbertowords.php');

        $bangla = new BanglaConverter();
        $numbertoword = new Numbertowords();



//        echo $numbertoword->convert_number(120); //English
        ?>
        <?php
        $company = $this->db
                ->select('*')
                ->where('id', 1)
                ->get('company')
                ->row();

        $customerID = $order->id;
        $paymentDue = $this->db
                ->select('*')
                ->where('customer_id', $customerID)
                ->get('bricks_sell_payment')
                ->row();
        /*
        $vehicleRentPrice = $this->db
                ->select('*')
                ->where('customer_id', $customerID)
                ->get('bricks_vehicle_rent')
                ->row();
        if($bricks_vehicle_rent->rent_price !=''){
            $vechicle_rentPrice=$bricks_vehicle_rent->rent_price;
        }else{
            $vechicle_rentPrice=0;
        }
        
        $vechicle_rentPrice=BanglaConverter::bn2en($vechicle_rentPrice);
         * 
         */
        
        
        $recTotalAmount = $this->db
                ->select('*')
                ->where('customer_id', $customerID)
                ->get('bricks_sell_payment_extra')
                ->result();
        
        $totReceived=0;
        if(!empty($recTotalAmount)){            
            foreach($recTotalAmount as $recAmt){
                $totReceived += $recAmt->receive_amount;
            }
            $totDue=$paymentDue->grand_total-$totReceived;
        }else{
            $totDue=$paymentDue->grand_total;
        }
        $totDue=BanglaConverter::en2bn($totDue);
        ?>
        <div id="page-wrap">
            <div style="margin-top:15px;"></div>
            <div  style="width: 30%; float: left">
                <img id="" src="<?php echo base_url(); ?>resources/img/bricks-logo.jpg" alt="logo" height="100" width="100" />
            </div>
            <div style="width:40%; float: left">
                <h1 style="text-align:center"><?php echo $company->name; ?></h1>
                <p style="text-align:center; margin: 0px">প্রোঃ- <?php echo $company->owner; ?></p>
                <p style="text-align:center; margin: 0px">গ্রামঃ <?php echo $company->village; ?>, ডাকঃ <?php echo $company->postoffice; ?></p>
                <p style="text-align:center; margin: 0px">উপজেলা- <?php echo $company->thana; ?>, জেলাঃ <?php echo $company->dist; ?> </p>
                <p style="text-align:center; margin: 0px">মালিকঃ <?php echo $company->owner_mobile; ?>,ম্যানেজারঃ <?php echo $company->manager_mobile; ?> </p>

            </div>
            <div style="width:30%; float: left"></div>



            <textarea id="header" style="height:30px">INVOICE (চালান)</textarea>



            <div style="clear:both"></div>

            <div id="customer">

                <textarea id="address">ক্রেতার নামঃ <?php echo $order->customer_name . "\n"; ?>
ঠিকানাঃ: <?php echo $order->address . "\n"; ?>
মোবাইলঃ <?php echo $order->mobile . "\n"; ?>
                </textarea>


                <table id="meta">
                    <tr>
                        <td class="meta-head">চালান (Inv) #</td>
                        <td><textarea><?php echo $order->invoice_no; ?> <?php // echo BanglaConverter::en2bn($order->invoice_no);    ?></textarea></td>
                    </tr>
                    <tr>

                        <td class="meta-head">চালান তারিখ </td>
                        <td><textarea id="date"><?php echo BanglaConverter::en2bn(date('Y-m-d')); ?></textarea></td>
                    </tr>
                    <tr>

                        <td class="meta-head">বিক্রয় তারিখ:</td>
                        <td><textarea id="date"><?php echo BanglaConverter::en2bn($order->sell_date); ?></textarea></td>
                    </tr>
                    <tr>
                        <td class="meta-head">বকেয়া টাকা:</td>
                        <td><div class="due"><?php echo $totDue; ?> ৳</div></td>
                    </tr>

                </table>

            </div>

            <table id="items">

                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Unit Cost</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Total Price</th>
                </tr>

                <?php
                $sell = $this->db
                        ->select('*')
                        ->where('customer_id', $order->id)
                        ->get('bricks_sell_extra')
                        ->result();
//                    echo $sell->bricks_type_id;
//                    echo '<pre>';
//                    print_r($sell);
//                    echo '</pre>';
                ?>
                <?php
                $grand_total = 0;
                foreach ($sell as $row) {

                    $brick_type = $this->db
                            ->select('*')
                            ->where('id', $row->brick_type_id)
                            ->get('bricks_type')
                            ->row();
                    $vehicle_rent = $this->db
                            ->select('*')
                            ->where('invoice_no', $order->invoice_no)
                            ->get('bricks_vehicle_rent')
                            ->row();
//                    echo '<pre>';
//                    print_r($row);
//                    echo '</pre>';

                    $totPrice = BanglaConverter::bn2en($row->total_price);

                    $grand_total += $totPrice;
                    ?>
                    <tr class="item-row">
                        <td class="item-name"><div class="delete-wpr"><textarea><?php echo $brick_type->type_name; ?></textarea><a class="delete"  title="Remove row"></a></div></td>
                                  <td class="description"><textarea><?php
                                if ($order->note != '') {
                                    echo $order->note;
                                } else {
                                    echo '-';
                                }
                                ?></textarea></td>
            		      <td><textarea class="cost"><?php echo BanglaConverter::en2bn($row->price); ?></textarea></td>
                        <td><textarea class="qty"><?php echo BanglaConverter::en2bn($row->qty); ?></textarea></td>
                        <td><span class="price"><?php echo BanglaConverter::en2bn($row->discount); ?></span></td>
                        <td><span class="price"><?php echo BanglaConverter::en2bn($row->total_price); ?></span></td>
                    </tr>
                <?php } ?>
                <tr class="item-row">
                    <td class="item-name"><div class="delete-wpr"><textarea>গাড়ী ভাড়া : <?php echo $vehicle_rent->vehicle_name; ?></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
                    <td class="description"><textarea><?php // echo $order->note;    ?>-</textarea></td>
                    <td><textarea class="cost"><?php echo BanglaConverter::en2bn($vehicle_rent->rent_price); ?></textarea></td>
                    <td><textarea class="qty"></textarea></td>
                    <td><span class="price"></span></td>
                    <td><span class="price"><?php echo BanglaConverter::en2bn($vehicle_rent->rent_price); ?></span></td>
                </tr>

<!--		  <tr class="item-row">
    <td class="item-name"><div class="delete-wpr"><textarea>SSL Renewals</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>

    <td class="description"><textarea>Yearly renewals of SSL certificates on main domain and several subdomains</textarea></td>
    <td><textarea class="cost">$75.00</textarea></td>
    <td><textarea class="qty">3</textarea></td>
    <td><span class="price">$225.00</span></td>
</tr>-->

<!--		  <tr id="hiderow">
  <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
</tr>-->

                <?php
                if (!isset($vehicle_rent->rent_price)) {
                    $vehicleRent = $vehicle_rent->rent_price;
                }

                if (!isset($vehicleRent)) {
                    $vehicleRent = '০'; // Zero price (bangla)
                }

                $vehicleRent = BanglaConverter::bn2en($vehicleRent);
                $grand_total = $grand_total + $vehicleRent;

                //total amount paid----------------------

                $paymentReceived = $this->db
                        ->select('*')
                        ->where('customer_id', $customerID)
                        ->get('bricks_sell_payment_extra')
                        ->result();
                $payReceived = 0;
                if (!empty($paymentReceived)) {
                    foreach ($paymentReceived as $rec) {
                        $payReceived += $rec->receive_amount;
                    }
                } else {
                    $payReceived = 0;
                }
                ?>

<!--		  <tr>
    <td colspan="3" class="blank"> </td>
    <td colspan="2" class="total-line">Subtotal</td>
    <td class="total-value"><div id="subtotal"><?php // echo BanglaConverter::en2bn($grand_total);    ?> ৳</div></td>
</tr>-->
                <tr>

                    <td colspan="3" class="blank"> </td>
                    <td colspan="2" class="total-line">সর্বমোট</td>
                    <td class="total-value"><div id="total"><?php echo BanglaConverter::en2bn($paymentDue->grand_total); ?> ৳</div></td>
                </tr>
                <tr>
                    <td colspan="3" class="blank"> </td>
                    <td colspan="2" class="total-line">আদায়কৃত টাকা:</td>

                    <td class="total-value"><textarea id="paid"><?php echo BanglaConverter::en2bn($payReceived); ?> ৳</textarea></td>
                </tr>
                <tr>
                    <td colspan="3" class="blank"> </td>
                    <td colspan="2" class="total-line balance">বকেয়া টাকা:</td>
                    <td class="total-value balance"><div class="due"><?php echo $totDue; ?> ৳</div></td>
                </tr>

            </table>

            <div id="terms">

                <textarea>কথায়(টাকা): <?php echo $numbertoword->convert_number($grand_total) ?></textarea>
            </div>
            <div id="terms">
                <!--<h5></h5>-->
                <div><b>ডেলিভারি :</b> ড্রাইভারের নামঃ <?php
                    if (isset($delivery->driver_name)) {
                        echo $delivery->driver_name;
                    }
                    ?>, মোবাইলঃ <?php
                    if (isset($delivery->mobile)) {
                        echo $delivery->mobile;
                    }
                    ?>, গাড়ীঃ <?php
                    if (isset($delivery->vehicle_name)) {
                        echo $delivery->vehicle_name;
                    }
                    ?>  </div>
            </div>

            <div id="customer">

                <div id="address" style="text-align:center; font-weight: bold;">
                    <br>
                        <br>
                            <br>
                                ---------------------------<br>
                                    ক্রেতার স্বাক্ষর
                                    </div>


                                    <div id="address" style="text-align:center; font-weight: bold; float:right">
                                        <br>
                                            <br>
                                                <br>
                                                    ---------------------------<br>
                                                        ম্যানেজার স্বাক্ষর
                                                        </div>
                                                        </div>
                                                        </div>
                                                        <footer>

                                                            <div id="terms" style="font-size: 12px">
                                                                <!--<h5>Terms</h5>-->
                                                                <div>Software Developed By : Moshahed Alam, Mob: 01749757077</div>
                                                            </div>
                                                        </footer>


                                                        </body>

                                                        </html>