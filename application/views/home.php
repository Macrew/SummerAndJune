<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>
	<div class="button">
		<a class="facebook" href="#">Facebook</a>
		<a class="google" href="#">Google+</a>
		<div class="clr"></div>
	</div>
	<div class="home-slider callbacks_container">
		<ul class="rslides" id="slider1">
		  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/1.jpg" /></li>
		  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/2.jpg" /></li>
		  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/3.jpg" /></li>
		</ul>
	
	</div>
		
<?php include('footer.php'); ?>