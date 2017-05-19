<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="dashborad" class="inner">
	<h3 class='text-center'>My Classes</h3>
	<div class='container-fluid'>
		<div class="row">
			<div class= "col-sm-12">
				<ul class="tab">
					<li><a href="<?php echo  $this->config->base_url();?>instructor/profile">My Profile</a></li>
					<li class="active"><a href="<?php echo  $this->config->base_url();?>instructor/classes">My Classes</a></li>
					<li><a href="<?php echo  $this->config->base_url();?>instructor/messages">My Inbox</a></li>
					<li><a href="<?php echo  $this->config->base_url();?>instructor/settings">Settings</a></li>
					<li><a href="<?php echo  $this->config->base_url();?>instructor/addPaymentDetails">Paypal Details</a></li>
				</ul>
			</div>
		</div>

	<a href="<?php echo base_url(); ?>instructor/addClass">Add Class</a>
	</div>
	
	<div class='row'>
		<div class='col-sm-3'><!--left section!-->
		</div>
	</div>
</div>