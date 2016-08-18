<?php 
error_reporting(0);
include('client_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		$imgurl = $variableconfig->imgurl(); 
 ?>
<style>
a {
    color: #000;
    text-decoration: none;
}
a:hover, a:focus {
	text-decoration: none;
	color: #D9C300;
}
.modal-body {
    max-height: calc(100vh - 210px) !important;
    overflow-y: auto !important; 
}
</style>
<script src="<?php echo base_url(); ?>js/address/jquery.ui.addresspicker.js"></script>
<body>
<div class="se-pre-con"></div>
  <div class="container whiteBG">
    <div class="main-content controller-job action-new">
      <div class="bg-fill widget-PostJob clearfix">
        <header class="clearfix text-center">
          <h1 class="text-danger">Your event is almost ready
            <aside class="below">
              Tell us more about your event
            </aside>
          </h1>
		   <h5 id="alertmsg" class="error_msg"></h5>
        </header>
        <hr> 
		<div class="col-md-4">
			<img class="center-block" style="height: 280px;" src="<?php echo base_url();?>img/bartender transparent.png">
		</div>
		<div class="col-md-4">
         <form target="_top" data-toggle="validator" id="myForm">
		 <div class="form-group prepend-top">
            <label class="" for="Projects_title">Event Name
            </label>
            <input placeholder="e.g. Spring Cocktail Party" class="form-control" name="" id="eventname" type="text" maxlength="85" value="" required>
          </div>
		  <div class="form-group prepend-top">
            <label class="" for="event_contact">Event Contact
            </label>
            <input placeholder="" class="form-control" name="" id="eventcontact" type="text" maxlength="85" value="" required>
          </div>
		  
		  <div class="prepend-top form-group">
			<label for="" class="required">Event Picture 
                </label> 
			<img class="eimg img-thumbnail" style="width: 350px; height: 150px;" src="<?php echo $imgurl; ?>default-event.png">
			<br>
			<br>
           <input class="form-control my-form-control" type='file' id="upload" />
			<input type='hidden' id="img_url" />
          </div>
		  
		  <!--<div class="prepend-top clearfix form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <label for="" class="required">Event Contact Name
                </label>
                <input placeholder="Event Contact Name" class="form-control " name="" id="firstname" type="text" maxlength="40" required> 
              </div>
              
            </div>
          </div>-->
		  
          <div class="prepend-top form-group">
            <label class="pull-left required" for="inputEmail">Email address <span data-placement="right" data-toggle="tooltip" title="If you want to use a different email address for this event go to My Profile - Settings - Notifications" class="glyphicon glyphicon-question-sign"></span>
            </label>
            <input class="form-control" value="<?php echo $client_email; ?>" name="" id="inputEmail" type="email" required disabled="disabled"> 
			 <div class="help-block with-errors"></div>
          </div>         
          
          <div class="form-group prepend-top">
		  <!--<label class="" for="Projects_title">Event Date</label>
              <input class="form-control " type="text" name="daterange" id="datetime" value="" required/>-->
			
			
			<!--<div class="col-md-1">
				<label class="" for="Projects_title">From</label>
			</div>-->
				
					<div class="form-group">
					<label class="" for="fromdate">From Date & Time <span data-placement="right" data-toggle="tooltip" title="The start time should be when you need the talent to start their shift" class="glyphicon glyphicon-question-sign"></span></label>
						<div class='input-group date' id='datetimepicker6'>
							<input placeholder="MM/DD/YYYY HH:MM" type='text' class="form-control" id="startdate" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				
			<!--<div class="col-md-1">
				<label class="" for="Projects_title">To</label>
			</div>-->
			
					<div class="form-group">
					<label class="" for="todate">To Date & Time <span data-placement="right" data-toggle="tooltip" title="End time should be when you are expecting the talent to finish their shift" class="glyphicon glyphicon-question-sign"></span></label>
						<div class='input-group date' id='datetimepicker7'>
							<input placeholder="MM/DD/YYYY HH:MM" type='text' class="form-control" id="enddate" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				
			
          </div>
		  
		    <?php
				$this->db->select('*');		
				$this->db->from('event_type');
				$query = $this->db->get();
				$result = $query->result_array(); 
			?>
			<div class="form-group prepend-top emp" id="hideeventtype">
            <label class="" for="">Event Type
            </label>
            <select class="col-xs-12 form-control form-group" name="" id="event_type" >
				<?php
					$i=1;
					foreach($result as $val){ 
					if($i==1){ ?>
						<option value="<?php echo $val['event_type_id']; ?>" selected="selected"><?php echo $val['name']; ?></option>
					<?php } else { ?>
						<option value="<?php echo $val['event_type_id']; ?>"><?php echo $val['name']; ?></option>
					<?php } $i++; } ?>
              
            </select>
			</div>
			
          <div class="prepend-top clearfix form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <label for="" class="required">Event Location
                </label>
                <div class='input input-positioned'>
                  <input placeholder="e.g. 596 9th Ave, New York, NY 10036, USA" id="addresspicker_map" class="form-control" name="" required/>   
                  <br/>
                  <div id="addressdetails">
                    <!--<label>Locality: 
                    </label> 
                    <input id="locality" disabled=disabled> 
                    <br/>
                    <label>SubLocality: 
                    </label> 
                    <input id="sublocality" disabled=disabled> 
                    <br/>
                    <label>Borough: 
                    </label> 
                    <input id="administrative_area_level_3" disabled=disabled> 
                    <br/>
                    <label>District: 
                    </label> 
                    <input id="administrative_area_level_2" disabled=disabled> 
                    <br/>
                    <label>State/Province: 
                    </label> 
                    <input id="administrative_area_level_1" disabled=disabled> 
                    <br/>
                    <label>Country:  
                    </label> 
                    <input id="country" disabled=disabled> 
                    <br/>-->
                    <!--<label>Postal Code: 
                    </label>-->
                    <input style="display: none;" id="postal_code" disabled=disabled> 
                    <!--<br/>
                    <label>Lat:      
                    </label> -->
                    <input style="display: none;" id="lat" disabled=disabled> 
                    <!--<br/>
                    <label>Lng:      
                    </label>-->
                    <input style="display: none;" id="lng" disabled=disabled> 
                    
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <label for="" class="required">Map Preview
                </label>
                <div class='map-wrapper map-control'>
                  <label id="geo_label" for="reverseGeocode"></label>
					<select style="visibility: hidden;" id="reverseGeocode">
					<option value="false">No</option>
					<option value="true" selected>Yes</option>
					</select><br/> 
                  <div id="map">
                  </div>
                  <div id="legend">You can drag and drop the marker to the correct location
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group prepend-top">
            <label class="" for="">Approximate number of guests
            </label>
            <select class="col-xs-12 form-control form-group" name="" id="guestnum" >
              <option value="" selected="selected">More than 200
              </option>
              <option value="" selected="selected">150- 200
              </option>
              <option value="" selected="selected">100-150
              </option>
              <option value="" selected="selected">50-100
              </option>
              <option value="" selected="selected">25 - 50
              </option>
              <option value="" selected="selected">10 - 25
              </option>
              <option value="" selected="selected">Less than 10
              </option>
            </select>
          </div>
          <div class="prepend-top form-group">
            <label class="pull-left required" for="">EVENT DESCRIPTION
            </label>
            <textarea class="form-control autoresized-textarea clear" rows="7" placeholder="Provide a more detailed description to help you get better staff" name="" id="description"></textarea>
          </div>
          <div class="prepend-top form-group">
            <label class="pull-left required" for="">STARTING INSTRUCTIONS
            </label>
            <textarea placeholder="Meet at the reception." class="form-control" name="" id="instructions" type="text" value=""></textarea>
          </div>
          <div class="form-group prepend-top">
            <label class="" for="">Approximate number of talent needed <span data-placement="right" data-toggle="tooltip" title="Please choose the approximate number of talent needed for your event. You can hire more or less but we will use this number to give you an estimate further down." class="glyphicon glyphicon-question-sign"></span>
            </label>
            <select class="col-xs-12 form-control form-group" name="" id="waitersnum">
			<?php $range = range(1,30); 
			$i = 1;
			foreach($range as $val){ if($i == 1){ ?> 
				<option value="" selected="selected"><?php echo $val; ?></option>
			<?php }else{ ?>
			<option value=""><?php echo $val; ?></option>
			<?php  } $i++; } ?>
              
            </select>
          </div>
		  
		  <div class="prepend-top clearfix">
			<div class="form-group clearfix">
			  <label class="pull-left" for="">Talent expertise needed
			  </label>    
			</div>
			<div class="form-group">
				<div class="">
				  <label>
					<input type="checkbox" name="skills" value="bartending">
					Bartender
				  </label>
				</div>
				<div class="">
				  <label>
					<input type="checkbox" name="skills" value="waiter,waitress">
					Waiter/waitress
				  </label>
				</div>
				<div class="">
				  <label>
					<input type="checkbox" name="skills" value="personality,host">
					Personality/Host
				  </label>
				</div>
			  </div>
		  </div>
		  </div>
		  
          <div class="form-group prepend-top clearfix row">
            <label class="pull-left col-xs-12 required" for="Uniform_bracket">Uniform
            </label>
            <input id="ytProjects_budget_bracket" type="hidden" value="" name="Projects[budget_bracket]">
            <div id="Uniform_bracket">
              <span class="col-xs-12 col-sm-4 xpBox">
			  <img class="center-block" style="height: 250px;" src="<?php echo base_url();?>img/Black tie.png">
                <input class="experience-level form-control" id="Projects_budget_bracket_0" value="1" type="radio" name="uniform">
                <label for="Projects_budget_bracket_0">
                  <div class="xpHead">Black Tie
                  </div>
                  <div class="xpBody">Black waistcoat, white shirt, black trousers, black shoes and skinny black tie.
                  </div>
                </label>
              </span>
              <span class="col-xs-12 col-sm-4 xpBox">
			  <img class="center-block" style="height: 250px;" src="<?php echo base_url();?>img/White shirt black tie.png">
                <input class="experience-level form-control" id="Uniform_bracket_1" value="2" type="radio" name="uniform">
                <label for="Uniform_bracket_1">
                  <div class="xpHead">White Shirt Black Tie
                  </div>
                  <div class="xpBody">White shirt, black trousers, black shoes and skinny black tie.
                  </div>
                </label>
              </span>
              <span class="col-xs-12 col-sm-4 xpBox">
			  <img class="center-block" style="height: 250px;" src="<?php echo base_url();?>img/custom outfit.png">
                <input class="experience-level form-control" id="Uniform_bracket_2" value="3" type="radio" name="uniform">
                <label for="Uniform_bracket_2">
                  <div class="xpHead">Custom
                  </div>
                  <div class="xpBody">
                    <textarea class="form-control autoresized-textarea clear" rows="4" placeholder="Custom uniform requirements." name="" id="uniform_description"></textarea>
                  </div>
                  </span>
                </div>
              </label>
            </span>
          </div>
		  
		  <div class="col-md-4 col-md-offset-4">
		  <div class="prepend-top clearfix">
			<div class="form-group clearfix">
			  <label class="pull-left" for="">UNIFORM PROVIDED?
			  </label>
			  <!--<span class="pull-right popover-toggle tooltip-visible-lg" data-content-selector="#privacy-suggestion-content" data-trigger="hover" data-class="info" data-placement="right">
				<i class="color-info fa fa-question-circle">
				</i>
			  </span>
			  <span class="pull-right bootbox-toggle clickable tooltip-hidden-lg" data-content-selector="#privacy-suggestion-content" data-trigger="click" title="Help tip">
				<i class="color-info fa fa-question-circle">
				</i>
			  </span>
			  <div style="display: none !important;" id="help-content-566f18445e97b">
			  </div>-->       
			</div>
			<div class="clearfix privacy-selector">
			  <div>
				<input value="1" name="uniformprovided" id="" class="pull-left" type="radio">                   
				<label for="Projects_privacy[Public]" class="normal">
				  Yes
				</label>
			  </div>
			  <div>
				<input value="0" name="uniformprovided" id="" class="pull-left " type="radio">                    
				<label for="Projects_privacy[Private]" class="normal">
				  No
				</label>
			  </div>
			</div>
		  </div>
		  
		  <br>
		  
		  <div class="prepend-top clearfix">
			<div class="form-group clearfix">
			  <label class="pull-left" for="">Visibility  <span data-placement="right" data-toggle="tooltip" title="‘OPEN TO ALL’ means that this event will be posted on the Outfit job board and all our registered talent will be able to see it and apply to work at your event. You can also invite whoever you want. ’HANDPICK’ means that this event won’t be visible to any talent and you need to choose who you want to invite." class="glyphicon glyphicon-question-sign"></span>
			  </label>			   
			</div>
			<div class="clearfix privacy-selector">
			  <div>
				<input value="1" name="open_to_all" id="" class="pull-left " type="radio">                    
				<label for="" class="normal">
				  Handpicked
				</label>
			  </div>
			  <div>
				<input value="0" name="open_to_all" id="" class="pull-left" type="radio" checked>                   
				<label for="" class="normal">
				  Open to all
				</label>
			  </div>
			  
			</div>
		  </div>
		  
		  <div class="prepend-top clearfix">
		  </br>
				<div class="form-group">
					<label>
						<input type="checkbox" name="agree" value="agree" /> <a data-toggle="modal" data-target="#termsModal">I accept the terms and conditions</a>
					</label>
					<h5 style="color: red;" id="agreemessage"></h5>
				</div>
		  </div>
		  
		  <!-- Terms and conditions modal -->
		<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Terms and conditions</h3>
					</div>

					<div class="modal-body">
						<p>These Terms of Service govern the use of the services offered by Outfit, Inc. (the “Company”) at the Company’s website (Outfitstaff.com the “Site”) or mobile applications. Such services, the Site and mobile applications together are hereinafter collectively referred to as the “Service.” Your use of the Service constitutes your acceptance of and agreement to all of the terms and conditions in these Terms of Service, the Privacy Policy (the “Privacy Policy”) available here and your representation that you are 18 years of age or older. If you object to anything in these Terms of Service or the Privacy Policy, you are not permitted to use the Service. The Privacy Policy is incorporated by reference into these Terms of Service and these Terms of Service and the Privacy Policy together are hereinafter referred to as this “Agreement.”</p>
<p>These Terms of Service include, but are not limited to, the following:</p>
•	Your agreement that the Service is provided “as is” and without any warranty.</p>
•	Your agreement that, for a period of one year following the completion of an Assignment, a Client may not solicit the services of a Provider who has performed such Assignment for such Client other than by means ofthrough the use of the Service.</p>
•	Your agreement that the Company has no liability regarding the Service.</p>
•	Your consent to release the Company from any liability based on claims any between Users, and generally.</p>
•	Your agreement to indemnify and hold harmless the Company from claims due to your use or inability to use the Service or content submitted from your account to the Service.</p>
•	Your consent that either party has the right to compel any disputes arising out of this agreement to arbitration.</p>
•	Your consent that no claims can be adjudicated on a class basis.
•	</p>
<p>Service Connects Providers and Clients </p>
The Service is a communications platform which enables the connection between Clients and Providers. Clients are individuals and/or businesses seeking to obtain event and/or work assignments (“Assignments”) from Providers and are therefore clients of Providers (“Clients”), and Providers are individuals and/or businesses seeking to perform Assignments (“Providers”) for Clients (“Providers”). Clients and Providers together are hereinafter referred to as “Users.”</p>


<p>Service Only Provides a Venue</p>
The Service is a platform for enabling connections between Users for the fulfillment of Assignments, but Company is not responsible for the performance of UsersPerformers, nor does it have control over the quality, timing, legality, failure to provide, or any other aspect whatsoever of Assignments, nor of the integrity, responsibility or any of the actions or omissions whatsoever of any Users. Company does not have control over the quality, timing or legality of Assignments delivered by Providers. Company makes no representations about the suitability, reliability, timeliness, or accuracy of the Assignments requested and provided by Users identified through the Service whether in public, private, or offline interactions. Performers are independent contractors and nothing contained in this Agreement shall be deemed or interpreted to constitute Performers as a partner, agent or employee of the Company.</p>

<p>User Vetting</p>
Clients and Providers may be subject to an extensive vetting process before they can register and during their use of the Service, including but not limited to a verification of identity and a comprehensive criminal background check, at the Country, State and local level, using third party services as appropriate. Users hereby give consent to Company to conduct background checks as often as required in compliance with federal and state laws and the Fair Credit Reporting Act.
Although Company may perform background checks of Users, as outlined above, Company cannot confirm that each User is who they claim to be and therefore, Company cannot and does not assume any responsibility for the accuracy or reliability identity or background check information or any information provided through the Service.
When interacting with other Users, you should exercise caution and common sense to protect your personal safety and property, just as you would when interacting with other persons whom you don’t know. NEITHER COMPANY NOR ITS AFFILIATES OR LICENSORS IS RESPONSIBLE FOR THE CONDUCT, WHETHER ONLINE OR OFFLINE, OF ANY USER OF THE SERVICE AND YOU HEREBY RELEASE THE COMPANY AND ITS AFFILIATES OR LICENSORS FROM ANY LIABILITY RELATED THERETO. COMPANY AND ITS AFFILIATES AND LICENSORS WILL NOT BE LIABLE FOR ANY CLAIM, INJURY OR DAMAGE ARISING IN CONNECTION WITH YOUR USE OF THE SERVICE.</p>
<p>Billing and Payment</p>
Users of the Service contract for Assignments directly with other Users. Company will not be a party to any contracts for Assignments or or any other services.
Users of the Service will be required to provide their credit card or bank account details to Company and the Payment Service Provider retained by Company (the “PSP”).
Clients will be responsible for paying the invoice for each Assignment (the “Invoice”), which will include the pricing terms of the Assignment agreed with and provided by a Provider (“Assignment Payment”), any out of pocket expenses agreed with and submitted by a Provider in connection with the Assignment, any tip or gratuity, if applicable, and the fee the Company assesses for the Service, based on the Assignment Payment amount.
Providers may be required to register with the PSP, agree to Terms of Service of the PSP and go through a vetting process at the request of the PSP to set up their account with the PSP. Terms of Service between Providers and the PSP retained by Company are available here  (the “PSP Agreement”). By accepting these Terms of Use, each Provider agrees that they have downloaded or printed, and reviewed and agreed to the PSP Agreement. Please note that the Company is not a party to the PSP Agreement and that you, the PSP and any other parties listed in the PSP Agreement (currently, Stripe) are the parties to the PSP Agreement and that the Company has no obligations or liability to any Provider under the PSP Agreement.
Within 24 hours after Client receives confirmation through the Service or via email that an Assignment has been completed, Client authorizes Company to provide Client’s payment details to the PSP for processing of Assignment Payment, out of pocket expenses owed to Provider, any tip or gratuity, if applicable, and any fees owed to Company for the use of the Service. You may be charged a cancellation fee through the PSP if you book an
Assignment, but cancel it before it is completed, as set forth in the Assignment pricing terms. Any deposits paid during event creation is non refundable.
Company reserves the right, in its sole discretion (but not the obligation), to (i) place on hold any Assignment Payment and out of pocket expenses, or (ii) refund, provide credits or arrange for the PSP to do so.
Assignment Payment and fees must be paid through the Service.</p>
Users of the Service will be liable for any taxes (including VAT, if applicable) required to be paid on the Services provided under the Agreement (other than taxes on the Company’s income).</p>
<p>Non-Solicitation</p>
In consideration of Outfit’s expense in providing the Service, each Client agrees for the one year period immediately following the completion of an Assignment by a Provider, that Client shall not, directly or indirectly, for itself, or on behalf of any other person, corporation, consulting agency, staffing company or any other firm or other entity, whether as principal, agent, employee, stockholder, partner, member, officer, director, sole proprietor, or otherwise, solicit, participate in or promote the solicitation of, or hire such Provider without the written permission from Outfit. If Provider fails to comply with these terms, Client will pay Outfit liquidated damages equal to $2,000 for each applicable Provider. Client shall inform Outfit of the hiring of any such Provider within ten (10) days of such hiring and shall make payment of the applicable liquidated damages within thirty (30) days of such hiring.
Release</p>
<p>The Service is only a venue for connecting Users. Because Company is not involved in the actual contact between Users or in the completion of the Assignment. ,	I in the event that you have a dispute with one or more Users, you release Company (and our officers, directors, agents, investors, subsidiaries, and employees) from any and all claims, demands, or damages (actual or consequential) of every kind and nature, known and unknown, suspected and unsuspected, disclosed and undisclosed, arising out of or in any way connected with such disputes.
Company expressly disclaims any liability that may arise between Users of its Service.</p>
<p>Public Areas; Acceptable Use</p>
<p>The Service may contain profiles, email systems, blogs, message boards, applications, job postings, chat areas, news groups, forums, communities and/or other message or communication facilities (“Public Areas”) that allow Users to communicate with other Users. You may only use such community areas to send and receive messages and material that are relevant and proper to the applicable forum.</p>
<p>Without limitation, while using the Service, you may not:</p>
•	Defame, abuse, harass, stalk, threaten or otherwise violate the legal rights (such as, but not limited to, rights of privacy and publicity) of others, including Company staff.</p>
•	Publish, post, upload, distribute or disseminate any profane, defamatory, infringing, obscene or unlawful topic, name, material or information.</p>
•	Use the Service for any purpose, including, but not limited to posting or completing an Assignment, in violation of local, state, national, or international law.</p>
•	Upload files that contain software or other material that violates the intellectual property rights (or rights of privacy or publicity) of any third party.</p>
•	Upload files that contain viruses, Trojan horses, corrupted files, or any other similar software that may damage the operation of another’s computer.</p>
•	Post or upload any content to which you have not obtained any necessary rights or permissions to use accordingly.</p>
•	Advertise or offer to sell any goods or services for any commercial purpose through the Service that are not relevant to the services offered through the Service.</p>
•	Conduct or forward surveys, contests, pyramid schemes, or chain letters.</p>
•	Impersonate another person or a User or allow any other person or entity to use your identification to post or view comments.</p>
•	Post the same Assignment repeatedly (“Spamming”). Spamming is strictly prohibited.</p>
•	Download any file posted by another User that a User knows, or reasonably should know, cannot be legally distributed through the Service.</p>
•	Restrict or inhibit any other User from using and enjoying the Public Areas.</p>
•	Imply or state that any statements you make are endorsed by Company, without the prior written consent of Company.</p>
•	Use a robot, spider, manual and/or automatic processes or devices to data-mine, data-crawl, scrape or index the Service in any manner.</p>
•	Hack or interfere with the Service, its servers or any connected networks.</p>
•	Adapt, alter, license, sublicense or translate the Service for your own personal or commercial use.</p>
•	Remove or alter, visually or otherwise, any copyrights, trademarks or proprietary marks and rights owned by Company.</p>
•	Upload content that is offensive and/or harmful, including, but not limited to, content that advocates, endorses, condones or promotes racism, bigotry, hatred or physical harm of any kind against any individual or group of individuals.</p>
•	Upload content that provides materials or access to materials that exploit people under the age of 18 in an abusive, violent or sexual manner.</p>
•	Use the Service to solicit for any other business, website or service, or otherwise contact Users for employment, contracting or any purpose not related to use of the Service as set forth herein.</p>
•	Use the Service to collect usernames and or/email addresses of Users by electronic or other means.</p>
•	Register under different usernames or identities, after your account has been suspended or terminated.</p>
<p>You understand that all submissions made to Public Areas will be public and that you will be publicly identified by your name or login identification when communicating in Public Areas, and Company will not be responsible for the action of any Users with respect to any information or materials posted in Public Areas.</p>
<p>Termination and Suspension</p>
<p>Company may terminate or suspend your right to use the Service at any time for any or no reason by providing you with written or email notice of such termination, and termination will be effective immediately upon delivery of such notice.
Without limitation, Company may terminate or suspend your right to use the Service if you breach any term of this Agreement or any policy of Company posted through the Service from time to time, or if Company otherwise finds that you have engaged in inappropriate and/or offensive behavior. If Company terminates or suspends your right to use the Service for any of these reasons, you will not be entitled to any refund of unused balance in your account. If Company terminates or suspends your account for any reason, you are prohibited from registering and creating a new account under your name, a fake or borrowed name, or the name of any third party, even if you may be acting on behalf of the third party. In addition to terminating or suspending your account, Company reserves the right to take appropriate legal action, including without limitation pursuing civil, criminal, and injunctive redress.
Even after your right to use the Service is terminated or suspended, this Agreement will remain enforceable against you.</p>
<p>You may terminate this Agreement at any time by ceasing all use of the Service. All sections which by their nature should survive the expiration or termination of this Agreement shall continue in full force and effect subsequent to and notwithstanding the expiration or termination of this Agreement.
Account, Password, Security and Mobile Phone Use</p>
<p>You must register with Company and create an account to use the Service. You are the sole authorized user of your account. You are responsible for maintaining the confidentiality of any password and account number provided by you or Company for accessing the Service. You are solely and fully responsible for all activities that occur under your password or account. Company has no control over the use of any User’s account and expressly disclaims any liability derived therefrom. Should you suspect that any unauthorized party may be using your password or account or you suspect any other breach of security, you will contact Company immediately.
By providing your mobile phone number and using the Service, you hereby affirmatively consent to our use of your mobile phone number for calls and texts in order to perform and improve upon the Service. Company will not assess any charges for calls or texts, but standard message charges or other charges from your wireless carrier may apply. You may opt-out of receiving text messages from us by modifying your account settings on the Site or Company’s mobile application, or by emailing support@Outfitstaff.com.
Your Information and Likeness</p>
<p>“Your Information” is defined as any information and materials you provide to Company or other Users in connection with your registration for and use of the Service, including without limitation that posted or transmitted for use in Public Areas. You are solely responsible for Your Information, and we act merely as a passive conduit for your online distribution and publication of Your Information. The information and materials described in this Section, as provided by each User, is collectively referred to herein as “User Generated Content.” You hereby represent and warrant to Company that Your Information (a) will not be false, inaccurate, incomplete or misleading; (b) will not be fraudulent or involve the sale of counterfeit or stolen items; (c) will not infringe any third party’s copyright, patent, trademark, trade secret or other proprietary right or rights of publicity or privacy; (d) will not violate any law, statute, ordinance, or regulation (including without limitation those governing export control, consumer protection, unfair competition, anti-discrimination or false advertising); (e) will not be defamatory, libelous, unlawfully threatening, or unlawfully harassing; (f) will not be obscene or contain child pornography or be harmful to minors; (g) will not contain any viruses, Trojan Horses, worms, time bombs, cancelbots or other computer programming routines that are intended to damage, detrimentally interfere with, surreptitiously intercept or expropriate any system, data or personal information; and (h) will not create liability for Company or cause Company to lose (in whole or in part) the services of its ISPs or other partners or suppliers.
The Service hosts User Generated Content relating to reviews of specific Providers. Such reviews are opinions of Users and not the opinion of Company, have not been verified or approved by Company and each Client should undertake their own research to be satisfied that a specific Provider is the right person for an Assignment. You agree that Company is not liable for any User Generated Content.
You hereby grant Company a non-exclusive, worldwide, perpetual, irrevocable, royalty-free, sublicensable (through multiple tiers) right to exercise all copyright, publicity rights, and any other rights you have in Your Information, in any media now known or not currently known in order to perform and improve upon the Service.
Each Provider who provides to the Company any videotape, film, record, photograph, voice, or all related instrumental, musical, or other sound effects, in exchange for the right to use the Service, hereby irrevocably grants to the Company the non-exclusive, fully-paid, royalty-free, transferable, sublicensable, worldwide, unrestricted, and perpetual right to:</p>
•	Use any videotape, film, record or photograph that such Provider provides to the Company, and use, reproduce, modify, or creative derivatives of such Provider picture, silhouette and other reproductions of their physical likeness (as the same may appear in any still camera photograph and/or motion picture film or video) (collectively the “Physical Likeness”), in and in connection with the exhibition, distribution, display, performance, transmission, broadcasting on any and all media, including, without limitation, the internet, of any videos or images of such Provider in connection with the Service.</p>
•	Reproduce in all media any recordings of such Provider’s voice, and all related instrumental, musical, or other sound effects (collectively, the “Voice”), made in connection with the Service.</p>
•	Use, and permit to be used, such Provider’s Physical Likeness and Voice in the advertising, marketing, and/or publicizing of the Service in any media.</p>
•	Use, and permit to be used, such Provider’s name and identity in connection with the Service.</p>
<p>Each Provider hereby waives all rights and releases the Company from, and shall neither sue nor bring any proceeding against any such parties for, any claim or cause of action, whether now known or unknown, for defamation, invasion of right to privacy, publicity or personality or any similar matter, or based upon or relating to the use and exploitation of such Provider’s identity, likeness or voice in connection with the Service.
Each Provider acknowledges that the Company shall not owe any financial or other remuneration for using the recordings provided hereunder by such Provider, either for initial or subsequent transmission or playback, and further acknowledges that the Company is not responsible for any expense or liability incurred as a result of such Provider’s recordings or participation in any recordings, including any loss of such recording data.
Links to Other Websites</p>
<p>Links (such as hyperlinks) from the Service to other sites on the Web do not constitute the endorsement by Company of those sites or their content. Such links are provided as an information service, for reference and convenience only. Company does not control any such sites, and is not responsible for their content. The existence of links on the Service to such websites (including without limitation external websites that are framed by the Company Service as well as any advertisements displayed in connection therewith) does not mean that Company endorses any of the material on such websites, or has any association with their operators. It is your responsibility to evaluate the content and usefulness of the information obtained from other sites.
The use of any website controlled, owned or operated by third parties is governed by the terms and conditions of use and privacy policies for those websites, and not by Company’s Terms of Service or Privacy Policy. You access such third-party websites at your own risk. Company expressly disclaims any liability arising in connection with your use and/or viewing of any websites or other material associated with links that may appear on the Service. You hereby agree to hold Company harmless from any liability that may result from the use of links that may appear on the Service.
As part of the functionality of the Service, you may link your account with online accounts you may have with third party service providers (each such account, a “Third Party Account”) by either: (i) providing your Third Party Account login information through the Service; or (ii) allowing Company to access your Third Party Account, as is permitted under the applicable terms and conditions that govern your use of each Third Party Account. You represent that you are entitled to disclose your Third Party Account login information to Company and/or grant Company access to your Third Party Account (including, but not limited to, for use for the purposes described herein), without breach by you of any of the terms and conditions that govern your use of the applicable Third Party Account and without obligating Company to pay any fees or making Company subject to any usage limitations imposed by such third party service providers. By granting Company access to any Third Party Accounts, you understand that (i) Company may access, make available and store (if applicable) any content that you have provided to and stored in your Third Party Account (the “SNS Content”) so that it is available on and through the Service via your account, including without limitation any friend lists, and (ii) Company may submit and receive additional information to your Third Party Account to the extent you are notified when you link your account with the Third Party Account. Unless otherwise specified in these Terms of Service, all SNS Content, if any, shall be considered to be User Generated Content for all purposes of these Terms of Service. Depending on the Third Party Accounts you choose and subject to the privacy settings that you have set in such Third Party Accounts, personally identifiable information that you post to your Third Party Accounts may be available on and through your account on the Service. Please note that if a Third Party Account or associated service becomes unavailable or Company’s access to such Third Party Account is terminated by the third party service provider, then SNS Content may no longer be available on and through the Service. You will have the ability to disable the connection between your account on the Service and your Third Party Accounts at any time. PLEASE NOTE THAT YOUR RELATIONSHIP WITH THE THIRD PARTY SERVICE PROVIDERS ASSOCIATED WITH YOUR THIRD PARTY ACCOUNTS IS GOVERNED SOLELY BY YOUR AGREEMENT(S) WITH SUCH THIRD PARTY SERVICE PROVIDERS. Company makes no effort to review any SNS Content for any purpose, including but not limited to, for accuracy, legality or non-infringement, and Company is not responsible for any SNS Content. You acknowledge and agree that Company may access your e-mail address book associated with a Third Party Account and your contacts list stored on your mobile device or tablet computer solely for the purposes of identifying and informing you of those contacts who have also registered to use the Service. At your request made via e-mail to support@Outfitstaff.com, Company will deactivate the connection between the Service and your Third Party Account and delete any information stored on Company’s servers that was obtained through such Third Party Account, except the username and profile picture that become associated with your account.</p>
<p>Worker Classification and Withholdings</p>
Each User assumes all liability for proper classification of such User’s workers as independent contractors or employees based on applicable legal guidelines.
Users do not have authority to enter into written or oral — whether implied or express — contracts on behalf of Company. Each User acknowledges that Company does not, in any way, supervise, direct, or control a Provider’s work or Assignments performed in any manner. Company does not set a Provider’s work hours or location of work. Company will not provide any equipment, labor or materials needed for a particular Assignment.
The Service is not an employment service and Company does not serve as an employer of any User. As such, Company will not be liable for any tax or withholding, including but not limited to unemployment insurance, employer’s liability, social security or payroll withholding tax in connection with your use of Users’ services.
You agree to indemnify, hold harmless and defend Company from any and all claims that a Provider was misclassified as an independent contractor, any liabilities arising from a determination by a court, arbitrator, government agency or other body that a Provider was misclassified as an employee (including, but not limited to, taxes, penalties, interest and attorney’s fees), any claim that Company was an employer or joint employer of a Provider, as well as claims under any employment-related laws, such as those relating to employment termination, employment discrimination, harassment or retaliation, as well as any claims for overtime pay, sick leave, holiday or vacation pay, retirement benefits, worker’s compensation benefits, unemployment benefits, or any other employee benefits.
Intellectual Property Rights</p>
<p>All text, graphics, editorial content, data, formatting, graphs, designs, HTML, look and feel, photographs, music, sounds, images, software, videos, designs, typefaces and other content (collectively “Proprietary Material”) that Users see or read through the Service is owned by Company, excluding User Generated Content that Company has the right to use. Proprietary Material is protected in all forms, media and technologies now known or hereinafter developed. Company owns all Proprietary Material, as well as the coordination, selection, arrangement and enhancement of such Proprietary Materials as a Collective Work under the United States Copyright Act, as amended. The Proprietary Material is protected by the domestic and international laws of copyright, patents, and other proprietary rights and laws. Users may not copy, download, use, redesign, reconfigure, or retransmit anything from the Service without Company’s express prior written consent and, if applicable, the holder of the rights to the User Generated Content. Any use of such Proprietary Material, other than as permitted therein, is expressly prohibited without the prior permission of Company and, if applicable, the holder of the rights to the User Generated Content.
The service marks and trademarks of Company, including without limitation Company and the Company logos are service marks owned by Company. Any other trademarks, service marks, logos and/or trade names appearing via the Service are the property of their respective owners. You may not copy or use any of these marks, logos or trade names without the express prior written consent of the owner.
Copyright Complaints and Copyright Agent</p>
Company respects the intellectual property of others, and expects Users to do the same. If you believe, in good faith, that any materials provided on or in connection with the Service infringe upon your copyright or other intellectual property right, please send the following information to Company’s Copyright Agent at: Outfit, Inc., 186 Franklin Street, Brooklyn, NY 11222
<p>United States or support@Outfitstaff.com:</p>
•	A description of the copyrighted work that you claim has been infringed, including the URL (Internet address) or other specific location on the Service where the material you claim is infringed is located. Include enough information to allow Company to locate the material, and explain why you think an infringement has taken place;</p>
•	A description of the location where the original or an authorized copy of the copyrighted work exists — for example, the URL (Internet address) where it is posted or the name of the book in which it has been published;</p>
•	Your address, telephone number, and e-mail address;</p>
•	A statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law;</p>
•	A statement by you, made under penalty of perjury, that the information in your notice is accurate, and that you are the copyright owner or authorized to act on the copyright owner’s behalf; and</p>
•	An electronic or physical signature of the owner of the copyright or the person authorized to act on behalf of the owner of the copyright interest.</p>
•	Confidential Information</p>
<p>You acknowledge that Confidential Information (as hereinafter defined) is a valuable, special and unique asset of Company and agree that you will not disclose, transfer, use (or seek to induce others to disclose, transfer or use) any Confidential Information for any purpose other than disclosure to your authorized employees and agents who are bound to maintain the confidentiality of Confidential Information. You shall promptly notify Company in writing of any circumstances which may constitute unauthorized disclosure, transfer, or use of Confidential Information. You shall use best efforts to protect Confidential Information from unauthorized disclosure, transfer or use. You shall return all originals and any copies of any and all materials containing Confidential Information to Company upon termination of this Agreement for any reason whatsoever. The term “Confidential Information” shall mean any and all of Company’s trade secrets, confidential and proprietary information and all other information and data of Company that is not generally known to the public or other third parties who could derive value, economic or otherwise, from its use or disclosure. Confidential Information shall be deemed to include technical data, know-how, research, product plans, products, services, customers, markets, software, developments, inventions, processes, formulas, technology, designs, drawings, engineering, hardware configuration information, marketing, finances or other business information disclosed directly or indirectly in writing, orally or by drawings or observation.</p>
<p>Disclaimer of Warranties</p>
USE OF THE SERVICE IS ENTIRELY AT YOUR THE USER’S OWN RISK.</p>
THE SERVICE IS PROVIDED ON AN “AS IS” BASIS WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. COMPANY MAKES NO WARRANTIES OR REPRESENTATIONS ABOUT THE ACCURACY OR COMPLETENESS OF THE CONTENT PROVIDED THROUGH THE SERVICE OR THE CONTENT OF ANY SITES LINKED TO THE SERVICE AND ASSUMES NO LIABILITY OR RESPONSIBILITY FOR ANY (I) ERRORS, MISTAKES, OR INACCURACIES OF CONTENT, (II) PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF THE SERVICE, (III) ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN. COMPANY DOES NOT WARRANT, ENDORSE, GUARANTEE OR ASSUME RESPONSIBILITY FOR ANY SERVICE ADVERTISED OR OFFERED BY A THIRD PARTY THROUGH THE SERVICE OR ANY HYPERLINKED WEBSITE OR FEATURED IN ANY BANNER OR OTHER ADVERTISING AND COMPANY WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES, OTHER THAN AS PROVIDED HEREIN. AS WITH THE PURCHASE OF A PRODUCT OR SERVICE THROUGH ANY MEDIUM OR IN ANY ENVIRONMENT, YOU SHOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WHERE APPROPRIATE.
WITHOUT LIMITING THE FOREGOING, NEITHER COMPANY NOR ITS AFFILIATES OR LICENSORS WARRANT THAT ACCESS TO THE SERVICE WILL BE UNINTERRUPTED OR THAT THE SERVICE WILL BE ERROR-FREE; NOR DO THEY MAKE ANY WARRANTY AS TO THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE SERVICE, OR AS TO THE TIMELINESS, ACCURACY, RELIABILITY, COMPLETENESS OR CONTENT OF ANY ASSIGNMENT OR SERVICE, INFORMATION OR MATERIALS PROVIDED THROUGH OR IN CONNECTION WITH THE USE OF THE SERVICE.
NEITHER COMPANY NOR ITS AFFILIATES OR LICENSORS IS RESPONSIBLE FOR THE CONDUCT, WHETHER ONLINE OR OFFLINE, OF ANY USER.</p>
NEITHER COMPANY NOR ITS AFFILIATES OR LICENSORS WARRANT THAT THE SERVICE IS FREE FROM VIRUSES, WORMS, TROJAN HORSES, OR OTHER HARMFUL COMPONENTS.</p>
COMPANY AND ITS AFFILIATES AND LICENSORS CANNOT AND DO NOT GUARANTEE THAT ANY PERSONAL INFORMATION SUPPLIED BY YOU WILL NOT BE MISAPPROPRIATED, INTERCEPTED, DELETED, DESTROYED OR USED BY OTHERS.
IN ADDITION, NOTWITHSTANDING ANY FEATURE A CLIENT MAY USE TO EXPEDITE OUTFIT SELECTION, EACH CLIENT IS RESPONSIBLE FOR SELECTING ITS PROVIDER AND NEGOTIATING TERMS OF WORK AND COMPANY DOES NOT WARRANT ANY GOODS OR SERVICES PURCHASED BY A CLIENT AND DOES NOT RECOMMEND ANY PARTICULAR PROVIDER. COMPANY DOES NOT PROVIDE ANY WARRANTIES OR GUARANTEES REGARDING ANY PROVIDER’S PROFESSIONAL ACCREDITATION, REGISTRATION OR LICENCE.</p>
<p>No Liability</p>
YOU ACKNOWLEDGE AND AGREE THAT COMPANY IS ONLY WILLING TO PROVIDE THE SERVICE IF YOU AGREE TO CERTAIN LIMITATIONS OF OUR LIABLITY TO YOU AND THIRD PARTIES. THEREFORE, YOU AGREE NOT TO HOLD COMPANY, ITS AFFILIATES, ITS LICENSORS, ITS PARTNERS IN PROMOTIONS, SWEEPSTAKES OR CONTESTS, OR ANY OF SUCH PARTIES’ AGENTS, EMPLOYEES, OFFICERS, DIRECTORS, CORPORATE PARTNERS, OR PARTICIPANTS LIABLE FOR ANY DAMAGE, SUITS, CLAIMS, AND/OR CONTROVERSIES (COLLECTIVELY, “LIABILITIES”) THAT HAVE ARISEN OR MAY ARISE, WHETHER KNOWN OR UNKNOWN, RELATING TO YOUR OR ANY OTHER PARTY’S USE OF OR INABILITY TO USE THE SERVICE, INCLUDING WITHOUT LIMITATION ANY LIABILITIES ARISING IN CONNECTION WITH THE CONDUCT, ACT OR OMISSION OF ANY USER (INCLUDING WITHOUT LIMITATION STALKING, HARASSMENT THAT IS SEXUAL OR OTHERWISE, ACTS OF PHYSICAL VIOLENCE, AND DESTRUCTION OF PERSONAL PROPERTY), ANY DISPUTE WITH ANY USER, ANY INSTRUCTION, ADVICE, ACT, OR SERVICE PROVIDED BY COMPANY OR ITS AFFILIATES OR LICENSORS AND ANY DESTRUCTION OF YOUR INFORMATION, OTHER THAN PURSUANT TO THE PROTECTION PLEDGE TERMS.
UNDER NO CIRCUMSTANCES WILL COMPANY, ITS AFFILIATES, ITS LICENSORS, OR ANY OF SUCH PARTIES’ AGENTS, EMPLOYEES, OFFICERS, DIRECTORS, CORPORATE PARTNERS, OR PARTICIPANTS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, CONSEQUENTIAL, SPECIAL OR EXEMPLARY DAMAGES ARISING IN CONNECTION WITH YOUR USE OF OR INABILITY TO USE THE SERVICES, EVEN IF ADVISED OF THE POSSIBILITY OF THE SAME. SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THE ABOVE LIMITATIONS MAY NOT APPLY TO YOU.
COMPANY DOES NOT ACCEPT ANY LIABILITY WITH RESPECT TO THE QUALITY OR FITNESS OF ANY WORK PERFORMED VIA THE SERVICE.</p>
IF, NOTWITHSTANDING THE FOREGOING EXCLUSIONS, IT IS DETERMINED THAT COMPANY OR ITS PARTNERS IN PROMOTIONS, SWEEPSTAKES OR CONTESTS, AFFILIATES, ITS LICENSORS, OR ANY OF SUCH PARTIES’ AGENTS, EMPLOYEES, OFFICERS, DIRECTORS, CORPORATE PARTNERS, OR PARTICIPANTS IS LIABLE FOR DAMAGES IN EXCESS OF THE PROTECTION PLEDGE TERMS, IN NO EVENT WILL THE AGGREGATE LIABILITY, WHETHER ARISING IN CONTRACT, TORT, STRICT LIABILITY OR OTHERWISE, EXCEED THE LESSER OF $1,000 OR THE TOTAL FEES PAID BY YOU TO COMPANY DURING THE SIX (6) MONTHS PRIOR TO THE TIME SUCH CLAIM AROSE.</p>
<p>Indemnification</p>
You hereby agree to indemnify, defend, and hold harmless Company, its directors, officers, employees, agents, licensors, attorneys, independent contractors, providers, subsidiaries, and affiliates from and against any and all claim, loss, expense or demand of liability, including attorneys’ fees and costs incurred, in connection with (i) your use or inability to use the Service, or (ii) any content submitted by you or using your account to the Service, including, but not limited to the extent such content may infringe on the intellectual rights of a third party or otherwise be illegal or unlawful. Company reserves the right, at its own expense, to assume the exclusive defense and control of any matter otherwise subject to your indemnification. You will not, in any event, settle any claim or matter without the written consent of Company.
<p>Dispute Resolution</p>
INFORMAL NEGOTIATIONS. To expedite resolution and reduce the cost of any dispute, controversy or claim related to this Agreement (“Dispute”), you and Company agree to first attempt to negotiate any Dispute (except those Disputes expressly excluded below) informally for at least thirty (30) days before initiating any arbitration or court proceeding. Such informal negotiations will commence upon written notice. Your address for such notices is your billing address, with an email copy to the email address you have provided to Company. Company’s address for such notices is Outfit, Inc., 186 Frankling Street, Brooklyn, NY, 11222745 Atlantic Avenue, Boston, MA 02111 Attention: Legal. 
BINDING ARBITRATION. If you and Company are unable to resolve a Dispute through informal negotiations, all claims arising from use of the Service (except those Disputes expressly excluded below) finally and exclusively resolved by binding arbitration. Any election to arbitrate by one party will be final and binding on the other. YOU UNDERSTAND THAT IF EITHER PARTY ELECTS TO ARBITRATE, NEITHER PARTY WILL HAVE THE RIGHT TO SUE IN COURT OR HAVE A JURY TRIAL. The arbitration will be commenced and conducted under the Commercial Arbitration Rules (the “AAA Rules”) of the American Arbitration Association (“AAA”) and, where appropriate, the AAA’s Supplementary Procedures for Consumer Related Disputes (“AAA Consumer Rules”), both of which are available at the AAA website www.adr.org. Your arbitration fees and your share of arbitrator compensation will be governed by the AAA Rules (and, where appropriate, limited by the AAA Consumer Rules). The arbitration may be conducted in person, through the submission of documents, by phone or online. The arbitrator will make a decision in writing, but need not provide a statement of reasons unless requested by a party. The arbitrator must follow applicable law, and any award may be challenged if the arbitrator fails to do so. Except as otherwise provided in this Agreement, you and Company may litigate in court to compel arbitration, stay proceeding pending arbitration, or to confirm, modify, vacate or enter judgment on the award entered by the arbitrator.
EXCEPTIONS TO ALTERNATIVE DISPUTE RESOLUTION. Each party retains the right to bring an individual action in small claims court or to seek injunctive or other equitable relief on an individual basis in a federal or state court in BostonNew York, NYMassachusetts with respect to any dispute related to the actual or threatened infringement, misappropriation or violation of a party’s intellectual property or proprietary rights.
WAIVER OF RIGHT TO BE A PLAINTIFF OR CLASS MEMBER IN A PURPORTED CLASS ACTION OR REPRESENTATIVE PROCEEDING. You and Company agree that any arbitration will be limited to the Dispute between Company and you individually. YOU ACKNOLWEDGE AND AGREE THAT YOU AND COMPANY ARE EACH WAIVING THE RIGHT TO PARTICIPATE AS A PLAINTIFF OR CLASS MEMBER IN ANY PURPORTED CLASS ACTION OR REPRESENTATIVE PROCEEDING. Further, unless both you and Company otherwise agree, the arbitrator may not consolidate more than one person’s claims, and may not otherwise preside over any form of any class or representative proceeding. If this specific paragraph is held unenforceable, then the entirety of this “Dispute Resolution” Section will be deemed null and void.
LOCATION OF ARBITRATION. Arbitration will take place in BostonNew York, MassachusettsNY. You and Company agree that for any Dispute not subject to arbitration (other than claims proceeding in any small claims court), or where no election to arbitrate has been made, the Massachusetts New York state and Federal courts located in Boston, MassachusettsNew York, NY have exclusive jurisdiction and you and Company agree to submit to the personal jurisdiction of such courts.</p>
<p>Governing Law</p>
You and Company agree that, other than as set forth under the subsection entitled “Waiver Of Right To Be A Plaintiff Or C5lass Member In A Purported Class Action Or Representative Proceeding” above, if any portion of the section entitled “Dispute Resolution” is found illegal or unenforceable, that portion will be severed and the remainder of the section will be given full force and effect. Notwithstanding the foregoing, if the subsection entitled “Exceptions to Alternative Dispute Resolution” above is found to be illegal or unenforceable, neither you nor Company will elect to arbitrate any Dispute falling within that portion of that subsection that is found to be illegal or unenforceable and such Dispute will be decided by a court of competent jurisdiction within Boston, MassachusettsNew York, NY , and you and Company agree to submit to the personal jurisdiction of that court.
Except as expressly provided otherwise, this Agreement will be is governed by, and will be construed under, the laws of the Commonwealth of MassachusettsState of New York, without regard to choice of law principles.</p>
<p>Special Promotions</p>
Company may from time to time provide certain promotional opportunities, sweepstakes and contests to Users. All such promotions will be run at the sole discretion of Company, and can be activated, modified or removed at any time by Company without advance notification and the liability of any of Company’s partners pursuant to such promotional opportunities, sweepstakes and contests shall be limited pursuant to the terms of these Terms of Service.</p>
<p>No Agency</p>
No agency, partnership, joint venture, employer-employee or franchiser-franchisee relationship is intended or created by this Agreement.</p>
<p>General Provisions</p>
Failure by Company to enforce any provision(s) of this Agreement will not be construed as a waiver of any provision or right. The provisions of this Agreement will be governed by and construed in accordance with the laws of the Commonwealth of MassachusettsNew York, without regard to its conflict of laws rules. This Agreement constitutes the entire agreement between you and Company with respect to its subject matter. If any provision of this Agreement is found to be invalid or unenforceable, the remaining provisions will be enforced to the fullest extent possible, and the remaining provisions will remain in full force and effect. This Agreement will inure to the benefit of Company, its successors and assigns.
Changes to this Agreement and the Service</p>
<p>Company reserves the right, at its sole and absolute discretion, to change, modify, add to, supplement or delete any of the terms and conditions of this Agreement (including the Privacy Policy) and review, improve, modify or discontinue, temporarily or permanently, the Service or any content or information through the Service at any time, effective with or without prior notice and without any liability to Company. Company will endeavor to notify you of these changes by email, but will not be liable for any failure to do so. If any future changes to this Agreement are unacceptable to you or cause you to no longer be in compliance with this Agreement, you must terminate, and immediately stop using, the Service. Your continued use of the Service following any revision to this Agreement constitutes your complete and irrevocable acceptance of any and all such changes. Company may change, modify, suspend, or discontinue any aspect of the Service at any time without notice or liability. Company may also impose limits on certain features or restrict your access to parts or all of the Service without notice or liability.</p>
<p>I HEREBY ACKNOWLEDGE THAT I HAVE READ AND UNDERSTAND THE FOREGOING TERMS OF SERVICE AND PRIVACY POLICY AND AGREE THAT MY USE OF THE SERVICE IS AN ACKNOWLEDGMENT OF MY AGREEMENT TO BE BOUND BY THE TERMS AND CONDITIONS OF THIS AGREEMENT.
</p>
						
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>  
      
      </div>
	  
	  
      
     
	  
      <div class="row">
        <div class="col-xs-2 col-md-4">
        </div>
        <div class="form-group col-xs-7 col-md-4">
         
            <button id="submit" name="submit" type="button" class="btn btn-danger btn-block btn-lg largeHeight">SUBMIT EVENT</button>
         
        </div>
        <div class="col-xs-2">
        </div>
      </div>
      <!-- End demo -->
    </div>
    </form>
  <!-- Footer Start -->
  <div class="container">
    <hr>
    <footer>
      <p>&copy; Outfit 2016
      </p>
    </footer>
  </div> 
  <!-- /container -->        
  <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js">
	</script>
	<script src="<?php echo base_url(); ?>js/moment.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>js/main.js">
	</script>
  <script type="text/javascript" src="http://cdn.jsdelivr.net/momentjs/latest/moment.min.js">
  </script>
  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js">
  </script>
  <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
   <script src="<?php echo base_url(); ?>js/validator.js"></script>
   <script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker({
			minDate: moment()
		});
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
		$("#hideeventtype").hide();
    });
