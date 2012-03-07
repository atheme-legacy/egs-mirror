<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>HostServ &gt; Take</h2>
		
			<form action="" method="post">
			<section>
				<label>
					<?php _t('form_hostname'); ?>
					<small>Must be a valid offered hostname.</small>
				</label>
				<div>
					<input name="hostname" size="35" maxlength="50" type="text" placeholder="Hostname" class="required" />
					<br /><br />
					<input type="submit" name="submit" value="Take" class="primary button" />
				</div>
			</section>
			</form>
					
		<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>