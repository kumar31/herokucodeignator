<?php if(!isset($_COOKIE['AuctionID']))
				{
					header("location: http://smaatapps.com/Myshul/website_dev/index.php/feed");
					
				}
else
{
 $AuctionID=$_COOKIE['AuctionID'];	
 $tax=$_COOKIE['tax'];	
}	
   
				 ?>

<style type="text/css">
<!--.img-cir {
	border: solid 3px black;
	border-radius: 5mm !important;
	-moz-border-radius: 5mm;   
}
.div { color: #002200; text-align: center; width: 30mm; height: 20mm; margin: 2mm; }
.div1 { border: solid 3px black; border-radius: 10mm;              -moz-border-radius: 10mm;              }

-->
</style>
<page backimg="./res/Myshul-Logo-trans.png" backimgx="center"  backimgy="top"  backimgw="100%"  backtop="0" style="font-size: 14px;">

    <table cellspacing="0" cellpadding="0" style="width: 100%; left:0; background-color: #ebdfc9;">
        <tr style="">
            <td style="text-indent: 10mm; width: 45%">
                
                    <img style="height: 135px; width: 170px;" src="./res/app-logo.png">
                          
            </td>
            <td style="width: 55%">
                <h2 style="text-decoration: underline;">INVOICE </h2>
            </td>
        </tr>
    </table>    
	<?php $host = "localhost";
$dbuser ="smaatapp_dev";
$db_password ="dev123%$";
$database="smaatapp_myshul_dev";
mysql_connect($host,$dbuser,$db_password) or die ("Error connecting to DB");
$selectDb=mysql_select_db($database) ;

$query=mysql_query("SELECT * FROM `auction` WHERE AuctionID=$AuctionID");
		
		while($auction = mysql_fetch_array($query)){
			$BidDescription=	$auction['BidTitle'];
	
		$BuyAmount=$auction['BuyAmount'];	
		$UserID=$auction['ShulID'];
		}
$querys=mysql_query("SELECT * FROM `ShulOwner` WHERE UserID=$UserID");
		
		while($user = mysql_fetch_array($querys)){
			
			
          //  print_r($ownerdatails);
		   $ShulLogo=$user['ShulLogo'];
		   if($ShulLogo=="")
		   {
			  $pic="./res/logo.jpg";
		   }
		   else
		   {
			   $pic=$ShulLogo;
		   }
		   
$TaxExemptNumber=$user['TaxExemptNumber'];			 
$ShulName=$user['ShulName'];
$PhoneNumber=$user['PhoneNumber'];
$EmailAddress=$user['EmailAddress'];		 
			
		}
 ?>
	<table style="width: 100%" cellspacing="0">
		<tr>
			<td style="width: 100%;">
				<div class="">
					<img class="img-cir" style="height: 125px; width: 135px; border-radius: 4em; float: right; border: 3px solid #F0F0F0;" src="<?php echo $pic; ?>">
				</div>
			</td>			
		</tr>
	</table>
	<br>
	
	<table style="width: 50%; font-size: 16px;"  cellspacing="0">
		<tr>
			<td style="width: 100%">Invoice Id : <b>INVOICE <?php echo $AuctionID; ?></b></td>
			<td style="width: 100%; float: right; font-size: 18px; text-align: right;"><b><?php echo $ShulName; ?></b></td>
		</tr>
		<tr>
			<td style="width: 100%">Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo date("d-m-Y"); ?></b></td>
			<td style="width: 100%; float: right; text-align: right;">Tel: <?php echo $PhoneNumber; ?></td>
		</tr>
		<tr>
			<td style="width: 100%">Tax Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b> <?php echo $TaxExemptNumber; ?></b></td>
			<td style="width: 100%; float: right; text-align: right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 100%"></td>
			<td style="width: 100%; float: right; text-align: right;">Email : <a style="color: #0087C3; text-decoration: none;" href="mailto:<?php echo $EmailAddress; ?>"><?php echo $EmailAddress; ?></a></td>
		</tr>
	</table>
	
    <br>
	
	<table style="width: 100%;border: solid 1px #5544DD; border-collapse: collapse; font-size: 16px;" align="">
        <thead>
            <tr style="background-color: #ebdfc9;">
                <th style="width: 40%; text-align: left; border: solid 1px #000; padding: 20px;">DESCRIPTION</th>
                <th style="width: 20%; text-align: center; border: solid 1px #000;">QUANTITY</th>
                <th style="width: 20%; text-align: center; border: solid 1px #000;">PRICE</th>
                <th style="width: 20%; text-align: center; border: solid 1px #000;">TOTAL</th>
            </tr>
        </thead>
        <tbody>

            <tr style="font-weight: bold;">
                <td style="width: 40%; text-align: left; border: solid 1px #000; padding: 20px;">
               <?php echo $BidDescription; ?>
			   </td>
                <td style="width: 20%; text-align: center; border: solid 1px #000">
                    1
                </td>
				<td style="width: 20%; text-align: center; border: solid 1px #000">
                    $<?php    echo number_format((float)$BuyAmount, 2, '.', '');?>
                </td>
                <td style="width: 20%; text-align: center; border: solid 1px #000">
                    $<?php    echo number_format((float)$BuyAmount, 2, '.', '');?>

                </td>
            </tr> 
			
			<tr style="font-weight: bold;">
                <td style="width: 40%; text-align: left; border: solid 1px #000; padding: 20px;">
                    Processing Fee
                </td>
                <td style="width: 20%; text-align: center; border: solid 1px #000">
                 <?php if($tax=="0"){ $tax="2.50"; } else { $tax="5.00"; } ?>   
                </td>
				<td style="width: 20%; text-align: center; border: solid 1px #000">
                    $ <?php echo $tax; ?>
                </td>
                <td style="width: 20%; text-align: center; border: solid 1px #000">
                    $<?php echo $tax; ?>

                </td>
            </tr>

        </tbody>
        <tfoot>
            <tr style="background-color: #ebdfc9;">
                <th style="width: 40%; text-align: left; border: solid 1px #000;padding: 20px;">Total</th>
                <th style="width: 20%; text-align: center; border: solid 1px #000;"></th>
				<th style="width: 20%; text-align: center; border: solid 1px #000;"></th>
                <th style="width: 20%; text-align: center; border: solid 1px #000;">$<?php  $total=  $BuyAmount+$tax; echo number_format((float)$total, 2, '.', ''); ?></th>
            </tr>
        </tfoot>
    </table>
	
	<br>
	<br>
	
    <table style="width: 100%; font-size: 15px;"  cellspacing="0">
		<tr>
			<td style="width: 100%;"><b>NOTE:</b></td>
		</tr>
		<tr>
			<td style="width: 100%">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
		</tr>
		<br>
		<tr>
			<td style="width: 100%; text-align: center; font-size: 18px;"><b>Thank You!</b></td>
		</tr>
	</table>
	<br>
	<br>
	
</page>