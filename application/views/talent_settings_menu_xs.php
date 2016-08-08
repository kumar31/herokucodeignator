<div class="container container-submenu visible-xs">
    <div class="row">
      <div class="col-xs-12">
        <div class="btn-group-inverse">
          <button type="button" class="btn btn-submenu dropdown-toggle" data-toggle="dropdown">
            <span class="icon-chevron-down">
            </span>My Profile
          </button>
          <ul class="dropdown-menu submenuprofile" role="menu">
		  <?php $url = $this->uri->segment(1); ?>
		  
			<?php 
		   if($url == 'talent_email_notification'){ ?>
				<li class="active" id="submenu-item-account-overview">
			<?php 	} else { ?>
				<li id="submenu-item-account-overview">
			<?php } ?>
              <a href="<?php echo site_url();?>/talent_email_notification">Notifications
              </a>
            </li>
			
			<?php 
			if($url == 'talent_password_update'){ ?>
            <li class="active" id="submenu-item-family-plan">
			<?php 	} else { ?>
			 <li id="submenu-item-family-plan">
			 <?php } ?>
              <a href="<?php echo site_url();?>/talent_password_update">Password
              </a>
            </li>
			
			<?php 
			if($url == 'talent_update_payment_details'){ ?>
            <li class="active" id="submenu-item-edit-profile">
			<?php 	} else { ?>
			<li id="submenu-item-edit-profile">
			<?php } ?>
              <a href="<?php echo site_url();?>/talent_update_payment_details">Payment Method
              </a>
            </li>
			
			<?php 
			if($url == 'talent_truth_verification'){ ?>
            <li class="active" id="submenu-item-change-password">
			<?php 	} else { ?>
			<li id="submenu-item-change-password">
			<?php } ?>
              <a href="<?php echo site_url();?>/talent_truth_verification">Account Verification
              </a>
            </li>
			
			<?php 
			if($url == 'client_account_close'){ ?>
            <li class="active" id="submenu-item-notification-settings">
			<?php 	} else { ?>
			<li id="submenu-item-notification-settings">
			<?php } ?>
              <a href="<?php echo site_url();?>/client_account_close">Account
              </a>
            </li>
			
          </ul>
        </div>
      </div>
    </div>
  </div>