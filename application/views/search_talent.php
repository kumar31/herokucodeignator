
<?php 
error_reporting(0);
include('client_header.php'); ?>
<?php 

$items_per_group;
$get_total_rows;

$total_groups= ceil($get_total_rows/$items_per_group);	
?>
<script type="text/javascript">
$(document).ready(function() {
	<?php if(isset($_POST['eve_type'])){ ?>
		var eve_type = '<?php echo $_POST['eve_type']; ?>';
	<?php }else{ ?>
		var eve_type = '';
	<?php } ?>
	
	<?php if(isset($_POST['employees'])){ ?>
		var employees = '<?php echo $_POST['employees']; ?>';
	<?php }else{ ?>
		var employees = '';
	<?php } ?>
	
	<?php if(isset($_POST['contractors'])){ ?>
		var contractors = '<?php echo $_POST['contractors']; ?>';
	<?php }else{ ?>
		var contractors = '';
	<?php } ?>
	
	<?php if(isset($_POST['search'])){ ?>
		var search = '<?php echo $_POST['search']; ?>';
	<?php }else{ ?>
		var search = '';
	<?php } ?>
	
	<?php if(isset($_POST['haircolor'])){ ?>
		var haircolor = '<?php echo $_POST['haircolor']; ?>';
	<?php }else{ ?>
		var haircolor = '';
	<?php } ?>
	
	<?php if(isset($_POST['eyecolor'])){ ?>
		var eyecolor = '<?php echo $_POST['eyecolor']; ?>';
	<?php }else{ ?>
		var eyecolor = '';
	<?php } ?>
	
	<?php if(isset($_POST['language'])){ ?>
		var language = '<?php echo $_POST['language']; ?>';
	<?php }else{ ?>
		var language = '';
	<?php } ?>
	
	<?php if(isset($_POST['heightfrom'])){ ?>
		var heightfrom = '<?php echo $_POST['heightfrom']; ?>';
	<?php }else{ ?>
		var heightfrom = '';
	<?php } ?>
	
	<?php if(isset($_POST['heightto'])){ ?>
		var heightto = '<?php echo $_POST['heightto']; ?>';
	<?php }else{ ?>
		var heightto = '';
	<?php } ?>
	
	<?php if(isset($_POST['sort'])){ ?>
		var sort = '<?php echo $_POST['sort']; ?>';
	<?php }else{ ?>
		var sort = '';
	<?php } ?>
	
	
	<?php if((isset($_POST['special'])) && (isset($_POST['special1'])) && (isset($_POST['special2']))) { ?>
		var special = '<?php echo $_POST['special'].','.$_POST['special1'].','.$_POST['special2']; ?>'; 
	<?php } elseif((isset($_POST['special'])) && (isset($_POST['special1']))) { ?>
		var special = '<?php echo $_POST['special'].','.$_POST['special1']; ?>'; 	
	<?php } elseif((isset($_POST['special1'])) && (isset($_POST['special2']))) { ?>
		var special = '<?php echo $_POST['special1'].','.$_POST['special2']; ?>';
	<?php } elseif((isset($_POST['special'])) && (isset($_POST['special2']))) { ?>
		var special = '<?php echo $_POST['special'].','.$_POST['special2']; ?>'; 
	<?php } elseif((isset($_POST['special'])) || (isset($_POST['special1'])) || (isset($_POST['special2']))) { ?>
		<?php if(isset($_POST['special'])) { ?>
		var special = '<?php echo $_POST['special']; ?>'; 
		<?php } if(isset($_POST['special1'])) { ?>
			var special = '<?php echo $_POST['special1']; ?>';
		<?php } if(isset($_POST['special2'])) { ?>
		var special = '<?php echo $_POST['special2']; ?>';
		<?php } ?>
	<?php } else { ?>
			var special = '';
	<?php } ?>
	
	
	<?php if((isset($_POST['gender1'])) && (isset($_POST['gender2']))) { ?>
		var gender = '<?php echo $_POST['gender1'].','.$_POST['gender2']; ?>'; 
	<?php } elseif((isset($_POST['gender'])) || (isset($_POST['gender1'])) || (isset($_POST['gender2']))) { ?>
		<?php if(isset($_POST['gender1'])) { ?>
		var gender = '<?php echo $_POST['gender1']; ?>'; 
		<?php } if(isset($_POST['gender2'])) { ?>
			var gender = '<?php echo $_POST['gender2']; ?>';
		<?php } if(isset($_POST['gender'])) { ?>
			var gender = '<?php echo $_POST['gender']; ?>';
		<?php } ?>
	<?php } else { ?>
			var gender = '';
	<?php } ?>
	
	
	var track_load = 0; //total loaded record group(s)
	var loading  = false; //to prevents multipal ajax loads
	var total_groups = <?=$total_groups;?>; //total record group(s)
	$('.animation_image').show(); 
	$('#results').load("<?php echo base_url();?>index.php/search_talent/getblogdata", {'group_no':track_load,'search':search,'special_skills':special,'hair_color':haircolor,'eye_color':eyecolor,'languages':language,'height_min':heightfrom,'height_max':heightto,'best_rating':sort,'gender':gender,'employees':employees,'contractors':contractors,'eve_type':eve_type}, function() {track_load++;}); //load first group
	
	$(window).scroll(function() { //detect page scroll
		
		if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
		{
			
			if(track_load <= total_groups && loading==false) //there's more data to load
			{
				loading = true; //prevent further ajax loading
				$('.animation_image').show(); //show loading image
				
				//load data from the server using a HTTP POST request
				$.post('<?php echo base_url();?>index.php/search_talent/getblogdata',{'group_no': track_load,'search':search,'special_skills':special,'hair_color':haircolor,'eye_color':eyecolor,'languages':language,'height_min':heightfrom,'height_max':heightto,'best_rating':sort,'gender':gender,'employees':employees,'contractors':contractors,'eve_type':eve_type}, function(data){
									
					$("#results").append(data); //append received data into the element

					//hide loading image
					$('.animation_image').hide(); //hide loading image once data is received
					
					track_load++; //loaded group increment
					loading = false; 
				
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
					
					//alert(thrownError); //alert with HTTP error
					$('.animation_image').hide(); //hide loading image
					loading = false;
				
				});
				
			}
		}
	});
});
</script>
  <body>    
    <div class="container">
      <div class="row" style="margin-bottom: 200px; margin-top:20px;">
        <div class="col-sm-3 topmargin hidden-xs noleftmargin">
		<?php
			$employees = $_POST['employees'];
			$contractors = $_POST['contractors'];
			if($employees != ""){
				$reg_type = $employees;
			}
			else if($contractors != ""){
				$reg_type = $contractors;
			}
			else {
				$reg_type = $_POST['eve_type'];
			}
		?>
		<form role="form" action="<?php echo site_url();?>/create_event_with_talents" method="POST">
		<?php if(isset($_POST['employees'])){ ?>
			<input type="hidden" value="<?php echo $_POST['employees']; ?>" name="talent_type">
		<?php } else { ?>
			<input type="hidden" value="<?php echo $_POST['contractors']; ?>" name="talent_type">
		<?php } ?>
			<button class="btn btn-danger btn-block" type="submit"  role="button">Create event</button>
		</form>
	 <hr>
          <section class=
                   "clearfix hourlies-listing-sidebar listings-sidebar greyGB" id=
                   "listing-sidebar">
			<form action="<?php echo base_url();?>index.php/search_talent" method="POST">
			<input type="hidden" value="<?php echo $reg_type; ?>" name="eve_type">
			<div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" onchange="this.form.submit()" placeholder="Search Talent" id="search" name="search" value="<?php if(isset($_POST['search'])){ ?><?php echo trim($_POST['search']); }?>"/>
                    <!--<span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button" id="searchtalent">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>-->
                </div>
            </div>
			
            <div class="skills">
              <h3>
                <span class=
                      "glyphicon glyphicon-star">
                </span>Special Skills
              </h3>
              <hr>
              <div class="checkbox checkbox-warning">
					<input id="checkboxes1" onclick="this.form.submit()" name="special" class="styled" type="checkbox" value="bartending" <?php if(isset($_POST['special'])) { if($_POST['special'] == "bartending") { echo "checked";} }  ?>>
					<label for="checkboxes1">
						Bartending
					</label>
              </div>
              
			  <div class="checkbox checkbox-warning">
					<input id="checkboxes2" onclick="this.form.submit()" name="special1" class="styled" type="checkbox" value="waiter,waitress" <?php if(isset($_POST['special1'])) { if($_POST['special1'] == "waiter,waitress") { echo "checked";} }  ?>>
					<label for="checkboxes2">
						Waiter/waitress
					</label>
              </div>
			  
			  <div class="checkbox checkbox-warning">
					<input id="checkboxes3" onclick="this.form.submit()" name="special2" class="styled" type="checkbox" value="personality,host" <?php if(isset($_POST['special2'])) { if($_POST['special2'] == "personality,host") { echo "checked";} }  ?>>
					<label for="checkboxes3">
						Personality/host
					</label>
              </div>
            </div>
            <div class="gender">
              <h3>
                <span class=
                      "glyphicon glyphicon-user">
                </span>Gender
              </h3>
              <hr>
              <div class="checkbox checkbox-warning">
					<input id="checkboxe" onclick="this.form.submit()" name="gender" class="styled" type="checkbox" value="0,1" <?php if(isset($_POST['gender'])) { if($_POST['gender'] == "0,1") { echo "checked";} }  ?>>
					<label for="checkboxe">
						Both
					</label>
              </div>
              <div class="checkbox checkbox-warning">
					<input id="checkboxm" onclick="this.form.submit()" name="gender1" class="styled" type="checkbox" value="1" <?php if(isset($_POST['gender1'])) { if($_POST['gender1'] == "1") { echo "checked";} }  ?>>
					<label for="checkboxm">
						Male
					</label>
              </div>
              <div class="checkbox checkbox-warning">
					<input id="checkboxf" onclick="this.form.submit()" name="gender2" class="styled" type="checkbox" value="0" <?php if(isset($_POST['gender2'])) { if($_POST['gender2'] == "0") { echo "checked";} }  ?>>
					<label for="checkboxf">
						Female
					</label>
              </div>
            </div>
            <div class="">
              <h3>
                <span class="glyphicon glyphicon-sort">
                </span>Hair
                Color
              </h3>
              <hr>
              <!--<input class="form-control" id="haircolor" name="haircolor" type="text" value="<?php if(isset($_POST['haircolor'])){ ?><?php echo trim($_POST['haircolor']); }?>">-->
			  <select class="col-xs-12 form-control form-group" id="haircolor" name="haircolor" onchange="this.form.submit()">
				<option value="">-</option>
				
                <option value="Black" <?php if(isset($_POST['haircolor']) && $_POST['haircolor'] == "Black") echo 'selected="selected"';?>>Black</option>
                
				<option value="Brown" <?php if(isset($_POST['haircolor']) && $_POST['haircolor'] == "Brown") echo 'selected="selected"';?>>Brown</option>
                  
                <option value="Blonde" <?php if(isset($_POST['haircolor']) && $_POST['haircolor'] == "Blonde") echo 'selected="selected"';?>>Blonde</option>
                  
                <option value="Red" <?php if(isset($_POST['haircolor']) && $_POST['haircolor'] == "Red") echo 'selected="selected"';?>>Red</option>
				
                <option value="Grey" <?php if(isset($_POST['haircolor']) && $_POST['haircolor'] == "Grey") echo 'selected="selected"';?>>Grey</option>
				
                <option value="Blue" <?php if(isset($_POST['haircolor']) && $_POST['haircolor'] == "Blue") echo 'selected="selected"';?>>Blue</option>
				
                <option value="Green" <?php if(isset($_POST['haircolor']) && $_POST['haircolor'] == "Green") echo 'selected="selected"';?>>Green</option>
				
                <option value="Other" <?php if(isset($_POST['haircolor']) && $_POST['haircolor'] == "Other") echo 'selected="selected"';?>>Other</option>
              </select>
            </div>
            <div class="">
              <h3>
                <span class="glyphicon glyphicon-sort">
                </span>Eye
                Color
              </h3>
              <hr>
              <!--<input class="form-control" id="eyecolor" name="eyecolor" type="text" value="<?php if(isset($_POST['eyecolor'])){ ?><?php echo trim($_POST['eyecolor']); }?>">-->
			  <select class="col-xs-12 form-control form-group" id="eyecolor" name="eyecolor" onchange="this.form.submit()">
			    <option value="">-</option>
				
                <option value="Black" <?php if(isset($_POST['eyecolor']) && $_POST['eyecolor'] == "Black") echo 'selected="selected"';?>>Black</option>
                
				<option value="Brown" <?php if(isset($_POST['eyecolor']) && $_POST['eyecolor'] == "Brown") echo 'selected="selected"';?>>Brown</option>
                
				<option value="Blue" <?php if(isset($_POST['eyecolor']) && $_POST['eyecolor'] == "Blue") echo 'selected="selected"';?>>Blue</option>
				 
                <option value="Hazel" <?php if(isset($_POST['eyecolor']) && $_POST['eyecolor'] == "Hazel") echo 'selected="selected"';?>>Hazel</option>
				
                <option value="Grey" <?php if(isset($_POST['eyecolor']) && $_POST['eyecolor'] == "Grey") echo 'selected="selected"';?>>Grey</option>
				
                <option value="Green" <?php if(isset($_POST['eyecolor']) && $_POST['eyecolor'] == "Green") echo 'selected="selected"';?>>Green</option>
				
                <option value="Other" <?php if(isset($_POST['eyecolor']) && $_POST['eyecolor'] == "Other") echo 'selected="selected"';?>>Other</option>
              </select>
            </div>
            <div class="">
              <h3>
                <span class=
                      "glyphicon glyphicon-sort">
                </span>Height
              </h3>
              <hr>
              <label class="" for="">From
              </label> 
              <select class="col-xs-12 form-control form-group" id="heightfrom" name="heightfrom" value="">
                <option value="">-</option>
                <option value="5.0" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "5.0") echo 'selected="selected"';?>>5.0</option>
                <option value="5.2" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "5.2") echo 'selected="selected"';?>>5.2</option>
				<option value="5.4" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "5.4") echo 'selected="selected"';?>>5.4</option>
				<option value="5.6" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "5.6") echo 'selected="selected"';?>>5.6</option>
				<option value="5.8" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "5.8") echo 'selected="selected"';?>>5.8</option>
				<option value="6.0" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "6.0") echo 'selected="selected"';?>>6.0</option>
				<option value="6.2" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "6.2") echo 'selected="selected"';?>>6.2</option>
				<option value="6.4" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "6.4") echo 'selected="selected"';?>>6.4</option>
				<option value="6.6" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "6.6") echo 'selected="selected"';?>>6.6</option>
				<option value="6.8" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "6.8") echo 'selected="selected"';?>>6.8</option>
				<option value="7.0" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "7.0") echo 'selected="selected"';?>>7.0</option>
				<option value="7.2" <?php if(isset($_POST['heightfrom']) && $_POST['heightfrom'] == "7.2") echo 'selected="selected"';?>>7.2</option>
                
              </select>
              <br>
              <label class="" for="">To
              </label> 
              <select class="col-xs-12 form-control form-group" id="heightto" name="heightto" onchange="this.form.submit()">
				<option value="">-</option>
                <option value="7.2" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "7.2") echo 'selected="selected"';?>>7.2</option>
                <option value="7.0" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "7.0") echo 'selected="selected"';?>>7.0</option>
                <option value="6.8" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "6.8") echo 'selected="selected"';?>>6.8</option>
                <option value="6.6" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "6.6") echo 'selected="selected"';?>>6.6</option>
                <option value="6.4" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "6.4") echo 'selected="selected"';?>>6.4</option>
                <option value="6.2" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "6.2") echo 'selected="selected"';?>>6.2</option>
                <option value="6.0" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "6.0") echo 'selected="selected"';?>>6.0</option>
                
                <option value="5.8" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "5.8") echo 'selected="selected"';?>>5.8</option>
                
                <option value="5.6" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "5.6") echo 'selected="selected"';?>>5.6</option>
                 
                <option value="5.4" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "5.4") echo 'selected="selected"';?>>5.4</option>
                 
                <option value="5.2" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "5.2") echo 'selected="selected"';?>>5.2</option>
                 
                <option value="5.0" <?php if(isset($_POST['heightto']) && $_POST['heightto'] == "5.0") echo 'selected="selected"';?>>5.0</option>
                  
                
              </select>
            </div>
            <div class="">
              <h3>
                <span class=
                      "glyphicon glyphicon-sort">
                </span>Language
              </h3>
              <hr>
              <!--<input class="form-control" id="language" name="language" type="text" value="<?php if(isset($_POST['language'])){ ?><?php echo trim($_POST['language']); }?>">-->
			  <select class="col-xs-12 form-control form-group" id="language" name="language" onchange="this.form.submit()">
				<option value="">-</option>
			  
                <option value="English" <?php if(isset($_POST['language']) && $_POST['language'] == "English") echo 'selected="selected"';?>>English</option>
                
				<option value="Spanish" <?php if(isset($_POST['language']) && $_POST['language'] == "Spanish") echo 'selected="selected"';?>>Spanish</option>
                
				<option value="French" <?php if(isset($_POST['language']) && $_POST['language'] == "French") echo 'selected="selected"';?>>French</option>
				 
                <option value="Chinese" <?php if(isset($_POST['language']) && $_POST['language'] == "Chinese") echo 'selected="selected"';?>>Chinese</option>
				
                <option value="Japanese" <?php if(isset($_POST['language']) && $_POST['language'] == "Japanese") echo 'selected="selected"';?>>Japanese</option>
				
                <option value="German" <?php if(isset($_POST['language']) && $_POST['language'] == "German") echo 'selected="selected"';?>>German</option>
				
                <option value="Other" <?php if(isset($_POST['language']) && $_POST['language'] == "Other") echo 'selected="selected"';?>>Other</option>
              </select>
            </div>
			<div class="">
			<hr>
				<!--<button id="filter" type="submit" class="btn btn-danger btn-block">Submit</button>-->
            </div>
			
          </section>
        </div>
		
        <div class="col-sm-9 whiteBG invitebox topmargin">
          <div id="datas">
             <div class="row">
              <div class="col-xs-9">
                <h3 id="alertmsg">Matching talent found
                </h3>
              </div>
			  <div class="col-xs-3 topmargin">
				  
					<div class="form-group">
					  <label for="sort">Sort by</label>
					  <select class="form-control form-group input-sm" id="sort" name="sort" onchange="this.form.submit()">
					  <option value="">
						  -
						</option>
						<option value="1" <?php if(isset($_POST['sort']) && $_POST['sort'] == "1") echo 'selected="selected"';?>>
						  Best Rating
						</option>
						<option value="2" <?php if(isset($_POST['sort']) && $_POST['sort'] == "2") echo 'selected="selected"';?>>
						  No. of events
						</option>						
					  </select>
					</div>
				  </form>
				</div>
            </div>
			<div class="row">
				<div class="topmargin">				
					
			  </div>
			</div>
             
			<div class="row">
			   <div class="w-section inverse blog-grid">		
					<div class="" id="results">
						
					</div>
					
					<div class="animation_image"  align="center" style="display:none">						
							<img src="<?php echo base_url();?>css/ajax-loader.gif" style="width:60px; height:60px;">						
					</div>
				</div>   
			</div>   
		
          </div>
        </div>
			
      </div>
    </div>
    <?php 
	error_reporting(0);
	include('client_footer.php'); ?>
	
  </body>
</html>
