<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Nickserv &gt; Password</h2>
			<p><?php _t('ns_password_desc'); ?></p>
			
			<form action="" method="post">
			<section>
				<label for="password"><?php _t('form_account_password'); ?></label>
				<div>
					<input name="password" id="password" size="35" maxlength="50" type="password" placeholder="Password" class="required" />
				</div>
			</section>
				
			<section>
				<label for="password_again"><?php _t('form_account_repassword'); ?></label>
				<div>
					<input name="password_again" id="password_again" size="35" maxlength="50" type="password" placeholder="Password Again" class="required" />
					<br /><br />
					<input type="submit" value="Update" class="button primary" />
					<input type="reset" value="Clear" class="button" />
				</div>
			</section>
			
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>