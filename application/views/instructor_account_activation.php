<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// echo '<pre>'; print_r($user_data);
?>
<div id="dashborad" class="inner profile">
	<div class="username">Welcome <?php echo $user_session['first_name'].' '.$user_session['last_name'];?> </div>
	<h3> Activate your account </h3>
	<div  id="left" class="left-sec">
		<?php $userId = $user_session['user_id'];	?>
		<!--<img src="<?php echo $profile_image_url; ?>">-->
		 <div class="sendpage-left white-bg"><label><span id="label_text"><?php echo 'Edit Image'; ?></span>
				<div class="pro_photo">
					<div class="upload_photo">
						<!--input type="file" name="user_img" id="user_img" onchange="readURL(this);" /-->
						<input type="file" name="user_img" id="user_img" />
						<div class="ab">
							<img width="240" height="214" src='' id="blah" style="display:none;" />
							<img src='<?php echo base_url() ?>assets/images/loader.gif' id="loader" style="display:none;position:absolute;left:50px;z-index:9;" />
							<img width="240" id="main_image" height="214" src="<?php echo $profile_image_url; ?>">
						</div></div>
				</div>

				<input name="ads_photo" type="hidden" id="image_name" value="" />
			</label>
		</div>
		
		
		
		
	</div><!---left-sec -->
	<div id="content" class="right-sec">
		<div id="instructor-user-profile">
			<form class="form-horizontal"  enctype="multipart/form-data" action="<?php echo base_url();?>instructor/editProfile" method="POST" id="block-validate" >
				<div class="form-group">
					<div class="col-lg-8">
						<input  id="required2"  type="text" value="<?php echo $user_data['first_name']; ?>" name="fname" placeholder="First Name" class="require form-control" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['middle_name']; ?>" name="mname"  placeholder="Middle Name" class="require form-control">
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['last_name']; ?>" name="lname" placeholder="Last Name" class="require form-control" required>
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="email" value="<?php echo $user_data['email']; ?>" name="email" placeholder="Email" class="require form-control" readonly required>
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="number" value="<?php echo $user_data['phone']; ?>" name="phone" placeholder="Phone" class="require form-control" required>
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['address_1']; ?>" name="address1" placeholder="Address 1" class="require form-control" required>
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['address_2']; ?>" name="address2" placeholder="Address 2" class="form-control">
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['state']; ?>" name="state" placeholder="State" class="require form-control required">
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['country']; ?>" name="country" placeholder="Country" class="require form-control required">
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
						<input type="number" value="<?php echo $user_data['zip']; ?>" name="zip" placeholder="Zip" class="require form-control required">
					</div>
				</div>
				<!--- Experience Multiple fields ---->
				<div id ="instructor-exp" class="experiences">
				  <?php //echo '<pre>';  print_r($experience); ?>
					<span class="form-label">Experience</span>
					<?php if( !empty($experience[0]) ) { 
						$row = count($experience);
						foreach($experience as $expVal)
						{ ?>
							<div class="row-exp col-lg-12">
								<div class="col-lg-12">
									<div class="form-group col-lg-4">
										<input type="text" value="<?php echo $expVal['Name'] ?>" name="experience[]" placeholder="Experience" class="require experience  form-control" required>
									</div>
									<div class="form-group col-lg-4">
										
											<div class="datepicker input-group input-append date" data-date="<?php  echo $expVal['start_date'] ?>" data-date-format="yyyy-mm-dd">
											<input name = "exp_start_date[]" class="form-control require exp_start_date" value="<?php  echo $expVal['start_date'] ?>" readonly="" type="text">
											<span class="input-group-addon add-on">
											<i class="fa fa-calendar"></i>
											</span>
											</div>
									</div>
									<div class="form-group col-lg-4">
											<div class="input-group input-append date" data-date="<?php  echo $expVal['end_date'] ?>" data-date-format="yyyy-mm-dd">
											<input  name = "exp_end_date[]"  class="datepicker form-control require exp_end_date" value="<?php  echo $expVal['end_date'] ?>" readonly="" type="text">
											<span class="input-group-addon add-on">
											<i class="fa fa-calendar"></i>
											</span>
											</div>
										
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group col-lg-4">
										
											<input type="text" value="<?php echo $expVal['certificate'] ?>" name="certificate[]" placeholder="Certificate" class="require certificate  form-control" required>
										
									</div>
									<div class="form-group col-lg-4">
										<input type="file" value="<?php echo base_url();?>/assets/images/certificate/<?php echo $expVal['certificate_image'] ?>" name="certificate_image[]" class="require certificate_image">
									</div>
									<div class="form-group col-lg-4">  <a href="JavaScript:Void(0);" class="remove_record" id="rowdelete-<?php echo $expVal['id']; ?>">X</a></div>
								</div>
								<input type="hidden" value="<?php echo $expVal['id'] ?>" name="exprowid[]">
							</div>
				<?php  }
					}
					else
					{ 
						$row = 1;
					?>
						<div class="row-exp col-lg-12">
							<div class="col-lg-12">
								<div class="form-group col-lg-4">
										<input type="text" value="" name="experience[]" placeholder="Experience" class="require form-control required">
								</div>
								<div class="form-group col-lg-4">
										<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
											<input placeholder="Start Date"  class="form-control require exp_start_date" name="exp_start_date[]"  value="" type="text" required>
											<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
										</div>
								</div>
								<div class="form-group col-lg-4">
										<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
											<input  name="exp_end_date[]"  class="form-control require exp_end_date" placeholder="End Date"  value="" type="text" required>
											<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
										</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group col-lg-4">
										<input type="text" value="" name="certificate[]" placeholder="Certificate" class="require certificate  form-control" required>
								</div>
								<div class="form-group col-lg-4">
										<input type="file" value="" name="certificate_image[]" class="require certificate_image" required>
								</div>
							</div>
							<input type="hidden" value="0" name="exprowid[]">
						</div>
						
					<?php
					}
					?>
				</div>
					<div class="form-group">
						<div class="col-lg-2">
							<input type="hidden" value="<?php echo $row; ?>" id="exp-total">
							<input type="hidden" value="<?php echo $userId; ?>" id="userId">
							<button class="add-exp btn btn-primary"> Add Experience</button>
						</div>
					</div>
				<!--- Education Multiple fields ---->
				<div id ="instructor-edu" class="educations">
				<span class="form-label">Education</span>
				<?php 
				// echo '<pre>'; print_r($education);
				if( !empty($education[0]) ) {
						$row = count($education);
						foreach($education as $eduVal)
						{ ?>
					<div class="row-edu col-lg-12">
						<div class="form-group col-lg-4">
								<input type="text" value="<?php echo $eduVal['Name'] ?>" name="education[]" placeholder="Education" class="require form-control education" required>
						</div>
						<div class="form-group col-lg-4">
							<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
								<input type="text" value="<?php echo $eduVal['start_date'] ?>" name="edu_start_date[]" placeholder="Start Date" class="require form-control edu_start_date" required>
								<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
							</div>
						</div>
						<div class="form-group col-lg-4">
								<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
									<input type="text" value="<?php echo $eduVal['end_date'] ?>" name="edu_end_date[]"  placeholder="End Date" class="require form-control edu_end_date" required>
									<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
								</div>
						</div>
							<div class="form-group col-lg-4">  <a href="JavaScript:Void(0);" class="remove_record" id="rowdelete-<?php echo $eduVal['id']; ?>">X</a></div>
							<input type="hidden" value="<?php echo $eduVal['id'] ?>" name="edurowid[]">
					</div>
					<?php   }
					}
					else
					{ 
						$row = 1;
					?>
					<div class="row-edu col-lg-12">
						<div class="form-group col-lg-3">
								<input type="text" value="" name="education[]" placeholder="Education" class="require form-control education" required>
						</div>
						<div class="form-group col-lg-3">
							<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
								<input type="text" value="" name="edu_start_date[]" placeholder="Start Date" class="require form-control edu_start_date" required>
								<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
							</div>
						</div>
						<div class="form-group col-lg-3">
							<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
								<input type="text" value="" name="edu_end_date[]"  placeholder="End Date" class="require form-control edu_end_date" required>
								<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
							</div>
						</div>
						<input type="hidden" value="0" name="edurowid[]">
					</div>
						
					<?php
					}
					?>
				</div>
				<div class="form-group">
					<div class="col-lg-4">
					<input type="hidden" value="1" id="edu-total">
					<button class="add-edu btn btn-primary"> Add Education</button>
				</div>
						</div>
				<div class="form-group">
					<div class="col-lg-8">
						<input type="hidden" value="<?php echo $userId ; ?>" id="user_id" name="user_id">
						<div class="form-actions no-margin-bottom">
							<input class="btn btn-primary" type="submit" value="Save">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div><!---right-sec --->
	<div class="clr"></div>
</div>