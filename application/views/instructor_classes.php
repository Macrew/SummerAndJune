<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="dashborad" class="inner">
<div class="dashborad-header">
	<ul class="tab">
		<li><a href="<?php echo  $this->config->base_url();?>instructor/editprofile">My Profile</a></li>
		<li class="active"><a href="<?php echo  $this->config->base_url();?>instructor/classes">My Classes</a></li>
		<li><a href="<?php echo  $this->config->base_url();?>instructor/messages">My Inbox</a></li>
		<li><a href="<?php echo  $this->config->base_url();?>instructor/settings">Settings</a></li>
	</ul>
</div>
<div class="username">Welcome <?php echo $user_session['first_name'].' '.$user_session['last_name'];?> </div>
<h3> Classes </h3>

</div>