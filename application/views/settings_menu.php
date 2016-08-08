<div class="col-sm-4 topmargin30 hidden-xs noleftmargin">
	<section class="clearfix hourlies-listing-sidebar listings-sidebar settingsnav" id="listing-sidebar">
	  <ul class="nav-inverse nav-tabs nav-stacked">
	  <?php $url = $this->uri->segment(1); ?>
	  
	  <?php 
		if($url == 'client_profile_update'){ ?>
			<li class="active" id="submenu-item-account-overview">
		<?php 	} else { ?>
			<li id="submenu-item-account-overview">
		<?php } ?>
		  <a href="<?php echo site_url();?>/client_profile_update">My Profile
		  </a>
		</li>
		
		<?php 
		if($url == 'client_email_notification'){ ?>
			<li class="active" id="submenu-item-family-plan">
		<?php 	} else { ?>
		<li id="submenu-item-family-plan">
		<?php } ?>
		  <a href="<?php echo site_url();?>/client_email_notification">Notifications
		  </a>
		</li>
		
		<?php 
		if($url == 'client_password_update'){ ?>
			<li class="active" id="submenu-item-edit-profile">
		<?php 	} else { ?>
			<li id="submenu-item-edit-profile">
		<?php } ?>
		  <a href="<?php echo site_url();?>/client_password_update">Password
		  </a>
		</li>
		
		<?php 
		if($url == 'client_update_payment_details'){ ?>
			<li class="active" id="submenu-item-change-password">
		<?php 	} else { ?>
			<li id="submenu-item-change-password">
		<?php } ?>
		  <a href="<?php echo site_url();?>/client_update_payment_details">Payment Method
		  </a>
		</li>
		
		<?php 
		if($url == 'client_truth_verification'){ ?>
			<li class="active" id="submenu-item-notification-settings">
		<?php 	} else { ?>
			<li id="submenu-item-notification-settings">
		<?php } ?>
		  <a href="<?php echo site_url();?>/client_truth_verification">Account Verification
		  </a>
		</li>
		
		<?php 
		if($url == 'client_account_close'){ ?>
			<li class="active" id="submenu-item-offline-devices">
		<?php 	} else { ?>
			<li id="submenu-item-offline-devices">
		<?php } ?>	
		  <a href="<?php echo site_url();?>/client_account_close">Account
		  </a>
		</li>
		
	  </ul>
	</section>
  </div>