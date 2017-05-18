<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session = $this->session->userdata('logged_in');
		
if(!$user_session['social_profile_id']){
?>
<div id="content">
<div class="home-button col-lg-8">
	<span class="fb col-lg-4">
			<a class="signup-button btn btn-lg btn-primary btn-block" href="<?php echo  $this->config->base_url();?>signup?q=2">SignUp As Student</a>
		</span>
		<span class="gl col-lg-4"><a class="signup-button btn btn-lg btn-primary btn-block" href="<?php echo  $this->config->base_url();?>signup?q=1">SignUp As Instructor</a>
		</span>
	<div class="clr"></div>
</div>
<?php } ?>
<div class="home-slider callbacks_container col-lg-8">
	<ul class="rslides" id="slider1">
	  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/1.jpg" /></li>
	  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/2.jpg" /></li>
	  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/3.jpg" /></li>
	</ul>

</div>
</div>