<?php
require('WriteHTML.php');

$AdID=$_GET['event_id'];	 

//Event details
 $query=mysql_query("select client_payment_details.*,sum(client_payment_details.amount) as amount from `client_payment_details` WHERE `event_id`='$AdID' group by `event_id`"); 
$row = mysql_fetch_array($query);
$event_id = $row['event_id'];
$client_id = $row['client_id'];
$transaction_id = $row['transaction_id'];

$description = $row['description'];
$amount = $row['amount'];
$date = $row['datetime'];
$date = date('d M Y', strtotime($date));
 
$query=mysql_query("select * from `event_detail` WHERE `event_id`='$event_id'");
$rows = mysql_fetch_array($query); 
$event_name = $rows['event_name'];

$query=mysql_query("select * from `client_details` WHERE `client_id`='$client_id'");
$rowss = mysql_fetch_array($query); 
$first_name = $rowss['first_name'];
$last_name = $rowss['last_name'];
$address = $rowss['address'];
$company = $rowss['company'];
   
				 
$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('logo.png',18,13,33);
$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('<para><h1>PHPGang Programming Blog, Tutorials, jQuery, Ajax, PHP, MySQL and Demos</h1><br>
Website: <u>www.phpgang.com</u></para><br><br>How to Convert HTML to PDF with fpdf example');

$pdf->SetFont('Arial','B',7); 
$htmlTable='<page backimgx="center"  backimgy="top"  backimgw="100%"  backtop="0" style="font-size: 14px;">

    <table cellspacing="0" cellpadding="0" style="width: 100%; left:0;">
        <tr style="">
            <td style="text-indent: 10mm; width: 45%">
                
                    <img style="height: 65px; width: 170px;" src="../res/app-logo.png">
                          
            </td>
            <td style="width: 55%">
                <h2 style="text-decoration: underline;">INVOICE </h2>
            </td>
        </tr>
    </table>    
	<br>
	<br>
	<table style="width: 50%; font-size: 16px;"  cellspacing="0">
		<tr>
			<td style="width: 100%">Invoice Id : <b><?php echo $transaction_id; ?> </b>  </td>
			<td style="width: 100%; float: right; font-size: 18px; text-align: right;"><b></b></td>
		</tr>
		<tr>
			<td style="width: 100%">Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $date; ?><b></b></td>
			<td style="width: 100%; float: right; text-align: right;">Email : <a style="color: #0087C3; text-decoration: none;" href="">support@outfitstaff.com</a></td>
		</tr>
		<tr>
			<td style="width: 100%">Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $first_name; ?> <?php echo $last_name; ?><b></b></td>
			<td style="width: 100%; float: right; text-align: right;">Tel: +1 646 726 5192</td>
		</tr>
		
		<tr>
			<td style="width: 100%; font-size: 14px;">Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $address; ?></td>
			<td style="width: 100%; float: right; text-align: right;"></td>
		</tr>
		<tr>
			<td style="width: 100%; font-size: 14px;">Company &nbsp;&nbsp;&nbsp;: <?php echo $company; ?></td>
			<td style="width: 100%; float: right; text-align: right;"></td>
		</tr>
	</table>
	
    <br>
	
	<table style="width: 100%;border: solid 1px #000; border-collapse: collapse; font-size: 16px;" align="">
        <thead>
            <tr style="">
                <th style="width: 40%; text-align: left; border: solid 1px #000; padding: 10px;">Transaction id</th>
                <th style="width: 20%; text-align: center; border: solid 1px #000;">Event name</th>
                <th style="width: 20%; text-align: center; border: solid 1px #000;">Description</th>
                <th style="width: 20%; text-align: center; border: solid 1px #000;">Amount</th>
            </tr>
        </thead>
		
		<tbody>

		
		
            <tr style="font-weight: bold;">
                <td style="width: 40%; text-align: left; border: solid 1px #000; padding: 20px;">
				<?php echo $transaction_id; ?>
			   </td>
                <td style="width: 20%; text-align: center; border: solid 1px #000">
                <?php echo $event_name; ?>
                </td>
				<td style="width: 20%; text-align: center; border: solid 1px #000">
				<?php echo $description; ?>
                </td>
                <td style="width: 20%; text-align: center; border: solid 1px #000">
                  $<?php echo $amount; ?>
                </td>
            </tr> 
			
			<tr>
				<td style="padding: 50px; border-left: solid 1px #000;border-right: solid 1px #000">
					
				</td>
				<td style="padding: 50px; border-right: solid 1px #000">
					
				</td>
				<td style="padding: 50px; border-right: solid 1px #000">
					
				</td>
				<td style="padding: 50px; border-right: solid 1px #000">
					
				</td>
			</tr>
			
			<tr>
				<td style="padding: 50px; border-left: solid 1px #000;border-right: solid 1px #000;border-bottom: solid 1px #000">
					
				</td>
				<td style="padding: 50px; border-right: solid 1px #000;border-bottom: solid 1px #000">
					
				</td>
				<td style="padding: 50px; border-right: solid 1px #000;border-bottom: solid 1px #000">
					
				</td>
				<td style="padding: 50px; border-right: solid 1px #000;border-bottom: solid 1px #000">
					
				</td>
			</tr>
			
        </tbody>
        
        <tfoot>
            <tr style="">
                <th style="width: 40%; text-align: left;padding: 20px;"></th>
                <th style="width: 20%; text-align: center;border-right: solid 1px #000;"></th>
				<th style="width: 20%; text-align: center; border: solid 1px #000;">Total</th>
                <th style="width: 20%; text-align: center; border: solid 1px #000;">$<?php echo $amount; ?>
			</th>
            </tr>
        </tfoot>
    </table>
	
	<br>
	<br>
	
    <table style="width: 100%; font-size: 15px;"  cellspacing="0">
		<tr>
			<td style="width: 100%;"><b></b></td>
		</tr>
		<tr>
			<td style="width: 100%"></td>
		</tr>
		<br>
		<tr>
			<td style="width: 100%; text-align: center; font-size: 18px;"><b>Thank You!</b></td>
		</tr>
	</table>
	<br>
	<br>
	
</page>';
$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
?>