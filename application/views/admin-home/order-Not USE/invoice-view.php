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
            body { font: 14px/1.4 Montserrat, serif; }
            #page-wrap { width: 850px; margin: 0 auto; }

            textarea { border: 0; font: 14px Montserrat, Serif; overflow: hidden; resize: none; }
            table { border-collapse: collapse; }
            table td, table th { border: 1px solid black; padding: 5px; }

            #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Montserrat, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }

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
            #terms h5 { text-transform: uppercase; font: 13px Montserrat, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
            #terms textarea { width: 100%; text-align: center;}

            /*textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }*/

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
//        include_once(APPPATH . '/libraries/Bangla_converter.php');
//        include_once(APPPATH . '/libraries/Numbertowords.php');
//
//        $bangla = new BanglaConverter();
//        $numbertoword = new Numbertowords();



        
// https://www.studentstutorial.com/php/number-to-words
function numberTowords($num)
{

$ones = array(
0 =>"ZERO",
1 => "ONE",
2 => "TWO",
3 => "THREE",
4 => "FOUR",
5 => "FIVE",
6 => "SIX",
7 => "SEVEN",
8 => "EIGHT",
9 => "NINE",
10 => "TEN",
11 => "ELEVEN",
12 => "TWELVE",
13 => "THIRTEEN",
14 => "FOURTEEN",
15 => "FIFTEEN",
16 => "SIXTEEN",
17 => "SEVENTEEN",
18 => "EIGHTEEN",
19 => "NINETEEN",
"014" => "FOURTEEN"
);
$tens = array( 
0 => "ZERO",
1 => "TEN",
2 => "TWENTY",
3 => "THIRTY", 
4 => "FORTY", 
5 => "FIFTY", 
6 => "SIXTY", 
7 => "SEVENTY", 
8 => "EIGHTY", 
9 => "NINETY" 
); 
$hundreds = array( 
"HUNDRED", 
"THOUSAND", 
"MILLION", 
"BILLION", 
"TRILLION", 
"QUARDRILLION" 
); /*limit t quadrillion */
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
	
while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
if($i < 20){ 
/* echo "getting:".$i; */
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
}
} 
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}

?>


        <div id="page-wrap">
            <div style="margin-top:15px;"></div>
            <div  style="width: 30%; float: left">
                <img id="" src="<?php echo base_url(); ?>resources/default.png" alt="logo" height="100" width="100" />
            </div>
            <div style="width:40%; float: left">
                <h1 style="text-align:center">Demo Company</h1>
                <p style="text-align:center; margin: 0px">Name- <?php echo 'Saifur' ?></p>
                <p style="text-align:center; margin: 0px">Address <?php echo 'Elephant Road, Dhaka, 1207' ?></p>
                <p style="text-align:center; margin: 0px">Mobile <?php echo '01749757077' ?> </p>

            </div>
            <div style="width:30%; float: left"></div>
            <textarea id="header" style="height:30px">INVOICE</textarea>

            <div style="clear:both"></div>
            <div id="customer">

                <textarea id="address">Customer Name: <?php echo $order->customer_name . "\n"; ?>
Address: <?php echo $order->address . "\n"; ?>
Mobile: <?php echo $order->mobile . "\n"; ?>
                </textarea>


                <table id="meta">
                    <tr>
                        <td class="meta-head">Inv#</td>
                        <td><textarea><?php echo '1000'.$order->id; ?> </textarea></td>
                    </tr>
                    <tr>

                        <td class="meta-head">Date </td>
                        <td><textarea id="date"><?php echo date('Y-m-d'); ?></textarea></td>
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


                    <tr class="item-row">
                        <td class="item-name">
                            <div class="delete-wpr"><textarea><?php echo $order->product_name; ?><?php echo "\n Product Code: ".$order->product_code; ?></textarea>
                                <a class="delete"  title="Remove row"></a>
                            </div>
                        </td>
                        <td class="description"><textarea><?php
                                if ($order->description != '') {
                                    echo $order->description;
                                }
                                ?></textarea>
                        </td>
                        <td><textarea class="cost"style="text-align:center"><?php echo $order->price; ?></textarea></td>
                        <td><textarea class="qty" style="text-align:center"><?php echo $order->qty; ?></textarea></td>
                        <td><span class="price" style="text-align:center"><?php echo ''; ?></span></td>
                        <td style="text-align:center"><span class="price" ><?php echo $order->price*$order->qty; ?></span></td>
                    </tr>

                


                <tr>

                    <td colspan="3" class="blank"> </td>
                    <td colspan="2" class="total-line">Grand Total</td>
                    <td class="total-value"><div id="total" style="text-align:center"><?php echo $order->price*$order->qty; ?></div></td>
                </tr>
<!--                <tr>
                    <td colspan="3" class="blank"> </td>
                    <td colspan="2" class="total-line">আদায়কৃত টাকা:</td>

                    <td class="total-value"><textarea id="paid"><?php // echo 'payRec'; ?> ৳</textarea></td>
                </tr>
                <tr>
                    <td colspan="3" class="blank"> </td>
                    <td colspan="2" class="total-line balance">বকেয়া টাকা:</td>
                    <td class="total-value balance"><div class="due"><?php // echo 'toDue'; ?> ৳</div></td>
                </tr>-->

            </table>

            <div id="terms">

                <textarea>Amount By Word: <?php
                $amountByWord= numberTowords($order->price*$order->qty);
                echo ucfirst($amountByWord); 
                ?></textarea>
            </div>
            <div id="terms">
                <!--<h5></h5>-->
                <div></div>
            </div>

            <div id="customer">

                <div id="address" style="text-align:center; font-weight: bold;">
                    <br>
                        <br>
                            <br>
                                ---------------------------<br>
                                    Customer Signature
                                    </div>


                                    <div id="address" style="text-align:center; font-weight: bold; float:right">
                                        <br>
                                            <br>
                                                <br>
                                                    ---------------------------<br>
                                                        Company Signature
                                                        </div>
                                                        </div>
                                                        </div>
                                                        <footer>

                                                            <div id="terms" style="font-size: 12px">
                                                                <!--<h5>Terms</h5>-->
                                                                <!--<div>Software Developed By : Moshahed Alam, Mob: 01749757077</div>-->
                                                            </div>
                                                        </footer>


                                                        </body>

                                                        </html>