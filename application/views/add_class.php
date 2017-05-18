<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session 	= $this->session->userdata('logged_in');
$userId 		= $user_session['user_id'];
?>
<!-- metisMenu stylesheet -->   
<div id="dashborad" class="inner">


<div class="common-main">
<h3> Add Class </h3>
	<form class="form-horizontal" id="block-validate" action="<?php echo base_url();?>instructor/addClassSubmit" method="POST">
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Class Name(*):</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
                <input class="form-control" id="class_name" name="class_name" value="" required type="text">
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Length of class(*):</label>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-3">
                <input class="form-control" placeholder="hours" id="number" name="hours_length" value="" type="text" required>
				
            </div>
			<div class="col-sm-4 col-md-4 col-lg-3">
                <input class="form-control" id="number" placeholder="minutes" name="minutes_length" value="" type="text" required>
                
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">About the class(*):</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
               <textarea id="limiter" class="form-control" maxlength="140" name="about_class" required></textarea>
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Special Instructions(*):</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
               <textarea id="limiter" class="form-control" maxlength="140" name="special_instrauctions" required></textarea>
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Complexity Level(*):</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
               <select class="form-control chzn-select" name="complexity" required>
				<option value="">Select Option</option>
 				<option>Biggener</option>
				<option>Intermediate</option>
				<option>Expert</option>
			   </select>
            </div>
        </div>
		
		<div class="form-group" id="datePickerBlock">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Date of Class(*):</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
               <input type="text" id="dp1" class="form-control" name="date_of_class" required />
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Time of class(*):</label>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-3">
                <input class="form-control" id="number" placeholder="hours" name="time_hours" value="" type="text" required>
            </div>
			<div class="col-sm-4 col-md-4 col-lg-3">
                <input class="form-control" id="number" placeholder="minutes" name="time_minutes" value="" type="text" required>
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Time Zone(*):</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
               <select class="form-control chzn-select" name="class_time_zone" required>
				<option value=''>Select Time Zone</option>
				<?php 
				$timezone_identifiers = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, 'US');
				foreach($timezone_identifiers as $timezone_identifier) {
				  echo "<option>$timezone_identifier</option>";
				}
				?>
			   </select>
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Cost of Class(*):</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
                <input class="form-control" name="cost" value="" type="text" required>
				<span>Cost in USD</span>
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Cancellation Policy:</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
                <input class="form-control" name="cancellation_policy" value="" type="text">
				<span>No of hours prior to class start. Leave balnk is not cancellation policy required.</span>
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Cancellation Cost:</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
                <input class="form-control" name="cancellation_cost" value="" type="text">
				<span>Cost in USD</span>
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Allow Private Message:</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
               <select class="form-control chzn-select" name="allow_msg">
				<option>Yes</option>
				<option>No</option>
			   </select>
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                <label class="control-label" for="email">Allow Bonus/Gratuity:</label>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-6">
               <select class="form-control chzn-select" name="allow_bonus">
				<option>Yes</option>
				<option>No</option>
			   </select>
            </div>
        </div>
		
		<div class="form-actions ">
			<input type="hidden" name="userId" value="<?=$userId?>" />
			<input value="Add" class="btn btn-primary" type="submit">
		</div>	
	</form>
</div>
</div>