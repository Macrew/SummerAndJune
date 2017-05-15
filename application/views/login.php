<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('header.php');

?>
		<div class="login-options">Do not have account yet? Signin here</div>
		<div class="button">
			<a class="facebook" href="<?php echo $login_url; ?>">Facebook</a>
			<a class="google" href="#">Google+</a>
		</div>
		<div class="clr"><hr /></div>
				
<?php include('footer.php'); ?>
