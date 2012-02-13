<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>Chanserv &gt; Ban User</h2>
		
			<form action="" method="post">
			<section>
	          	<label for="channel">
	          		<?php _t('form_channel'); ?>
	          		<small><?php _t('cs_ban_channel_hint'); ?>.</small>
	          	</label>
	          	<div>
	          		<input name="channel" id="channel" size="35" maxlength="50" type="text" placeholder="#channel" class="required" />
	          	</div>
			</section>
        	
			<section>
	          	<label for="nick">
	          		<?php _t('form_nickname'); ?>
	          		<small><?php _t('cs_ban_nick_hint'); ?>.</small>
	          	</label>
    	      	<div>
    	      		<input name="nick" id="nick" size="35" maxlength="50" type="text" placeholder="Nickname" class="required" />
    	      	</div>
			</section>
        	
        	<section>
        		<label for="unban">
        			<?php _t('cs_ban_unban_label'); ?>?
        			<small><?php _t('cs_ban_unban_hint'); ?>?</small>
        		</label>
        		<div>
        			<input type="checkbox" name="unban" id="unban" class="required" placeholder="" value="1" />
        			<br /><br />
        			<input type="submit" name="submit" value="<?php _t('button_update'); ?>" class="primary button" />
        		</div>
        	</section>
			</form>
		
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>