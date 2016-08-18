<?php 
error_reporting(0);
include('client_header.php'); ?>
<style>
.table tr td {
	text-align: left;
}

</style>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-8 whiteBG topmargin30 profile">
        <div>
          <div class="row">
            <div class="col-xs-12">
              <h1>Payments 
                <small>Invoices
                </small>
              </h1>
            </div>
          </div>
          
          <div class="row ">
		  <form action="" method="POST" role="form">
            <div class="col-xs-4 justgrey">
			<br>
              <div class="prepend-top form-group">
                <label class="" for="fromdate">From </label>
				<div class='input-group date' id='datetimepicker6'>
				<?php if(isset($_POST['startdate'])) { 
					$startdate = $_POST['startdate'];
				 }
				else {
					$startdate = "MM/DD/YYYY HH:MM";
				}
				?>
					<input placeholder="<?php echo $startdate; ?>" onkeydown="return false;" type='text' class="form-control" id="startdate" name="startdate" />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
              </div>
            </div>
            <div class="col-xs-4 justgrey">
			<br>
              <div class="prepend-top form-group">
                <label class="" for="todate">To </label>
				<div class='input-group date' id='datetimepicker7'>
				<?php if(isset($_POST['enddate'])) { 
					$enddate = $_POST['enddate'];
				 }
				else {
					$enddate = "MM/DD/YYYY HH:MM";
				}
				?>
					<input placeholder="<?php echo $enddate; ?>" onkeydown="return false;" type='text' class="form-control" id="enddate" name="enddate" />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
              </div>
            </div>
			<div class="col-xs-4 justgrey">
				<br>
				<div class="prepend-top form-group">
				<label class="" for="todate">&nbsp; </label>
					<div class='input-group'>
						<button id="submit" name="submit" type="submit" class="btn btn-danger btn-md">Get</button>
					</div>
				</div>
			</div>
			</form>
          </div>
		  
		  <div class="paytable invitebox table-responsive">
          <table class="table topmargin">
            <thead>
              <tr>
                <th>Transaction id
                </th>
				<th>Event name
                </th>
				<th>Description
                </th>
                <th>Amount
                </th>
                <th id='substatustitle'>Status
                </th>
              </tr>
            </thead>
			<?php foreach($client_payment_details as $val)
			{ ?>
				<tbody>
				  <tr>
					<td>
					  <a target="_blank" href="<?php getenv( 'SOIREE_BASE_URL' ) ?>/html2pdf_v4.03/examples/adv.php?event_id=<?php echo $val['event_id']; ?>"><?php echo $val['transaction_id']; ?>
					  </a>
					</td>
					<td><?php echo $val['event_name']; ?>
					</td>
					<td><?php echo $val['description']; ?>
					</td>
					<td>$<?php echo round($val['amount'],2); ?>
					</td>
					<td id='substatustitle'>
					  <p>Paid
					  </p><?php
						$startdatetime = $val['datetime'];
						$start_datetime = date('D dS M Y', strtotime($startdatetime));
						
					?>
					  <small>on <?php echo $start_datetime; ?>
					  </small>
					</td>
				  </tr>
				  
				</tbody>
			<?php } ?>
            
          </table>
        </div>
        </div>
      </div>
      <div class="col-sm-4 topmargin30 col-xs-12 ">
        <section class="clearfix hourlies-listing-sidebar listings-sidebar greyGB" id="listing-sidebar">
          <div class="skills">
            <h3>Control Panel
            </h3>
            <hr>
            <table class="table">
              <tbody>
                <tr>
                  <td class="align-left">Paid this month
                  </td>
				  <?php 
					$earned_month = $client_current_mon_detail;
					if($earned_month == "") {
						$earned_month = 0;
					}
				  ?>
                  <td class="bold">$<?php echo round($earned_month,2); ?>
                  </td>
                </tr>
                <tr>
                  <td class="align-left">Paid today
                  </td><?php
					$earned_today = $client_current_day_detail[0]['total_amount_day'];
					if($earned_today == "") {
							$earned_today = 0;
						}
				  ?>
                  <td class="bold">$<?php echo round($earned_today,2); ?>
                  </td>
                </tr>
                <tr>
                  <td class="align-left">Paid to date
                  </td><?php
					$paid_to_date = $client_paid_overall_detail;
					if($paid_to_date == "") {
							$paid_to_date = 0;
						}
				  ?>
                  <td class="bold">$<?php echo round($paid_to_date,2); ?>
                  </td>
                </tr>
				<tr>
                  <td class="align-left">Refund to date
                  </td><?php
					$refund_amount = $client_refund_detail[0]['refund_amount'];
					if($refund_amount == "") {
							$refund_amount = 0;
						}
				  ?>
                  <td class="bold">$<?php echo round($refund_amount,2); ?>
                  </td>
                </tr>
              </tbody>
            </table>
            <hr>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- Footer Start -->
  <?php 
	error_reporting(0);
	include('client_footer.php'); ?>
	
	<script src="<?php echo base_url(); ?>js/moment.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.min.js"></script>
  </script>
	<script type="text/javascript">
  
    $(function () {
        $('#datetimepicker6').datetimepicker({
			//format: 'YYYY/MM/DD HH:mm'
		});
        $('#datetimepicker7').datetimepicker({
            useCurrent: false, //Important! See issue #1075
			//format: 'YYYY/MM/DD HH:mm'
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
</body>
</html>
