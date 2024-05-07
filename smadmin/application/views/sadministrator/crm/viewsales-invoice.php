<?php
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    //$paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    $paise = ($decimal > 0) ? "" . ($words[(int)($decimal/10)*10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') .' and '. $paise;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales_Invoice__<?php echo $posts[0]['bill_no'].date('d-m-Y_hi'); ?> Pdf</title>

        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                
               /* margin: 0 auto;
               margin: 8.5cm 0px;*/
               margin: 0cm 0cm;
                /*margin-bottom: 0.5cm;*/
                box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
            }   /** Define now the real margins of every page in the PDF margin: 0cm 0cm;**/
            body {
                font-family: "sans-serif";
                /*margin: 0 auto;*/
                margin-top: 8.2cm;
                margin-left: 0cm;
                margin-right: 0cm;
                margin-bottom: 0cm;
            }/** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                /*top: 0cm;*/
                left: 0cm;
                right: 0cm;
                height: 8cm;
                background-color: #fff;
                border-bottom: 1px thin #fff; 
                /** Extra personal styles **/
            }/** Define the footer rules **/

            
            #title{
                color: black;
                text-align: center;
                line-height: 1.5cm;
                font-size: 16px;
                font-weight: bold;
                vertical-align: middle;

            }
            #invoice{
                margin: 0 auto;
                padding: 0cm 1cm 0.3cm 1cm;
            }
            #invoice table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                /*margin-bottom: 20px*/
            }

            #invoice table td,#invoice table th{
                padding: 3px;
                border: 1px thin #000;
                font-size: 13.33px;
            }
            #invoice table td span,#invoice table th span{
                
                font-size: 13.33px;
                font-weight: bold;
            }
            .smalltitle{
                
                font-size: 9.33px !important;
                font-weight: normal !important;
            }
            .valitop{
                vertical-align: top;
            }
            .paddingbot{
                padding:1px !important;
            }
            
            /*header elements*/
            footer {
                position: fixed; 
                bottom: 0cm;
                /*bottom: 0cm; */
                left: 0cm; 
                right: 0cm;
                height:1cm;/** Extra personal styles **/
                background-color: #fff;
                color: #777;
                text-align: center;
                /*line-height: 1.5cm;*/
                border-top: 1px thin #fff; 
                color: #000;
                font-size: 7px !important;
                line-height: 0.5cm;

            }
            .footerspan{
                font-size: 7px !important;
                font-weight: normal !important;
                vertical-align: bottom;
                
            }

            .page:after { content: counter(page); vertical-align: bottom; }

            main {
                
                position: absolute;
                top: 8.2cm;
                /*top: 0cm;*/
                left: 0cm;
                right: 0cm;
                height: 20cm;
                /*background-color: blue;*/
            }
            #invoicemain{
                padding: 0cm 1cm 0cm 1cm;/*top right bottom left */
                /*background-color: hotpink;*/
                
            }
           
            #invoicemain table {
                
                height: 13cm;
                min-height: 13cm;
                border: 1px thin black !important;
                border-top: none !important ;
                border-bottom: none !important ;
                border-collapse: separate;
                border-spacing: 0;          
                /*margin-bottom: 20px*/
            }

            #invoicemain table td {
                /*border: 1px solid black;*/
            }
            #invoicemain table td:empty, table th {
                /*border-left: 0;
                border-right: 0;*/
            }
            
            #invoicemain table td, table th{
                padding: 3px;
                /*border: 1px solid #000;*/
                border-top-color: none !important ;
                border-collapse: collapse;
                font-size: 11.33px;
                font-weight: normal !important;
                
            }


            /* Select only the last second element */
            #invoicemain tbody tr:nth-last-child(1) {
                font-weight: bold;
                height: auto;
            }

            

            #invoicemain table tfoot {

            position: sticky;
            }

            #invoicemain table tfoot th{
            
            }

            #invoicemain tfoot th { 
                
                vertical-align: bottom;
            
            }
           
            #invoicemain table td span, #invoicemain table th span{
                
                font-size: 11.33px;
                font-weight: bold;
            }
            .smalltitlemain{
                
                font-size: 9.33px !important;
                font-weight: normal !important;
            }
            .valitopmain{
                vertical-align: top;
            }
            .paddingbotmain{
                padding:1px !important;
            }
            .padbotmain{
                padding: 3px; 
                /*border:1px solid black; */
                border-top: none !important;
                border-bottom: none !important;
               
            }
            .padbotmaina{
                padding: 3px; 
                /*border:1px solid #fff; */
                border-bottom-color: #ccc !important;
                border-top: none !important;
               
            }
            .padbotmainright{
                text-align: right;

            }
            .invoicemainbottom{
                padding: 3px !important;
                text-align: right !important; 
                /*border: 1px solid #000 !important;*/
                border-top: black !important;
            }
            .borderblk{
                border:1px thin black !important; 
            }

            .borderblkz{

                
                /*border:1px solid #ccc !important; */
                border-bottom: darkred; !important;
                border-left: none !important;
                border-right: none !important;
            }
            .bordertoponly{
                border-bottom: none !important; 
                border-bottom: left !important;
                border-right: none !important;
            }
            .borderbotlineloop{

                height:11cm !important; 
                border-bottom: 1px thin black;
                border-left: none; 
                border-right: none; 
                border-collapse: collapse;


            }

            .htcn
            {
                height:35px; background-color: violet !important;
            }

            #invoicesecond{
                padding: 0cm 1cm 0cm 1cm;/* top right bottom left */
                /*background-color: green;*/
                height: 7cm;
                bottom: 1cm;
            }
           
            #invoicesecond table {
                
                width: 100%;
                height: 7cm;
                border: 1px thin #000;
                border-collapse: collapse;
                border-spacing: 0;
                
                /*margin-bottom: 20px*/
            }
            #invoicesecond td {
                border: 1px thin black;
            }
            #invoicesecond td:empty {
                /*border-left: 0;
                border-right: 0;*/
            }

            .boldz{
                font-weight: bold !important;
            }

            .remarks{
                padding: 3px; 
                border: 1px thin #fff; 
                border-right-color: #000;
                border-left-color: #000;
                font-size: 9.33px;

            }
            .declaration{
                padding: 3px;  
                border: 1px thin; #000; 
                border-top-color: #fff; 
                vertical-align: top;
                font-size: 9.11px;
            }
            .signing{
                text-align: right; 
                padding: 3px;
                border: 1px double; #000; 
                border-top-color: #000; 
                vertical-align: top;
                font-size: 9.33px;
            }

            #tblsecond{
                padding: 0cm 1cm 0.3cm 1cm;
                background-color: green;
            }
            .t-table {
                background-color: violet; !important;
                border: 1px thin black;
                height: 7cm;
                border-collapse: collapse;
            }
            .t-table td {
                border: 1px thin black;
            }
            .t-table td:empty {
                /*border-left: 0;
                border-right: 0;*/
            }

            

        
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header> 
            <div id="title">Tax Invoice
            </div>
            <div id="invoice">
                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td rowspan="3" width="50%" class="valitop">
                            <span >Candid Homes</span><br>
                            <span class="smalltitle">V/3H-7, Kurumbe Parambil Complex Ammadam,Kizhakkummuri Peringottukara</span><br>
                            
                            <span class="smalltitle">Thrissur, Kerala-680571. Ph: 0487 212333</span><br>
                            <span class="smalltitle">GSTIN/UIN</span>
                            <span class="smalltitle"> : 32AAVFR3664E1ZZ</span><br>
                            <span class="smalltitle">State Name</span>
                            <span class="smalltitle"> : Kerala, Code : 32</span><br>
                            <span class="smalltitle">Email </span>
                            <span class="smalltitle"> : info@candidhomes.in,support@candidhomes.in</span>
                        
                        </td>

                        <td class="paddingbot smalltitle valitop" width="25%">Invoice No. <br/>
                            <span ><?='CRMCPO-'.$posts[0]['bill_no'];?></span>
                        </td>
                        <td class="smalltitle paddingbot valitop" width="25%">Dated <br/>
                            <span><?=date('d-M-Y'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="smalltitle paddingbot valitop">Delivery Note <?='&nbsp;';?></td>
                        <td class="smalltitle paddingbot valitop">Mode/Terms of Payment<?='&nbsp;';?></td>
                    </tr>
                    <tr>
                        <td class="smalltitle paddingbot valitop" >Reference No. & Date <br/>
                            <span><?='CRM-'.$posts[0]['sales_id'].' dt '. date("d-M-Y", strtotime($postz['created_at']));?></span>
                        </td>
                        <td class="smalltitle paddingbot valitop">
                            <span class="smalltitle">Other References <?='&nbsp;';?></span></td>
                    </tr>

                    <tr>
                        <td rowspan="3" width="50%" class="valitop">
                        
                            <span class="smalltitle">Consignee (Ship to) :<strong><?=ucfirst($user['name']);?></strong></span>
                            <span class="smalltitle"><br><?=ucfirst($user['address']).', '.ucfirst($user['location']);?>,</span>
                            <span class="smalltitle"><br><?=ucfirst($user['district']).' '.'District , '.$user['zipcode'];?>, Ph: <?=$user['username'];?>.</span>
                            
                   
                        </td>
                        <td class="smalltitle paddingbot">Buyer’s Order No. <br/>
                            <span><?='CRM-'.$posts[0]['sales_id'].'-'. $user['inquryassigneduser'];?></span>
                        </td>
                        <td class="smalltitle paddingbot">Dated<br/>
                            <span><?= date("d-M-Y", strtotime($postz['dispatch_date']));?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="smalltitle paddingbot valitop">
                            <span class="smalltitle">Dispatch Doc No.<?='&nbsp;';?></span>
                        </td>
                        <td class="smalltitle paddingbot valitop">
                            <span class="smalltitle">Delivery Note Date.<?='&nbsp;';?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="smalltitle paddingbot valitop">
                            <span class="smalltitle">Dispatched through.<?='&nbsp;';?></span>
                        </td>
                        <td class="smalltitle paddingbot valitop">
                            <span class="smalltitle">Destination.<?='&nbsp;';?></span>
                        </td>
                    </tr>

                    <tr>
                        <td  class="valitop">
                            
                            <span class="smalltitle">Buyer (Ship To) :<strong><?=ucfirst($user['name']);?></strong></span>
                            <span class="smalltitle"><br><?=ucfirst($user['address']).', '.ucfirst($user['location']);?>,</span>
                            <span class="smalltitle"><br><?=ucfirst($user['district']).' '.'District , '.$user['zipcode'];?>, Ph: <?=$user['username'];?>.</span>
                            
                        </td>
                        <td colspan="2" class="paddingbot valitop"><span class="smalltitle">Terms of Delivery </span><br>
                        </td>
                    </tr>
                </table>
            </div> 
        </header>

        <footer>
            
            <span class="footerspan">This is a computer generated Invoice.</span>

            <?php if (count($posts) > 10) : ?><span class="footerspan page">-&nbsp;</span><?php endif ?>
        </footer><!-- Wrap the content of your PDF inside a main tag -->

        <main>

            <div id="invoicemain">
                
                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr> 
                            <th class="smalltitlemain">#</th>
                            <th class="smalltitlemain">Description of<br>Goods & Services</th>
                            <th class="smalltitlemain">HSN/SAC</th>
                            <th class="smalltitlemain">Quantity<br>(Sq.Ft)</th>
                            <th class="smalltitlemain">Rate<br>(Incl. of Tax)</th>
                            <th class="smalltitlemain">Rate</th>
                            <th class="smalltitlemain">Per</th>
                            <th class="smalltitlemain">Amount</th>
                        </tr>
                    </thead>
                    <!-- Upto 10 sinlge page -->
                    <?php $i=1;$n=1;$m=1; $k = 0;  $j=count($posts);  if ($j <= 10) { ?>
                    <?php foreach($posts as $row) : ?>
                    <tbody style="">
                        <tr>

                            <td class="padbotmain smalltitlemain" style="height: 0.5cm;"><?=$i++;?></td>
                            <td class="padbotmain smalltitlemain"  style="height: 0.5cm;"><?=$row['prod_name'].' WITH '.$row['frametype'].' '.$row['framecolor'].'<br/>'.' MESH '.$row['meshcolor'].' '.$row['meshtype'];?></td>
                            <td class="padbotmain smalltitlemain" style="height: 0.5cm;"><?=$row['hsn'];?></td>
                            <td class="padbotmain smalltitlemain"  style="height: 0.5cm;"><?=round($row['prodsizetotal'],2);?></td>
                            <td class="padbotmain smalltitlemain padbotmainright"  style="height: 0.5cm;"><?=round($row['sales_rate']+(($row['sales_rate']*$row['tax_per'])/100),2);?></td>
                            <td class="padbotmain smalltitlemain padbotmainright"  style="height: 0.5cm;"><?=$row['sales_rate'];?></td>
                            <td class="padbotmain smalltitlemain"  style="height: 0.5cm;">Sq.ft</td>
                            <td class="padbotmain smalltitlemain padbotmainright"  style="height: 0.5cm;"><?=round($row['total_amt'],2);?></td>
                        </tr>
                        <?php if($i==$j+1):?>
                        <tr>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain">&nbsp;</td>
                        </tr>

                        <tr style="height:5px;">
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($row['tottotal'],2);?></td>
                        </tr>
                            
                        <tr>
                            <td class="padbotmain smalltitlemain"><?="#";?></td>
                            <td class="padbotmain smalltitlemain">Packing & Forwading Charges </td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"><?=round($postz['freighttax'],2);?></td>
                            <td class="padbotmain smalltitlemain">%</td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['freight'],2);?></td>
                        </tr>

                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Customized Cost</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"><?=round($postz['cusotmcost'],2);?></td>
                        </tr>

                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Package Charges</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['packing'],2);?></td>
                        </tr>

                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Other Cost</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['othercost'],2);?></td>
                        </tr>

                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">IGST Output Tax</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['freight'],2);?></td>
                        </tr>

                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Discount</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['totdiscount'],2);?></td>
                        </tr>

                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Rounded Off</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['roudoffamt'],2);?></td>
                        </tr>
                        <!-- <tr> style="height:5px;"
                            <td class="padbotmaina smalltitlemain"><?="";?></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            
                        </tr> -->
                        <?php endif ?>
                    </tbody>

                    <?php endforeach ?>  

                    <tfoot style=""><tr>
                        <th style="<?php if($j == 1){echo 'height: 6.9cm;';} elseif($j==2){echo 'height: 6.1cm;';} elseif($j==3){echo 'height: 5.3cm;';}  elseif($j==4){echo 'height: 4.5cm;';} elseif($j==5){echo 'height: 3.7cm;';} elseif($j==6){echo 'height: 2.9cm;';} elseif($j==7){echo 'height: 2.1cm;';} elseif($j==8){echo 'height: 1.3cm;';} elseif($j==9){echo 'height: 0.5cm;';} elseif($j==10){echo 'height: 0.001cm;';} else{echo 'height: 0.001cm;';} ?> " class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom "></th>
                            <th class="invoicemainbottom smalltitlemain"></th> 
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom smalltitlemain"></strong></th>
                            
                        </tr>
                        <tr>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"><?php echo "countz".$j; ?></th>
                            <th class="invoicemainbottom ">Quantity</th>
                            <th class="invoicemainbottom smalltitlemain"><strong><?=round($row['totprodsizetotal'],2);?></strong></th> 
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom smalltitlemain"><strong><?=round($postz['netamount'],2);?></strong></th>
                        </tr>   
                    </tfoot>

                    <!-- Upto 10 sinlge page -->

                    <?php } elseif( $j>10){  ?>

                    <!-- Above 10 Multiples page -->
                    <?php foreach($posts as $row) { $k++;$n++;?>

                    <tbody>

                        <tr>

                            <td class="padbotmain smalltitlemain" style="height: 0.5cm;"><?=$k;?></td>
                            <td class="padbotmain smalltitlemain"  style="height: 0.5cm;"><?=$row['prod_name'].' WITH '.$row['frametype'].' '.$row['framecolor'].'<br/>'.' MESH '.$row['meshcolor'].' '.$row['meshtype'];?></td>
                            <td class="padbotmain smalltitlemain" style="height: 0.5cm;"><?=$row['hsn'];?></td>
                            <td class="padbotmain smalltitlemain"  style="height: 0.5cm;"><?=round($row['prodsizetotal'],2);?></td>
                            <td class="padbotmain smalltitlemain padbotmainright"  style="height: 0.5cm;"><?=round($row['sales_rate']+(($row['sales_rate']*$row['tax_per'])/100),2);?></td>
                            <td class="padbotmain smalltitlemain padbotmainright"  style="height: 0.5cm;"><?=$row['sales_rate'];?></td>
                            <td class="padbotmain smalltitlemain"  style="height: 0.5cm;">Sq.ft</td>
                            <td class="padbotmain smalltitlemain padbotmainright"  style="height: 0.5cm;"><?=round($row['total_amt'],2);?></td>
                        </tr>

                        <?php if ($k % 10 == 0 && $n!=$j+1) { //breaking into 10 rows ?>

                        
                        <tr>
                            <td class="borderbotlineloop "></td>
                            <td class="borderbotlineloop "></td>
                            <td class="borderbotlineloop "></td>
                            <td class="borderbotlineloop "></td>
                            <td class="borderbotlineloop "></td>
                            <td class="borderbotlineloop "></td>
                            <td class="borderbotlineloop "></td>
                            <td class="borderbotlineloop ">Continued...</td>
                               
                        </tr>
                        <div style="page-break-before: always;" ></div>
                    
                        <?php } //breaking into 10 rows?>
                        <?php if($n==$j+1){?>
                        <tr>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain">&nbsp;</td>
                        </tr>
                        <tr style="height:5px;">
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($row['tottotal'],2);?></td>
                        </tr>
                        <tr>
                            <td class="padbotmain smalltitlemain"><?="#";?></td>
                            <td class="padbotmain smalltitlemain">Packing & Forwading Charges </td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"><?=round($postz['freighttax'],2);?></td>
                            <td class="padbotmain smalltitlemain">%</td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['freight'],2);?></td>
                        </tr>

                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Customized Cost</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"><?=round($postz['cusotmcost'],2);?></td>
                        </tr>
                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Package Charges</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['packing'],2);?></td>
                        </tr>

                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Other Cost</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['othercost'],2);?></td>
                        </tr>
                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">IGST Output Tax</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['freight'],2);?></td>
                        </tr>

                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Discount</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['totdiscount'],2);?></td>
                        </tr>
                        <tr>
                            <td class="padbotmain smalltitlemain"><?="";?></td>
                            <td class="padbotmain smalltitlemain">Rounded Off</td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain"></td>
                            <td class="padbotmain smalltitlemain padbotmainright"><?=round($postz['roudoffamt'],2);?></td>
                        </tr>
                        <!-- <tr> style="height:5px;"
                            <td class="padbotmaina smalltitlemain"><?="";?></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            <td class="padbotmaina smalltitlemain"></td>
                            
                        </tr> -->
                        <?php } //checking last entry in table ?> 
                    
                        <?php } // ending foreach ?>

                    </tbody>

                   
                    <tfoot style="">
                        <tr>
                            <th style="<?php if($k % 10 == 1){echo 'height: 6.9cm;';} elseif($k % 10==2){echo 'height: 6.1cm;';} elseif($k % 10==3){echo 'height: 5.3cm;';}  elseif($k % 10==4){echo 'height: 4.5cm;';} elseif($k % 10==5){echo 'height: 3.7cm;';} elseif($k % 10==6){echo 'height: 2.9cm;';} elseif($k % 10==7){echo 'height: 2.1cm;';} elseif($k % 10==8){echo 'height: 1.3cm;';} elseif($k % 10==9){echo 'height: 0.5cm;';} elseif($k % 10==10){echo 'height: 0.001cm;';} else{echo 'height: 0.001cm;';} ?> " class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom "></th>
                            <th class="invoicemainbottom smalltitlemain"></th> 
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom smalltitlemain"></strong></th>
                            
                        </tr>
                        <tr>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom ">Quantity</th>
                            <th class="invoicemainbottom smalltitlemain"><strong><?=round($row['totprodsizetotal'],2);?></strong></th> 
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom"></th>
                            <th class="invoicemainbottom smalltitlemain"><strong><?=round($postz['netamount'],2);?></strong></th>
                        </tr>   
                    </tfoot>
                    
                    <?php } //ending if?> 



                                
                </table>
            </div>

            <!-- Calculations -->
            <div id="invoicesecond" >
                <table class="" width="100%" border="1" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <td colspan="5" class="smalltitlemain">Amount Chargeable (in words)<br>
                                <span class="smalltitlemain">
                                    
                                    <strong>INR <?php echo ucwords(getIndianCurrency(floatval(round($postz['netamount'],2))));?> Only</strong>
                                </span><br>
                            </td>
                        </tr>
                        <tr>
                            <th class="paddingbotmain smalltitlemain" rowspan="2">HSN/SAC</th>
                            <th class="paddingbotmain smalltitlemain" rowspan="2">Taxable Value</th>
                            <th class="paddingbotmain smalltitlemain" colspan="2">Integrated Tax</th>
                            <th class="paddingbotmain smalltitlemain" rowspan="2">Total Tax Amount</th>
                        </tr>
                        <tr>
                            <th class="paddingbotmain smalltitlemain">Rate %</th>
                            <th class="paddingbotmain smalltitlemain">Amount</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td class="paddingbotmain smalltitlemain" width="40%"><?=$row['hsn']?></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright" width="20%"><?=round($row['tottotal'],2);?></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright" width="20%"><?=$row['tax_per']?></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright" width="20%"><?=round($postz['tax'],2);?></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright" width="20%"><?=round($postz['tax'],2);?></td>
                        </tr>
                        <tr>
                            <td class="paddingbotmain"></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright"><?=$postz['freight'];?></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright"><?=$postz['freighttax'];?></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright"><?=$postz['freightot']-$postz['freight'];?></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright"><?=$postz['freightot'];?></td>
                        </tr>
                        
                        <tr>
                            <td class="paddingbotmain smalltitlemain padbotmainright boldz">Total</td>
                            <td class="paddingbotmain smalltitlemain padbotmainright boldz"><?=round(($row['tottotal']+$postz['freight']),2);?></td>
                            <td></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright boldz"><?=round(($postz['tax']+($postz['freightot']-$postz['freight'])),2);?></td>
                            <td class="paddingbotmain smalltitlemain padbotmainright boldz"><?=round(($postz['tax']+($postz['freightot']-$postz['freight'])),2);?></td>
                        </tr> 
                        <tr>
                            <td colspan="5" class="padbotmain smalltitlemain">Tax Amount (in words) :
                                <span class="smalltitlemain">
                                    
                                    <strong>INR <?php echo ucwords(getIndianCurrency(floatval(round(($postz['tax']+($postz['freightot']-$postz['freight'])),2))));?> Only</strong>
                                </span><br>
                            </td>
                       
                        </tr>
                        <tr style="border-top: 2cm solid transparent;">
                            <td colspan="5" class="remarks">Remarks : <br>
                                <span class="smalltitlemain">Candid Homes - <?=$user['inquryassigneduser'];?></span><br>
                            </td>

                      
                        </tr>
                        <tr style="">
                            <td colspan="2" class="declaration">
                                <span><b>Declaration</b> <br>We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.</span>
                            </td>
                            <td colspan="3" align="right" class="signing">
                                <span><b>for Candid Homes</b></span><br><br><br>
                                <span>Authorised Signatory</span>
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
            </div> 
            <!-- Calculations -->
            <!--<p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
            <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
            <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
            <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>-->
            <!-- <p style="page-break-after: never;">Content Page 2</p> -->
            
        </main> 
    </body>
</html>