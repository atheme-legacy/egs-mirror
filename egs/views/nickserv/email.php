<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Nickserv &gt; Set Email</h2>
			<div>
				
				<p><?php _t('ns_email_desc'); ?></p>
				<form action="" method="post">
				<section>
					<label for="username"><?php _t('form_account_email'); ?></label>
					<div>
						<input name="email" id="email" size="35" maxlength="50" type="text" placeholder="Email" class="required" />
						<br /><br />
						<input type="submit" value="<?php _t('button_update'); ?>" class="button primary" />
						<input type="reset" value="Clear" class="button" />
					</div>	
				</section>
				
			</div>
			
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>