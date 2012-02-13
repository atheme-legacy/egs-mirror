<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>Chanserv &gt; AKick User</h2>
			
			<div class="column left">
				<h3>AKick List</h3>
				
				<?php if (isset($response) && is_array($response)) : ?>
				<p class="hlight">
					<?php foreach ($response as $line) : ?>
						<?php print $line; ?><br />
					<?php endforeach; ?>
				</p>
				<?php endif; ?>
				
				<form action="" method="post">
				<section>
					<label for="channel">
						<?php _t('form_channel'); ?>
						<small><?php _t('cs_akick_channel_hint'); ?>.</small>
					</label>
					<div>
						<input name="channel" id="channel" size="35" maxlength="50" type="text" placeholder="#channel" class="required" />
						<br /><br />
						<input type="submit" value="<?php _t('button_list'); ?>" name="submit" class="primary button" />
					</div>
				
					<input type="hidden" name="list_akicks" value="1" />
				</section>
				</form>
				
			</div>
			
			<div class="column right">
				<h3>Manage AKick List</h3>
				<form action="" method="post">
				<section>
					<label for="channel">
						<?php _t('form_channel'); ?>
					</label>
					<div>
						<input name="channel" id="channel" size="35" maxlength="50" type="text" placeholder="#channel" class="required" />
					</div>
				</section>
					
				<section>
					<label for="nick">
						<?php _t('form_nickname'); ?>
					</label>
					<div>
						<input name="nick" id="nick" size="35" maxlength="50" type="text" placeholder="Nickname" class="required" />
					</div>
				</section>
					
				<section>
					<label for="action">
						<?php _t('form_action'); ?>
					</label>
					<div>
						<select name="action" id="action">
							<option value="add">Add</option>
							<option value="del">Delete</option>
						</select>	
					</div>
				</section>
					
				<section>
					<label for="reason">
						<?php _t('form_reason') ; ?>
					</label>
					<div>
						<input name="reason" id="reason" size="35" maxlength="50" type="text" placeholder="Reason (Optional)" class="optional" />
						<br /><br />
						<input type="submit" value="<?php _t('button_update'); ?>" class="primary button" />
					</div>
				
					<input type="hidden" name="set_akick" value="1" />
				</section>
				</form>
				
			</div>
						
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>