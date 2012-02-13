<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>HostServ &gt; Request</h2>
		
			<form action="" class="uniForm" method="post">
			<section>
				<label for="hostname">
					<?php _t('form_hostname'); ?>
					<small><?php _t('hs_request_hostname_hint'); ?>.</small>
				</label>
				<div>
					<input name="hostname" id="hostname" size="35" maxlength="50" type="text" placeholder="Hostname" class="required" />
					<br /><br />
					<input type="submit" name="submit" value="<?php _t('button_update'); ?>" class="primary button" />
				</div>
			</section>
			</form>
					
		<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>