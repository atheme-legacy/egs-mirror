<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>Chanserv &gt; Set Topic</h2>
			
			<form action="" method="post">
			<section>
				<label for="channel">
					<?php _t('form_channel'); ?>
					<small><?php _t('cs_topic_channel_hint'); ?>.</small>
				</label>
				<div>
					<input name="channel" id="channel" size="35" maxlength="50" type="text" placeholder="#channel" class="required" />
				</div>
			</section>
        	
        	<section>
	          	<label for="topic">
	          		<?php _t('form_topic'); ?>
	          		<small><?php _t('cs_topic_topic_hint'); ?>.</small>	
	          	</label>
    	      	<div>
    	      		<input name="topic" id="topic" size="35" maxlength="50" type="text" placeholder="Channel Topic" class="required" />
    	      		<br /><br />
    	      		<input type="submit" name="submit" value="<?php _t('button_update'); ?>" class="primary button" />
    	      	</div>
			</section>
			</form>
		
		<div class="clear">&nbsp;</div>	
		</section>
	</div>	
		
<?php $this->load->view('footer'); ?>
