<?php 
error_reporting(0);
include('talent_header.php'); ?>
  <body>
    <div class="orangehead">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="dashboard_tab_wrapper">
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/talent_support">Get Support
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/talent_how_outfit_works">How Outfit Works
                </a>
              </div>
              <div class="dashboard_tab bring-forward clicked">
                <a href="#">F.A.Q.
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/talent_fee_charges">Fees & Charges
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="jumbotron supportheader" id="worksImg">
      <div class="container centerText">
        <div class="row">
          <div class="col-sm-2">
          </div>
          <div class="col-xs-12 col-sm-8">
            <h1>FAQ
            </h1>
            <!--<h3>Find the right person for the job here on outfitstaff.com! With hundreds of talented waiters, you can get help with your event within hours of posting!
            </h3>-->
          </div>
          <div class="col-sm-2">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 whiteBG invitebox supportBody">
		<?php 
			$this->db->select('*');		
			$this->db->from('faq');
			$query = $this->db->get();
			$result = $query->result_array(); 
		?>
		<?php 
			foreach($result as $val) {  ?> 
				<div class="panel-group" id="faqAccordion<?php echo $val['faq_id']; ?>">
					<div class="panel panel-default ">
						<div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion<?php echo $val['faq_id']; ?>" data-target="#question<?php echo $val['faq_id']; ?>">
							 <h4 class="panel-title">
								<a style="cursor: pointer;" class="ing">Q:  <?php echo $val['question']; ?></a>
						  </h4>

						</div>
						<div id="question<?php echo $val['faq_id']; ?>" class="panel-collapse collapse" style="height: 0px;">
							<div class="panel-body">
								 <h5><span class="label label-primary">Answer</span></h5>

								<p><?php echo $val['answer']; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
		<?php	}
		
		?>
          
    <!--/panel-group-->
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
        </div>
      </div>
    </div>
    <?php 
	error_reporting(0);
	include('talent_footer.php'); ?>
  </body>
</html>