</script>
  <!-- Date range selector 
  <script type="text/javascript">
    $(function() {
		var d = new Date();

		var month = d.getMonth()+1;
		var day = d.getDate();

		var output = d.getFullYear() + '-' +
			((''+month).length<2 ? '0' : '') + month + '-' +
			((''+day).length<2 ? '0' : '') + day;
		
      $('input[name="daterange"]').daterangepicker({
		  
        "showDropdowns": true,
        "timePicker": true,
        "timePicker24Hour": true,
        "timePickerIncrement": 30,
        "dateLimit": {
          "days": 1
        }
        ,
        "locale": {
          "format": "YYYY-MM-DD HH:mm:ss",
          "separator": " - ",
          "applyLabel": "Apply",
          "cancelLabel": "Cancel",
          "fromLabel": "From",
          "toLabel": "To",
          "customRangeLabel": "Custom",
          "daysOfWeek": [
            "Su",
            "Mo",
            "Tu",
            "We",
            "Th",
            "Fr",
            "Sa"
          ],
          "monthNames": [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
          ],
          "firstDay": 1
        }
        ,
        "startDate": output,
        "endDate": output,
        "minDate": output
      } 
                                                   , function(start, end, label) {
        console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
      }
                                                  );
    }
     );
  </script>-->
  <!-- Map Scripts -->
  <script>
    $(function() {
      var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
        componentsFilter: 'country:US',
        regionBias: "us",
        language: "en",
        bounds: '40.6952494,-74.0560769|40.8351094,-73.8695212',
        updateCallback: showCallback,
        mapOptions: {
          zoom: 11,
          center: new google.maps.LatLng(40.7830603, -73.97124880000001),
          scrollwheel: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        ,
        elements: {
          map:      "#map",
          lat:      "#lat",
          lng:      "#lng",
          street_number: '#street_number',
          route: '#route',
          locality: '#locality',
          sublocality: '#sublocality',
          administrative_area_level_3: '#administrative_area_level_3',
          administrative_area_level_2: '#administrative_area_level_2',
          administrative_area_level_1: '#administrative_area_level_1',
          country:  '#country',
          postal_code: '#postal_code',
          type:    '#type'
        }
      }
                                                                    );
																	
      var gmarker = addresspickerMap.addresspicker( "marker");
      gmarker.setVisible(true);
      addresspickerMap.addresspicker( "updatePosition");
      //$('#reverseGeocode').change(function(){
         $("#addresspicker_map").addresspicker("option", "reverseGeocode", ($('#reverseGeocode').val() === 'true'));
      // });
      function showCallback(geocodeResult, parsedGeocodeResult){
        $('#callback_result').text(JSON.stringify(parsedGeocodeResult, null, 4));
      }
      // Update zoom field
      var map = $("#addresspicker_map").addresspicker("map");
      google.maps.event.addListener(map, 'idle', function(){
        $('#zoom').val(map.getZoom());
      }
                                   );
    }
     );
  </script>
  
  <script>
		
		$( "#submit" ).click(function() {
		  if (!$("input[name='agree']:checked").val()) {
			   var agreemessage = "You must agree with the terms and conditions";
			   $("#agreemessage").text(agreemessage);
			}
			else {
				$("#agreemessage").hide();
				register();
			}
		});
		
		function register(){
			var client_id = <?php echo $client_id; ?>; 
			var email = $("#inputEmail").val(); 
			var eventname = $("#eventname").val();
			var eventcontact = $("#eventcontact").val();
			//var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var event_pic = $("#img_url").val(); 
			var talent_type = <?php echo $_POST['talent_type']; ?>;
			
			/*var datetime = $("#datetime").val(); 
			var datetime = datetime.split(" - "); */
			var start_datetime = $("#startdate").val(); 
			var end_datetime = $("#enddate").val(); 
			
			var location = $("#addresspicker_map").val(); 
			var locality = $("#locality").val();
			var sublocality = $("#sublocality").val();
			var borough = $("#administrative_area_level_3").val(); 
			var district = $("#administrative_area_level_2").val();
			var state = $("#administrative_area_level_1").val();
			var country = $("#country").val();
			var postal_code = $("#postal_code").val();
			var lat = $("#lat").val();
			var lng = $("#lng").val();
			var guestnum = $( "#guestnum option:selected" ).text(); 
			var waitersnum = $( "#waitersnum option:selected" ).text();
			//var event_type = $( "#event_type option:selected" ).val();
			var event_type = "";
			var description = $("#description").val();
			var instructions = $("#instructions").val();
			var uniform_description = $("#uniform_description").val();
			var uniform = $("input[name='uniform']:checked").val(); //alert(uniform);
			var uniformprovided = $("input[name='uniformprovided']:checked").val();
			var open_to_all = $("input[name='open_to_all']:checked").val();
			var skills = $("input[name='skills']:checked").map( function() {
				return this.value;
			}).get().join(",");
			
			if(typeof uniform === "undefined") {
				var uniform = ''; 
			}
			else {
				var uniform = $("input[name='uniform']:checked").val();
			}
			
			if(typeof uniformprovided === "undefined") {
				var uniformprovided = ''; 
			}
			else {
				var uniformprovided = $("input[name='uniformprovided']:checked").val();
			}
			
			if(typeof open_to_all === "undefined") {
				var open_to_all = ''; 
			}
			else {
				var open_to_all = $("input[name='open_to_all']:checked").val();
			}
			
				var url = '<?php echo $webserviceurl; ?>index.php/create_event';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'client_id':client_id,'email':email,'event_name':eventname,'event_contact':eventcontact,
					'last_name':lastname,'start_datetime':start_datetime,'end_datetime':end_datetime,'location':location,'locality':locality,
					'sublocality':sublocality,'borough':borough,'district':district,'state':state,'country':country,'postalcode':postal_code,
					'number_of_guests':guestnum,'number_of_waiters':waitersnum,'description':description,'starting_instructions':instructions,
					'uniform':uniform,'uniform_description':uniform_description,'uniform_provided':uniformprovided,'latitude':lat,'longitude':lng,
					'open_to_all':open_to_all,'talent_requested_for':skills,'event_pic':event_pic,'event_type':event_type,'talent_type':talent_type},
					//'dataType': 'json',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {
							var event_id = JSON.stringify(data['result']);
							invite_talent(event_id);							
							//window.location.assign("<?php echo base_url();?>index.php/client_dashboard/"+client_id );
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}
		
		function invite_talent(event_id){
			var event_id = event_id; 
			var client_id = <?php echo $client_id; ?>; 
				
				var url = '<?php echo $webserviceurl; ?>index.php/invite_added_talents';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'event_id':event_id,'client_id':client_id},
					//'dataType': 'json',
					success: function(data) {
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						//alert(JSON.stringify(data['Message']));
						if(message == "1") {						
							window.location.assign("<?php echo base_url();?>index.php/myevents_client" );
						}
					}
				
				});

		}

	</script>
	
	
	<script>
	$('#upload').on('change', function() { 
		var file_data = $('#upload').prop('files')[0];   
		var form_data = new FormData();                  
		form_data.append('file', file_data);
		//alert(form_data);                             
		$.ajax({
					url: '<?php echo base_url(); ?>index.php/upload', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(php_script_response){
						//alert(php_script_response); // display response from the PHP script, if any
					$('.eimg').attr('src', php_script_response);
			 $('#img_url').val(php_script_response); 
			 
						}
		 });
	});
	
	$('[data-toggle="tooltip"]').tooltip();   
	
	$(".se-pre-con").fadeOut("slow");
	</script>
</body>
</html>
