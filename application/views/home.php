<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session = $this->session->userdata('logged_in');
		
if(!$user_session['social_profile_id']){
?>
<div class="home-button">
	<span class="fb">
			<a class="signup-button" href="<?php echo  $this->config->base_url();?>signup?q=2">SignUp As Student</a>
		</span>
		<span class="gl"><a class="signup-button" href="<?php echo  $this->config->base_url();?>signup?q=1">SignUp As Instructor</a>
		</span>
	<div class="clr"></div>
</div>
<?php } ?>
<div class="home-slider callbacks_container">
	<ul class="rslides" id="slider1">
	  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/1.jpg" /></li>
	  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/2.jpg" /></li>
	  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/3.jpg" /></li>
	</ul>

</div>